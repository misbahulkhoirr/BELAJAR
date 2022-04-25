
@extends('layouts.main')
@section('container')
<h1>Halaman Kategori Blog</h1>



<div class="container">
    <div class="row">
        @foreach ($kategori as $kategori)
        <div class="col-md-4">
            <a href="/blog?kategori={{ $kategori->slug }}">
            <div class="card bg-dark text-white">
                <img src="https://source.unsplash.com/500x500?{{ $kategori->name }}" class="card-img" alt="{{$kategori->name}}">
                <div class="card-img-overlay d-flex align-items-center p-0">
                  <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0,0.5)">{{ $kategori->name }}</h5>
                </div>
              </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection