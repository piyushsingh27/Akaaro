@extends('layouts.app_client')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Emails sent') }}</div>

                <div class="card-body">
                            {{-- <h1>Candidates</h1> --}}
                            @if(count($emails) > 0)
                            <!--<a class="btn btn-primary btn-lg" href="candidates" role="button">Go Back</a>-->
                                @foreach($emails as $email)
                                @if(!Auth::guest())
                                @if(Auth::user()->id == $email->client_id)
                                    <div class = "well">
                                        <div class = "row">
                                            {{-- <div class = "col-md-4 col-sm-4">
                                                <img style="width:100%" src="storage/cover_images/{{$candidate->cover_image}}">
                                            </div> --}}
                                            {{-- <div class = " col-md-8 col-sm-8"> --}}
                                                <table class="table">
                                                    <tr>
                                                        <td>
                                                            {{-- @if(!Auth::guest()) --}}
                                                                {{-- @if(Auth::user()->id == $email->client_id) --}}
                                                                    {{-- <div class="col-md-6"> --}}
                                                                    <h5> EmailTo: {{$email->email}}</h5>
                                                                    <h5> Message: {!!$email->message!!}</h5>
                                                                    {{-- <a class="btn btn-primary pull-right" href="#">Link Client</a> --}}
                                                                    <div class="offset-md-1">
                                                                    <small>{{$email->created_at}} by {{$email->client->name}}</small>
                                                                    </div>
                                                                {{-- @endif --}}
                                                            {{-- @endif --}}
                                                                    {{-- </div> --}}
                                                        </td>
                                                        {{-- <hr> --}}

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
                                    {{-- {{$emails->links()}}  --}}
                                    @endif
                                    @endif
                                @endforeach
                                {{$emails->links()}}

                            @else
                                <p>No emails found</p>
                            @endif 

                            
                </div>
            </div>
        </div>
    </div>
</div>       
@endsection