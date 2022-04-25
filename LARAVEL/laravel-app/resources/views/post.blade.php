@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <p>By : <a href="/blog?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in 
                {{-- <a href="/kategoris/{{ $post->kategori->slug }}" class="text-decoration-none">{{ $post->kategori->name }}</a> --}}
                <a href="/blog?kategori={{ $post->kategori->slug }}" class="text-decoration-none">{{ $post->kategori->name }}</a>
            </p>
            <div style="max-height: 400px; overflow:hidden;">
                @if ($post->image)
                    <img src="{{ asset('storage/'.$post->image)}}" class="img-fluid" alt="{{ $post->kategori->name }}">
              </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->kategori->name }}" class="img-fluid" alt="{{ $post->kategori->name }}">
                @endif

            <article class="my-3 fs-5">
                <p>{!! $post->body !!}</p>
            </article>
            <p><a href="/blog">Back to post</a></p>
        </div>
    </div>
</div>

@endsection