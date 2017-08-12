@extends('profile.master')

@section('content')
    <div class="container">
    <div class="col-md-2">
        <div class="panel panel-default"> 
            <div class="panel-heading">sidebar</div>
        </div>
    </div>  
    <div class="col-md-8">      
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">home</div>
                <div class="panel-heading   ">                                                                                            
                    <a href="#" class="btn btn-defult "><img width="100px" height="30px" src="{{url('../')}}/img/tweet.png"></a>                                                          
                </div>
                <div class="panel-body">
                    @foreach( $posts as $post)
                    <div class="panel-heading">                        

                    <div  class="col-lg-10">
                        <div class="row" style="border-bottom:1px solid #ccc; margin-bottom:15px">
                            <div class="col-md-8 pull-left">
                                <img src="{{url('../')}}/img/{{$post->pic}}"
                                width="30px" height="30px" class="img-rounded"/>
                                <h3 style="margin:0px;"> <a href="{{url('/profile')}}/{{Auth::user()->slug}}">{{$post->name}}
                                  </a></h3>
                            </div>
                            <div class="col-md-7 pull-left">                                                                
                                <p><i class="fa fa-globe"></i> {{$post->created_at}}</p>                                
                                <h3>{{$post->content}}</h3><br>
                                <div class="col-md-7 pull-left">                                                          
                                    <a href="#" class="btn "><img width="20px" height="20px" src="{{url('../')}}/img/favorite.png"></a>                             
                                    <a href="#" class="btn btn-defult"><img width="20px" height="20px" src="{{url('../')}}/img/comment.png"></a>                                                              
                                </div>  
                            </div>                                                      
                        </div>


                    </div>
                    </div>

                @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="col-md-2">
        <div class="panel panel-default"> 
            <div class="panel-heading">© 2017 Twitter About Help Center Terms Privacy <br>
            policy Cookies Ads <br>info Brand Blog <br>Status Apps Jobs <br> Businesses Developers</div>
        </div>
    </div>
    </div>


@endsection
