<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
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
      $users = User::orderBy('name','asc')->paginate(10);

      return view('users.index', [
        'users' => $users,
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

      $this->authorize('create',User::class);
      $user = new User();

      return view ('users.create',[
        'user' => $user,
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
      $user = new User();
      $user->fill($request -> all());
      $user->password = Hash::make($request->password);
      $user ->save();
      /*
        1 => 'Member',
        2 => 'Club Admin',
        3 => 'Super Admin',
        4 => 'Non Member'
      */
      switch($request->role_name)
      {
        case 1:
          $user->assign('member');
          $user->role_name ='member';
          break;
        case 2:
          $user->assign('clubadmin');
          $user->role_name ='clubadmin';
          break;
        case 3:
          $user->assign('superadmin');
          $user->role_name = "superadmin";
          break;
        case 4:
            $user->assign('nonmember');
            $user->role_name = "nonmember";
            break;
      }


      return redirect() -> route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $user = User::find($id);
      $this->authorize('view',$user);
      if(!$user) throw new ModelNotFoundException;
      return view('users.show',[
        'user' => $user,
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
      $user = User::find($id);
      $this->authorize('edit',User::class);
      if(!$user) throw new ModelNotFoundException;

      return view('users.edit',[
        'user' => $user
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
      $user = new User();
      $user->fill($request -> all());
      $user->password = bycrpt($request->password);
      /*
        1 => 'Member',
        2 => 'Club Admin',
        3 => 'Super Admin',
      */
      switch($request->role_name)
      {
        case 1:
          $user->assign('member');
          $user->role_name ='member';
          break;
        case 2:
          $user->assign('clubadmin');
          $user->role_name ='clubadmin';
          break;
        case 3:
          $user->assign('superadmin');
          $user->role_name = "superadmin";
          break;
        case 4:
            $user->assign('nonmember');
            $user->role_name = "nonmember";
            break;
      }
      $user ->save();

      return redirect() -> route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      if(!$user) throw new ModelNotFoundException;
      $user->retract($user->role_name);
      $user->delete();
      return redirect()->route('users.index');
    }
}
