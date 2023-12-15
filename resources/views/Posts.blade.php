<!DOCTYPE html>
<html lang="en">
<head>
  <title>posts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includs.navbar')
<div class="container">
  <h2>posts</h2>
             
  <table class="table table-striped">
    <thead>
    
      <tr>
       
        <th>Title</th>
        <th>Description</th>
        <th>Published</th>
      </tr>
      
    </thead>
    <tbody>
    @foreach ($post as $posts)
      <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>@if($post->published)
            yes
            @else
            NO
            @endif
        </td>
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>

</body>
</html>
