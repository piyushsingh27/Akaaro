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

        $admin_id = auth()->user()->id;
        $adminnn = Admin::find($admin_id);

        $admin_id = auth()->user()->id;
        $adminnnn = Admin::find($admin_id);

        return view('admin.home')->with(['users' => $admin->users,
                                            'clients' => $adminn->clients,
                                                'jobs' => $adminnn->job_descriptions,
                                                    'candidates' => $adminnnn->candidates]);
    }

    public function flagupdate_user($user_id)
    {
        // $admin_id = auth()->user()->id;
        // $admin = Admin::find($admin_id);

        // foreach($admin->users as $admin->user)
        // {
        //     $admin->user->flag = 1;
        //     $admin->user->save();
        // }
        // return redirect()->to('/admin/home')->with('Success', "User activated");

        $user = User::find($user_id);
        $user->flag = 1;
        $user->save();

        return redirect()->to('/admin/home')->with('Success', "User activated");


    }

    public function flagdowngrade_user($user_id)
    {
        // $admin_id = auth()->user()->id;
        // $admin = Admin::find($admin_id);

        // foreach($admin->users as $admin->user)
        // {
        //     $admin->user->flag = 0;
        //     $admin->user->save();
        // }
        // return redirect()->to('/admin/home')->with('Success', "User deactivated");

        $user = User::find($user_id);
        $user->flag = 0;
        $user->save();

        return redirect()->to('/admin/home')->with('Success', "User deactivated");
    }

    public function flagupdate_client($client_id)
    {
        // $admin_id = auth()->user()->id;
        // $adminn = Admin::find($admin_id);

        // foreach($adminn->clients as $adminn->client)
        // {
        //     $adminn->client->flag = 1;
        //     $adminn->client->save();
        // }
        // return redirect()->to('/admin/home')->with('Success', "Client activated");

        $client = Client::find($client_id);
        $client->flag = 1;
        $client->save();

        return redirect()->to('/admin/home')->with('Success', "Client Activated");
    }

    public function flagdowngrade_client($client_id)
    {
        // $admin_id = auth()->user()->id;
        // $adminn = Admin::find($admin_id);

        // foreach($adminn->clients as $adminn->client)
        // {
        //     $adminn->client->flag = 0;
        //     $adminn->client->save();
        // }
        // return redirect()->to('/admin/home')->with('Success', "Client deactivated");

        $client = Client::find($client_id);
        $client->flag = 0;
        $client->save();

        return redirect()->to('/admin/home')->with('Success', "Client deactivated");
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
