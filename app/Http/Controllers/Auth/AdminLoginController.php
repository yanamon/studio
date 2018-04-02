<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('guest:admin',['except' => ['logout']]);
    }

    public function loginform()
    {
        return view("admin.login-admin");
    }

    public function login(Request $request) {
        //validate the form data
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:6'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user->previlege==2){ 
            //attempt to login the admins in
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
                //if successful redirect to admin dashboard
                return redirect()->intended(route('admin.index')); 
            }
        }
        //if unsuccessfull redirect back to the login for with form data
        return redirect()->back()->withInput($request->only('username','remember'));
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/adminlogin');
    }
}
