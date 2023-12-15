<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show posts</title>
</head>
<body>
    <h1>{{$posts->title}}</h1>
    
    <h5>{{$posts->created_at}}</h5>
    <h5>{{$posts->updated_at}}</h5>
    <p>{{$posts->description}}</p>
</body>
</html>