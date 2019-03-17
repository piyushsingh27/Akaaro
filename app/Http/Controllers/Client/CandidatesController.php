<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Candidate;
use DB;
use Illuminate\Support\Facades\Input;
use Mail;
use App\Email;

class CandidatesController extends Controller
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

    public function emailbody($id)
    {
        $candidate = Candidate::find($id);

        return view('mail.mailbody_client')->with('candidate', $candidate);
    }

    public function send($id, Request $request)
    {
        
        $email = new Email;
        $email->email = $request->input('email');
        $email->message = $request->input('message');
        $email->client_id = auth()->user()->id;
        $email->candidate_id = $id;
        $email->save();

        // return view('mail.sendmail')->with('email', $email);

        $candidatee = Candidate::find($id);
        $candidatee->message = $request->input('message');
        $candidatee->save();
        
        

        $candidate = Candidate::find($id)->toArray();
        // $emaill = Email::where('candidate_id', $id)->first();
        // $emailll = Email::find($emaill)->toArray();
        // $emaill = Email::find()

        // $candidate = array('text' => $email->message);

        $data = array('candidate' => $candidate,
                        'email' => $email);

        Mail::send([], $candidate, function($message) use ($candidate){
        $message->to($candidate['email'])->subject('Akaaro - Info Mail');
        $message->setBody($candidate['message']);
        $message->from('akaaro.hirings@gmail.com', 'Akaaro');
        });

        return redirect()->to('/client/candidatescl')->with('Success', "Email Sent");
    }

    // public function send($id)
    // {
    //             $candidate = Candidate::find($id)->toArray();

    //             Mail::send('mail.sendmail', $candidate, function($message) use ($candidate){
    //             $message->to($candidate['email'])->subject('Test Email');
    //             $message->from('pyushsingh27@gmail.com', 'Piyush');
    //             });

    //             return redirect()->to('/client/candidatescl')->with('Success', "Email Sent");
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::orderBy('created_at','desc')->paginate(10);
        //$posts = Post::orderBy('title','desc')->take(1)->get();
       //$posts = DB::select('SELECT * FROM posts');
       //$posts = Post::all();
        //$candidates = Post::orderBy('id','desc')->paginate(10);
        return view('candidates.index_client')->with('candidates',$candidates);
    }


    public function search_name(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');

        $candidates = Candidate::where('name', 'like', "%$query%")->paginate(10);

        // $candidates = Candidate::search($query)->paginate(5);

        return view('search-client_index')->with('candidates', $candidates);
    }

    public function search_location(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('preferred_location', 'like', "%$query%")->paginate(10);

        return view('search-client_index')->with('candidates', $candidates);
    }

    public function search_current_location(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('current_location', 'like', "%$query%")->paginate(10);

        return view('search-client_index')->with('candidates', $candidates);
    }

    public function search_marks12th(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('marks_12th', 'like', "%$query%")->paginate(10);

        return view('search-client_index')->with('candidates', $candidates);
    }

    public function search_aggregate_UG(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('aggregate_UG', 'like', "%$query%")->paginate(10);

        return view('search-client_index')->with('candidates', $candidates);
    }

    public function search_aggregate_PG(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('aggregate_PG', 'like', "%$query%")->paginate(10);

        return view('search-client_index')->with('candidates', $candidates);
    }

    public function search_salary(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('salary', 'like', "%$query%")->paginate(10);

        return view('search-client_index')->with('candidates', $candidates);
    }

    public function search_experience(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('experience', 'like', "%$query%")->paginate(10);

        return view('search-client_index')->with('candidates', $candidates);
    }

    public function search_status(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('status', 'like', "%$query%")->paginate(10);

        return view('search-client_index')->with('candidates', $candidates);
    }

    // public function search_skills(Request $request)
    // {
    //     $request->validate([
    //         'query' => [ 'min:1'],
    //     ]);

    //     $query = $request->input('query');
        
    //     $candidates = Candidate::where('skills', 'like', "%$query%")->paginate(10);

    //     return view('search-client_index')->with('candidates', $candidates);
    // }

    public function search_skill(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');

        $candidates = Candidate::where('skills', 'like', "%$query%")->paginate(10);

        // $candidates = Candidate::search($query)->paginate(5);

        return view('search-client_index')->with('candidates', $candidates);
    }


    public function search_skills(Request $request)
    {
        // dd(Input::has('excluding'));

        $excluding = Input::has('excluding') ? true : false;

        $update_excluding = DB::table('candidates')->update(array('excluding' => $excluding));
        // $candidate->save();

        $candidates = Candidate::all();
        foreach ($candidates as $candidate)
        {
            if ($candidate->excluding == 0)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]); 

                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $candidates = Candidate::where('skills', 'like', "%$query%")
                                            ->orWhere('skills', 'like', "%$query1%")
                                            ->orWhere('skills', 'like', "%$query2%")
                                            ->paginate(10);

                return view('search-client_index')->with('candidates', $candidates);
            }

            else if($candidate->excluding == 1)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]);
        
                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $candidates = Candidate::where('skills', 'like', "$query")
                                            ->orWhere('skills', 'like', "$query1")
                                            ->orWhere('skills', 'like', "$query2")
                                            ->paginate(10);
        
                return view('search-client_index')->with('candidates', $candidates);
            }

        }

    }

    public function search_skills_and(Request $request)
    {
        $excluding = Input::has('excluding') ? true : false;

        $update_excluding = DB::table('candidates')->update(array('excluding' => $excluding));

        $candidates = Candidate::all();
        foreach ($candidates as $candidate)
        {
            if ($candidate->excluding == 0)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]);
        
                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $candidates = Candidate::where([['skills', 'like', "%$query%"],['skills', 'like', "%$query1%"],['skills', 'like', "%$query2%"]])
                                            ->paginate(10);
        
                return view('search-client_index')->with('candidates', $candidates);
            }

            else if ($candidate->excluding == 1)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]);
        
                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $candidates = Candidate::where([['skills', 'like', "$query"],['skills', 'like', "$query1"],['skills', 'like', "$query2"]])
                                            ->paginate(10);
        
                return view('search-client_index')->with('candidates', $candidates);
            }
        }
    }

    public function search_res(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');

        $candidates = Candidate::where('other_skills', 'like', "%$query%")->paginate(10);

        // $candidates = Candidate::search($query)->paginate(5);

        return view('search-client_index')->with('candidates', $candidates);
    }

    public function search_resume(Request $request)
    {
        $excluding = Input::has('excluding') ? true : false;

        $update_excluding = DB::table('candidates')->update(array('excluding' => $excluding));
        // $candidate->save();

        $candidates = Candidate::all();
        foreach ($candidates as $candidate)
        {
            if ($candidate->excluding == 0)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]);
        
                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $candidates = Candidate::where('other_skills', 'like', "%$query%")
                                            ->orWhere('other_skills', 'like', "%$query1%")
                                            ->orWhere('other_skills', 'like', "%$query2%")
                                            ->paginate(10);
        
                return view('search-client_index')->with('candidates', $candidates);
            }

            else if ($candidate->excluding == 1)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]);
        
                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $candidates = Candidate::where('other_skills', 'like', "$query")
                                            ->orWhere('other_skills', 'like', "$query1")
                                            ->orWhere('other_skills', 'like', "$query2")
                                            ->paginate(10);
        
                return view('search-client_index')->with('candidates', $candidates);
            }
        }   

    }

    public function search_resume_and(Request $request)
    {
        $excluding = Input::has('excluding') ? true : false;

        $update_excluding = DB::table('candidates')->update(array('excluding' => $excluding));
        // $candidate->save();

        $candidates = Candidate::all();
        foreach ($candidates as $candidate)
        {
            if ($candidate->excluding == 0)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]);
        
                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $candidates = Candidate::where([['other_skills', 'like', "%$query%"],['other_skills', 'like', "%$query1%"],['other_skills', 'like', "%$query2%"]])
                                            ->paginate(10);
        
                return view('search-client_index')->with('candidates', $candidates);
            }

            else if($candidate->excluding == 1)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]);
        
                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $candidates = Candidate::where([['other_skills', 'like', "$query"],['other_skills', 'like', "$query1"],['other_skills', 'like', "$query2"]])
                                            ->paginate(10);
        
                return view('search-client_index')->with('candidates', $candidates);
            }
        }
    }

    public function searchpage()
    {
        $candidates = Candidate::all();

        return view('search_client')->with('candidates', $candidates);;
    }

    public function sentmails()
    {
        $emails = Email::orderBy('created_at','desc')->paginate(10);
    
        return view('sentmails-client')->with('emails',$emails);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $candidate = Candidate::find($id);
        return view('candidates.show_client')->with('candidate',$candidate);
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
