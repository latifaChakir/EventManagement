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

    public function pdf(Request $request, $idEvent)
    {
        $decodedUser = $request->decoded_user;
        $userId = $decodedUser->id;
        $user=User::find($userId);
        $event = Event::findOrFail($idEvent);

        $htmlContent = View::make('pdf_content', [
            'userName' => $user->name,
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
        $fileName = 'ticket.pdf';
        return $dompdf->stream($fileName);
    }
}
