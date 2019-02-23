@extends('layouts.app_client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Edit Job Details') }}</div>
                {{-- <h1>Edit Details</h1> --}}
                <div class = "card-body">
                {!! Form::model($job, array('route' => array('jobs.update', $job->id), 'method' => 'PUT', 'enctype' => 'multipart/form-data')) !!}
                    <div class = "form-group">
                        {{Form::label('CompanyName','Name')}}
                        {{Form::text('CompanyName',$job->CompanyName, ['class' => 'form-control', 'placeholder' => 'CompanyName'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('jobtitle','Job Title')}}
                        {{Form::text('jobtitle',$job->jobtitle, ['class' => 'form-control', 'placeholder' => 'Job Title'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('designation','Designation')}}
                        {{Form::text('designation',$job->designation, ['class' => 'form-control', 'placeholder' => 'Designation'])}}
                    </div>

                    <div class = "form-group">
                            {{Form::label('skills_required','Skills Required')}}
                            {{Form::textarea('skills_required',$job->skills_required, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Skills Required'])}}
                    </div>

                    <div class = "form-group">
                            {{Form::label('candidate_count','Candidate Count')}}
                            {{Form::select('candidate_count',array('1' => '1', '2' => '2', '3' => '3', '4' => '4', '5' => '5'),$job->candidate_count, ['class' => 'form-control', 'placeholder' => 'Candidate Count'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('salary','Salary')}}
                        {{Form::select('salary',array('2.5 Lakhs' => '2.5 Lakhs', '3 Lakhs' => '3 Lakhs', '3.5 Lakhs' => '3.5 Lakhs', '4 Lakhs' => '4 Lakhs', '4.5 Lakhs' => '4.5 Lakhs', '5 Lakhs' => '5 Lakhs', '5.5 Lakhs' => '5.5 Lakhs', '6 Lakhs' => '6 Lakhs', '6.5 Lakhs' => '6.5 Lakhs', '7 Lakhs' => '7 Lakhs', '7.5 Lakhs' => '7.5 Lakhs', '8 Lakhs' => '8 Lakhs', '8.5 Lakhs' => '8.5 Lakhs', '9 Lakhs' => '9 Lakhs', '9.5 Lakhs' => '9.5 Lakhs', '10 Lakhs' => '10 Lakhs', '10.5 Lakhs' => '10.5 Lakhs', '11 Lakhs' => '11 Lakhs', '11.5 Lakhs' => '11.5 Lakhs', '12 Lakhs' => '12 Lakhs', '12.5 Lakhs' => '12.5 Lakhs', '13 Lakhs' => '13 Lakhs', '13.5 Lakhs' => '13.5 Lakhs', '14 Lakhs' => '14 Lakhs', '14.5 Lakhs' => '14.5 Lakhs', '15 Lakhs' => '15 Lakhs', '15.5 Lakhs' => '15.5 Lakhs', '16 Lakhs' => '16 Lakhs', '16.5 Lakhs' => '16.5 Lakhs', '17 Lakhs' => '17 Lakhs', '17.5 Lakhs' => '17.5 Lakhs', '18 Lakhs' => '18 Lakhs', '18.5 Lakhs' => '18.5 Lakhs', '19 Lakhs' => '19 Lakhs', '19.5 Lakhs' => '19.5 Lakhs', '20 Lakhs' => '20 Lakhs', '20.5 Lakhs' => '20.5 Lakhs', '21 Lakhs' => '21 Lakhs', '21.5 Lakhs' => '21.5 Lakhs', '22 Lakhs' => '22 Lakhs', '22.5 Lakhs' => '22.5 Lakhs', '23 Lakhs' => '23 Lakhs', '23.5 Lakhs' => '23.5 Lakhs', '24 Lakhs' => '24 Lakhs', '24.5 Lakhs' => '24.5 Lakhs', '25 Lakhs' => '25 Lakhs', '25.5 Lakhs' => '25.5 Lakhs', '26 Lakhs' => '26 Lakhs', '26.5 Lakhs' => '26.5 Lakhs', '27 Lakhs' => '27 Lakhs', '27.5 Lakhs' => '27.5 Lakhs', '28 Lakhs' => '28 Lakhs', '28.5 Lakhs' => '28.5 Lakhs', '29 Lakhs' => '29 Lakhs', '29.5 Lakhs' => '29.5 Lakhs', '30 Lakhs' => '30 Lakhs', '30.5 Lakhs' => '30.5 Lakhs', '31 Lakhs' => '31 Lakhs', '31.5 Lakhs' => '31.5 Lakhs', '32 Lakhs' => '32 Lakhs', '32.5 Lakhs' => '32.5 Lakhs', '33 Lakhs' => '33 Lakhs', '33.5 Lakhs' => '33.5 Lakhs', '34 Lakhs' => '34 Lakhs', '34.5 Lakhs' => '34.5 Lakhs', '35 Lakhs' => '35 Lakhs', '35.5 Lakhs' => '35.5 Lakhs', '36 Lakhs' => '36 Lakhs', '36.5 Lakhs' => '36.5 Lakhs', '37 Lakhs' => '37 Lakhs', '37.5 Lakhs' => '37.5 Lakhs', '38 Lakhs' => '38 Lakhs', '38.5 Lakhs' => '38.5 Lakhs', '39 Lakhs' => '39 Lakhs', '39.5 Lakhs' => '39.5 Lakhs', '40 Lakhs' => '40 Lakhs', '40.5 Lakhs' => '40.5 Lakhs', '41 Lakhs' => '41 Lakhs', '41.5 Lakhs' => '41.5 Lakhs', '42 Lakhs' => '42 Lakhs', '42.5 Lakhs' => '42.5 Lakhs', '43 Lakhs' => '43 Lakhs', '43.5 Lakhs' => '43.5 Lakhs', '44 Lakhs' => '44 Lakhs', '44.5 Lakhs' => '44.5 Lakhs', '45 Lakhs' => '45 Lakhs', '45.5 Lakhs' => '45.5 Lakhs', '46 Lakhs' => '46 Lakhs', '46.5 Lakhs' => '46.5 Lakhs', '47 Lakhs' => '47 Lakhs', '47.5 Lakhs' => '47.5 Lakhs', '48 Lakhs' => '48 Lakhs', '48.5 Lakhs' => '48.5 Lakhs', '49 Lakhs' => '49 Lakhs', '49.5 Lakhs' => '49.5 Lakhs', '50 Lakhs' => '50 Lakhs', '50 Lakhs +' => '50 Lakhs +'), $job->salary, ['class' => 'form-control', 'placeholder' => 'salary'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('experience','Experience')}}
                        {{Form::select('experience',array('0 years' => 'Fresher', '1 year' => '1 year', '2 years' => '2 years', '3 years' => '3 years', '4 years' => '4 years', '5 years' => '5 years', '6 years' => '6 years', '7 years' => '7 years', '8 years' => '8 years', '9 years' => '9 years', '10 years' => '10 years', '11 years' => '11 years', '12 years' => '12 years', '13 years' => '13 years', '14 years' => '14 years', '15 years' => '15 years', '16 years' => '16 years', '17 years' => '17 years', '18 years' => '18 years', '19 years' => '19 years', '20 years' => '20 years', '21 years' => '21 years', '22 years' => '22 years', '23 years' => '23 years', '24 years' => '24 years', '25 years' => '25 years', '26 years' => '26 years', '27 years' => '27 years', '28 years' => '28 years', '29 years' => '29 years', '30 years' => '30 years', '31 years' => '31 years', '32 years' => '32 years', '33 years' => '33 years', '34 years' => '34 years', '35 years' => '35 years', '36 years' => '36 years', '37 years' => '37 years', '38 years' => '38 years', '39 years' => '39 years', '40 years' => '40 years', '41 years' => '41 years', '42 years' => '42 years', '43 years' => '43 years', '44 years' => '44 years' , '45 years' => '45 years', '46 years' => '46 years', '47 years' => '47 years', '48 years' => '48 years', '49 years' => '49 years', '50 years' => '50 years'), $job->experience, ['class' => 'form-control', 'placeholder' => 'experience'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('location','Location')}}
                        {{-- {{Form::text('preferred_location','', ['class' => 'form-control', 'placeholder' => 'preferred_location'])}} --}}
                        {{Form::select('location',array('Delhi' => 'Delhi', 'Mumbai' => 'Mumbai', 'Chennai' => 'Chennai', 'Kolkata' => 'Kolkata', 'Bangalore' => 'Bangalore', 'Pune' => 'Pune', 'Ahmedabad' => 'Ahmedabad', 'Hyderabad' => 'Hyderabad', 'Jaipur' => 'Jaipur', 'Surat' => 'Surat', 'Noida' => 'Noida', 'Gurgaon' => 'Gurgaon', 'Kochi' => 'Kochi', 'Chandigarh' => 'Chandigarh', 'Varanasi' => 'Varanasi', 'Indore' => 'Indore', 'Agra' => 'Agra', 'Lucknow' => 'Lucknow', 'Bhopal' => 'Bhopal', 'Kanpur' => 'Kanpur', 'Vishakhapatnam' => 'Vishakhapatnam', 'Patna' => 'Patna', 'Nagpur' => 'Nagpur', 'Bhubaneswar' => 'Bhubaneswar', 'Vadodara' => 'Vadodara', 'Allahabad' => 'Allahabad', 'Coimbatore' => 'Coimbatore', 'Thiruvananthapuram' => 'Thiruvananthapuram', 'Udaipur' => 'Udaipur', 'Nashik' => 'Nashik', 'Guwahati' => 'Guwahati', 'Mangalore' => 'Mangalore', 'Amritsar' => 'Amritsar', 'Srinagar' => 'Srinagar', 'Madurai' => 'Madurai', 'Mysore' => 'Mysore', 'Faridabad' => 'Faridabad', 'Raipur' => 'Raipur', 'Jamshedpur' => 'Jamshedpur', 'Jodhpur' => 'Jodhpur', 'Ranchi' => 'Ranchi', 'Rajkot' => 'Rajkot', 'Gwalior' => 'Gwalior', 'Dehradun' => 'Dehradun'),$job->location, ['class' => 'form-control', 'placeholder' => 'Location'])}}
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