@extends('profile.master')

@section('content')
    <div class="container">
    <div class="row">

@include('profile.sidebar')
@foreach($userData as $uData)

        <div class="col-md-9">
            <div class="panel panel-default">
                        

                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                                <h3 align="center">{{$uData->name}}</h3>
                                <img src="{{url('../')}}/public/img/{{$uData->pic}}" width="120px" height="120px" class="img-circle"/>
                                <div class="caption">

                                    <p align="center">{{$uData->city}} - {{$uData->country}}</p>
                                    @if ($uData->user_id == Auth::user()->id)
                                    <p align="center"><a href="{{url('/editProfile')}}"
                                      class="btn btn-primary" role="button">Edit Profile</a></p>
                                      @endif
                                </div>
                            </div>


                        </div>

                        <div class="col-sm-6 col-md-4">
                            <h4 class=""><span class="label label-default">About</span></h4>
                            <p> {{$uData->about}} </p>
                        </div>
                    </div>

                        <!--   show posts-->                     
                            <div class="panel-heading">                        

                            <div  class="col-lg-10">
                                @foreach( $myPosts as $post)

                                <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                                    <div class="col-md-8 pull-left">
                                        <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}"
                                        width="30px" height="30px" class="img-rounded"/>
                                        <h3 s> <a href="">
                                          {{Auth::user()->name}}</a></h3>
                                    </div>
                                    <div class="col-md-7 pull-left">                                                                
                                        <p><i class="fa fa-globe"></i> {{$post->created_at}}</p>                                
                                        <h3>{{$post->content}}</h3><br>
                                        <div class="col-md-7 pull-left">                                                          
                                            <a href="#" class="btn "><img width="20px" height="20px" src="{{url('../')}}/img/favorite.png"></a>                             
                                            <a href="#" class="btn btn-defult"><img width="20px" height="20px" src="{{url('../')}}/img/comment.png"></a>                                                              
                                        </div> 
                                        <div class="col-lg-12">

                                        <div class="comment">
                                        <h4> comments</h4>
                                          @foreach ($post->comments as $comment)
                                            <p>{{$comment->body}}</p>
                                          @endforeach
                                        </div>
                                            <h5>Leave a Comment:</h5>
                                            <form role="form" action="/comments/store" method="post">
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            {{csrf_field()}}
                                                <div class="form-group">
                                                    <input type="type" name="body"/> 
                                                    <button  class="btn btn-xs btn-info">comment</button>
                                                </div>
                                            </form>
                                            <hr>
                                    </div> 
                                    </div>                                                      
                                </div>
                                                        @endforeach



                            </div>
                            </div>

                        </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
