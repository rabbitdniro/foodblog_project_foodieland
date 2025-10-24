@extends('layouts.master')

@section('title', 'Register')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-4">
        <h1 class="mb-2 bread">Create Account</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Register <i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-10 col-lg-8 col-xl-7">
        <div class="p-4 p-md-5 bg-white">
          <h2 class="mb-4 text-center">Sign up</h2>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form method="POST" action="{{ route('register.submit') }}" novalidate>
            @csrf
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="name">Full name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="e.g. John Doe" value="{{ old('name') }}" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="e.g. johndoe@example.com" value="{{ old('email') }}" required>
              </div>
              <div class="form-group col-md-6">
                <label for="mobile">Mobile</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="e.g. +15551234567" value="{{ old('mobile') }}" required pattern="^\\+?[0-9]{8,15}$">
                <small class="form-text text-muted">Include country code, numbers only.</small>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Min 6 characters" required minlength="6">
              </div>
              <div class="form-group col-md-6">
                <label for="password_confirmation">Confirm password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password" required minlength="6">
              </div>
            </div>
            <button type="submit" class="btn btn-primary py-3 px-5" style="background-color:#d4a574; border-color:#d4a574;">Create account</button>
            <p class="mt-3 mb-0">Already have an account? <a href="{{ route('login.show') }}">Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
