@extends('layouts.app')

@section('content')
<a class="btn btn-primary btn-lg" href="{{action('CandidatesController@index')}}" role="button">Go Back</a>
    <h1>Title: {{$candidate->name}}</h1>
    {{-- <!--<img style="width:100%" src="storage/cover_images/{{$post->cover_image}}">--> --}}
    <h2>ID: {{$candidate->id}}</h2>
    <small>{{$candidate->created_at}} by {{$candidate->user->name}}</small>

    {{-- <div>
        {!!$post->body!!}
    </div> 
    
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href = "{{$post->id}}/edit" class = "btn btn-default">Edit</a>
        
            {!! Form::model($post, array('route' => array('posts.destroy', $post->id), 'method' => 'DELETE')) !!}
                {{Form::hidden('method','DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif --}}
@endsection