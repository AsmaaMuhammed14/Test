<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>twitter</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <style type="text/css" src=""></style>
    <!--  Styles -->
        <!-- <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
                margin-bottom: 30px;
            }
        </style>  -->
    </head>
    <body>
        <div class="panel panel-default"> 
            <div class="panel-heading">
                <a href="{{url('/profile')}}/{{Auth::user()->slug}}">profile</a>

                
            </div>
        </div>
       <div class="container">
                
            <div class="col-md-2">
                <div class="panel panel-default"> 
                    <div class="panel-heading">sidebar</div>
                </div>
            </div>  
            <div class="col-md-8">      
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">home</div>
                        <div class="panel-heading   "> 
                            <button  class="tweet " style=" background-color: #1E90FF; font-size: 25px ; text-decoration-color:   #FFFAF0; color:     #FFFAF0;" >Tweet</button><hr>
                                                          
                             
                        <div class="panel-body">
                            @foreach( $posts as $post)
                            <div class="panel-heading">                        

                            <div  class="col-lg-10">
                                <div class="row" >
                                    <div class="col-md-8 pull-left">
                                        <img src="{{url('../')}}/public/img/{{$post->user->pic}}"
                                        width="30px" height="30px" class="img-rounded"/>
                                        <h3 style="margin:0px;"> <a href="{{url('/profile')}}/{{$post->slug}}">{{$post->user->name}}
                                          </a></h3>
                                    </div>
                                    <div class="col-md-7 pull-left">                                                                
                                        <h3>{{$post->content}}</h3><br>
                                        <div class="col-md-7 pull-left">                                                          
                                            <a href="#" class="btn "><img width="20px" height="20px" src="{{url('../')}}/img/favorite.png"></a>                             
                                            <a href="#" class="btn btn-defult"><img width="20px" height="20px" src="{{url('../')}}/img/comment.png"></a>                                                              
                                        </div>  
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
            <div class="col-md-2 pull-right" >
                <div class="panel panel-default"> 
                    <div class="panel-heading">© 2017 Twitter About Help Center Terms Privacy <br>
                    policy Cookies Ads <br>info Brand Blog <br>Status Apps Jobs <br> Businesses Developers</div>
                </div>
            </div>
            </div>

                    </div>


                </div>
            </div>
        </div>
    </div>

                <!-- Footer -->
                <!-- <footer>
                    <div class="row">
                        <div class="col-lg-12">
                            <p>Copyright &copy; Your Website 2014</p>
                        </div>
                    </div>
                </footer> -->
            </div>

        </div>
        @include('tweet')
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script type="text/javascript">
            $(".tweet").click(function(){
                console.log('hi')
                $("#tweet").modal();
            });
        </script>

</body>
</html>

