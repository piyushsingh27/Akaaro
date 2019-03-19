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

                    {{-- <div class = "form-group">
                        {{Form::label('designation','Designation')}}
                        {{Form::text('designation',$job->designation, ['class' => 'form-control', 'placeholder' => 'Designation'])}}
                    </div> --}}

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
                        {{-- {{Form::select('salary',array('2.5 Lakhs' => '2.5 Lakhs', '3 Lakhs' => '3 Lakhs', '3.5 Lakhs' => '3.5 Lakhs', '4 Lakhs' => '4 Lakhs', '4.5 Lakhs' => '4.5 Lakhs', '5 Lakhs' => '5 Lakhs', '5.5 Lakhs' => '5.5 Lakhs', '6 Lakhs' => '6 Lakhs', '6.5 Lakhs' => '6.5 Lakhs', '7 Lakhs' => '7 Lakhs', '7.5 Lakhs' => '7.5 Lakhs', '8 Lakhs' => '8 Lakhs', '8.5 Lakhs' => '8.5 Lakhs', '9 Lakhs' => '9 Lakhs', '9.5 Lakhs' => '9.5 Lakhs', '10 Lakhs' => '10 Lakhs', '10.5 Lakhs' => '10.5 Lakhs', '11 Lakhs' => '11 Lakhs', '11.5 Lakhs' => '11.5 Lakhs', '12 Lakhs' => '12 Lakhs', '12.5 Lakhs' => '12.5 Lakhs', '13 Lakhs' => '13 Lakhs', '13.5 Lakhs' => '13.5 Lakhs', '14 Lakhs' => '14 Lakhs', '14.5 Lakhs' => '14.5 Lakhs', '15 Lakhs' => '15 Lakhs', '15.5 Lakhs' => '15.5 Lakhs', '16 Lakhs' => '16 Lakhs', '16.5 Lakhs' => '16.5 Lakhs', '17 Lakhs' => '17 Lakhs', '17.5 Lakhs' => '17.5 Lakhs', '18 Lakhs' => '18 Lakhs', '18.5 Lakhs' => '18.5 Lakhs', '19 Lakhs' => '19 Lakhs', '19.5 Lakhs' => '19.5 Lakhs', '20 Lakhs' => '20 Lakhs', '20.5 Lakhs' => '20.5 Lakhs', '21 Lakhs' => '21 Lakhs', '21.5 Lakhs' => '21.5 Lakhs', '22 Lakhs' => '22 Lakhs', '22.5 Lakhs' => '22.5 Lakhs', '23 Lakhs' => '23 Lakhs', '23.5 Lakhs' => '23.5 Lakhs', '24 Lakhs' => '24 Lakhs', '24.5 Lakhs' => '24.5 Lakhs', '25 Lakhs' => '25 Lakhs', '25.5 Lakhs' => '25.5 Lakhs', '26 Lakhs' => '26 Lakhs', '26.5 Lakhs' => '26.5 Lakhs', '27 Lakhs' => '27 Lakhs', '27.5 Lakhs' => '27.5 Lakhs', '28 Lakhs' => '28 Lakhs', '28.5 Lakhs' => '28.5 Lakhs', '29 Lakhs' => '29 Lakhs', '29.5 Lakhs' => '29.5 Lakhs', '30 Lakhs' => '30 Lakhs', '30.5 Lakhs' => '30.5 Lakhs', '31 Lakhs' => '31 Lakhs', '31.5 Lakhs' => '31.5 Lakhs', '32 Lakhs' => '32 Lakhs', '32.5 Lakhs' => '32.5 Lakhs', '33 Lakhs' => '33 Lakhs', '33.5 Lakhs' => '33.5 Lakhs', '34 Lakhs' => '34 Lakhs', '34.5 Lakhs' => '34.5 Lakhs', '35 Lakhs' => '35 Lakhs', '35.5 Lakhs' => '35.5 Lakhs', '36 Lakhs' => '36 Lakhs', '36.5 Lakhs' => '36.5 Lakhs', '37 Lakhs' => '37 Lakhs', '37.5 Lakhs' => '37.5 Lakhs', '38 Lakhs' => '38 Lakhs', '38.5 Lakhs' => '38.5 Lakhs', '39 Lakhs' => '39 Lakhs', '39.5 Lakhs' => '39.5 Lakhs', '40 Lakhs' => '40 Lakhs', '40.5 Lakhs' => '40.5 Lakhs', '41 Lakhs' => '41 Lakhs', '41.5 Lakhs' => '41.5 Lakhs', '42 Lakhs' => '42 Lakhs', '42.5 Lakhs' => '42.5 Lakhs', '43 Lakhs' => '43 Lakhs', '43.5 Lakhs' => '43.5 Lakhs', '44 Lakhs' => '44 Lakhs', '44.5 Lakhs' => '44.5 Lakhs', '45 Lakhs' => '45 Lakhs', '45.5 Lakhs' => '45.5 Lakhs', '46 Lakhs' => '46 Lakhs', '46.5 Lakhs' => '46.5 Lakhs', '47 Lakhs' => '47 Lakhs', '47.5 Lakhs' => '47.5 Lakhs', '48 Lakhs' => '48 Lakhs', '48.5 Lakhs' => '48.5 Lakhs', '49 Lakhs' => '49 Lakhs', '49.5 Lakhs' => '49.5 Lakhs', '50 Lakhs' => '50 Lakhs', '50 Lakhs +' => '50 Lakhs +'), $job->salary, ['class' => 'form-control', 'placeholder' => 'salary'])}} --}}
                        {{Form::select('salary',array('250000' => '2.5 Lakhs', '300000' => '3 Lakhs', '350000' => '3.5 Lakhs', '400000' => '4 Lakhs', '450000' => '4.5 Lakhs', '500000' => '5 Lakhs', '550000' => '5.5 Lakhs', '600000' => '6 Lakhs', '650000' => '6.5 Lakhs', '700000' => '7 Lakhs', '750000' => '7.5 Lakhs', '800000' => '8 Lakhs', '850000' => '8.5 Lakhs', '900000' => '9 Lakhs', '950000' => '9.5 Lakhs', '1000000' => '10 Lakhs', '1050000' => '10.5 Lakhs', '1100000' => '11 Lakhs', '1150000' => '11.5 Lakhs', '1200000' => '12 Lakhs', '1250000' => '12.5 Lakhs', '1300000' => '13 Lakhs', '1350000' => '13.5 Lakhs', '1400000' => '14 Lakhs', '1450000' => '14.5 Lakhs', '1500000' => '15 Lakhs', '1550000' => '15.5 Lakhs', '1600000' => '16 Lakhs', '1650000' => '16.5 Lakhs', '1700000' => '17 Lakhs', '1750000' => '17.5 Lakhs', '1800000' => '18 Lakhs', '1850000' => '18.5 Lakhs', '1900000' => '19 Lakhs', '1950000' => '19.5 Lakhs', '2000000' => '20 Lakhs', '2050000' => '20.5 Lakhs', '2100000' => '21 Lakhs', '2150000' => '21.5 Lakhs', '2200000' => '22 Lakhs', '2250000' => '22.5 Lakhs', '2300000' => '23 Lakhs', '2350000' => '23.5 Lakhs', '2400000' => '24 Lakhs', '2450000' => '24.5 Lakhs', '2500000' => '25 Lakhs', '2550000' => '25.5 Lakhs', '2600000' => '26 Lakhs', '2650000' => '26.5 Lakhs', '2700000' => '27 Lakhs', '2750000' => '27.5 Lakhs', '2800000' => '28 Lakhs', '2850000' => '28.5 Lakhs', '2900000' => '29 Lakhs', '2950000' => '29.5 Lakhs', '3000000' => '30 Lakhs', '3050000' => '30.5 Lakhs', '3100000' => '31 Lakhs', '3150000' => '31.5 Lakhs', '3200000' => '32 Lakhs', '3250000' => '32.5 Lakhs', '3300000' => '33 Lakhs', '3350000' => '33.5 Lakhs', '3400000' => '34 Lakhs', '3450000' => '34.5 Lakhs', '3500000' => '35 Lakhs', '3550000' => '35.5 Lakhs', '3600000' => '36 Lakhs', '3650000' => '36.5 Lakhs', '3700000' => '37 Lakhs', '3750000' => '37.5 Lakhs', '3800000' => '38 Lakhs', '3850000' => '38.5 Lakhs', '3900000' => '39 Lakhs', '3950000' => '39.5 Lakhs', '4000000' => '40 Lakhs', '4050000' => '40.5 Lakhs', '4100000' => '41 Lakhs', '4150000' => '41.5 Lakhs', '4200000' => '42 Lakhs', '4250000' => '42.5 Lakhs', '4300000' => '43 Lakhs', '4350000' => '43.5 Lakhs', '4400000' => '44 Lakhs', '4450000' => '44.5 Lakhs', '4500000' => '45 Lakhs', '4550000' => '45.5 Lakhs', '4600000' => '46 Lakhs', '4650000' => '46.5 Lakhs', '4700000' => '47 Lakhs', '4750000' => '47.5 Lakhs', '4800000' => '48 Lakhs', '4850000' => '48.5 Lakhs', '4900000' => '49 Lakhs', '4950000' => '49.5 Lakhs', '5000000' => '50 Lakhs'), $job->salary, ['class' => 'form-control', 'placeholder' => 'salary'])}}
                    </div>

                    <div class = "form-group">
                        {{Form::label('experience','Experience')}}
                        {{-- {{Form::select('experience',array('0 years' => 'Fresher', '1 year' => '1 year', '2 years' => '2 years', '3 years' => '3 years', '4 years' => '4 years', '5 years' => '5 years', '6 years' => '6 years', '7 years' => '7 years', '8 years' => '8 years', '9 years' => '9 years', '10 years' => '10 years', '11 years' => '11 years', '12 years' => '12 years', '13 years' => '13 years', '14 years' => '14 years', '15 years' => '15 years', '16 years' => '16 years', '17 years' => '17 years', '18 years' => '18 years', '19 years' => '19 years', '20 years' => '20 years', '21 years' => '21 years', '22 years' => '22 years', '23 years' => '23 years', '24 years' => '24 years', '25 years' => '25 years', '26 years' => '26 years', '27 years' => '27 years', '28 years' => '28 years', '29 years' => '29 years', '30 years' => '30 years', '31 years' => '31 years', '32 years' => '32 years', '33 years' => '33 years', '34 years' => '34 years', '35 years' => '35 years', '36 years' => '36 years', '37 years' => '37 years', '38 years' => '38 years', '39 years' => '39 years', '40 years' => '40 years', '41 years' => '41 years', '42 years' => '42 years', '43 years' => '43 years', '44 years' => '44 years' , '45 years' => '45 years', '46 years' => '46 years', '47 years' => '47 years', '48 years' => '48 years', '49 years' => '49 years', '50 years' => '50 years'), $job->experience, ['class' => 'form-control', 'placeholder' => 'experience'])}} --}}
                        {{Form::select('experience',array('0' => 'Fresher', '1' => '1 year', '2' => '2 years', '3' => '3 years', '4' => '4 years', '5' => '5 years', '6' => '6 years', '7' => '7 years', '8' => '8 years', '9' => '9 years', '10' => '10 years', '11' => '11 years', '12' => '12 years', '13' => '13 years', '14' => '14 years', '15' => '15 years', '16' => '16 years', '17' => '17 years', '18' => '18 years', '19' => '19 years', '20' => '20 years', '21' => '21 years', '22' => '22 years', '23' => '23 years', '24' => '24 years', '25' => '25 years', '26' => '26 years', '27' => '27 years', '28' => '28 years', '29' => '29 years', '30' => '30 years', '31' => '31 years', '32' => '32 years', '33' => '33 years', '34' => '34 years', '35' => '35 years', '36' => '36 years', '37' => '37 years', '38' => '38 years', '39' => '39 years', '40' => '40 years', '41' => '41 years', '42' => '42 years', '43' => '43 years', '44' => '44 years' , '45' => '45 years', '46' => '46 years', '47' => '47 years', '48' => '48 years', '49' => '49 years', '50' => '50 years'), $job->experience, ['class' => 'form-control', 'placeholder' => 'experience'])}}
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