<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Twitter</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Home
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if(Auth::check())
                       <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">profile</a></li>
                        <li><a href="{{route('findfriend')}}">Find Friends</a></li>
                        <li><a href="{{url('/viewRequest')}}">My Requests(
                            <span style="color:green;
                                         font-weight:bold;
                                        font-size:16px">
                            ({{App\friendships::where('status', 0)
                                                  ->where('user_requested', Auth::user()->id)
                                                  ->count()}})
                            </span>
                            </a></li>
                        <li><a href="{{route('friends')}}">Friends</a></li>

                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                                                         
                        
                             </li> 
                            <li class="dropdown" > 
                                <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{url('../')}}/img/note.png"
                                                     style="width:30px; padding:0px; background:#fff; border:0px solid #eee" class="img-rounded">
                                        </div> 
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
                                            <span class="badge" style="background:red; position: relative; top: -2px; "> 
                                            {{ App\Notification::where('status', 1)
                                                    ->where('user_from', Auth::user()->id)
                                                    ->count()}}
                                            </span>
                                          </a> 
                                           <?php $notes = DB::table('users')
                                                    ->leftJoin('notifications', 'users.id', 'notifications.user_logged')
                                                    ->where('user_from', Auth::user()->id)
                                                    ->orderBy('notifications.created_at', 'desc')
                                                    ->get(); ?>


                                   <ul class="dropdown-menu" role="menu" style="width:320px">
                                       @foreach($notes as $note)
                                          <a href="{{route('notification', Auth::user()->id)}}">
                                            @if($note->status==1)
                                        <li style="background:#E4E9F2; padding:10px">
                                          @else
                                          <li style="padding:10px">
                                            @endif
                                         <div class="row">
                                          <div class="col-md-2">
                                            <img src="{{url('../')}}/img/{{$note->pic}}"
                                             style="width:50px; padding:5px; background:#fff; border:1px solid #eee" class="img-rounded">
                                          </div>

                                        <div class="col-md-10">

                                         <b style="color:green; font-size:90%">{{ucwords($note->name)}}</b>
                                          <span style="color:#000; font-size:90%">{{$note->note}}</span>
                                          <br/>
                                          <small style="color:#90949C"> <i aria-hidden="true" class="fa fa-users"></i>
                                            {{date('F j, Y', strtotime($note->created_at))}}
                                          at {{date('H: i', strtotime($note->created_at))}}</small>
                                        </div>

                                        </div>
                                        </li></a>
                                       @endforeach
                                   </ul>
                                </li>

                            <li class="dropdown" > 
                                <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{url('../')}}/img/friend.png"
                                                     style="width:30px; padding:2px; background:#fff; border:0px solid #eee" class="img-rounded">
                                        </div> 
                                          <a href="{{url('/viewRequest')}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <i class="fa fa-globe fa-2x" aria-hidden="true"></i>
                                            <span class="badge" style="background:red; position: relative; top: -2px; ">
                                            {{App\friendships::where('status', 0)
                                                  ->where('user_requested', Auth::user()->id)
                                                  ->count()}}
                                            </span>
                                          </a> 
                                </div>                              
                            </li> 

                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <img src="{{url('../')}}/img/{{Auth::user()->pic}}" width="40px" height="40px" /> <span class="caret"></span>
                                </a>


                                <ul class="dropdown-menu" role="menu">
                                    <li> 
                                        <a href="{{ url('/profile') }}/{{Auth::user()->slug}}" >        
                                                Profile  
                                        </a> 
                                   </li>
                                    
                                    <li>
                                        <a href="{{route('notification', Auth::user()->id)}}">
                                                Notification
                                        </a>
                                    </li> 
                                    <li>
                                        <a href="{{ route('edit_profile', Auth::user()->slug)}}">
                                                Edit Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>       


                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
