<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Candidate;
use DB;

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::orderBy('created_at','desc')->get();
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

    public function search_skills(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
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

    public function search_skills_and(Request $request)
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

    public function search_resume(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
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

    public function search_resume_and(Request $request)
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

    public function searchpage()
    {
        $candidates = Candidate::all();

        return view('search_client')->with('candidates', $candidates);;
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
