@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Job Details') }}</div>

                <div class="card-body">
                            {{-- <a class="btn btn-primary btn-lg" href="{{action('CandidatesController@index')}}" role="button">Go Back</a> --}}
                                <h5>ID: {{$job->id}}</h5>
                                <hr>
                                <h5>Company Name: {{$job->CompanyName}}</h5>
                                <hr>
                                <h5>Job Title: {{$job->jobtitle}}</h5>
                                <hr>
                                {{-- <h5>Designation: {{$job->designation}}</h5>
                                <hr> --}}
                                <h5>Skills Required: {!!$job->skills_required!!}</h5>
                                <hr>
                                <h5>Candidate Count: {{$job->candidate_count}}</h5>
                                <hr>
                                <h5>Salary: {{$job->salary}}</h5>
                                <hr>
                                <h5>Experience: {{$job->experience}}</h5>
                                <hr>
                                <h5>Location: {{$job->location}}</h5>
                                <hr>
                                <small>{{$job->created_at}} {{--by {{$job->admin->name}}--}}</small>

                                {{-- <div>
                                    {!!$post->body!!}
                                </div>--}} 
                                
                                <hr>
                                @if(!Auth::guest())
                                    @if(Auth::user()->id == $job->admin_id)
                                        <a href = "{{$job->id}}/edit" class = "btn btn-success">Edit</a>

                                        <hr>
                                    
                                        {{-- {!! Form::model($candidate, array('route' => array('candidates.destroy', $candidate->id), 'method' => 'DELETE')) !!}
                                            {{Form::hidden('method','DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!} --}}
                                    @endif
                                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection