@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Enter Candidates') }}</div>

                <div class="card-body">
                    {!! Form::open(['action' => 'CandidatesController@store' , 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class = "form-group">
                        {{Form::label('name','Name')}}
                        {{Form::text('name','', ['class' => 'form-control', 'placeholder' => 'name'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('email','Email')}}
                        {{Form::email('email','', ['class' => 'form-control', 'placeholder' => 'email'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('phone','Phone')}}
                        {{Form::text('phone','', ['class' => 'form-control', 'placeholder' => 'phone'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('DOB','DOB')}}
                        {{Form::date('DOB','', ['class' => 'form-control', 'placeholder' => 'DOB'])}}
                    </div>


                    <div class = "form-group">
                        {{Form::label('gender','Gender')}}
                        {{Form::text('gender','', ['class' => 'form-control', 'placeholder' => 'gender'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('current_location','Current_location')}}
                        {{Form::text('current_location','', ['class' => 'form-control', 'placeholder' => 'current_location'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('preferred_location','Preferred_location')}}
                        {{Form::text('preferred_location','', ['class' => 'form-control', 'placeholder' => 'preferred_location'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('school_10th','School_10th')}}
                        {{Form::text('school_10th','', ['class' => 'form-control', 'placeholder' => 'school_10th'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('marks_10th','Marks_10th')}}
                        {{Form::text('marks_10th','', ['class' => 'form-control', 'placeholder' => 'marks_10th'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('school_12th','School_12th')}}
                        {{Form::text('school_12th','', ['class' => 'form-control', 'placeholder' => 'school_12th'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('marks_12th','Marks_12th')}}
                        {{Form::text('marks_12th','', ['class' => 'form-control', 'placeholder' => 'marks_12th'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('university_UG','University_UG')}}
                        {{Form::text('university_UG','', ['class' => 'form-control', 'placeholder' => 'university_UG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('college_UG','College_UG')}}
                        {{Form::text('college_UG','', ['class' => 'form-control', 'placeholder' => 'college_UG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('aggregate_UG','Aggregate_UG')}}
                        {{Form::text('aggregate_UG','', ['class' => 'form-control', 'placeholder' => 'aggregate_UG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('university_PG','University_PG')}}
                        {{Form::text('university_PG','', ['class' => 'form-control', 'placeholder' => 'university_PG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('college_PG','College_PG')}}
                        {{Form::text('college_PG','', ['class' => 'form-control', 'placeholder' => 'college_PG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('aggregate_PG','Aggregate_PG')}}
                        {{Form::text('aggregate_PG','', ['class' => 'form-control', 'placeholder' => 'aggregate_PG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('experience','Experience')}}
                        {{Form::text('experience','', ['class' => 'form-control', 'placeholder' => 'experience'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('salary','Salary')}}
                        {{Form::text('salary','', ['class' => 'form-control', 'placeholder' => 'salary'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('cv_last_modified','CV_last_modified')}}
                        {{Form::date('cv_last_modified','', ['class' => 'form-control', 'placeholder' => 'cv_last_modified'])}}
                    </div>


                    

                    

                    {{-- <div class = "form-group">
                            {{Form::label('body','Body')}}
                            {{Form::textarea('body',$post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'body'])}}
                    </div>

                    <div class = "form-group">
                            {{Form::file('cover_image')}}
                    </div> --}}
                    
                    {{Form::hidden('method','PUT')}}
                    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}

                {!! Form::close() !!}                
            </div>
            </div>
        </div>
    </div>
</div>

<a class="btn btn-primary btn-lg" href="{{action('CandidatesController@index')}}" role="button">Go Back</a> 
@endsection
