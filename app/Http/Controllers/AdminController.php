<?php

namespace App\Http\Controllers;

use App\StudioMusik;
use App\Penyewa;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('StudioMusik')->where('previlege', 1)->orderBy('confirmed')->get();
        return view("admin.unconfirmed-studio",compact('users'));
    }

    public function crudUser()
    {
        $users = User::with('Penyewa')->where('previlege',0)->orderBy('created_at')->get();
        return view("admin.crud-user",compact('users'));
    }

    public function crudStudioMusik()
    {
        $users = User::with('StudioMusik')->where('previlege', 1)->orderBy('created_at')->get();
        return view("admin.crud-studio-musik",compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function unconfirmedStudio()
    {
        $users = User::with('StudioMusik')->with('Penyewa')->where('previlege', 1)->orderBy('confirmed')->get();
        dd($users);
        return view("admin.unconfirmed-studio",compact('users'));
    }

    public function confirmStudio(Request $request){
        $user = User::find($request->id);
        $user->confirmed = 1;
        $user->save();
        return redirect()->back();
    }

    public function unconfirmStudio(Request $request){
        $user = User::find($request->id);
        $user->confirmed = 0;
        $user->save();
        return redirect()->back();
    }

    public function banStudio(Request $request){
        $user = User::find($request->id);
        $user->confirmed = 2;
        $user->save();
        return redirect()->back();
    }

    public function unbanStudio(Request $request){
        $user = User::find($request->id);
        $user->confirmed = 0;
        $user->save();
        return redirect()->back();
    }

    public function detailStudio($id)
    {
        $user = User::with('StudioMusik')->find($id);
        return view("admin.detail-studio", compact('user'));
    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
