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

<div class="container">
    <ul class="list-group">

        @if(!empty($data))


            @foreach($data as $key => $tweet)

                <br>

                <li class="list-group-item">

                    <h3>{{$tweet['text']}}
                        <i class="glyphicon glyphicon-heart"></i>{{$tweet['favorite_count']}}

                        <i class="glyphicon glyphicon-repeat"></i>{{$tweet['retweet_count']}}


                    </h3>

                    @if(!empty($tweet['extended_entities']['media']))
                        @foreach($tweet['extended_entities']['media'] as $i)
                            <img src="{{$i['media_url_https']}}" style="width:100px;">
                        @endforeach
                    @endif

                </li>


            @endforeach



        @else

            <p>No Tweets Found</p>

        @endif

    </ul>
</div>


</body>
</html>