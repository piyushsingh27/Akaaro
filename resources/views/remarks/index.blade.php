@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Remarks') }}</div>
    
                    <div class="card-body">
                        {{-- <h1>Remarks</h1> --}}
                        @if(count($remarks) > 0)
                        <!--<a class="btn btn-primary btn-lg" href="posts" role="button">Go Back</a>-->
                            @foreach($remarks as $remark)
                                <div class = "well">
                                    <div class = "row">
                                        
                                        <div class = " col-md-8 col-sm-8">
                                                <h3><a href="remarks/{{$remark->id}}">{{$remark->candidate_id}}</a></h3>
                                                {{-- <small>Written on {{$remark->created_at}} by {{$remark->user->name}}</small>                 --}}
                                        </div>
                                    </div>
                                </div>
                                    
                            @endforeach
                            {{-- {{$remarks->links()}} --}}

                        @else
                            <p>No remarks found</p>
                        @endif  
                        <hr>
                        <hr>
                        <a class="btn btn-primary btn-lg" href="{{action('RemarksController@create')}}" role="button">Add Remark</a>     
                    </div>
                </div>
            </div>
        </div>
</div> 
@endsection