<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
// use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Input;
use App\Candidate;

class MailController extends Controller
{
    public function send()
    {
        $selection = Input::has('selection') ? true : false;

        $update_selection = DB::table('candidates')->update(array('excluding' => $selection));

        $candidates = Candidate::all();
        foreach ($candidates as $candidate)
        {
            if ($candidate->selection == 1)
            {
                Mail::send(['text' => 'mail.sendmail'], ['name', 'Akaaro'], function($message){
                $message->to($candidate->email)->subject('Test Email');
                $message->from('pyushsingh27@gmail.com', 'Piyush');
                });
            }
        }

        
    }
}
