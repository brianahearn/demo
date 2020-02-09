<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return list of users
        //csrf_token() is required in forms but in our case we haven't setup oauth yet so
        //I'm using this call to grab the token for use in postman
        return csrf_token();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
        $user = User::create([
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'password' => bcrypt($request->get('password'))
        ]);
      } catch (\Exception $e) {
        return response('User could not be created', 400);
      }

        //fractal
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::find($user->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
      $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required'
      ]);
      //$user = User::find($user->id);
      // $user = User::find($user);
      $user->name = $request->get('name');
      $user->email = $request->get('email');
      if($request->get('password') !== '')
      {
        $user->password = bcrypt($request->get('password'));
      }
      $user->save();
return 'test2';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
}
