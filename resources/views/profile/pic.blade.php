@extends('profile.master')

@section('content')

<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{url('/home')}}">Home</a></li>
        <li><a href="{{url('/profile')}}/{{Auth::user()->slug}}">Profile</a></li>
        <li><a href="{{ route('edit_profile', Auth::user()->slug)}}">Edit Profile</a>
                                    </li></li>
        <li><a href="">change Photo</a</li>
    </ol>
    @include('profile.sidebar')


        <div class="col-md-8 col-md-offset-3">
            <div class="panel panel-default">

                <div class="panel-heading"><h3 align="center">{{ucwords(Auth::user()->name)}}</h3></div>

                <div class="panel-body">

                <div class="col-md-4">
                        Welcome to your profile   

                <img src="{{asset('public/img/'.Auth::user()->pic)}}" width="100px" height="100px" />  <br><br>
                
                </div>
                <form action="{{url('/')}}/uploadPhoto" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" />
                    <input type="file" name="pic" class="form-control"/>
                    <input type="submit" name="btn" class="btn btn-primary" role="button">
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
