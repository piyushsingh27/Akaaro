@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="search-container container">
                    <h3>Search Results</h3>
                    <p>{{ $candidates->total() }} result(s) for '{{request()->input('query')}}'</p> 

                        <table class="table table-bordered table-stripped">                    
                                @foreach($candidates as $candidate)
                                    <h5>ID: {{$candidate->id}}</h5>
                                    <hr>
                                    <h5>Name: {{$candidate->name}}</h5>
                                    <hr>
                                    <h5>Email: {{$candidate->email}}</h5>
                                    <hr>
                                    <h5>Phone: {{$candidate->phone}}</h5>
                                    <hr>
                                    <h5>Current_location: {{$candidate->current_location}}</h5>
                                    <hr>
                                    <h5>Preferred_location: {{$candidate->preffered_location}}</h5>
                                    <hr>
                                    <h5>School_10th: {{$candidate->school_10th}}</h5>
                                    <hr>
                                    <h5>Marks_10th: {{$candidate->marks_10th}}</h5>
                                    <hr>
                                    <h5>School_12th: {{$candidate->school_12th}}</h5>
                                    <hr>
                                    <h5>Marks_12th: {{$candidate->marks_12th}}</h5>
                                    <hr>
                                    <h5>University_UG: {{$candidate->university_UG}}</h5>
                                    <hr>
                                    <h5>College_UG: {{$candidate->college_UG}}</h5>
                                    <hr>
                                    <h5>Aggregate_UG: {{$candidate->aggregate_UG}}</h5>
                                    <hr>
                                    <h5>University_PG: {{$candidate->university_PG}}</h5>
                                    <hr>
                                    <h5>College_PG: {{$candidate->college_PG}}</h5>
                                    <hr>
                                    <h5>Aggregate_PG: {{$candidate->aggregate_PG}}</h5>
                                    <hr>
                                    <h5>Key Skills: {{$candidate->skills}}</h5>
                                    <hr>
                                    <h5>Experience: {{$candidate->experience}}</h5>
                                    <hr>
                                    <h5>Salary: {{$candidate->salary}}</h5>
                                    <hr>
                                    <h5>CV_last_modified: {{$candidate->cv_last_modified}}</h5>
                                    <hr>
                                    <h5>Status: {{$candidate->status}}</h5>
                                    <hr>
                                    <h5>Type of Interview: {{$candidate->interview_type}}</h5>
                                    <hr>
                                    <h5>Resume Submission: {{$candidate->submission_type}}</h5>
                                    <hr>
                                    {{-- <!--<img style="width:100%" src="storage/cover_images/{{$post->cover_image}}">--> --}}
                                    
                                    {{-- <small>{{$candidate->created_at}} by {{$candidate->user->name}}</small> --}}

                                    {{$candidates->links()}}
                                @endforeach

                                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection