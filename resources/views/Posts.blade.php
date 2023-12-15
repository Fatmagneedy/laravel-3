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
@include('postnav')
<div class="container">
  <h2>posts</h2>
             
  <table class="table table-striped">
    <thead>
    
      <tr>
       
        <th>Title</th>
        <th>Description</th>
        <th>Auther</th>
        <th>created_at</th>
        <th>Published</th>
        <th>Edit</th>
        <th>Show</th>
      </tr>
      
    </thead>
    <tbody>
    @foreach ($post as $posts)
      <tr>
        <td>{{$posts->title}}</td>
        <td>{{$posts->description}}</td>
        <td>{{$posts->Auther}}</td>
        <td>{{$posts->created_at}}</td>
        <td>@if($posts->published)
            yes
            @else
            NO
            @endif
        </td>
        <td><a href="editposts/{{$posts->id}}">Edit</a></td>
        <td><a href="showposts/{{$posts->id}}">Show</a></td>
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>

</body>
</html>
