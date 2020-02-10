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
      //laravel fractal could be used as a view layer for json
      return response(User::paginate()->toJson(), 200);
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

      return response($user->toJson(), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
      return response($user->toJson(), 200);
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

      $user->name = $request->get('name');
      $user->email = $request->get('email');

      if($request->get('password') !== '')
      {
        $user->password = bcrypt($request->get('password'));
      }
      $user->save();

      return response($user->toJson(), 200);
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
      return response('User Deleted', 200);
    }
}
