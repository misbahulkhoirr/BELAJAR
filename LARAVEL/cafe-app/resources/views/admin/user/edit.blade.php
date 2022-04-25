@extends('admin.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">{{ $title }}</h1>
  </div>
<div class="col-lg-6 mb-3">
<form action="/admin/user/{{ $user->id }}" method="POST">
  @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" autofocus value="{{ old ('name',$user->name)}}">
        @error('name')
        <div class="invalid-feedback">
          {{ $message}}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" autofocus value="{{ old ('username',$user->username)}}">
        @error('username')
        <div class="invalid-feedback">
          {{ $message}}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus value="{{ old ('email',$user->email)}}">
        @error('email')
        <div class="invalid-feedback">
          {{ $message}}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autofocus value="{{ old ('password',$user->password)}}">
        @error('password')
        <div class="invalid-feedback">
          {{ $message}}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="akses_level" class="form-label">Akses level</label>
        <select class="form-select" name="akses_level">
          
          @if ($user->akses_level==0)
          <option value="{{ $user->akses_level}}" selected>Admin</option>
          <option value="1">User</option>
          @else
          <option value="{{ $user->akses_level}}" selected>User</option>
          <option value="0">Admin</option>
          @endif
         
        </select>
      </div>
    <button type="submit" class="btn btn-primary mt-2 mb-3">Save</button>
  </form>
</div>    
@endsection