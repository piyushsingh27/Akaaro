<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobDescription;

class JobDescriptionController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobs = JobDescription::orderBy('created_at', 'desc')->paginate(10);

        return view('JD.admin_index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('JD.admin_create');
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
            'CompanyName' => ['required', 'string'],
            'jobtitle' => ['required', 'string'],
            'designation' => ['required', 'string'],
            'skills_required' => ['required', 'string'],
            'candidate_count' => ['required', 'numeric'],
            'salary' => ['string'],
            'experience' => ['string'],
            'location' => ['required', 'string'],
        ]);

        $job = new JobDescription;
        $job->CompanyName = $request->input('CompanyName');
        $job->jobtitle = $request->input('jobtitle');
        $job->designation = $request->input('designation');
        $job->skills_required = $request->input('skills_required');
        $job->candidate_count = $request->input('candidate_count');
        $job->salary = $request->input('salary');
        $job->experience = $request->input('experience');
        $job->location = $request->input('location');
        // $job->client_id = auth()->user()->id;
        $job->save();

        return redirect('/admin/jobsad')->with('Success', "Job Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = JobDescription::find($id);
        return view('JD.admin_show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = JobDescription::find($id);
        
        return view('JD.admin_edit')->with('job', $job);
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
            'CompanyName' => ['required', 'string'],
            'jobtitle' => ['required', 'string'],
            'designation' => ['required', 'string'],
            'skills_required' => ['required', 'string'],
            'candidate_count' => ['required', 'numeric'],
            'salary' => ['string'],
            'experience' => ['string'],
            'location' => ['required', 'string'],
        ]);

        $job = JobDescription::find($id);
        $job->CompanyName = $request->input('CompanyName');
        $job->jobtitle = $request->input('jobtitle');
        $job->designation = $request->input('designation');
        $job->skills_required = $request->input('skills_required');
        $job->candidate_count = $request->input('candidate_count');
        $job->salary = $request->input('salary');
        $job->experience = $request->input('experience');
        $job->location = $request->input('location');
        // $job->client_id = auth()->user()->id;
        $job->save();

        return redirect('/admin/jobsad')->with('Success', "Job Updated");
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
