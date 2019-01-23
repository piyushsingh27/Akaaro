@extends('layouts.app')

@section('content')
<a class="btn btn-primary btn-lg" href="{{action('CandidatesController@index')}}" role="button">Go Back</a>
    <h1>Title: {{$candidate->name}}</h1>
    {{-- <!--<img style="width:100%" src="storage/cover_images/{{$post->cover_image}}">--> --}}
    <h2>ID: {{$candidate->id}}</h2>
    <small>{{$candidate->created_at}} by {{$candidate->user->name}}</small>

    {{-- <div>
        {!!$post->body!!}
    </div>--}} 
    
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $candidate->user_id)
            <a href = "{{$candidate->id}}/edit" class = "btn btn-default">Edit</a>
        
            {!! Form::model($candidate, array('route' => array('candidates.destroy', $candidate->id), 'method' => 'DELETE')) !!}
                {{Form::hidden('method','DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection