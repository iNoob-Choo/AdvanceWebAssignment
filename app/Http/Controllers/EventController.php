<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;


class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $events = Event::orderBy('name','asc')->paginate(10);

      return view('events.index', [
        'events' => $events,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $event = new Event();

      return view ('events.create',[
        'event' => $event,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $event = new Event();
      $event->fill($request -> all());
      if(isset($request->club_logo_path))
      {
        $file = $request->file('image_path');
        $name = $request->name.'.jpg';
        $path = $file->storeAs('public/eventimage',$name);
        $event->image_path = $name;
      }
      $event ->save();

      return redirect() -> route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $event = Event::find($id);
      if(!$event) throw new ModelNotFoundException;
      return view('events.show',[
        'event' => $event,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $event = Event::find($id);
      if(!$event) throw new ModelNotFoundException;

      return view('events.edit',[
        'event' => $event
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $event = Event::find($id);
      if(!$event) throw new ModelNotFoundException;

      $event->fill($reuqest->all());
      if(isset($request->club_logo_path))
      {
        $file = $request->file('image_path');
        $name = $request->name.'.jpg';
        $path = $file->storeAs('public/eventimage',$name);
        $event->image_path = $name;
      }
      $event->save();
      //$group->members()->sync($request->members_id);
      return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $event = Event::find($id);
      if(!$event) throw new ModelNotFoundException;
      $event->delete();
      return redirect()->route('events.index');

    }
}
