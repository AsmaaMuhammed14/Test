<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/595a5020bd.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #ddd;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }
            .full-height {
              margin-top:50px
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;

            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px0;
            }
            .head_har{
              background-color: #f6f7f9;
                    border-bottom: 1px solid #dddfe2;
                    border-radius: 2px 2px 0 0;
                    font-weight: bold;
                    padding: 8px 6px;

            }
            .left-sidebar, .right-sidebar{
              background-color:#fff;
              min-height:100%
            }
            .posts_div{margin-bottom:10px !important}
            .posts_div h3{
              margin-top:4px !important;

            }
            #postText{
              border:none;
              height:100px
            }
            .likeBtn{
              color: #4b4f56; font-weight:bold; cursor: pointer;
            }
            .left-sidebar li { padding:10px;
              border-bottom:1px solid #ddd;
            list-style:none; margin-left:-20px}
            .dropdown-menu{min-width:120px; left:-30px}
            .dropdown-menu a{ cursor: pointer;}
            .dropdown-divider {
              height: 1px;
              margin: .5rem 0;
              overflow: hidden;
              background-color: #eceeef;}
              .user_name{font-size:18px;
               font-weight:bold; text-transform:capitalize; margin:3px}
              .all_posts{background-color:#fff; padding:15px;
               margin-bottom:15px; border-radius:5px;
                -webkit-box-shadow: 0 8px 6px -6px #666;
                -moz-box-shadow: 0 8px 6px -6px #666;
                 box-shadow: 0 8px 6px -6px #666;}


        </style>

    </head>
    <body>
    
      @if (Route::has('login'))
          <div class="top-right links">
              @if (Auth::check())
              
                  <a href="{{ url('/home') }}">home
                (<span style="text-transform:capitalize;
                color:green">{{ucwords(Auth::user()->name)}}</span>)</a>
                    <a href="{{ url('/logout') }}">Logout</a>
              @else
                  <a href="{{ url('/login') }}">Login</a>
                  <a href="{{ url('/register') }}">Register</a>
              @endif
          </div>
      @endif

@section('content')


<div class="container">
    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li><a href="{{ route('edit_profile', Auth::user()->slug)}}">Edit Profile</a></li>
    </ol>


    <div class="row">

    @include('profile.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>
                <div class="panel-body">
                    Edit you profile<hr>
                <div class="row">

                        
                         <div class="col-sm-6 col-md-12" >

                            <div class="thumbnail">

                                <h3 align="center">{{ucwords(Auth::user()->name)}}</h3>
                                <img src="{{asset('public/img/'.Auth::user()->pic)}}" width="120px" height="120px" /> <br>
                                <div class="caption">
                                    <p align="center">
                                    City:    {{ucwords(Auth::user()->profile->city)}}<br>
                                    Country: {{ucwords(Auth::user()->profile->country)}}<br>
                                    </p>
                                                                                     
                                </div>

                                 <p align="center"><a href="{{route('changePhoto')}}" class="btn btn-primary" role="butto">chang Photo</a></p><br>

                                
                            </div>


                         </div>

                        <div class="col-sm-6 col-md-12" >
                            <span class="label label-default">Update Profile </span><br>
                            <form action="{{url('/updateProfile')}}" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                            <div class="col-md-6">
                            <div class="input-group">
                                <span  >About</span>
                                <textarea type="text" name="about" class="form-control" rows="10" style="width: 400px"></textarea>
                            </div>

                            <div class="col-md-6">
                            <div class="input-group">
                                <span  id="basic-addon1">City Name</span>
                                <input type="text" class="form-control" placeholder="City Name" name="city" >
                            </div>
                            <br>
                            <div class="input-group">
                                <span  id="basic-addon1">Counrty Name</span>
                                <input type="text" class="form-control" placeholder="Country"  name="country">
                            </div>
                            <div class="input-group">
                                <input type="submit" class="btn btn-primary" role="butto">
                            </div>
                            </div>
                            </div>
                            </form>
                            </div>

                            </div>

                        
                        </div> 
                        </div>
                         


                <!-- <input type="text" name="city" value="{{$user->Profile->city }}"/> -->
                </div>
                </div>       
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
