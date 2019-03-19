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

@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search Jobs</div>

                <div class="card-body">

                        {{-- <form action="{{route('admin.search_name')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Candidates Names">
                        </form> --}}

                        <hr>    

                        <form action="{{route('admin.search_jobtitle')}}" method="GET" class="search-form">
                                <span class="glyphicon glyphicon-search"></span>
                            {{-- <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Preferred Location"> --}}
                            <select type="text" name="query" id="query" {{--value="{{request()->input('query')}}"--}} class="search-box" placeholder="Job Title">
                                    <option value="" style="color:darkgray;">Job Title</option>
                                    @foreach ($jobs->unique('jobtitle') as $job)
                                        <option value="{{$job->jobtitle}}">{{$job->jobtitle}}</option>
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

                        <hr>

                        {{-- <form action="{{route('admin.search_skill')}}" method="GET" class="search-form">
                            <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Key Skill Search">
                        </form>

                        <hr> --}}


                        <div class="col-md-10 offset-md-1">
                            <h4> Any of the job description specified </h4>
                            <form action="{{route('admin.search_jobdescription')}}" method="GET">
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

                                <div class="form-group row">
                                        <div class="col-md-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="excluding" value="0">
            
                                                <label class="form-check-label" for="">
                                                    {{ __('Excluding') }}
                                                </label>
                                            </div>
                                        </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Search') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>

                        <div class="col-md-10 offset-md-1">
                            <h4> All of the job description specified </h4>
                            <form action="{{route('admin.search_jobdescription&')}}" method="GET">
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

                                <div class="form-group row">
                                        <div class="col-md-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="excluding" value="0">
            
                                                <label class="form-check-label" for="">
                                                    {{ __('Excluding') }}
                                                </label>
                                            </div>
                                        </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-10">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Search') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr>

                        <div class="col-md-10 offset-md-1">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Status
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{action('Admin\JobDescriptionController@index_active')}}">Active</a></li>
                            <li><a class="dropdown-item" href="{{action('Admin\JobDescriptionController@index_inactive')}}">Inactive</a></li>
                            <li><a class="dropdown-item" href="{{action('Admin\JobDescriptionController@index_hold')}}">On Hold</a></li>
                            </ul>
                        </div>
                        </div>

                        <hr>

                        <div class="col-md-10 offset-md-1">
                            <form action="{{route('admin.search_jobsalary')}}" method="GET">
                                    <span class="glyphicon glyphicon-search"></span>

                                    <select type="text" name="query1" id="query1" {{--value="{{request()->input('query1')}}"--}} class="search-box" placeholder="From">
                                            <option value="" style="color:darkgray;">From</option>
                                            @foreach ($jobs->unique('salary') as $job)
                                                <option value="{{$job->salary}}">{{$job->salary}}</option>
                                                {{-- <option value="{{$candidate->salary}}">1 Lakhs - 3 Lakhs</option> --}}
                                                {{-- <option value="{{$candidate->salary}}">3 Lakhs - 6 Lakhs</option>--}} 
                                            @endforeach
                                            </select>
                                    <br>
                                    <br>
                                    <select type="text" name="query2" id="query2" {{--value="{{request()->input('query2')}}"--}} class="search-box" placeholder="To">
                                {{-- <select type="text" name="query" id="query" {{--value="{{request()->input('query')}}" class="search-box" placeholder="Salary">--}}
                                            <option value="" style="color:darkgray;">To</option>
                                            @foreach ($jobs->unique('salary') as $job)
                                                <option value="{{$job->salary}}">{{$job->salary}}</option>
                                    {{-- <option value="{{$candidate->salary}}">1 Lakhs - 3 Lakhs</option> --}}
                                    {{-- <option value="{{$candidate->salary}}">3 Lakhs - 6 Lakhs</option>--}} 
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

                        <div class="col-md-10 offset-md-1">
                                <form action="{{route('admin.search_jobexperience')}}" method="GET">
                                        <span class="glyphicon glyphicon-search"></span>

                                        <select type="text" name="query1" id="query1" {{--value="{{request()->input('query1')}}"--}} class="search-box" placeholder="From">
                                                <option value="" style="color:darkgray;">From</option>
                                                @foreach ($jobs->unique('experience') as $job)
                                                    <option value="{{$job->experience}}">{{$job->experience}}</option>
                                                    {{-- <option value="{{$candidate->salary}}">1 Lakhs - 3 Lakhs</option> --}}
                                                    {{-- <option value="{{$candidate->salary}}">3 Lakhs - 6 Lakhs</option>--}} 
                                                @endforeach
                                                </select>
                                        <br>
                                        <br>
                                        <select type="text" name="query2" id="query2" {{--value="{{request()->input('query2')}}"--}} class="search-box" placeholder="To">
                                    {{-- <select type="text" name="query" id="query" {{--value="{{request()->input('query')}}" class="search-box" placeholder="Salary">--}}
                                                <option value="" style="color:darkgray;">To</option>
                                                @foreach ($jobs->unique('experience') as $job)
                                                    <option value="{{$job->experience}}">{{$job->experience}}</option>
                                        {{-- <option value="{{$candidate->salary}}">1 Lakhs - 3 Lakhs</option> --}}
                                        {{-- <option value="{{$candidate->salary}}">3 Lakhs - 6 Lakhs</option>--}} 
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


                        {{-- <form action="{{route('admin.search_res')}}" method="GET" class="search-form">
                            <span class="glyphicon glyphicon-search"></span>
                            <input type="text" name="query" id="query" value="{{request()->input('query')}}" class="search-box" placeholder="Resume Search">
                        </form>

                        <hr> --}}

                        
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

