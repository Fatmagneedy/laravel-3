<!DOCTYPE html>
<html lang="en">
<head>
  <title>add cars</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

@include('postnav')

<div class="container">
  <h2>add new cars data</h2>
  <form action="{{ route('storeposts') }}" method="post">
    @csrf
    
    <div class="form-group">
      <label for="title">title:</label>
      <input type="text" class="form-control" id="title" placeholder="title" name="title">
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <textarea  class="form-control" row="3" id="" cols="60" name="description"></textarea>
    </div>
    <div class="form-group">
      <label for="Auther">Auther:</label>
      <input type="text" class="form-control" id="Auther" placeholder="Auther" name="Auther">
    </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published"> published me</label>
    </div>
    
    <button type="submit" class="btn btn-default">insert</button>
  </form>
</div>

</body>
</html>
