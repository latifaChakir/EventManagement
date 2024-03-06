<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

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
        }
        else{
            $reserve->status = 'pending';
            $reserve->save();
        }
        return redirect('/home');

    }
}
