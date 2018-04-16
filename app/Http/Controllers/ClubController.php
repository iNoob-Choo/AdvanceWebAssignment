<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;

class ClubController extends Controller
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

      $clubs = Club::orderBy('name','asc')->paginate(10);

      return view('clubs.index', [
        'clubs' => $clubs,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $club = new Club();

      return view ('clubs.create',[
        'club' => $club,
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
      $club = new Club();
      $club ->fill($request -> all());
      if(isset($request->club_logo_path))
      {
        $file = $request->file('club_logo_path');
        $path = $file->storeAs('public/clublogo',$request->name.'.jpg');
        $club->club_logo_path = $path;
      }
      $club ->save();

      return redirect() -> route('clubs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $club = Club::find($id);
      if(!$club) throw new ModelNotFoundException;
      return view('clubs.show',[
        'club' => $club,
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
      $club = Club::find($id);
      if(!$club) throw new ModelNotFoundException;

      return view('clubs.edit',[
        'club' => $club
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
      $club = Club::find($id);
      if(!$club) throw new ModelNotFoundException;

      $club->fill($reuqest->all());
      if(isset($request->club_logo_path))
      {
        $file = $request->file('club_logo_path');
        $path = $file->storeAs('public/clublogo',$request->name.'.jpg');
        $club->club_logo_path = $path;
      }
      $club->save();
      //$group->members()->sync($request->members_id);
      return redirect()->route('clubs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $club = Club::find($id);
      if(!$club) throw new ModelNotFoundException;
      $club->delete();
      return redirect()->route('clubs.index');
    }
}
