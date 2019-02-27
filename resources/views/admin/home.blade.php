@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <hr>

                    {{-- <form action="{{route('search')}}" method="GET" class="search-form">
                        <span class="glyphicon glyphicon-search"></span>
                    <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Search for Candidates">
                    </form> --}}

                    <a href = "{{route('admin.searchpage')}}" class = "btn btn-primary">Search</a>

                    <hr>

                    <a href = "candidatesad/create" class = "btn btn-primary">New Candidate</a>

                    <hr>

                    <a href = "{{action('Admin\JobDescriptionController@create')}}" class = "btn btn-primary">New Job</a>

                    {{-- <a href = "{{route('client.searchpage')}}" class = "btn btn-primary">Search</a> --}}

                    {{-- <a href = "{{action('JobDescriptionController@create')}}" class = "btn btn-primary">New Job</a> --}}

                </div>

                
                    <div class="card-body">
                        {{-- <a href = "candidates/create" class = "btn btn-primary">Enter Details</a> --}}
                        <hr>
                        <h3>Registered Clients</h3>
                        @if(count($clients) > 0)
                        <table class = "table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                            </tr>  
                        @foreach($clients as $client)
                            <tr>
                                <td>{{$client->name}}</td>
                                <td>{{$client->email}}</td>
                                <td>
                                    <?php $activated_client = $client->flag; ?>
                                    @if ($activated_client == 0)
                                        <a href="{{action('Admin\HomeController@flagupdate_client', ['id' => $client->id])}}" class="btn btn-default">Activate</a>
                                    @elseif ($activated_client == 1)
                                        <a href="{{action('Admin\HomeController@flagdowngrade_client', ['id' => $client->id])}}" class="btn btn-default">Deactivate</a>
                                    @endif
                                </td>
                                {{-- <td> --}}
                                        {{-- {!! Form::model($candidate, array('route' => array('candidates.destroy', $candidate->id), 'method' => 'DELETE')) !!}
                                        {{Form::hidden('method','DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                    {!!Form::close()!!} --}}
                                {{-- </td> --}}
                            </tr> 
    
                            @endforeach
                        </table>
                        @else
                            <p> You have no clients!! </p>
                        @endif 
    
    
                    </div> 

                    <div class="card-body">
                            {{-- <a href = "candidates/create" class = "btn btn-primary">Enter Details</a> --}}
                            <hr>
                            <h3>Registered Users</h3>
                            @if(count($users) > 0)
                            <table class = "table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>  
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <?php $activated_user = $user->flag; ?>
                                        @if ($activated_user == 0)
                                            <a href="{{action('Admin\HomeController@flagupdate_user', ['id' => $user->id])}}" class="btn btn-default">Activate</a>
                                        @elseif ($activated_user == 1)
                                            <a href="{{action('Admin\HomeController@flagdowngrade_user', ['id' => $user->id])}}" class="btn btn-default">Deactivate</a>
                                        @endif 
                                        {{-- {{$user->id}} --}}
                                    </td>
                                    {{-- <td> --}}
                                            {{-- {!! Form::model($candidate, array('route' => array('candidates.destroy', $candidate->id), 'method' => 'DELETE')) !!}
                                            {{Form::hidden('method','DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!} --}}
                                    {{-- </td> --}}
                                </tr> 
        
                                @endforeach
                            </table>
                            @else
                                <p> You have no users!! </p>
                            @endif 
        
        
                        </div>


                        {{-- <div class="card-body">
                            {{-- <a href = "candidates/create" class = "btn btn-primary">Enter Details</a> 
                            <hr>
                            <h3>Registered Candidates</h3>
                            @if(count($candidates) > 0)
                            <table class = "table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Current Location</th>
                                    <th>Preferred Location</th>
                                    <th>12th aggr.</th>
                                    <th>UG aggr.</th>
                                    <th>Key Skills</th>
                                    <th>Other Skills</th>
                                    <th>Experience</th>
                                    <th>Salary</th>
                                    {{-- <th>CV last modified</th> 
                                </tr>  
                            @foreach($candidates as $candidate)
                                <tr>
                                    <td>{{$candidate->name}}</td>
                                    <td>{{$candidate->email}}</td>
                                    <td>{{$candidate->phone}}</td>
                                    <td>{{$candidate->current_location}}</td>
                                    <td>{{$candidate->preferred_location}}</td>
                                    <td>{{$candidate->marks_12th}}</td>
                                    <td>{{$candidate->aggregate_UG}}</td>
                                    <td>{!!$candidate->skills!!}</td>
                                    <td>{!!$candidate->other_skills!!}</td>
                                    <td>{{$candidate->experience}}</td>
                                    <td>{{$candidate->salary}}</td>
                                    {{-- <td>{{$candidate->cv_last_modified}}</td> --}}
                                    {{-- <td> --}}
                                            {{-- {!! Form::model($candidate, array('route' => array('candidates.destroy', $candidate->id), 'method' => 'DELETE')) !!}
                                            {{Form::hidden('method','DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!} --}}
                                    {{-- </td> 
                                </tr> 
        
                                @endforeach
                            </table>
                            @else
                                <p> You have no candidates!! </p>
                            @endif 
        
        
                        </div> --}}


                        {{-- <div class="card-body">
                                {{-- <a href = "candidates/create" class = "btn btn-primary">Enter Details</a> 
                                <hr>
                                <h3>Registered Jobs</h3>
                                @if(count($jobs) > 0)
                                <table class = "table table-striped">
                                    <tr>
                                        <th>CompanyName</th>
                                        <th>JobTitle</th>
                                        <th>Designation</th>
                                        <th>Skills Required</th>
                                        <th>Candidates Required</th>
                                        <th>Salary</th>
                                        <th>Experience</th>
                                        <th>Location</th>
                                    </tr>  
                                @foreach($jobs as $job)
                                    <tr>
                                        <td>{{$job->CompanyName}}</td>
                                        <td>{{$job->jobtitle}}</td>
                                        <td>{{$job->designation}}</td>
                                        <td>{!!$job->skills_required!!}</td>
                                        <td>{{$job->candidate_count}}</td>
                                        <td>{{$job->salary}}</td>
                                        <td>{{$job->experience}}</td>
                                        <td>{{$job->location}}</td>
                                    </tr> 
            
                                    @endforeach
                                </table>
                                @else
                                    <p> No jobs registered!! </p>
                                @endif 
            
            
                            </div> --}}
            </div>
        </div>
    </div>
    {{-- <a class="btn btn-primary btn-lg" href="{{action('CandidatesController@index')}}" role="button">List of Candidates</a> --}}
</div>
@endsection
