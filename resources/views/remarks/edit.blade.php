@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Remark') }}</div>

                <div class="card-body">
                    {{-- <h1>Edit Remarks</h1> --}}
                    {!! Form::model($remark, array('route' => array('remarks.update', $remark->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
                        <div class = "form-group">
                            {{Form::label('candidate_id','candidate_id')}}
                            {{Form::text('candidate_id',$remark->candidate_id, ['class' => 'form-control', 'placeholder' => 'candidate_id'])}}
                        </div>

                        <div class = "form-group">
                                {{Form::label('Remarks','Remarks')}}
                                {{Form::textarea('Remarks',$remark->Remarks, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Remarks'])}}
                        </div>

                        
                        {{Form::hidden('method','PUT')}}
                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

                    {!! Form::close() !!} 
                </div>
            </div>
        </div>
    </div>
</div> 
                    {{-- <a class="btn btn-primary btn-lg" href="{{action('RemarksController@index')}}" role="button">Go Back</a>   --}}
@endsection