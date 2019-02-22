<style>
    input {
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

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search Candidates</div>

                <div class="card-body">

                        <form action="{{route('search_name')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Candidates Names">
                        </form>

                        <hr>    

                        <form action="{{route('search_location')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Preferred Location">
                        </form>

                        <hr>

                        <form action="{{route('search_current_location')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Current Location">
                        </form>

                        <hr>

                        <form action="{{route('search_marks12th')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Marks 12th">
                                    {{--<option></option>
                                    <option value="60-65">60-65</option>
                                    <option value="65-70">65-70</option>
                                    <option value="75-80">75-80</option>
                                    <option value="80-85">80-85</option>
                            </select>--}}   
                        </form>

                        <hr>

                        <form action="{{route('search_aggregateUG')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Aggregate UG">
                        </form>

                        <hr>

                        <form action="{{route('search_aggregatePG')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Aggregate PG">
                        </form>

                        <hr>


                        <div class="col-md-10 offset-md-1">
                            <form action="{{route('search_skills')}}" method="GET">
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
                            <form action="{{route('search_skills&')}}" method="GET">
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
                            <form action="{{route('search_resume')}}" method="GET">
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
                            <form action="{{route('search_resume&')}}" method="GET">
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

                        <form action="{{route('search_salary')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Salary">
                        </form>

                        <hr>

                        <form action="{{route('search_status')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Status">
                        </form>

                        <hr>

                        <form action="{{route('search_interviewtype')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Interview_Type">
                        </form>

                        <hr>

                        <form action="{{route('search_submissiontype')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Resume Submission">
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    $("#query").select2({
        placeholder:'12th Marks'
    });

</script>

