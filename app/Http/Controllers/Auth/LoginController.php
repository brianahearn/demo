<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Incorrect email/password'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {

      $user = Auth::user();
      $partnerName = ($user->stores()->get()->count() >= 1) ? $user->stores()->get()->first()->partner->name : 'None';
      $userPartner = ($partnerName == 'None') ? null : $user->stores()->get()->first()->partner;
      $userPartnerGroup = is_null($userPartner) ? 'None' : (($userPartner->PartnerGroup()->get()->first()) ? $userPartner->PartnerGroup()->get()->first()->name : 'None');
      $userRole = $user->roles->pluck('name')->toArray();
      $userRole = implode($userRole);
      $a1 = array('User' => $user->name);

           if(!$user->hasRole(['User-Store','User-District'])) {
               if($user->hasRole(['Supplier']))
               {
                   $a2 = array('Vendor' => $user->supplier->vendor->name);
               } else {
                   $a2 = array('Partner' => 'Various');
               }
           } else {
               $partnerName = ($user->stores()->get()->count() >= 1) ? $user->stores()->get()->first()->partner->name : 'None';
               //$a2 = array('Partner' => $user->stores()->get()->first()->partner->name);
               $a2 = array('Partner' => $partnerName);
           }

           $a3 = array('Browser' => $request->header('User-Agent'));
           $a4 = array('IP' => $request->ip());

           $attachments = $a1 + $a2 + $a3 + $a4;
           $content = 'A user has Logged out of the Partner Portal';
          try {
            $notificationData = [
              'channel' => 'pp3-staging-logins',
              'message' => 'Login Data',
              'content' => $content,
              'fields' => $attachments
            ];

            $notifyResponse = $user->notify(new SlackNotification($user, $notificationData));
          } catch (\Exception $e) {
            \Log::alert('slack outage');
          }

          $request->user()->token()->revoke();

          return response()->json([
              'message' => 'Successfully logged out'
          ]);
    }
}
