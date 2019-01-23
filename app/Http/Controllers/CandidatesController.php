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
    public function __construct()
    {
        $this->middleware('auth');
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
        return view('candidates.index')->with('candidates',$candidates);
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
            'university_PG' => ['string', 'max:255'],
            'college_PG' => ['string', 'max:255'],
            'aggregate_PG' => ['numeric', 'max:99'],
            'experience' => ['numeric', 'min:1', 'max:4'],
            'salary' => ['numeric'],
            'cv_last_modified' => ['required', 'date'],
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
        $candidate->experience = $request->input('experience');
        $candidate->salary = $request->input('salary');
        $candidate->cv_last_modified = $request->input('cv_last_modified');
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
            'university_PG' => ['string', 'max:255'],
            'college_PG' => ['string', 'max:255'],
            'aggregate_PG' => ['numeric', 'max:99'],
            'experience' => ['numeric', 'min:1', 'max:4'],
            'salary' => ['numeric'],
            'cv_last_modified' => ['required', 'date'],
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
        $candidate->experience = $request->input('experience');
        $candidate->salary = $request->input('salary');
        $candidate->cv_last_modified = $request->input('cv_last_modified');
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
