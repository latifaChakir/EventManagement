<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $latestevents = Event::orderBy('date', 'desc')->limit(4)->get();
        // dd($latestevents);
        $events=Event::all();
        $categories=Category::all();
        return view('home',compact('categories','events','latestevents'));
    }

    public function afficherDet($id){
        $event = Event::join('users', 'events.id_user', '=', 'users.id')
        ->where('events.id', $id)
        ->select('events.*', 'users.name AS user_name')
        ->first();
        return view('eventDetail',compact('event'));
    }
}
