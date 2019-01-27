@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">{{ __('Remarks') }}</div>
    
                    <div class="card-body">
                            {{-- <a class="btn btn-primary btn-lg" href="{{action('RemarksController@index')}}" role="button">Go Back</a> --}}
                                <h1>Candidate ID: {{$remark->candidate_id}}</h1>
                                <h2>ID: {{$remark->id}}</h2>
                                {{-- <small>{{$remark->created_at}} by {{$remark->user->name}}</small> --}}

                                <div>
                                    {!!$remark->Remarks!!}
                                </div> 
                                
                                <hr>
                                @if(!Auth::guest())
                                    @if(Auth::user()->id == $remark->admin_id)
                                        <a href = "{{$remark->id}}/edit" class = "btn btn-success">Edit</a>
                                        <hr>
                                    
                                        {!! Form::model($remark, array('route' => array('remarks.destroy', $remark->id), 'method' => 'DELETE')) !!}
                                            {{Form::hidden('method','DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    @endif
                                @endif
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection