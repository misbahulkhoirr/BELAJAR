@extends('layouts.main')


@section('container')
<div class="row justify-content-center">
  <div class="col-lg-5">
    <main class="form-register">
      <form action="/register" method="post">
        @csrf
        {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
        <h1 class="h3 mb-3 fw-normal text-center">Register Form</h1>
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="Nama" required value="{{ old('name')}}">
          <label for="name">Nama</label>
          @error('name')
          <div class="invalid-feedback">
            {{ $message}}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" required value="{{ old('username')}}">
          <label for="username">Username</label>
          @error('username')
          <div class="invalid-feedback">
            {{ $message}}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email@example.com" required value="{{ old('email')}}">
          <label for="email">Email address</label>
          @error('email')
          <div class="invalid-feedback">
            {{ $message}}
          </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password">
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
            {{ $message}}
          </div>
          @enderror
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
      </form>
      <small class="d-block text-center mt-3">Already Register ? <a href="/login">Login</a></small>
    </main>
  </div>
</div>
@endsection