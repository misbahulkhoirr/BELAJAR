{{-- @dd($post); = vardump --}}

@extends('layouts.main')
@section('container')
<h1 class="mb-3 text-center">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/blog">
      {{-- nyisipin url kategori = blog?kategori= --}}
      @if(request('kategori'))
      <input type="hidden" name="kategori" value="{{ request('kategori') }}">
      @endif
      @if(request('user'))
      <input type="hidden" name="user" value="{{ request('user') }}">
      @endif
      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Search</button>
      </div>
    </form>
  </div>
</div>

@if ($post->count())
<div class="card mb-3">
  <div style="max-height: 400px; overflow:hidden;">
    @if ($post[0]->image)
        <img src="{{ asset('storage/'.$post[0]->image)}}" class="card-img-top" alt="{{ $post[0]->kategori->name }}">
  </div>
    @else
      <img src="https://source.unsplash.com/1200x400?{{ $post[0]->kategori->name }}" class="card-img-top" alt="{{ $post[0]->kategori->name }}">
    @endif
  <div class="card-body text-center">
    <h4 class="card-title"><a href="/post/{{ $post[0]->slug }}" class="text-decoration-none text-dark">{{ $post[0]->title }} </a></h4>
    <p>
      <small> By : <a href="/blog?user={{ $post[0]->user->username }}" class="text-decoration-none">{{ $post[0]->user->name }}</a> in 
        {{-- <a href="/kategoris/{{ $post[0]->kategori->slug }}" class="text-decoration-none">{{ $post[0]->kategori->name }}</a>  --}}
        <a href="/blog?kategori={{ $post[0]->kategori->slug }}" class="text-decoration-none">{{ $post[0]->kategori->name }}</a>
        {{ $post[0]->created_at->diffForHumans() }}
  </p>
  <p class="card-text">{{ $post[0]->excerpt }}</p>
  <a href="/post/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary"><i>Read more</i> </a>
</div>
</div>

<div class="container">
  <div class="row">
    @foreach ($post->skip(1) as $posts)
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.5)">
          {{-- <a href="/kategoris/{{ $post->kategori->slug }}" class="text-white text-decoration-none">{{ $post->kategori->name }}</a> --}}
          <a href="/blog?kategori={{ $posts->kategori->slug }}" class="text-white text-decoration-none">{{ $posts->kategori->name }}</a>
        </div>

        @if ($posts->image)
            <img src="{{ asset('storage/'.$posts->image)}}" class="card-img-top" alt="{{ $posts->kategori->name }}">
        @else
        <img src="https://source.unsplash.com/500x400?{{ $posts->kategori->name }}" class="card-img-top" alt="{{ $posts->kategori->name }}">
        @endif

        <div class="card-body">
          <h4 class="card-title"><a href="/post/{{ $posts->slug }}" class="text-decoration-none text-dark">{{ $posts->title }} </a></h4>
          <p>
            <small> By : <a href="/blog?user={{ $posts->user->username }}" class="text-decoration-none">{{ $posts->user->name }}</a>  {{ $posts->created_at->diffForHumans() }}
        </p>
        <p>{{ $posts->excerpt }}</small></p>
          <a href="/post/{{ $posts->slug }}" class="btn btn-primary">Read more</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@else
<p class="text-center fs-4">No Post</p>
@endif

{{ $post->links() }}

@endsection


{{-- sebelum ada  tombol search --}}
{{-- @if ($post->count())
<div class="card mb-3">
  <img src="https://source.unsplash.com/1200x400?{{ $post[0]->kategori->name }}" class="card-img-top" alt="{{ $post[0]->kategori->name }}">
  <div class="card-body text-center">
    <h4 class="card-title"><a href="/post/{{ $post[0]->slug }}" class="text-decoration-none text-dark">{{ $post[0]->title }} </a></h4>
    <p>
      <small> By : <a href=" /user/{{ $post[0]->user->username }}" class="text-decoration-none">{{ $post[0]->user->name }}</a> in <a href="/kategoris/{{ $post[0]->kategori->slug }}" class="text-decoration-none">{{ $post[0]->kategori->name }}</a> {{ $post[0]->created_at->diffForHumans() }}
  </p>
  <p>{{ $post[0]->excerpt }}</small></p>
  <p class="card-text">{{ $post[0]->excerpt }}</p>
  <a href="/post/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary"><i>Read more</i> </a>
</div>
</div>

<div class="container">
  <div class="row">
    @foreach ($post->skip(1) as $post)
        
    
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="position-absolute px-3 py-2" style="background-color: rgba(0, 0, 0, 0.5)"><a href="/kategoris/{{ $post->kategori->slug }}" class="text-white text-decoration-none">{{ $post->kategori->name }}</a></div>
        <img src="https://source.unsplash.com/500x400?{{ $post->kategori->name }}" class="card-img-top" alt="{{ $post->kategori->name }}">
        <div class="card-body">
          <h4 class="card-title"><a href="/post/{{ $post->slug }}" class="text-decoration-none text-dark">{{ $post->title }} </a></h4>
          <p>
            <small> By : <a href=" /user/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a>  {{ $post->created_at->diffForHumans() }}
        </p>
        <p>{{ $post->excerpt }}</small></p>
          <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read more</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@else
<p class="text-center fs-4">No Post</p>
@endif
@endsection --}}