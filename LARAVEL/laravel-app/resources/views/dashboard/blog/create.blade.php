@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create new post</h1>
  </div>

  <div class="col-lg-8 mb-3">
    <form method="post" action="/dashboard/blog" enctype="multipart/form-data">
      @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" autofocus value="{{ old ('title')}}">
          @error('title')
          <div class="invalid-feedback">
            {{ $message}}
          </div>
          @enderror
        </div>

        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old ('slug')}}">
            @error('slug')
            <div class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
          <label for="kategori" class="form-label">Kategori</label>
          <select class="form-select" name="kategori_id">
            @foreach ($kategori as $kategori) 
            @if (old('kategori_id')==$kategori->id)
            <option value="{{ $kategori->id }}" selected>{{ $kategori->name }}</option>
            @else
            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
            @endif
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="image" class="form-label">Upload image</label>
          <img class="img-preview img-fluid mb-3 col-sm-5">
          <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
            <p class="text-danger">
              {{ $message}}
            </p>
            @enderror
          <input id="body" type="hidden" name="body" value="{{ old ('body') }}">
          <trix-editor input="body"></trix-editor>
      </div>
       
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
  </div>

<script>
  //membuat slog otomatis
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change',function(){
        fetch('/dashboard/blogs/createSlug?title=' +title.value) //variable blogs sama dengan tabel database // setting route dan model
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });

    //mematikan fungsi upload file pada text-editor
    document.addEventListener('trix-file-accept', function(e){
      e.preventDefault();
    })

    //preview image
    function previewImage(){
      const image= document.querySelector('#image');
      const imgPreview= document.querySelector('.img-preview');

      imgPreview.style.display='block';

      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload=function(oFRevent){
        imgPreview.src=oFRevent.target.result;
      }
    }
</script>
  @endsection