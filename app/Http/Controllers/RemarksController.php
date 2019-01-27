<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Remark;
use DB;

class RemarksController extends Controller
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
        $remarks = Remark::orderBy('created_at','desc')->get();
        //$remarks = Post::orderBy('title','desc')->take(1)->get();
       //$remarks = DB::select('SELECT * FROM remarks');
       //$remarks = Post::all();
        $remarks = Remark::orderBy('id','desc')->paginate(10);
        return view('remarks.index')->with('remarks',$remarks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('remarks.create');
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
            'candidate_id' => 'required',
            'Remarks' => 'required',
        ]);

        //Create post
        $remark = new Remark();
        $remark->candidate_id = $request->input('candidate_id');
        $remark->Remarks = $request->input('Remarks');
        $remark->admin_id = auth()->user()->id;
        $remark->save();

        return redirect('remarks')->with('success','Remark Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $remark = Remark::find($id);
        return view('remarks.show')->with('remark',$remark);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $remark = Remark::find($id);

        //Check for correct user
        if(auth()->user()->id != $remark->admin_id){
            return redirect('remarks')->with('error' , 'Unauthorized page');
        }
        return view('remarks.edit')->with('remark',$remark);
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
            'candidate_id' => 'required',
            'Remarks' => 'required',
        ]);

        //Create post
        $remark = Remark::find($id);
        $remark->candidate_id = $request->input('candidate_id');
        $remark->Remarks = $request->input('Remarks');
        $remark->admin_id = auth()->user()->id;
        $remark->save();

        return redirect('remarks')->with('success','Remark Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $remark = Remark::find($id);

        if(auth()->user()->id != $remark->admin_id){
            return redirect('remarks')->with('error' , 'Unauthorized page');
        }

        
        $remark->delete();
        return redirect('remarks')->with('success','Remark Deleted');
    }
}
