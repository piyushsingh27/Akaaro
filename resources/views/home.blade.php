@extends('layouts.app')

    {{-- <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

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

                    <a href = "{{route('searchpage')}}" class = "btn btn-primary">Search</a>
                    <br>
                    <br>
                    <br>
                    

                    <table class = "table">
                        <tr>
                            <td>
                            <div class="col-md-10">   
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Status
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{action('CandidatesController@index_hired')}}">Hired</a></li>
                                <li><a class="dropdown-item" href="{{action('CandidatesController@index_selected')}}">Selected</a></li>
                                <li><a class="dropdown-item" href="{{action('CandidatesController@index_hold')}}">On Hold</a></li>
                                <li><a class="dropdown-item" href="{{action('CandidatesController@index_rejected')}}">Rejected</a></li>
                                <li><a class="dropdown-item" href="{{action('CandidatesController@index_ISUB')}}">ISUB</a></li>
                                <li><a class="dropdown-item" href="{{action('CandidatesController@index_CSUB')}}">CSUB</a></li>
                                </ul>
                            </div>
                            </div>
                            </td>

                        {{-- <div class="col-md-3 offset-md-3 "> --}}
                            <td>
                            <div class="col-md-10">                                
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Interview
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{action('CandidatesController@index_face2face')}}">Personal Interview</a></li>
                                    <li><a class="dropdown-item" href="{{action('CandidatesController@index_telephonic')}}">Telephonic Interview</a></li>
                                </ul>
                            </div>
                            </div>
                            </td>
                        {{-- </div> --}}

                            {{-- <td>
                            <div class="col-md-8">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Submission
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{action('CandidatesController@index_ISUB')}}">ISUB</a></li>
                                    <li><a class="dropdown-item" href="{{action('CandidatesController@index_CSUB')}}">CSUB</a></li>
                                </ul>
                            </div>
                            </div>
                            </td> --}}
                        </tr>
                    </table>


                </div>

                <hr>

                     <div class="card-body">
                        <a href = "candidates/create" class = "btn btn-primary">New Candidate</a>
                        <hr>
                        <h3>Registered Candidates</h3>
                        @if(count($candidates) > 0)
                        <table class = "table table-striped">
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>  
                        @foreach($candidates as $candidate)
                            <tr>
                                <td>{{$candidate->name}}</td>
                                <td><a href = "candidates/{{$candidate->id}}/edit" class = "btn btn-success">Edit</a></td>
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
                            <p> You have no candidates </p>
                        @endif 
    
    
                    </div> 
            </div>
        </div>
    </div>
    {{-- <a class="btn btn-primary btn-lg" href="{{action('CandidatesController@index')}}" role="button">List of Candidates</a> --}}
</div>
@endsection
