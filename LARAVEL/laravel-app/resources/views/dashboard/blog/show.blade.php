@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            
            <a href="/dashboard/blog" class="btn btn-success"><span data-feather="arrow-left"></span> Back to post</a>
            <a href="/dashboard/blog/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            
            <form action="/dashboard/blog/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus ?')"><span data-feather="x-circle"></span> Delete</button>
            </form>
            <div style="max-height:350px; overflow:hidden">
                @if ($post->image)
                    <img src="{{ asset('storage/'.$post->image)}}" class="img-fluid mt-3" alt="{{ $post->kategori->name }}">
            </div>
            @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->kategori->name }}" class="img-fluid mt-3" alt="{{ $post->kategori->name }}">
            @endif
            <article class="my-3 fs-5">
                <p>{!! $post->body !!}</p>
            </article>
        </div>
    </div>
</div>

@endsection
