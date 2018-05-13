<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use App\Penyewa;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class PenyewaController extends Controller
{

    public function __construct()
    {
        //defining our middleware for this controller
        $this->middleware('auth',['except' => [
            'store'
        ]]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $validator = Validator::make($request->all(), [
            'nama_penyewa' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('validate', 2);
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->name = $request->nama_penyewa;
        $user->telp = $request->telp;
        $user->previlege = 0;
        $user->save();
        
        Auth::loginUsingId($user->id);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function show(Penyewa $penyewa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyewa $penyewa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyewa $penyewa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyewa $penyewa)
    {
        //
    }
}
