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
                        {{Form::select('gender',array('Male' => 'Male', 'Female' => 'Female'),'', ['class' => 'form-control', 'placeholder' => 'gender'])}}
                        {{-- {{Form::select('experience',array('0 years' => 'Fresher', '1 year' => '1 year', '2 years' => '2 years', '3 years' => '3 years'), '0', ['class' => 'form-control', 'placeholder' => 'experience'])}} --}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('current_location','Current_location')}}
                        {{-- @foreach ($cities as $city)
                            {{Form::select('current_location', $city->cities,null,['class' => 'form-control', 'placeholder' => 'current_location'])}}   
                        @endforeach --}}
                        {{Form::select('current_location',array('Delhi' => 'Delhi', 'Mumbai' => 'Mumbai', 'Chennai' => 'Chennai', 'Kolkata' => 'Kolkata', 'Bangalore' => 'Bangalore', 'Pune' => 'Pune', 'Ahmedabad' => 'Ahmedabad', 'Hyderabad' => 'Hyderabad', 'Jaipur' => 'Jaipur', 'Surat' => 'Surat', 'Noida' => 'Noida', 'Gurgaon' => 'Gurgaon', 'Kochi' => 'Kochi', 'Chandigarh' => 'Chandigarh', 'Varanasi' => 'Varanasi', 'Indore' => 'Indore', 'Agra' => 'Agra', 'Lucknow' => 'Lucknow', 'Bhopal' => 'Bhopal', 'Kanpur' => 'Kanpur', 'Vishakhapatnam' => 'Vishakhapatnam', 'Patna' => 'Patna', 'Nagpur' => 'Nagpur', 'Bhubaneswar' => 'Bhubaneswar', 'Vadodara' => 'Vadodara', 'Allahabad' => 'Allahabad', 'Coimbatore' => 'Coimbatore', 'Thiruvananthapuram' => 'Thiruvananthapuram', 'Udaipur' => 'Udaipur', 'Nashik' => 'Nashik', 'Guwahati' => 'Guwahati', 'Mangalore' => 'Mangalore', 'Amritsar' => 'Amritsar', 'Srinagar' => 'Srinagar', 'Madurai' => 'Madurai', 'Mysore' => 'Mysore', 'Faridabad' => 'Faridabad', 'Raipur' => 'Raipur', 'Jamshedpur' => 'Jamshedpur', 'Jodhpur' => 'Jodhpur', 'Ranchi' => 'Ranchi', 'Rajkot' => 'Rajkot', 'Gwalior' => 'Gwalior', 'Dehradun' => 'Dehradun'),'', ['class' => 'form-control', 'placeholder' => 'current_location'])}}
                        
                    </div>

                    <div class = "form-group">
                        {{Form::label('preferred_location','Preferred_location')}}
                        {{-- {{Form::text('preferred_location','', ['class' => 'form-control', 'placeholder' => 'preferred_location'])}} --}}
                        {{Form::select('preferred_location',array('Delhi' => 'Delhi', 'Mumbai' => 'Mumbai', 'Chennai' => 'Chennai', 'Kolkata' => 'Kolkata', 'Bangalore' => 'Bangalore', 'Pune' => 'Pune', 'Ahmedabad' => 'Ahmedabad', 'Hyderabad' => 'Hyderabad', 'Jaipur' => 'Jaipur', 'Surat' => 'Surat', 'Noida' => 'Noida', 'Gurgaon' => 'Gurgaon', 'Kochi' => 'Kochi', 'Chandigarh' => 'Chandigarh', 'Varanasi' => 'Varanasi', 'Indore' => 'Indore', 'Agra' => 'Agra', 'Lucknow' => 'Lucknow', 'Bhopal' => 'Bhopal', 'Kanpur' => 'Kanpur', 'Vishakhapatnam' => 'Vishakhapatnam', 'Patna' => 'Patna', 'Nagpur' => 'Nagpur', 'Bhubaneswar' => 'Bhubaneswar', 'Vadodara' => 'Vadodara', 'Allahabad' => 'Allahabad', 'Coimbatore' => 'Coimbatore', 'Thiruvananthapuram' => 'Thiruvananthapuram', 'Udaipur' => 'Udaipur', 'Nashik' => 'Nashik', 'Guwahati' => 'Guwahati', 'Mangalore' => 'Mangalore', 'Amritsar' => 'Amritsar', 'Srinagar' => 'Srinagar', 'Madurai' => 'Madurai', 'Mysore' => 'Mysore', 'Faridabad' => 'Faridabad', 'Raipur' => 'Raipur', 'Jamshedpur' => 'Jamshedpur', 'Jodhpur' => 'Jodhpur', 'Ranchi' => 'Ranchi', 'Rajkot' => 'Rajkot', 'Gwalior' => 'Gwalior', 'Dehradun' => 'Dehradun'),'', ['class' => 'form-control', 'placeholder' => 'preferred_location'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('school_10th','School_10th')}}
                        {{Form::text('school_10th','', ['class' => 'form-control', 'placeholder' => 'school_10th'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('marks_10th','Marks_10th')}}
                        {{Form::text('marks_10th','', ['class' => 'form-control', 'placeholder' => 'Aggregate Percentage'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('school_12th','School_12th')}}
                        {{Form::text('school_12th','', ['class' => 'form-control', 'placeholder' => 'school_12th'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('marks_12th','Marks_12th')}}
                        {{Form::text('marks_12th','', ['class' => 'form-control', 'placeholder' => 'Aggregate Percentage'])}}
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
                        {{Form::text('aggregate_UG','', ['class' => 'form-control', 'placeholder' => 'Aggregate Percentage'])}}
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
                        {{Form::text('aggregate_PG','', ['class' => 'form-control', 'placeholder' => 'Aggregate Percentage'])}}
                    </div>

                    <div class = "form-group">
                            {{Form::label('skills','Key Skills')}}
                            {{Form::textarea('skills','', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Key Skills'])}}
                    </div>

                    <div class = "form-group">
                            {{Form::label('other_skills','Skills')}}
                            {{Form::textarea('other_skills','', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Other Skills'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('experience','Experience')}}
                        {{Form::select('experience',array('0 years' => 'Fresher', '1 year' => '1 year', '2 years' => '2 years', '3 years' => '3 years', '4 years' => '4 years', '5 years' => '5 years', '6 years' => '6 years', '7 years' => '7 years', '8 years' => '8 years', '9 years' => '9 years', '10 years' => '10 years', '11 years' => '11 years', '12 years' => '12 years', '13 years' => '13 years', '14 years' => '14 years', '15 years' => '15 years', '16 years' => '16 years', '17 years' => '17 years', '18 years' => '18 years', '19 years' => '19 years', '20 years' => '20 years', '21 years' => '21 years', '22 years' => '22 years', '23 years' => '23 years', '24 years' => '24 years', '25 years' => '25 years', '26 years' => '26 years', '27 years' => '27 years', '28 years' => '28 years', '29 years' => '29 years', '30 years' => '30 years', '31 years' => '31 years', '32 years' => '32 years', '33 years' => '33 years', '34 years' => '34 years', '35 years' => '35 years', '36 years' => '36 years', '37 years' => '37 years', '38 years' => '38 years', '39 years' => '39 years', '40 years' => '40 years', '41 years' => '41 years', '42 years' => '42 years', '43 years' => '43 years', '44 years' => '44 years' , '45 years' => '45 years', '46 years' => '46 years', '47 years' => '47 years', '48 years' => '48 years', '49 years' => '49 years', '50 years' => '50 years'), '', ['class' => 'form-control', 'placeholder' => 'experience'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('salary','Salary')}}
                        {{Form::select('salary',array('2.5 Lakhs' => '2.5 Lakhs', '3 Lakhs' => '3 Lakhs', '3.5 Lakhs' => '3.5 Lakhs', '4 Lakhs' => '4 Lakhs', '4.5 Lakhs' => '4.5 Lakhs', '5 Lakhs' => '5 Lakhs', '5.5 Lakhs' => '5.5 Lakhs', '6 Lakhs' => '6 Lakhs', '6.5 Lakhs' => '6.5 Lakhs', '7 Lakhs' => '7 Lakhs', '7.5 Lakhs' => '7.5 Lakhs', '8 Lakhs' => '8 Lakhs', '8.5 Lakhs' => '8.5 Lakhs', '9 Lakhs' => '9 Lakhs', '9.5 Lakhs' => '9.5 Lakhs', '10 Lakhs' => '10 Lakhs', '10.5 Lakhs' => '10.5 Lakhs', '11 Lakhs' => '11 Lakhs', '11.5 Lakhs' => '11.5 Lakhs', '12 Lakhs' => '12 Lakhs'), '', ['class' => 'form-control', 'placeholder' => 'salary'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('cv_last_modified','CV_last_modified')}}
                        {{Form::date('cv_last_modified','', ['class' => 'form-control', 'placeholder' => 'cv_last_modified'])}}
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
            </div>
            </div>
        </div>
    </div>
</div>

{{-- <a class="btn btn-primary btn-lg" href="{{action('CandidatesController@index')}}" role="button">Go Back</a>  --}}
@endsection
