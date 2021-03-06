@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Candidates') }}</div>

                <div class="card-body">
                            {{-- <h1>Candidates</h1> --}}
                            @if(count($candidates) > 0)
                            <!--<a class="btn btn-primary btn-lg" href="candidates" role="button">Go Back</a>-->
                                @foreach($candidates as $candidate)
                                    <div class = "well">
                                        <div class = "row">
                                            {{-- <div class = "col-md-4 col-sm-4">
                                                <img style="width:100%" src="storage/cover_images/{{$candidate->cover_image}}">
                                            </div> --}}
                                            <div class = " col-md-8 col-sm-8">
                                                    <h3><a class="dropdown-item" href="candidatesad/{{$candidate->id}}">{{$candidate->name}}</a></h3>
                                                    <small>{{$candidate->created_at}} {{-- by {{$candidate->user->name}}--}}</small>
                                                    {{-- <a class="btn btn-default offset-md-9" href="{{action('Admin\CandidatesController@send', ['id' => $candidate->id])}}" role="button">Send Mail</a> --}}
                                                    <a class="btn btn-default offset-md-9" href="{{$candidate->id}}/mailad">Send Mail</a>
                                                    <br>
                                                    <hr>
                                                    {{-- <small>Written on {{$candidate->created_at}} by {{$candidate->user->name}}</small>                 --}}
                                            </div>
                                        </div>
                                    </div>
                                    {{$candidates->links()}}   
                                @endforeach
                                {{-- {{$candidates->links()}} --}}

                            @else
                                <p>No candidates found</p>
                            @endif 
                </div>
            </div>
        </div>
    </div>
</div>       
@endsection