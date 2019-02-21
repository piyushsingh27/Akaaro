<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Client;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin_id = auth()->user()->id;
        $admin = Admin::find($admin_id);

        $admin_id = auth()->user()->id;
        $adminn = Admin::find($admin_id);

        return view('admin.home')->with(['users' => $admin->users,
                                            'clients' => $adminn->clients]);
    }

    public function flagupdate_user($admin_id)
    {
        $admin_id = auth()->user()->id;
        $admin = Admin::find($admin_id);

        foreach($admin->users as $admin->user)
        {
            $admin->user->flag = 1;
            $admin->user->save();
        }
        return redirect()->to('/admin/home')->with('Success', "User activated");
    }

    public function flagupdate_client($admin_id)
    {
        $admin_id = auth()->user()->id;
        $adminn = Admin::find($admin_id);

        foreach($adminn->clients as $adminn->client)
        {
            $adminn->client->flag = 1;
            $adminn->client->save();
        }
        return redirect()->to('/admin/home')->with('Success', "Client activated");
    }

    // public function flag_update()
    // {

    // }

    // public function index1()
    // {
    //     $user_id = auth()->user()->id;
    //     $user = User::find($user_id);
    //     return view('remarks')->with('remarks',$user->remarks);
    // }
}
