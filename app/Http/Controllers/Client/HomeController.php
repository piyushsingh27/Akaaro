<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$user_id = auth()->user()->id;
        //$user = User::find($user_id);
        return view('client.home')/*->with('candidates',$user->candidates)*/;
    }

    // public function index1()
    // {
    //     $user_id = auth()->user()->id;
    //     $user = User::find($user_id);
    //     return view('remarks')->with('remarks',$user->remarks);
    // }
}
