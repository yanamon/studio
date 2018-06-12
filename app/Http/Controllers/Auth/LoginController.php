<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\User;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function authenticated(Request $request)
    {
        $previlege =  Auth::user()->previlege;
        $banned =  Auth::user()->banned;
        if($banned == 1) {
            Auth::logout();
            return redirect('/banned');
        }
        
        else if(Auth::user()->status_online == "online") {
            Auth::logout();
            return redirect('/alreadyOnline');
        }

        else if($previlege == 0) {
            if($request->previlege==1){
                Auth::logout();
                return redirect('/');
            }
            else{
                $user = User::find(Auth::user()->id);
                $user->status_online = "online";
                $user->save();
                return redirect('/');
            }
        }

        else if($previlege == 1) {
            $user = User::find(Auth::user()->id);
            $user->status_online = "online";
            $user->save();
            
            if($request->previlege==1){
                return redirect('/studioMusik');
            }
            else{ 
                return redirect('/');
            }

        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
