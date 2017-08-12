@extends('profile.master')

@section('content')

<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{route('home')}}">Home</a></li>
        <li><a href="{{route('profile', Auth::user()->slug)}}">Profile</a></li>
        <li><a href="{{route('findfriend')}}">Find Friends</a></li>
    </ol>


    <div class="row">
        @include('profile.sidebar')


        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">{{Auth::user()->name}}</div>

                <div class="panel-body">
                    <div class="col-sm-12 col-md-12">
      
                        @foreach($allUsers as $uList)
                        @if($uList->exist_friend == 0)

                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-2 pull-left">
                                <img src="{{url('../')}}/img/{{$uList->user->pic}}"
                                width="80px" height="80px" class="img-rounded"/>
                            </div>

                            <div class="col-md-7 pull-left">
                                <h3 style="margin:0px;"><a href="{{route('profile', $uList->slug)}}">
                                  {{ucwords($uList->user->name)}}</a></h3>
                                <p><i class="fa fa-globe"></i> {{$uList->city}}  - {{$uList->country}}</p>
                                <p>{{$uList->about}}</p>

                            </div>

                            <div class="col-md-3 pull-right">
                            
                                <p>
                                    <a href="{{url('/')}}/sendRrquest/{{$uList->user->id}}"
                                       class="btn btn-info btn-sm">Add to Friend</a>
                                </p>
                                
                            </div>

                        </div>
                        @endif
                        @endforeach
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
