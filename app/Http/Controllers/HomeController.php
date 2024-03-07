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
        $events = Event::where('is_published', 1)->get();
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

    public function search(Request $request)
{
    $searchTerm = $request->input('search');
    $events = Event::where('is_published', 1)
           ->where('title', 'like', "%{$searchTerm}%")
           ->paginate(4); 
    if ($request->ajax()) {
        return view('event_list', compact('events'))->render();
    }

    return view('search', compact('events'));
}

    public function filter(Request $request)
    {
        $checkedCategory = $request->input('category');
        $events = Event::join('categories', 'events.id_categorie', '=', 'categories.id')
               ->where('categories.name', "{$checkedCategory}")
               ->get();

        return view('filter', compact('events'));
    }

}
