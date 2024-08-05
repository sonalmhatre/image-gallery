@extends('layout.master')
@section('content')

<div class="row">
    <a href="{{ route('gallery.create') }}" class="btn-sm btn-primary">Upload New Image</a>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @foreach($images as $image)
      
        <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
              <a href="{{ asset($image->image_url) }}" class="fancybox" rel="ligthbox">
                <img class="card-img-top" src="{{ asset($image->image_url) }}" alt="Card image cap" height="200px">
                </a>
                <div class="card-body">
                  <p class="card-text">{{$image->title}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <a href="{{ route('gallery.edit', $image->id) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                    <form action="{{ route('gallery.destroy', $image->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                      
                      
                    </div>
                    <small class="text-muted">{{$image->tag}}</small>
                  </div>
                </div>
              </div>
            </div>

    @endforeach
    
</div>

@endsection


<!-- 
</div>

</body>
</html> -->