@extends('layouts.master')

@section('title', 'Verify OTP')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('assets/images/bg_5.jpg') }}');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text align-items-end justify-content-center">
      <div class="col-md-9 ftco-animate text-center mb-4">
        <h1 class="mb-2 bread">Verify OTP</h1>
        <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>OTP <i class="ion-ios-arrow-forward"></i></span></p>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section bg-light">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="p-4 p-md-5 bg-white">
          <h2 class="mb-4 text-center">Enter 6-digit code</h2>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form method="POST" action="{{ route('otp.verify') }}" id="otpForm" novalidate>
            @csrf
            <div class="form-group">
              <label for="otp">One-Time Password</label>
              <div class="d-flex justify-content-between">
                @for ($i = 1; $i <= 6; $i++)
                  <input type="text" class="form-control text-center mx-1 otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]" style="width: 48px; height: 48px; font-size: 1.25rem;" />
                @endfor
              </div>
              <input type="hidden" name="otp" id="otpHidden">
            </div>
            <button type="submit" class="btn btn-primary py-3 px-5" style="background-color:#d4a574; border-color:#d4a574;">Verify</button>
          </form>
          <p class="mt-3 text-center"><a href="{{ route('login.show') }}">Change mobile number</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  (function() {
    const inputs = Array.from(document.querySelectorAll('.otp-input'));
    const hidden = document.getElementById('otpHidden');

    function updateHidden() {
      hidden.value = inputs.map(i => i.value.replace(/\D/g,'') || '').join('');
    }

    inputs.forEach((input, idx) => {
      input.addEventListener('input', (e) => {
        e.target.value = e.target.value.replace(/\D/g,'');
        updateHidden();
        if (e.target.value && idx < inputs.length - 1) {
          inputs[idx + 1].focus();
        }
      });
      input.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !e.target.value && idx > 0) {
          inputs[idx - 1].focus();
        }
      });
      input.addEventListener('paste', (e) => {
        const paste = (e.clipboardData || window.clipboardData).getData('text');
        if (/^\d{6}$/.test(paste)) {
          e.preventDefault();
          paste.split('').forEach((ch, i) => {
            if (inputs[i]) inputs[i].value = ch;
          });
          updateHidden();
          inputs[inputs.length - 1].focus();
        }
      });
    });

    document.getElementById('otpForm').addEventListener('submit', function(e) {
      updateHidden();
      if (!/^\d{6}$/.test(hidden.value)) {
        e.preventDefault();
        alert('Please enter a valid 6-digit code.');
      }
    });
  })();
</script>
@endsection
