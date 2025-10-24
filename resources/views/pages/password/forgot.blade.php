@extends('layouts.master')

@section('title', 'Forgot Password')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/images/bg_4.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-4">
        <h1 class="mb-2 bread">Forgot Password</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Forgot <i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="p-4 p-md-5 bg-white">
          <h2 class="mb-4 text-center">Reset your password</h2>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form method="POST" action="{{ route('password.forgot.submit') }}" novalidate>
            @csrf
            <div class="form-group">
              <label for="identifier">Email or Mobile</label>
              <input type="text" class="form-control" id="identifier" name="identifier" placeholder="e.g. johndoe@example.com or +15551234567" value="{{ old('identifier') }}" required>
            </div>
            <button type="submit" class="btn btn-primary py-3 px-5" style="background-color:#d4a574; border-color:#d4a574;">Send reset link</button>
            <p class="mt-3 mb-0">Remembered it? <a href="{{ route('login.show') }}">Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
