<style>
    input{
    width: 100%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('assets/staticimages/searchicon1.png');
    background-position: 8px 15px; 
    background-size: 25px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    }
    select {
    width: 100%;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('assets/staticimages/searchicon.png');
    background-position: 8px 15px; 
    background-size: 25px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    }
</style>

@extends('layouts.app_client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search Candidates</div>

                <div class="card-body">

                        <form action="{{route('client.search_name')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Candidates Names">
                        </form>

                        <hr>

                        <form action="{{route('client.search_location')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Preferred Location">
                        </form>

                        <hr>

                        <form action="{{route('client.search_current_location')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Current Location">
                        </form>

                        <hr>

                        {{-- <form action="{{route('client.search_marks12th')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Marks 12th">
                        </form> --}}

                        <div class="col-md-10 offset-md-1">
                                <form action="{{route('client.search_marks12th')}}" method="GET">
                                        <span class="glyphicon glyphicon-search"></span>
                                    <select type="text" name="query" id="query" {{--value="{{request()->input('query')}}"--}} class="search-box" placeholder="Salary">
                                    <option value="" style="color:darkgray;">Aggregate 12th</option>
                                    @foreach ($candidates as $candidate)
                                        <option value="{{$candidate->marks_12th}}">{{$candidate->marks_12th}}</option>
                                        {{-- <option value="{{$candidate->salary}}">1 Lakhs - 3 Lakhs</option> --}}
                                        {{-- <option value="{{$candidate->salary}}">3 Lakhs - 6 Lakhs</option> --}}
                                    @endforeach
                                    </select>
                                    <br>
                                    <br>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 ">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Search') }}
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>

                        <hr>

                        {{-- <form action="{{route('client.search_aggregateUG')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Aggregate UG">
                        </form> --}}

                        <div class="col-md-10 offset-md-1">
                                <form action="{{route('client.search_aggregateUG')}}" method="GET">
                                        <span class="glyphicon glyphicon-search"></span>
                                    <select type="text" name="query" id="query" {{--value="{{request()->input('query')}}"--}} class="search-box" placeholder="Salary">
                                    <option value="" style="color:darkgray;">Aggregate_UG</option>
                                    @foreach ($candidates as $candidate)
                                        <option value="{{$candidate->aggregate_UG}}">{{$candidate->aggregate_UG}}</option>
                                        {{-- <option value="{{$candidate->salary}}">1 Lakhs - 3 Lakhs</option> --}}
                                        {{-- <option value="{{$candidate->salary}}">3 Lakhs - 6 Lakhs</option> --}}
                                    @endforeach
                                    </select>
                                    <br>
                                    <br>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 ">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Search') }}
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>

                        <hr>

                        {{-- <form action="{{route('client.search_aggregatePG')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Aggregate PG">
                        </form> --}}

                        <div class="col-md-10 offset-md-1">
                                <form action="{{route('client.search_aggregatePG')}}" method="GET">
                                        <span class="glyphicon glyphicon-search"></span>
                                    <select type="text" name="query" id="query" {{--value="{{request()->input('query')}}"--}} class="search-box" placeholder="Salary">
                                    <option value="" style="color:darkgray;">Aggregate_PG</option>
                                    @foreach ($candidates as $candidate)
                                        <option value="{{$candidate->aggregate_PG}}">{{$candidate->aggregate_PG}}</option>
                                        {{-- <option value="{{$candidate->salary}}">1 Lakhs - 3 Lakhs</option> --}}
                                        {{-- <option value="{{$candidate->salary}}">3 Lakhs - 6 Lakhs</option> --}}
                                    @endforeach
                                    </select>
                                    <br>
                                    <br>
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 ">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Search') }}
                                                </button>
                                            </div>
                                        </div>
                                </form>
                            </div>

                        <hr>

                        {{-- <form action="{{route('client.search_skills')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Skills">
                        </form> --}}

                        <div class="col-md-10 offset-md-1">
                            <form action="{{route('client.search_skills')}}" method="GET">
                                @csrf
                                    <span class="glyphicon glyphicon-search"></span>
                                <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Skill 1">
                                <br>
                                <br>
                                <input type="text" name="query1" id="query1" value="{{request()->input('query1')}}" class="search-box" placeholder="Skill 2">
                                <br>
                                <br>
                                <input type="text" name="query2" id="query2" value="{{request()->input('query2')}}" class="search-box" placeholder="Skill 3">
                                <br>
                                <br>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Search Skill based Candidates') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-10 offset-md-1">
                            <form action="{{route('client.search_skills&')}}" method="GET">
                                @csrf
                                    <span class="glyphicon glyphicon-search"></span>
                                <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Skill 1">
                                <br>
                                <br>
                                <input type="text" name="query1" id="query1" value="{{request()->input('query1')}}" class="search-box" placeholder="Skill 2">
                                <br>
                                <br>
                                <input type="text" name="query2" id="query2" value="{{request()->input('query2')}}" class="search-box" placeholder="Skill 3">
                                <br>
                                <br>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Search Skill based Candidates') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-10 offset-md-1">
                            <form action="{{route('client.search_resume')}}" method="GET">
                                @csrf
                                    <span class="glyphicon glyphicon-search"></span>
                                <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Skill 1">
                                <br>
                                <br>
                                <input type="text" name="query1" id="query1" value="{{request()->input('query1')}}" class="search-box" placeholder="Skill 2">
                                <br>
                                <br>
                                <input type="text" name="query2" id="query2" value="{{request()->input('query2')}}" class="search-box" placeholder="Skill 3">
                                <br>
                                <br>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Search resume based Candidates') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-10 offset-md-1">
                            <form action="{{route('client.search_resume&')}}" method="GET">
                                @csrf
                                    <span class="glyphicon glyphicon-search"></span>
                                <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Skill 1">
                                <br>
                                <br>
                                <input type="text" name="query1" id="query1" value="{{request()->input('query1')}}" class="search-box" placeholder="Skill 2">
                                <br>
                                <br>
                                <input type="text" name="query2" id="query2" value="{{request()->input('query2')}}" class="search-box" placeholder="Skill 3">
                                <br>
                                <br>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Search resume based Candidates') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <hr>

                        {{-- <form action="{{route('client.search_salary')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Salary">
                        </form> --}}

                        <div class="col-md-10 offset-md-1">
                            <form action="{{route('client.search_salary')}}" method="GET">
                                    <span class="glyphicon glyphicon-search"></span>
                                <select type="text" name="query" id="query" {{--value="{{request()->input('query')}}"--}} class="search-box" placeholder="Salary">
                                <option value="" style="color:darkgray;">Salary</option>
                                @foreach ($candidates as $candidate)
                                    <option value="{{$candidate->salary}}">{{$candidate->salary}}</option>
                                    {{-- <option value="{{$candidate->salary}}">1 Lakhs - 3 Lakhs</option> --}}
                                    {{-- <option value="{{$candidate->salary}}">3 Lakhs - 6 Lakhs</option> --}}
                                @endforeach
                                </select>
                                <br>
                                <br>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 ">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Search') }}
                                            </button>
                                        </div>
                                    </div>
                            </form>
                        </div>

                        <hr>

                        {{-- <form action="{{route('search_status')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Status">
                        </form> --}}

                        {{-- <hr>

                        <form action="{{route('search_interviewtype')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Interview_Type">
                        </form>

                        <hr>

                        <form action="{{route('search_submissiontype')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Resume Submission">
                        </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
