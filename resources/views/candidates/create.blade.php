@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Enter Candidates') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('CandidatesController@store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DOB" class="col-md-4 col-form-label text-md-right">{{ __('DOB') }}</label>

                            <div class="col-md-6">
                                <input id="DOB" type="date" class="form-control{{ $errors->has('DOB') ? ' is-invalid' : '' }}" name="DOB" value="{{ old('DOB') }}" required autofocus>

                                @if ($errors->has('DOB'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('DOB') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender') }}" required autofocus>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="current_location" class="col-md-4 col-form-label text-md-right">{{ __('Current_location') }}</label>

                            <div class="col-md-6">
                                <input id="current_location" type="text" class="form-control{{ $errors->has('current_location') ? ' is-invalid' : '' }}" name="current_location" value="{{ old('current_location') }}" required autofocus>

                                @if ($errors->has('current_location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('current_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="preferred_location" class="col-md-4 col-form-label text-md-right">{{ __('Preferred_location') }}</label>

                            <div class="col-md-6">
                                <input id="preferred_location" type="text" class="form-control{{ $errors->has('preferred_location') ? ' is-invalid' : '' }}" name="preferred_location" value="{{ old('preferred_location') }}" required autofocus>

                                @if ($errors->has('preferred_location'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('preferred_location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="school_10th" class="col-md-4 col-form-label text-md-right">{{ __('School_10th') }}</label>

                            <div class="col-md-6">
                                <input id="school_10th" type="text" class="form-control{{ $errors->has('school_10th') ? ' is-invalid' : '' }}" name="school_10th" value="{{ old('school_10th') }}" required autofocus>

                                @if ($errors->has('school_10th'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('school_10th') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marks_10th" class="col-md-4 col-form-label text-md-right">{{ __('Marks_10th') }}</label>

                            <div class="col-md-6">
                                <input id="marks_10th" type="text" class="form-control{{ $errors->has('marks_10th') ? ' is-invalid' : '' }}" name="marks_10th" value="{{ old('marks_10th') }}" required autofocus>

                                @if ($errors->has('marks_10th'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('marks_10th') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="school_12th" class="col-md-4 col-form-label text-md-right">{{ __('School_12th') }}</label>

                            <div class="col-md-6">
                                <input id="school_12th" type="text" class="form-control{{ $errors->has('school_12th') ? ' is-invalid' : '' }}" name="school_12th" value="{{ old('school_12th') }}" required autofocus>

                                @if ($errors->has('school_12th'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('school_12th') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="marks_12th" class="col-md-4 col-form-label text-md-right">{{ __('Marks_12th') }}</label>

                            <div class="col-md-6">
                                <input id="marks_12th" type="text" class="form-control{{ $errors->has('marks_12th') ? ' is-invalid' : '' }}" name="marks_12th" value="{{ old('marks_12th') }}" required autofocus>

                                @if ($errors->has('marks_12th'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('marks_12th') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="university_UG" class="col-md-4 col-form-label text-md-right">{{ __('University_UG') }}</label>

                            <div class="col-md-6">
                                <input id="university_UG" type="text" class="form-control{{ $errors->has('university_UG') ? ' is-invalid' : '' }}" name="university_UG" value="{{ old('university_UG') }}" required autofocus>

                                @if ($errors->has('university_UG'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('university_UG') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="college_UG" class="col-md-4 col-form-label text-md-right">{{ __('College_UG') }}</label>

                            <div class="col-md-6">
                                <input id="college_UG" type="text" class="form-control{{ $errors->has('college_UG') ? ' is-invalid' : '' }}" name="college_UG" value="{{ old('college_UG') }}" required autofocus>

                                @if ($errors->has('college_UG'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('college_UG') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aggregate_UG" class="col-md-4 col-form-label text-md-right">{{ __('Aggregate_UG') }}</label>

                            <div class="col-md-6">
                                <input id="aggregate_UG" type="text" class="form-control{{ $errors->has('aggregate_UG') ? ' is-invalid' : '' }}" name="aggregate_UG" value="{{ old('aggregate_UG') }}" required autofocus>

                                @if ($errors->has('aggregate_UG'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('aggregate_UG') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="university_PG" class="col-md-4 col-form-label text-md-right">{{ __('University_PG') }}</label>

                            <div class="col-md-6">
                                <input id="university_PG" type="text" class="form-control{{ $errors->has('university_PG') ? ' is-invalid' : '' }}" name="university_PG" value="{{ old('university_PG') }}" autofocus>

                                @if ($errors->has('university_PG'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('university_PG') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="college_PG" class="col-md-4 col-form-label text-md-right">{{ __('College_PG') }}</label>

                            <div class="col-md-6">
                                <input id="college_PG" type="text" class="form-control{{ $errors->has('college_PG') ? ' is-invalid' : '' }}" name="college_PG" value="{{ old('college_PG') }}" autofocus>

                                @if ($errors->has('college_PG'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('college_PG') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="aggregate_PG" class="col-md-4 col-form-label text-md-right">{{ __('Aggregate_PG') }}</label>

                            <div class="col-md-6">
                                <input id="aggregate_PG" type="text" class="form-control{{ $errors->has('aggregate_PG') ? ' is-invalid' : '' }}" name="aggregate_PG" value="{{ old('aggregate_PG') }}" autofocus>

                                @if ($errors->has('aggregate_PG'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('aggregate_PG') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>

                            <div class="col-md-6">
                                <input id="experience" type="text" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}" name="experience" value="{{ old('experience') }}" required autofocus>

                                @if ($errors->has('experience'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('experience') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>

                            <div class="col-md-6">
                                <input id="salary" type="text" class="form-control{{ $errors->has('salary') ? ' is-invalid' : '' }}" name="salary" value="{{ old('salary') }}" required autofocus>

                                @if ($errors->has('salary'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cv_last_modified" class="col-md-4 col-form-label text-md-right">{{ __('CV_last_modified') }}</label>

                            <div class="col-md-6">
                                <input id="cv_last_modified" type="date" class="form-control{{ $errors->has('cv_last_modified') ? ' is-invalid' : '' }}" name="cv_last_modified" value="{{ old('cv_last_modified') }}" required autofocus>

                                @if ($errors->has('cv_last_modified'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cv_last_modified') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<a class="btn btn-primary btn-lg" href="{{action('CandidatesController@index')}}" role="button">Go Back</a> 
@endsection
