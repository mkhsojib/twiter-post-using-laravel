<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MyTweets</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">MyTweets</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>

            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<br>

<div class="container">

    <br><br>
    <form class="well" action="{{route('post.tweet')}}" method="post" enctype="multipart/form-data">

        {{csrf_field()}}

        @if(count($errors) > 0)


            @foreach($errors->all() as $error)

                <div class="alert alert-danger">

                    {{$error}}

                </div>


            @endforeach

        @endif


        <div class="form-group">

            <label> Tweet Text</label>
            <input type="text" name="tweet" class="form-control">

        </div>

        <div class="form-group">

            <label> Upload Images</label>
            <input type="file" name="images[]" multiple class="form-control">

        </div>

        <div class="form-group">

            <button class="btn btn-success">Create Tweet</button>

        </div>


    </form>


    @if(!empty($data))


        @foreach($data as $key => $tweet)



            <div class="well">

                <br>


                <h3>{{$tweet['text']}}
                    <i class="glyphicon glyphicon-heart"></i>{{$tweet['favorite_count']}}

                    <i class="glyphicon glyphicon-repeat"></i>{{$tweet['retweet_count']}}


                </h3>

                @if(!empty($tweet['extended_entities']['media']))
                    @foreach($tweet['extended_entities']['media'] as $i)
                        <img src="{{$i['media_url_https']}}" style="width:100px;">
                    @endforeach
                @endif


            </div>

        @endforeach



    @else

        <p>No Tweets Found</p>

    @endif


</div>


</body>
</html>