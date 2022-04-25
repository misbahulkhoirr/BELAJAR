@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kategori Blog</h1>
  </div>

      @if (session()->has('success'))
      <div class="alert alert-success col-lg-10" role="alert">
        {{ session('success') }}
      </div>
      @endif

  <div class="table-responsive col-lg-10">
    <a href="/dashboard/kategori/create" class="btn btn-primary mb-3">Create new kategori</a>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Kategori</th>
          <th scope="col">Slug Kategori</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kategori as $row)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $row->name }}</td>
          <td>{{ $row->slug }}</td>
          <td>
            <a href="/dashboard/kategori/{{ $row->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/kategori/{{ $row->slug }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus ?')"><span data-feather="x-circle"></span></button>
            </form>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

@endsection
