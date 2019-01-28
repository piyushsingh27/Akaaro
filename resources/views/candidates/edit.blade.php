@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Edit Candidate Details') }}</div>
                {{-- <h1>Edit Details</h1> --}}
                <div class = "card-body">
                {!! Form::model($candidate, array('route' => array('candidates.update', $candidate->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
                    <div class = "form-group">
                        {{Form::label('name','Name')}}
                        {{Form::text('name',$candidate->name, ['class' => 'form-control', 'placeholder' => 'name'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('email','Email')}}
                        {{Form::email('email',$candidate->email, ['class' => 'form-control', 'placeholder' => 'email'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('phone','Phone')}}
                        {{Form::text('phone',$candidate->phone, ['class' => 'form-control', 'placeholder' => 'phone'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('DOB','DOB')}}
                        {{Form::date('DOB',$candidate->DOB, ['class' => 'form-control', 'placeholder' => 'DOB'])}}
                    </div>


                    <div class = "form-group">
                        {{Form::label('gender','Gender')}}
                        {{Form::text('gender',$candidate->gender, ['class' => 'form-control', 'placeholder' => 'gender'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('current_location','Current_location')}}
                        {{Form::text('current_location',$candidate->current_location, ['class' => 'form-control', 'placeholder' => 'current_location'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('preferred_location','Preferred_location')}}
                        {{Form::text('preferred_location',$candidate->preferred_location, ['class' => 'form-control', 'placeholder' => 'preferred_location'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('school_10th','School_10th')}}
                        {{Form::text('school_10th',$candidate->school_10th, ['class' => 'form-control', 'placeholder' => 'school_10th'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('marks_10th','Marks_10th')}}
                        {{Form::text('marks_10th',$candidate->marks_10th, ['class' => 'form-control', 'placeholder' => 'marks_10th'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('school_12th','School_12th')}}
                        {{Form::text('school_12th',$candidate->school_12th, ['class' => 'form-control', 'placeholder' => 'school_12th'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('marks_12th','Marks_12th')}}
                        {{Form::text('marks_12th',$candidate->marks_12th, ['class' => 'form-control', 'placeholder' => 'marks_12th'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('university_UG','University_UG')}}
                        {{Form::text('university_UG',$candidate->university_UG, ['class' => 'form-control', 'placeholder' => 'university_UG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('college_UG','College_UG')}}
                        {{Form::text('college_UG',$candidate->college_UG, ['class' => 'form-control', 'placeholder' => 'college_UG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('aggregate_UG','Aggregate_UG')}}
                        {{Form::text('aggregate_UG',$candidate->aggregate_UG, ['class' => 'form-control', 'placeholder' => 'aggregate_UG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('university_PG','University_PG')}}
                        {{Form::text('university_PG',$candidate->university_PG, ['class' => 'form-control', 'placeholder' => 'university_PG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('college_PG','College_PG')}}
                        {{Form::text('college_PG',$candidate->college_PG, ['class' => 'form-control', 'placeholder' => 'college_PG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('aggregate_PG','Aggregate_PG')}}
                        {{Form::text('aggregate_PG',$candidate->aggregate_PG, ['class' => 'form-control', 'placeholder' => 'aggregate_PG'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('experience','Experience')}}
                        {{Form::select('experience',array('0 years' => 'Fresher', '1 year' => '1 year', '2 years' => '2 years', '3 years' => '3 years'), '0', ['class' => 'form-control', 'placeholder' => 'experience'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('salary','Salary')}}
                        {{Form::select('salary',array('1 Lakh' => '1 Lakh', '2 Lakhs' => '2 Lakhs', '3 Lakhs' => '3 Lakhs', '4 Lakhs' => '4 Lakhs'), '1 Lakh', ['class' => 'form-control', 'placeholder' => 'salary'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('cv_last_modified','CV_last_modified')}}
                        {{Form::date('cv_last_modified',$candidate->cv_last_modified, ['class' => 'form-control', 'placeholder' => 'cv_last_modified'])}}
                    </div>

                    <div class = "form-group">
                            {{Form::label('status','Status')}}
                            <br>
                            {{Form::radio('status','hold')}} Hold
                            <br>
                            {{Form::radio('status','selected')}} Select
                            <br>
                            {{Form::radio('status','hired')}} Hired
                            <br>
                            {{Form::radio('status','not selected')}} Reject
                        </div>
    
                        <div class = "form-group">
                            {{Form::label('interview_type','Type of Interview')}}
                            <br>
                            {{Form::radio('interview_type','telephonic')}} Telephonic
                            <br>
                            {{Form::radio('interview_type','face2face')}} Face-to-Face
                        </div>
    
                        <div class = "form-group">
                            {{Form::label('submission_type','Resume Submission')}}
                            <br>
                            {{Form::radio('submission_type','ISUB')}} ISUB
                            <br>
                            {{Form::radio('submission_type','CSUB')}} CSUB
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
                {{-- <a class="btn btn-primary btn-lg" href="{{action('CandidatesController@index')}}" role="button">Go Back</a>   --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection