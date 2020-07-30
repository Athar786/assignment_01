@extends('layouts.app')

@section('content')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
  <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>My Videos</h1>      
    <p>Some Videos that represents "Project"...</p>
  </div>
</div>
  
<div class="container-fluid bg-3 text-center">    
  <h3>Some of my Work</h3><br>
  <div class="row">
    <div class="col-sm-3">
      @foreach($selectvideo as $row)
      <a href="#"><h4>{{$row->v_title}}</h4></a> 
      <video height="500px" controls>
      <source src="{{ URL::to('/') }}/videos/{{ $row->video }}" type="video/mp4" size="576"></video></br>
      <p>{{$row->body}}</p>
      <div class="interaction">
      <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $row->id)->first() ? Auth::user()->likes()->where('post_id', $row->id)->first()->like == 1 ? 'You like this post' : 'Like' : 'Like'  }}</a> |
      <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $row->id)->first() ? Auth::user()->likes()->where('post_id', $row->id)->first()->like == 0 ? 'You dont like this post' : 'Dislike' : 'Dislike'  }}</a>
    </div>
    <hr>
    
      <h4>Add Comments</h4>
     <form action="{{ route('comments.store') }}" method="post">
       @csrf
       <div class="form-group">
          <textarea class="form-control" name="body"></textarea>
          <input type="hidden" name="post_id" value="{{ $row->id }}" />
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-success" value="Add Comment" />
          </div>
     </form>


      </div>


@endforeach
</div><br>

<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/like.js') }}"></script>
    <script>
      var token = '{{ Session::token() }}';
      var urlLike = '{{ route('like') }}';
    </script>
</body>
</html>
@endsection

