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
        $decodedUser = $request->decoded_user;
        $userId = $decodedUser->id;

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
            'success_url' => route('success',$event),
            'cancel_url' => 'http://127.0.0.1:8000/error',

            'metadata' => [
                // 'event_id' => 1,
                'user_id' => $userId,
                'event_id' => $request->id,

            ],

        ]);

        return redirect()->away($session->url);


    }

//     public function handleWebhook(Request $request)
// {
//     Log::info("START");
//     Stripe::setApiKey(config('stripe.sk'));

//     $payload = $request->getContent();
//     $sig_header = $request->header('Stripe-Signature');

//     Log::info($sig_header);
//     $event = null;

//     try {
//         $event = Webhook::constructEvent(
//             $payload,
//             $sig_header,
//             config('stripe.webhook_secret')
//         );

//     } catch (\Exception $e) {
//         Log::info('mesa');
//         return response()->json(['error' => 'Webhook Error: ' . $e->getMessage()], 400);
//     }

//     Log::info($event);

//     if ($event->type == 'checkout.session.completed') {
//         Log::info("condition");
//         $session = $event->data->object;
//         $reserve= new Reservation();
//         $reserve->id_user=$session->metadata->user_id;
//         $reserve->id_event=$session->metadata->event_id;
//         $reserve->is_payed=1;

//         $eventid = $session->metadata->event_id;
//         $userId=$session->metadata->user_id;
//         $event = Event::findOrFail($eventid);
//         $user=User::findOrFail($userId);

//         if ($event->type_reserved === 'automatic') {
//             $reserve->status = 'approved';
//             $reserve->save();
//             $event->number_places = $event->number_places - 1;
//             $event->save();
//             return view('/success',compact('event','user'));
//         } else {
//             $reserve->status = 'pending';
//             $reserve->save();
//             $event->number_places = $event->number_places - 1;
//             $event->save();
//             return view('/success',compact('event'));
//         }
//     }

//     return response()->json(['status' => 'success']);
// }

public function success(Request $request, $eventId)
{
    $event=Event::find($eventId);
    $decodedUser = $request->decoded_user;
    $userId = $decodedUser->id;


        $reserve= new Reservation();
        $reserve->id_user=$userId;
        $reserve->id_event=$eventId;
        $reserve->is_payed=1;

        $event = Event::findOrFail($eventId);
        $user=User::findOrFail($userId);

        if ($event->type_reserved === 'automatic') {
            $reserve->status = 'approved';
            $reserve->save();
            $event->number_places = $event->number_places - 1;
            $event->save();
            return view('/index',compact('event','user'));
        } else {
            $reserve->status = 'pending';
            $reserve->save();
            $event->number_places = $event->number_places - 1;
            $event->save();
            return view('/index',compact('event'));
        }

}
}
