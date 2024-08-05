<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
    <h1 class="mb-4">Upload Image</h1>
    <form action="{{ route('gallery.update',$image->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')    
        @csrf
         <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{$image->title}}" required>
            </div>
           
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Image</label>
                <input class="form-control" type="file" name="image" id="formFile" accept="image/*" required>
                <img src="{{ asset($image->image_url) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description" required>{{$image->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="tag">Tag</label>
                <input type="text" class="form-control" id="tag" name="tag" value="{{$image->tag}}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('gallery.index')}}" class="btn btn-primary">Back</a>
</form>
</div>
</body>
</html>