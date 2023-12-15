<!DOCTYPE html>
<html lang="en">
<head>
  <title>cars list</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includs.navbar')
<div class="container">
  <h2>cars list</h2>
             
  <table class="table table-striped">
    <thead>
    
      <tr>
       
        <th>Title</th>
        <th>Description</th>
        <th>Published</th>
        <th>Edit</th>
      </tr>
      
    </thead>
    <tbody>
    @foreach ($car as $cars)
      <tr>
        <td>{{$cars->title}}</td>
        <td>{{$cars->description}}</td>
        
        <td>@if($cars->published)
            yes
            @else
            NO
            @endif
        </td>
        <td><a href="editcar//{{$cars->id}}">Edit</a></td>
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>

</body>
</html>
