<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use App\User;
use Auth;

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
      $this->authorize('create',Club::class);
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
      $club->chairperson_id = $request->chairperson_id;
      $user = User::find($request->chairperson_id);
      $club->users()->sync($user->id,false);
      $user->retract($user->role_name);
      $user->assign('clubadmin');
      if(isset($request->club_logo_path))
      {
        $file = $request->file('club_logo_path');
        $name = $request->name.'.jpg';
        $path = $file->storeAs('public/clublogo',$name);
        $club->club_logo_path = $name;
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
      $this->authorize('view',Club::class);
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
      $this->authorize('edit',Club::class);
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

      $club->fill($request->all());
      if(Auth::user()->isA('superadmin'))
      {
        $club->chairperson_id = $request->chairperson_id;
        $user = User::find($request->chairperson_id);
        $club->users()->sync($user->id,false);
        $user->retract($user->role_name);
        $user->assign('clubadmin');
      }
      if(isset($request->club_logo_path))
      {
        $file = $request->file('club_logo_path');
        $name = $request->name.'.jpg';
        $path = $file->storeAs('public/clublogo',$name);
        $club->club_logo_path = $name;
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


    public function joinClub($club_id)
    {
      $club = Club::find($club_id);
      if(!$club) throw new ModelNotFoundException;
      Auth::user()->retract('nonmember');
      Auth::user()->assign('member');
      $club->users()->sync(Auth::user()->id,false);
      return redirect()->route('clubs.show',['id'=>$club_id]);

    }

    public function viewClubEvents($club_id)
    {
      $this->authorize('viewEvent',Club::class);
      $club = Club::with('events')->find($club_id);
      $this->authorize('view',$club);
      if(!$club) throw new ModelNotFoundException;

      return view('clubs.events',[
        'club' => $club
      ]);
    }

    public function viewClubMembers($club_id)
    {
      $this->authorize('viewMembers',Club::class);
      $club = Club::with('users')->find($club_id);
      $this->authorize('viewMembers',Club::class);
      if(!$club) throw new ModelNotFoundException;

      return view('clubs.showmembers',[
        'club' => $club
      ]);
    }
}
