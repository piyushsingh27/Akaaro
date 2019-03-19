<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobDescription;
use DB;
use Illuminate\Support\Facades\Input;

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

    public function index_active()
    {
        $jobs = JobDescription::orderBy('created_at', 'desc')->paginate(10);

        return view('JD.admin_index-active')->with('jobs', $jobs);
    }

    public function index_inactive()
    {
        $jobs = JobDescription::orderBy('created_at', 'desc')->paginate(10);

        return view('JD.admin_index-inactive')->with('jobs', $jobs);
    }

    public function index_hold()
    {
        $jobs = JobDescription::orderBy('created_at', 'desc')->paginate(10);

        return view('JD.admin_index-hold')->with('jobs', $jobs);
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
            'skills_required' => ['required', 'string'],
            'candidate_count' => ['required', 'numeric'],
            'salary' => ['numeric'],
            'experience' => ['numeric'],
            'location' => ['required', 'string'],
        ]);

        $job = new JobDescription;
        $job->CompanyName = $request->input('CompanyName');
        $job->jobtitle = $request->input('jobtitle');
        $job->skills_required = $request->input('skills_required');
        $job->candidate_count = $request->input('candidate_count');
        $job->salary = $request->input('salary');
        $job->experience = $request->input('experience');
        $job->location = $request->input('location');
        // $job->client_id = auth()->user()->id;
        $job->flag = 1;
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
            'skills_required' => ['required', 'string'],
            'candidate_count' => ['required', 'numeric'],
            'salary' => ['numeric'],
            'experience' => ['numeric'],
            'location' => ['required', 'string'],
        ]);

        $job = JobDescription::find($id);
        $job->CompanyName = $request->input('CompanyName');
        $job->jobtitle = $request->input('jobtitle');
        $job->skills_required = $request->input('skills_required');
        $job->candidate_count = $request->input('candidate_count');
        $job->salary = $request->input('salary');
        $job->experience = $request->input('experience');
        $job->location = $request->input('location');
        $job->flag = 1;
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

    public function flagactive($id)
    {   
        $job = JobDescription::find($id);
        $job->flag = 1;
        $job->save();

        return redirect()->to('/admin/jobsad')->with('Success', "Job Activated");
    }

    public function flaginactive($id)
    {
        $job = JobDescription::find($id);
        $job->flag = -1;
        $job->save();

        return redirect()->to('/admin/jobsad')->with('Success', "Job Activated");
    }

    public function flaghold($id)
    {
        $job = JobDescription::find($id);
        $job->flag = 0;
        $job->save();

        return redirect()->to('/admin/jobsad')->with('Success', "Job Activated");
    }

    public function searchpage()
    {
        $jobs = JobDescription::all();

        return view('search-admin_job')->with('jobs', $jobs);
    }

    public function search_jobtitle(Request $request)
    {
        $request->validate([
            'query' => [ 'min:1'],
        ]);

        $query = $request->input('query');
        
        $jobs = JobDescription::where('jobtitle', 'like', "%$query%")->paginate(10);

        return view('JD.admin_index')->with('jobs', $jobs);
    }

    public function search_jobdescription(Request $request)
    {
        $excluding = Input::has('excluding') ? true : false;

        $update_excluding = DB::table('job_descriptions')->update(array('excluding' => $excluding));
        // $candidate->save();

        $jobs = JobDescription::all();
        foreach ($jobs as $job)
        {
            if ($job->excluding == 0)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]); 

                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $jobs = JobDescription::where('skills_required', 'like', "%$query%")
                                            ->orWhere('skills_required', 'like', "%$query1%")
                                            ->orWhere('skills_required', 'like', "%$query2%")
                                            ->paginate(10);

                return view('JD.admin_index')->with('jobs', $jobs);
            }

            else if($job->excluding == 1)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]);
        
                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $jobs = JobDescription::where('skills_required', 'like', "$query")
                                            ->orWhere('skills_required', 'like', "$query1")
                                            ->orWhere('skills_required', 'like', "$query2")
                                            ->paginate(10);
        
                return view('JD.admin_index')->with('jobs', $jobs);
            }

        }

    }

    public function search_jobdescription_and(Request $request)
    {
        $excluding = Input::has('excluding') ? true : false;

        $update_excluding = DB::table('job_descriptions')->update(array('excluding' => $excluding));

        $jobs = JobDescription::all();
        foreach ($jobs as $job)
        {
            if ($job->excluding == 0)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]);
        
                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $jobs = JobDescription::where([['skills_required', 'like', "%$query%"],['skills_required', 'like', "%$query1%"],['skills_required', 'like', "%$query2%"]])
                                            ->paginate(10);
        
                return view('JD.admin_index')->with('jobs', $jobs);
            }

            else if ($job->excluding == 1)
            {
                $request->validate([
                    'query' => [ 'min:1'],
                    'query1' => ['min:1'],
                    'query2' => ['min:1'],
                ]);
        
                $query = $request->input('query');
                $query1 = $request->input('query1');
                $query2 = $request->input('query2');
                
                $jobs = JobDescription::where([['skills_required', 'like', "$query"],['skills_required', 'like', "$query1"],['skills_required', 'like', "$query2"]])
                                            ->paginate(10);
        
                return view('JD.admin_index')->with('jobs', $jobs);
            }
        }
    }

    public function search_jobsalary(Request $request)
    {
        $request->validate([
            'query1' => [ 'min:1'],
            'query2' => [ 'min:1'],
        ]);

        $query1 = $request->input('query1');
        $query2 = $request->input('query2');
        
        $jobs = JobDescription::where([['salary', '>=', "$query1"],['salary', '<=', "$query2"]])->paginate(10);

        return view('JD.admin_index')->with('jobs', $jobs);
    }

    public function search_jobexperience(Request $request)
    {
        $request->validate([
            'query1' => [ 'min:1'],
            'query2' => [ 'min:1'],
        ]);

        $query1 = $request->input('query1');
        $query2 = $request->input('query2');
        
        $jobs = JobDescription::where([['experience', '>=', "$query1"],['experience', '<=', "$query2"]])->paginate(10);

        return view('JD.admin_index')->with('jobs', $jobs);
    }
}
