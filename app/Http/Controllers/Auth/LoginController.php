<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');   
    }

    // public function login()
    // {
    //     $id = Auth::user()->id;
        
    //     $user = User::find($id);

    //     if($user->flag == 1)
    //     {
    //         return redirect()->to('home')->with('Success', 'User activated');
    //     }
    //     else
    //     {
    //         return redirect()->to('login')->with('warning', 'Not activated');
    //     }
    // }

    protected function credentials(Request $request)
    {
        return [
            'email'=>$request->{$this->username()},
            'password'=>$request->password,
            'flag'=>1
        ];
    }

    public function logout(Request $request) {
        Auth::logout();
        Session::flush();
        Redirect::back();
        return redirect('/login');
      }
}
