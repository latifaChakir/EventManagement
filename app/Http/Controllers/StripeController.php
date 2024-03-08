<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\Webhook;
use illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $userId=$user->id;

        $name = Event::find($request->id)->title;
        $event=Event::find($request->id);
        $price = Event::find($request->id)->prix;
        Stripe::setApiKey(config('stripe.sk'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'USD',
                        'product_data' => [
                            'name' => $name,

                        ],
                        'unit_amount' => $price * 10,
                    ],
                    'quantity' => 1,
                ]
            ],
            'mode' => 'payment',
            'success_url' => route('success', [$event, $userId]),
            'cancel_url' => 'http://127.0.0.1:8000/error',

            'metadata' => [
                // 'event_id' => 1,
                'user_id' => $userId,
                'event_id' => $request->id,

            ],

        ]);

        return redirect()->away($session->url);


    }

    public function handleWebhook(Request $request)
    {
        Stripe::setApiKey(config('stripe.sk'));

        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        $event = null;

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sig_header,
                config('stripe.webhook_secret')
            );
        } catch (\Exception $e) {
            return response()->json(['error' => 'Webhook Error: ' . $e->getMessage()], 400);
        }

        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;

            $reserve= new Reservation();
            $reserve->id_user=$session->metadata->user_id;
            $reserve->id_event=$session->metadata->event_id;

            $eventid = $session->metadata->event_id;
            $userId=$session->metadata->user_id;
            $event = Event::findOrFail($eventid);
            $user=User::findOrFail($userId);

            if ($event->type_reserved === 'automatic') {
                $reserve->status = 'approved';
                $reserve->save();
                $event->number_places = $event->number_places - 1;
                $event->save();
                return view('/success',compact('event','user'));
                // Log::info("message");

            }else{
                $reserve->status = 'pending';
                $reserve->save();
                $event->number_places = $event->number_places - 1;
                $event->save();
                return view('/success',compact('event'));
            }

        }

        return response()->json(['status' => 'success']);
    }
    public function success($eventId,$userId)
    {
        
        $event=Event::find($eventId);
        $user=User::find($userId);
        return view('index',compact('event','user'));
    }
}
