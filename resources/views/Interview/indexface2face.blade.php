@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Candidates') }}</div>

                <div class="card-body">
                            {{-- <h1>Candidates</h1> --}}
                            @if(count($candidates) > 0)
                                @foreach($candidates as $candidate)
                                <?php $ide = $candidate->interview_type; ?>
                                    @if( $ide == "face2face")
                                    <div class = "well">
                                        <div class = "row">
                                            {{-- <div class = "col-md-4 col-sm-4">
                                                <img style="width:100%" src="storage/cover_images/{{$candidate->cover_image}}">
                                            </div> --}}
                                            <div class = " col-md-8 col-sm-8">
                                                    <h3><a class="dropdown-item" href="candidates/{{$candidate->id}}">{{$candidate->name}}</a></h3>
                                                    <small>{{$candidate->created_at}} by {{$candidate->user->name}}</small>
                                                    <hr>
                                                    {{-- <small>Written on {{$candidate->created_at}} by {{$candidate->user->name}}</small>                 --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                        
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