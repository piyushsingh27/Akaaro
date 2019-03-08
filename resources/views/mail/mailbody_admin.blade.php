@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Send Mail') }}</div>

                <div class="card-body">
                    {!! Form::open(['url' => route('admin.sendmail', ['id' => $candidate->id]), 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

                    {{-- {!! Form::model($candidate, ['route' => ['sendmail', $candidate->id],'method' => 'PUT']) !!} --}}
                    <div class = "form-group">
                        {{Form::label('email','Email')}}
                        {{Form::email('email',$candidate->email, ['class' => 'form-control', 'placeholder' => 'email'])}}
                    </div>  

                    {{-- <div class = "form-group">
                        {{Form::label('subject','Subject')}}
                        {{Form::text('subject','', ['class' => 'form-control', 'placeholder' => 'Subject'])}}
                    </div> --}}

                    <div class = "form-group">
                            {{Form::label('message','Body')}}
                            {{Form::textarea('message','', ['class' => 'form-control', 'placeholder' => 'Body'])}}
                    </div>
                    
                    {{Form::hidden('method','PUT')}}
                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

                {!! Form::close() !!}                
            </div>
            </div>
        </div>
    </div>
</div>

{{-- <a class="btn btn-primary btn-lg" href="{{action('CandidatesController@index')}}" role="button">Go Back</a>  --}}
@endsection
