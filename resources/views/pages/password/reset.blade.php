@extends('layouts.master')

@section('title', 'Reset Password')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/images/bg_6.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-4">
        <h1 class="mb-2 bread">Set New Password</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Reset <i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="p-4 p-md-5 bg-white">
          <h2 class="mb-4 text-center">Choose a new password</h2>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form method="POST" action="{{ route('password.reset.submit', ['token' => $token]) }}" novalidate>
            @csrf
            <div class="form-group">
              <label for="password">New password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Min 6 characters" required minlength="6">
            </div>
            <div class="form-group">
              <label for="password_confirmation">Confirm new password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password" required minlength="6">
            </div>
            <button type="submit" class="btn btn-primary py-3 px-5" style="background-color:#d4a574; border-color:#d4a574;">Update password</button>
            <p class="mt-3 mb-0"><a href="{{ route('login.show') }}">Back to Sign in</a></p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
