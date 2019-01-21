@extends('layouts.app')

@section('content')
    <h1>Candidates</h1>
    @if(count($candidates) > 0)
    <!--<a class="btn btn-primary btn-lg" href="candidates" role="button">Go Back</a>-->
        @foreach($candidates as $candidate)
            <div class = "well">
                <div class = "row">
                    {{-- <div class = "col-md-4 col-sm-4">
                        <img style="width:100%" src="storage/cover_images/{{$candidate->cover_image}}">
                    </div> --}}
                    <div class = " col-md-8 col-sm-8">
                            <h3><a href="candidates/{{$candidate->id}}">{{$candidate->name}}</a></h3>
                            {{-- <small>Written on {{$candidate->created_at}} by {{$candidate->user->name}}</small>                 --}}
                    </div>
                </div>
            </div>
                
        @endforeach
        {{-- {{$candidates->links()}} --}}

    @else
        <p>No candidates found</p>
    @endif        
@endsection