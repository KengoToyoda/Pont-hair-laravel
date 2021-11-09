<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function index(Request $request){
        return view('calendar.index');
    }
    public function loadEvents(){
        $events = Event::get();
        return response()->json($events);
    }
    public function store(Request $request)
    {
        $event = new Event;
        $event->title = $request->input('title');
        $event->content = $request->input('content');
        $event->start = $request->input('start');
        $event->end = $request->input('end');
        $event->textColor = $request->input('textColor');
        $event->save();
        
        $events = Event::all();
        return response()->json($events);
    }
}
