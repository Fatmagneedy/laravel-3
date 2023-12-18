<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed cars list</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includs.navbar')
<div class="container">
  <h2> Trashed cars list</h2>
             
  <table class="table table-striped">
    <thead>
    
      <tr>
       
        <th>Title</th>
        <th>Description</th>
        <th>Published</th>
         <th>Delete</th>
      </tr>
      
    </thead>
    <tbody>
      @foreach ($cars as $car)
      <tr>
        <td>{{$car->title}}</td>
        <td>{{$car->description}}</td>
        
        <td>@if($car->published)
            yes
            @else
            NO
            @endif
        </td>
       
        {{-- <td><a href="deletcar/{{$car->id}}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td> --}}
        <td><a href="forceDeletecars/{{$car->id}}" onclick="return confirm('Are you sure you want to delete?')">forceDelete</a></td> 
      </tr>
      @endforeach 
    </tbody>
  </table>
</div>

</body>
</html>
