<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Candidate;
use App\Cities;
use DB;
use Illuminate\Support\Facades\Input;
// use Illuminate\Validation\Rules\In;

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
        $candidates = Candidate::orderBy('created_at','desc')->paginate(10);
        //$posts = Post::orderBy('title','desc')->take(1)->get();
       //$posts = DB::select('SELECT * FROM posts');
       //$posts = Post::all();
        //$candidates = Post::orderBy('id','desc')->paginate(10);
        return view('candidates.index')->with('candidates',$candidates);
    }

    // public function index_client()
    // {
    //     $candidates = Candidate::orderBy('created_at','desc')->paginate(10);
    //     //$posts = Post::orderBy('title','desc')->take(1)->get();
    //    //$posts = DB::select('SELECT * FROM posts');
    //    //$posts = Post::all();
    //     //$candidates = Post::orderBy('id','desc')->paginate(10);
    //     return view('candidates.index_client')->with('candidates',$candidates);
    // }

    public function index_hired()
    {
        $candidates = Candidate::orderBy('created_at','desc')->paginate(10);

        return view('Status.indexhired')->with('candidates',$candidates);
    }

    public function index_hold()
    {
        $candidates = Candidate::orderBy('created_at','desc')->paginate(10);

        return view('Status.indexhold')->with('candidates',$candidates);
    }

    public function index_selected()
    {
        $candidates = Candidate::orderBy('created_at','desc')->paginate(10);

        return view('Status.indexselected')->with('candidates',$candidates);
    }

    public function index_rejected()
    {
        $candidates = Candidate::orderBy('created_at','desc')->paginate(10);

        return view('Status.indexrejected')->with('candidates',$candidates);
    }

    public function index_face2face()
    {
        $candidates = Candidate::orderBy('created_at','desc')->paginate(10);

        return view('Interview.indexface2face')->with('candidates',$candidates);
    }

    public function index_telephonic()
    {
        $candidates = Candidate::orderBy('created_at','desc')->paginate(10);

        return view('Interview.indextelephonic')->with('candidates',$candidates);
    }

    public function index_ISUB()
    {
        $candidates = Candidate::orderBy('created_at','desc')->paginate(10);

        return view('Submission.indexIsub')->with('candidates',$candidates);
    }

    public function index_CSUB()
    {
        $candidates = Candidate::orderBy('created_at','desc')->paginate(10);

        return view('Submission.indexCsub')->with('candidates',$candidates);
    }


    public function search_name(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');

        $candidates = Candidate::where('name', 'like', "%$query%")->paginate(10);

        // $candidates = Candidate::search($query)->paginate(5);

        return view('search_index')->with('candidates', $candidates);
    }

    public function search_location(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('preferred_location', 'like', "%$query%")->paginate(10);

        return view('search_index')->with('candidates', $candidates);
    }

    public function search_current_location(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('current_location', 'like', "%$query%")->paginate(10);

        return view('search_index')->with('candidates', $candidates);
    }

    public function search_marks12th(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('marks_12th', 'like', "%$query%")->paginate(10);

        return view('search_index')->with('candidates', $candidates);
    }

    public function search_aggregate_UG(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('aggregate_UG', 'like', "%$query%")->paginate(10);

        return view('search_index')->with('candidates', $candidates);
    }

    public function search_aggregate_PG(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('aggregate_PG', 'like', "%$query%")->paginate(10);

        return view('search_index')->with('candidates', $candidates);
    }

    public function search_salary(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('salary', 'like', "%$query%")->paginate(10);

        return view('search_index')->with('candidates', $candidates);
    }

    public function search_experience(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('experience', 'like', "%$query%")->paginate(10);

        return view('search_index')->with('candidates', $candidates);
    }

    public function search_status(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('status', 'like', "%$query%")->paginate(10);

        return view('search_index')->with('candidates', $candidates);
    }

    public function search_skills(Request $request)
    {
        // dd(Input::has('excluding'));

        $excluding = Input::has('excluding') ? true : false;

        // Candidate::update([
        //     'excluding' => $excluding
        // ]);

        if ($excluding == true)
        {
            $request->validate([
                'query' => [ 'min:1'],
            ]); 

            $query = $request->input('query');
            $query1 = $request->input('query1');
            $query2 = $request->input('query2');
            
            $candidates = Candidate::where('skills', 'like', "%$query")
                                        ->orWhere('skills', 'like', "%$query1")
                                        ->orWhere('skills', 'like', "%$query2")
                                        ->paginate(10);

            return view('search_index')->with('candidates', $candidates);
        }

        else
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
    
            return view('search_index')->with('candidates', $candidates);
        }
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

        return view('search_index')->with('candidates', $candidates);
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

        return view('search_index')->with('candidates', $candidates);
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

        return view('search_index')->with('candidates', $candidates);
    }

    public function search_interviewtype(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('interview_type', 'like', "%$query%")->paginate(10);

        return view('search_index')->with('candidates', $candidates);
    }

    public function search_submissiontype(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $candidates = Candidate::where('submission_type', 'like', "%$query%")->paginate(10);

        return view('search_index')->with('candidates', $candidates);
    }

    public function searchpage()
    {
        $candidates = Candidate::all();

        return view('search')->with('candidates', $candidates);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = Cities::all();

        return view('candidates.create')->with('cities', $cities);
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
            'current_location' => ['required'],
            'preferred_location' => ['required'],
            'school_10th' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'marks_10th' => ['required', 'string'],
            'school_12th' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'marks_12th' => ['required', 'string'],
            'university_UG' => ['required', 'string', 'max:255'],
            'college_UG' => ['required', 'string', 'max:255'],
            'aggregate_UG' => ['required', 'string'],
            'university_PG' => ['nullable', 'string', 'max:255'],
            'college_PG' => ['nullable', 'string', 'max:255'],
            'aggregate_PG' => ['nullable', 'string'],
            'skills' => ['string'],
            'other_skills' => ['string'],
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
        $candidate->other_skills = $request->input('other_skills');
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

    public function show_client($id)
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
        $candidate = Candidate::find($id);
        $cities = Cities::/*pluck('cities')->*/all();

        //Check for correct user
        if(auth()->user()->id != $candidate->user_id){
            return redirect('candidates')->with('error' , 'Unauthorized page');
        }
        $data = array(
            'candidate' => $candidate,
            'cities' => $cities,
        );
        return view('candidates.edit')->with('data',$data);
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
            'current_location' => ['required', 'string'],
            'preferred_location' => ['required', 'string'],
            'school_10th' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'marks_10th' => ['required', 'string'],
            'school_12th' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'marks_12th' => ['required', 'string'],
            'university_UG' => ['required', 'string', 'max:255'],
            'college_UG' => ['required', 'string', 'max:255'],
            'aggregate_UG' => ['required', 'string'],
            'university_PG' => ['nullable', 'string', 'max:255'],
            'college_PG' => ['nullable', 'string', 'max:255'],
            'aggregate_PG' => ['nullable', 'string'],
            'skills' => ['string'],
            'other_skills' => ['string'],
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
        $candidate->other_skills = $request->input('other_skills');
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
