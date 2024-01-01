<!DOCTYPE html>
<html lang="en">
<head>
  <title>edit cars</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
@include('includs.navbar')
<div class="container">
  <h2>edit cars data</h2>
  <form action="{{ route('updatecar' ,$car->id)}}" method="post" enctype="multipart/form-data">
  
    @csrf
    @method('put')
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="text" class="form-control" id="title" placeholder="title" value = "{{$car->title}}" name="title">
    </div>
    <div class="form-group">
      <label for="description">description:</label>
      <textarea  class="form-control" row="3" id="" cols="60" name="description">{{$car->description}}</textarea>
    </div>
    
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" placeholder="Enter image"  value="{{old('image')}}"name="image">
      <br>
      
     <img src="{{ asset('assets/img/'.$car->image) }}" alt="image" style="width: 200px">
      
      @error('image')
        {{ $message }}
      @enderror
    </div>
    

    

    <div class="form-group">
      <label for="cat_id">Category</label>
      <select name="cat_id" class="form-control">
          @foreach($categories as $category)
              <option value="{{ $category->cat_name }}" @if(isset($car) && $car->cat_id == $category->id) selected @endif>
                  {{ $category->name }}
              </option>
          @endforeach
      </select>
  </div>
    <div class="checkbox">
      <label><input type="checkbox" name="published" @checked($car->published)> published me</label>
    </div>
    <button type="submit" class="btn btn-default">update</button>
  </form>
</div>

</body>
</html>
