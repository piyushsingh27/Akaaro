@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Jobs') }}</div>

                <div class="card-body">
                            {{-- <h1>Candidates</h1> --}}
                            @if(count($jobs) > 0)
                            <!--<a class="btn btn-primary btn-lg" href="candidates" role="button">Go Back</a>-->
                                @foreach($jobs as $job)
                                    <div class = "well">
                                        <div class = "row">
                                            {{-- <div class = "col-md-4 col-sm-4">
                                                <img style="width:100%" src="storage/cover_images/{{$candidate->cover_image}}">
                                            </div> --}}
                                            {{-- <div class = " col-md-8 col-sm-8"> --}}
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            @if(!Auth::guest())
                                                                @if(Auth::user()->id == $job->admin_id)
                                                                    {{-- <div class="col-md-6"> --}}
                                                                    <h3><a class="dropdown-item" href="jobsad/{{$job->id}}">{{$job->jobtitle}}</a></h3>
                                                                    {{-- <a class="btn btn-primary pull-right" href="#">Link Client</a> --}}
                                                                    <div class="offset-md-1">
                                                                    <small>{{$job->created_at}} {{--by {{$job->admin->name}}--}}</small>
                                                                    <br>

                                                                    <?php $activated_flag = $job->flag ?>
                                                                        @if ($activated_flag == 0 || $activated_flag == -1)
                                                                            <a href= "{{action('Admin\JobDescriptionController@flagactive', ['id' => $job->id])}}" class="btn btn-default pull-right">Activate</a>
                                                                        @elseif ($activated_flag == 1) 
                                                                            <a href="#" class="btn btn-default pull-right">Activated</a>
                                                                        @endif

                                                                    <?php $inactivated_flag = $job->flag ?>
                                                                        @if ($inactivated_flag == 0 || $inactivated_flag == 1)
                                                                            <a href= "{{action('Admin\JobDescriptionController@flaginactive', ['id' => $job->id])}}" class="btn btn-default pull-right">Deactivate</a>
                                                                        @elseif ($inactivated_flag == -1)
                                                                            <a href="#" class="btn btn-default pull-right">Deactivated</a>
                                                                        @endif

                                                                    <?php $hold_flag = $job->flag ?>
                                                                        @if ($hold_flag == -1 || $hold_flag == 1)
                                                                            <a href= "{{action('Admin\JobDescriptionController@flaghold', ['id' => $job->id])}}" class="btn btn-default pull-right">Put on Hold</a>
                                                                        @elseif ($hold_flag == 0)
                                                                            <a href="#" class="btn btn-default pull-right">On Hold</a>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            @endif
                                                                    {{-- </div> --}}
                                                        </td>
                                                        {{-- <hr> --}}
                                                        </td>

                                                        {{-- <td>
                                                            {{-- @foreach ($clients as $client) 
                                                                <a class="btn btn-default pull-right" href="{{action('JobDescriptionController@client_link')}}">Link Client</a>  
                                                                {{-- {{$client->id}} --}}
                                                            {{-- @endforeach 
                                                        </td>--}} 

                                                    </tr>
                                                </table>
                                                    {{-- <small>Written on {{$candidate->created_at}} by {{$candidate->user->name}}</small>                 --}}
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                    {{$jobs->links()}} 
                                @endforeach
                                {{-- {{$candidates->links()}} --}}

                            @else
                                <p>No candidates found</p>
                            @endif 
                </div>
            </div>
        </div>
    </div>
</div>       
@endsection