<?php

namespace App\Http\Controllers;

use App\JobDescription;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Client;

class JobDescriptionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:client')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $admin_id = auth()->user()->id;
        // $admin = Admin::find($admin_id);

        // $admin_id = auth()->user()->id;
        // $adminn = Admin::find($admin_id);

        $jobs = JobDescription::orderBy('created_at', 'desc')->paginate(10);

        return view('JD.index')->with('jobs', $jobs);
    }

    // public function indextest()
    // {
    //     $admin_id = auth()->user()->id;
    //     $admin = Admin::find($admin_id);

    //     $admin_id = auth()->user()->id;
    //     $adminn = Admin::find($admin_id);

    //     return view('JD.index')->with(['jobs' => $admin->jobs,
    //                                         'clients' => $adminn->clients]);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('JD.create');
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
            'CompanyName' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'jobtitle' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
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
        $job->client_id = auth()->user()->id;
        $job->save();

        return redirect('/jobs')->with('Success', "Job Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\JobDescription  $jobDescription
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = JobDescription::find($id);
        return view('JD.show')->with('job', $job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\JobDescription  $jobDescription
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job = JobDescription::find($id);
        
        return view('JD.edit')->with('job', $job);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\JobDescription  $jobDescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'CompanyName' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
            'jobtitle' => ['required', 'string', 'regex:/^[a-zA-Z]+$/u', 'max:255'],
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
        $job->client_id = auth()->user()->id;
        $job->save();

        return redirect('/jobs')->with('Success', "Job Updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\JobDescription  $jobDescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobDescription $jobDescription)
    {
        //
    }
}
