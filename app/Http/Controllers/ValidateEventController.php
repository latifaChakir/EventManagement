<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class ValidateEventController extends Controller
{
    public function validateEvent(){
        $events = Event::join('users', 'events.id_user', '=', 'users.id')
        ->select('events.*', 'users.name as user_name')
        ->where('events.is_published',0)
        ->get();
        return view('Admin.validateEvent', compact('events'));
    }

    public function AcceptedEvent($idEvent){
        $event = Event::find($idEvent);
        $event->is_published = 1;
        $event->save();
        return redirect('/validatEvent');
    }

    public function refusedEvent($idEvent){
        $event = Event::find($idEvent);
        $event->is_published = 2;
        $event->save();
        return redirect('/validatEvent');
    }

    public function afficheStatistics(){
        $users = User::where('id_role', 3)->count();
        $orgnizers = User::where('id_role', 2)->count();
        $acceptedEvents = Event::where('is_published', 1)->count();
        $refusedEvents = Event::where('is_published', 0)->count();
        $orgnizersJson = json_encode($orgnizers);
        return view('Admin.dashboard',compact('orgnizers', 'acceptedEvents', 'refusedEvents','users','orgnizersJson'));
    }
}
