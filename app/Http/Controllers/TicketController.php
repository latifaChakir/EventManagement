<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\View;

class TicketController extends Controller
{
    public function generate($idEvent){
        $event = Event::find($idEvent);
        return view('ticket',compact('event'));
    }

    public function addTicket(Request $request){

        $validatedData = $request->validate([
            'id_event' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);
        $event = Event::findOrFail($validatedData['id_event']);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $reserve= new Reservation();
        $reserve->id_user=$user->id;
        $reserve->id_event=$validatedData['id_event'];

        if ($event->type_reserved === 'automatic') {
            $reserve->status = 'approved';
            $reserve->save();
            $event->number_places = $event->number_places - 1;
            $event->save();
            session(['userName' => $user->name]);
            return redirect('/ticket/' . $validatedData['id_event']);
        }

        else{
            $reserve->status = 'pending';
            $reserve->save();
            return redirect('/home');
        }

    }

    public function pdf($idEvent)
    {
        $userName = session('userName');
        $event = Event::findOrFail($idEvent);

        $htmlContent = View::make('pdf_content', [
            'userName' => $userName,
            'eventName' => $event->title
        ])->render();

        // Générer le PDF
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf->setOptions($options);
        $dompdf->loadHtml($htmlContent);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        session()->forget('userName');

        $fileName = 'ticket.pdf';
        return $dompdf->stream($fileName);
    }
}
