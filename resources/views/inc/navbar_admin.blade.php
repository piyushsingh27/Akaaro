

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="{{route('admin.home')}}">{{config('app.name','LSAPP')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          {{-- <a class="nav-link" href="{{route('index')}}">Home </a> --}}
        </li>
        <li class="nav-item active">
          {{-- <a class="nav-link" href="{{route('about')}}">About</a> --}}
        </li>
        <!--
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      -->
        <li class="nav-item active">
        {{-- <a class="nav-link" href="{{route('services')}}">Services</a> --}}
        </li>
  
        {{-- <li class="nav-item active">
            <a class="nav-link" href="posts">Blog</a>
          </li> --}}
      </ul>
  
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Creator Section') }}</a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.register') }}">{{ __('Register') }}</a>
                    </li>
                @else
                    {{-- <form action="#" method="GET" class="search-form">
                        <span class="glyphicon glyphicon-search"></span>
                        <input type="text" name="query" id="query" class="search-box" placeholder="Search for Candidates">
                    </form> --}}

                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Status <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{action('CandidatesController@index_hired')}}">Hired</a>
                                <a class="dropdown-item" href="{{action('CandidatesController@index_selected')}}">Selected</a>
                                <a class="dropdown-item" href="{{action('CandidatesController@index_hold')}}">On Hold</a>
                                <a class="dropdown-item" href="{{action('CandidatesController@index_rejected')}}">Rejected</a>
                        </div>
                    </li> --}}

                    {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Interview <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{action('CandidatesController@index_face2face')}}">Personal Interview</a>
                                    <a class="dropdown-item" href="{{action('CandidatesController@index_telephonic')}}">Telephonic Interview</a>  
                            </div>
                    </li> --}}

                    {{-- <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Submission <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{action('CandidatesController@index_ISUB')}}">ISUB</a>
                                <a class="dropdown-item" href="{{action('CandidatesController@index_CSUB')}}">CSUB</a>  
                            </div>
                    </li> --}}



                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> 

                            <a class="dropdown-item" href="{{action('CandidatesController@index')}}">List of candidates</a>

                            <a class="dropdown-item" href="{{action('JobDescriptionController@index')}}">List of Jobs</a>
                        
                            {{-- <a class="dropdown-item" href="{{action('RemarksController@index')}}">Remarks</a>  --}}
                            
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
