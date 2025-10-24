@extends('layouts.master')

@section('title', 'Login')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-4">
        <h1 class="mb-2 bread">Login</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Login <i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="p-4 p-md-5 bg-white">
          <h2 class="mb-4 text-center">Sign in</h2>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form method="POST" action="{{ route('login.submit') }}" novalidate>
            @csrf
            <div class="form-group">
              <label for="login">Email or Mobile</label>
              <input type="text" class="form-control" id="login" name="login" placeholder="e.g. johndoe@example.com or +15551234567" value="{{ old('login') }}" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Your password" required minlength="6">
            </div>
            <button type="submit" class="btn btn-primary py-3 px-5" style="background-color:#d4a574; border-color:#d4a574;">Continue</button>
            <p class="mt-3 mb-0"><a href="{{ route('password.forgot.show') }}">Forgot password?</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
