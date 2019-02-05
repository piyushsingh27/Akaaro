<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Candidate;
use DB;

class CandidatesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
        return view('candidates.index')->with('candidates',$candidates);
    }

    public function index_hired()
    {
        $candidates = Candidate::orderBy('created_at','desc')->get();

        return view('Status.indexhired')->with('candidates',$candidates);
    }

    public function index_hold()
    {
        $candidates = Candidate::orderBy('created_at','desc')->get();

        return view('Status.indexhold')->with('candidates',$candidates);
    }

    public function index_selected()
    {
        $candidates = Candidate::orderBy('created_at','desc')->get();

        return view('Status.indexselected')->with('candidates',$candidates);
    }

    public function index_rejected()
    {
        $candidates = Candidate::orderBy('created_at','desc')->get();

        return view('Status.indexrejected')->with('candidates',$candidates);
    }

    public function index_face2face()
    {
        $candidates = Candidate::orderBy('created_at','desc')->get();

        return view('Interview.indexface2face')->with('candidates',$candidates);
    }

    public function index_telephonic()
    {
        $candidates = Candidate::orderBy('created_at','desc')->get();

        return view('Interview.indextelephonic')->with('candidates',$candidates);
    }

    public function index_ISUB()
    {
        $candidates = Candidate::orderBy('created_at','desc')->get();

        return view('Submission.indexIsub')->with('candidates',$candidates);
    }

    public function index_CSUB()
    {
        $candidates = Candidate::orderBy('created_at','desc')->get();

        return view('Submission.indexCsub')->with('candidates',$candidates);
    }


    public function search_name(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');

        $candidates = Candidate::where('name', 'like', "%$query%")->paginate(1);

        // $candidates = Candidate::search($query)->paginate(5);

        return view('search-results')->with('candidates', $candidates);
    }

    public function search_location(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('preferred_location', 'like', "%$query%")->paginate(1);

        return view('search-results')->with('candidates', $candidates);
    }

    public function search_marks12th(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('marks_12th', 'like', "%$query%")->paginate(1);

        return view('search-results')->with('candidates', $candidates);
    }

    public function search_aggregate_UG(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('aggregate_UG', 'like', "%$query%")->paginate(1);

        return view('search-results')->with('candidates', $candidates);
    }

    public function search_aggregate_PG(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('aggregate_PG', 'like', "%$query%")->paginate(1);

        return view('search-results')->with('candidates', $candidates);
    }

    public function search_salary(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('salary', 'like', "%$query%")->paginate(1);

        return view('search-results')->with('candidates', $candidates);
    }

    public function search_status(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('status', 'like', "%$query%")->paginate(1);

        return view('search-results')->with('candidates', $candidates);
    }

    public function search_skills(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('skills', 'like', "%$query%")->paginate(1);

        return view('search-results')->with('candidates', $candidates);
    }

    public function search_interviewtype(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('interview_type', 'like', "%$query%")->paginate(1);

        return view('search-results')->with('candidates', $candidates);
    }

    public function search_submissiontype(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('submission_type', 'like', "%$query%")->paginate(1);

        return view('search-results')->with('candidates', $candidates);
    }

    public function searchpage()
    {
        return view('search');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'numeric'],
            'DOB' => ['required', 'date'],
            'gender' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'current_location' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'preferred_location' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'school_10th' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'marks_10th' => ['required', 'numeric', 'max:99'],
            'school_12th' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'marks_12th' => ['required', 'numeric', 'max:99'],
            'university_UG' => ['string', 'max:255'],
            'college_UG' => ['required', 'string', 'max:255'],
            'aggregate_UG' => ['required', 'numeric', 'max:99'],
            'university_PG' => ['nullable', 'string', 'max:255'],
            'college_PG' => ['nullable', 'string', 'max:255'],
            'aggregate_PG' => ['nullable', 'numeric', 'max:99'],
            'skills' => ['string'],
            'experience' => ['string'],
            'salary' => ['string'],
            'cv_last_modified' => ['required', 'date'],
            'status' => ['string'],
            'interview_type' => ['string'],
            'submission_type' => ['string'],
        ]);


        //Create Candidates

        $candidate = new Candidate;
        $candidate->name = $request->input('name');
        $candidate->email = $request->input('email');
        $candidate->phone = $request->input('phone');
        $candidate->DOB = $request->input('DOB');
        $candidate->gender = $request->input('gender');
        $candidate->current_location = $request->input('current_location');
        $candidate->preferred_location = $request->input('preferred_location');
        $candidate->school_10th = $request->input('school_10th');
        $candidate->marks_10th = $request->input('marks_10th');
        $candidate->school_12th = $request->input('school_12th');
        $candidate->marks_12th = $request->input('marks_12th');
        $candidate->university_UG = $request->input('university_UG');
        $candidate->college_UG = $request->input('college_UG');
        $candidate->aggregate_UG = $request->input('aggregate_UG');
        $candidate->university_PG = $request->input('university_PG');
        $candidate->college_PG = $request->input('college_PG');
        $candidate->aggregate_PG = $request->input('aggregate_PG');
        $candidate->skills = $request->input('skills');
        $candidate->experience = $request->input('experience');
        $candidate->salary = $request->input('salary');
        $candidate->cv_last_modified = $request->input('cv_last_modified');
        $candidate->status = $request->input('status');
        $candidate->interview_type = $request->input('interview_type');
        $candidate->submission_type = $request->input('submission_type');
        $candidate->user_id = auth()->user()->id;
        $candidate->save();

        return redirect('candidates')->with('success','Details Entered');
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
        return view('candidates.show')->with('candidate',$candidate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::find($id);

        //Check for correct user
        if(auth()->user()->id != $candidate->user_id){
            return redirect('candidates')->with('error' , 'Unauthorized page');
        }
        return view('candidates.edit')->with('candidate',$candidate);
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
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'numeric'],
            'DOB' => ['required', 'date'],
            'gender' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'current_location' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'preferred_location' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'school_10th' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'marks_10th' => ['required', 'numeric', 'max:99'],
            'school_12th' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'marks_12th' => ['required', 'numeric', 'max:99'],
            'university_UG' => ['string', 'max:255'],
            'college_UG' => ['required', 'string', 'max:255'],
            'aggregate_UG' => ['required', 'numeric', 'max:99'],
            'university_PG' => ['nullable', 'string', 'max:255'],
            'college_PG' => ['nullable', 'string', 'max:255'],
            'aggregate_PG' => ['nullable', 'numeric', 'max:99'],
            'skills' => ['string'],
            'experience' => ['string'],
            'salary' => ['string'],
            'cv_last_modified' => ['required', 'date'],
            'status' => ['string'],
            'interview_type' => ['string'],
            'submission_type' => ['string'],
        ]);


        $candidate = Candidate::find($id);
        $candidate->name = $request->input('name');
        $candidate->email = $request->input('email');
        $candidate->phone = $request->input('phone');
        $candidate->DOB = $request->input('DOB');
        $candidate->gender = $request->input('gender');
        $candidate->current_location = $request->input('current_location');
        $candidate->preferred_location = $request->input('preferred_location');
        $candidate->school_10th = $request->input('school_10th');
        $candidate->marks_10th = $request->input('marks_10th');
        $candidate->school_12th = $request->input('school_12th');
        $candidate->marks_12th = $request->input('marks_12th');
        $candidate->university_UG = $request->input('university_UG');
        $candidate->college_UG = $request->input('college_UG');
        $candidate->aggregate_UG = $request->input('aggregate_UG');
        $candidate->university_PG = $request->input('university_PG');
        $candidate->college_PG = $request->input('college_PG');
        $candidate->aggregate_PG = $request->input('aggregate_PG');
        $candidate->skills = $request->input('skills');
        $candidate->experience = $request->input('experience');
        $candidate->salary = $request->input('salary');
        $candidate->cv_last_modified = $request->input('cv_last_modified');
        $candidate->status = $request->input('status');
        $candidate->interview_type = $request->input('interview_type');
        $candidate->submission_type = $request->input('submission_type');
        $candidate->user_id = auth()->user()->id;
        $candidate->save();

        return redirect('candidates')->with('success','Details Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::find($id);

        if(auth()->user()->id != $candidate->user_id){
            return redirect('candidates')->with('error' , 'Unauthorized page');
        }

        // if($post->cover_image != 'noimage.jpg'){
        //     //Delete image
        //     Storage::delete('public/cover_images/'.$post->cover_image);
        // }
        $candidate->delete();
        return redirect('candidates')->with('success','Candidate Deleted');
    }
}
