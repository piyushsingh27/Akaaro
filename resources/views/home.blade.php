@extends('layouts.app')

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

                </div>

                
                     <div class="card-body">
                        <a href = "candidates/create" class = "btn btn-primary">Enter Details</a>
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
