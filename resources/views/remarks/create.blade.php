@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Remark') }}</div>
    
                    <div class="card-body">
                        {{-- <h1>Create Remark</h1> --}}
                        {!! Form::open(['action' => 'RemarksController@store' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class = "form-group">
                                {{Form::label('candidate_id','Candidate_ID')}}
                                {{Form::text('candidate_id','', ['class' => 'form-control', 'placeholder' => 'candidate_id'])}}
                            </div>

                            <div class = "form-group">
                                    {{Form::label('Remarks','Remarks')}}
                                    {{Form::textarea('Remarks','', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Remarks'])}}
                            </div>

                            
                            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

                        {!! Form::close() !!}  
                    </div>
                </div>
            </div>
        </div>
</div>
      
@endsection