<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trashed posts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('postnav')
<div class="container">
  <h2> Trashed posts</h2>
             
  <table class="table table-striped">
    <thead>
    
      <tr>
       
        <th>Title</th>
        <th>Description</th>
        <th>Auther</th>
        <th>created_at</th>
        <th>Published</th>
        <th>Delete</th>
      </tr>
      
    </thead>
    <tbody>
    @foreach ($posts as $post)
      <tr>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->Auther}}</td>
        <td>{{$post->created_at}}</td>
        <td>@if($post->published)
            yes
            @else
            NO
            @endif
        </td>

     {{-- <td><a href="deleteposts/{{$post->id}}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td> --}}
        <td><a href="forceDeleteposts/{{$post->id}}" onclick="return confirm('Are you sure you want to delete?')">forceDelete</a></td>

      </tr>
      @endforeach 
    </tbody>
  </table>
</div>

</body>
</html>
