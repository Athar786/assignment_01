@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

  <h2>Upload Video</h2>

  <form action="{{route('uploadvideo.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="v_title">Title:</label>
      <input type="text" class="form-control" id="v_title" placeholder="Enter Title" name="v_title">
    </div>

   
     <div class="form-group">
      <label for="v_category">Category:</label>
      <select id="v_category" name = "v_category" class="form-control">
       
        <option value="science">Science & Technology</option>
        <option value="comedy">Comedy</option>
        <option value="education">Education</option>
        <option value="entertainment">Entertainment</option>
        <option value="sport">Sport</option>
        <option value="pb">People & Blogs</option>
        <option value="news">News & Politics</option>
        <option value="game">Game</option>
        <option value="b&f">Beauty & Fashion</option>
        <option value="film">Film & Animation</option>
      </select>
    </div>

     <div class="form-group">
      <label for="v_description">Description:</label>
      <textarea class="form-control" id="v_description" placeholder="Enter Description" name="v_description"></textarea>
    </div>

    <div class="form-group">
      <label for="video">Video Upload:</label>
      <input type="file" class="form-control" id="video" name="video">
    </div>

    <div class="form-group">
      <label for="image">Thumbnail Image Upload:</label>
      <input type="file" class="form-control" id="image" name="image">
    </div>


    <input type="submit" name="submit" value="submit" class="btn btn-success"/>
</form>
</div>
</body>
</html
@endsection