@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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

                    {{-- <a href = "{{route('searchpage')}}" class = "btn btn-primary">Search</a> --}}

                    {{-- <a href = "{{route('client.searchpage')}}" class = "btn btn-primary">Search</a> --}}

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
            </div>
        </div>
    </div>
    {{-- <a class="btn btn-primary btn-lg" href="{{action('CandidatesController@index')}}" role="button">List of Candidates</a> --}}
</div>
@endsection
