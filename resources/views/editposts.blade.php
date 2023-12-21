<!DOCTYPE html>
<html lang="en">
<head>
  <title>edit posts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includs.navbar')
<div class="container">
  <h2>edit posts data</h2>
  <form action="{{ route('updateposts' ,$posts->id) }}" method="post">
    
    @csrf
    @method('put')
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="title" placeholder="title" value = "{{$posts->title}}" name="title">
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <textarea  class="form-control" row="3" id="" cols="60" name="description">{{$posts->description}}</textarea>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter image" name="image">
      @error('image')
        {{ $message }}
      @enderror
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" @checked($posts->published)> published me</label>
    </div>
    <button type="submit" class="btn btn-default">update</button>
  </form>
</div>

</body>
</html>
