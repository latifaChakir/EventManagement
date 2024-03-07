<?php

namespace App\Http\Controllers;

use App\Mail\ApprovedMail;
use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $decodedUser = $request->decoded_user;
        $userId = $decodedUser->id;
        $userName= $decodedUser->name;

        $events = Event::join('categories', 'events.id_categorie', '=', 'categories.id')
        ->where('events.id_user', $userId)
        ->select('events.*', 'categories.name as category_name')
        ->get();
        $categories=Category::all();
        return view('organisateur.events', compact('categories','events','userName'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $decodedUser = $request->decoded_user;
        $userId = $decodedUser->id;

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'place' => 'required',
            'date' => 'required',
            'number_places'=>'required',
            'type_reserved'=>'required',
            'category_id' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $uploadDir = 'images/';
        $uploadFileName = uniqid() . '.' . $request->file('image_path')->getClientOriginalExtension();
        $request->file('image_path')->move($uploadDir, $uploadFileName);

        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->place = $request->place;
        $event->date = $request->date;
        $event->type_reserved = $request->type_reserved;
        $event->number_places = $request->number_places;
        $event->id_categorie = $request->category_id;
        $event->id_user = $userId;
        $event->image_path = $uploadFileName;
        $event->save();

        return redirect('/events');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event=Event::find($id);
        $categories=Category::all();
        return view('organisateur.editevent', compact('event','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $decodedUser = $request->decoded_user;
        $userId = $decodedUser->id;

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'place' => 'required',
            'date' => 'required',
            'number_places'=>'required',
            'type_reserved'=>'required',
            'category_id' => 'required',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,svg,gif|max:2048',
        ]);

        $uploadDir = 'images/';
        $uploadFileName = uniqid() . '.' . $request->file('image_path')->getClientOriginalExtension();
        $request->file('image_path')->move($uploadDir, $uploadFileName);

        $event = Event::find($id);
        $event->title = $request->title;
        $event->description = $request->description;
        $event->place = $request->place;
        $event->date = $request->date;
        $event->type_reserved = $request->type_reserved;
        $event->number_places = $request->number_places;
        $event->id_categorie = $request->category_id;
        $event->id_user = $userId;
        $event->image_path = $uploadFileName;
        $event->update();
        return redirect('/events');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $event = Event::find($id);
        $event->delete();
        return redirect('/events')->with('success', 'Event deleted successfully');
    }

    public function accepteEvents(Request $request){
        $decodedUser = $request->decoded_user;
        $userId = $decodedUser->id;
        $reservations = DB::table('reservations')
        ->join('events', 'reservations.id_event', '=', 'events.id')
        ->join('users', 'reservations.id_user', '=', 'users.id')
        ->where('events.id_user', '=', $userId)
        ->where('reservations.status', 'LIKE', 'pending')
        ->select('reservations.*', 'events.image_path as image', 'events.title as event_title', 'users.name as user_name','users.email as user_email')
        ->get();
        return view('Organisateur.acceptedReservation',compact('reservations'));

    }

    public function approved($eventId){
        $reservation = Reservation::find($eventId);
        $reservation->status = 'approved';
        $reservation->save();
        /////FIND DETAILS
        $evenid=$reservation->id_event;
        $event=Event::find($evenid);
        $eventTitle=$event->title;
       $reserveUser=$reservation->id_user;
       $user = User::find($reserveUser);
       $userEmail = $user->email;
       $this->sendApprovedEmail($userEmail,$eventTitle);

        return redirect('/reservation');

    }

    private function sendApprovedEmail($userEmail,$eventTitle)
    {
        $subject = 'Reservation Approved';
        $body = 'Your reservation In' .$eventTitle.' has been approved.';

        Mail::to($userEmail)
            ->send(new ApprovedMail($subject, $body));
    }

    public function rejected($reserveId){
        $reservation = Reservation::find($reserveId);
        $reservation->status = 'rejected';
        $reservation->save();
        return redirect('/reservation');

    }

    public function afficheStatistics(Request $request){
        $decodedUser = $request->decoded_user;
        $userId = $decodedUser->id;
        $myevents = Event::where('id_user', $userId)->count();
        $users = Reservation::join('events', 'reservations.id_event', '=', 'events.id')
                    ->where('events.id_user', $userId)
                    ->count();
        return view('Organisateur/dashboard',compact('myevents','users'));
    }
    }

