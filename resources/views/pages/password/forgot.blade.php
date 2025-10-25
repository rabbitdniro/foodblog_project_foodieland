<!DOCTYPE html>
<html lang="en">
  <head>
    @include('components.head')
  </head>
  <body class="forgot-page" style="margin:0; background:#fbfbfb; color:#101827; font-family:'Poppins', Arial, sans-serif;">
    @include('components.header2')

    <main>
  <section class="forgot-hero" style="padding: 140px 0 80px; position: relative; overflow: hidden; background: radial-gradient(circle at top left, rgba(0,0,0,0.05), transparent 46%);">
        <div class="container">
          <div class="row align-items-center gy-5">
            <div class="col-lg-6">
              <span class="hero-kicker">Need a hand?</span>
              <h1 class="hero-title">Reset your Foodieland password</h1>
              <p class="hero-text">Choose how you would like to receive the reset instructions. We can email you a secure link or text you a one-time code.</p>
              <div class="hero-meta">
                <span><strong>Works with:</strong> <span class="muted">Email or SMS on file</span></span>
                <span><strong>Average reset time:</strong> <span class="muted">Under 2 minutes</span></span>
              </div>
              <ul class="hero-steps">
                <li><span class="step-index">1</span> Select delivery method & confirm your contact</li>
                <li><span class="step-index">2</span> Open the link or OTP we send instantly</li>
                <li><span class="step-index">3</span> Create a fresh password and sign back in</li>
              </ul>
            </div>
            <div class="col-lg-5 offset-lg-1">
              <div class="forgot-card">
                <div class="forgot-card-head">
                  <h2>Reset access</h2>
                  <p>No worries—happens to the best of us.</p>
                </div>

                @if ($errors->any())
                  <div class="alert alert-danger" style="border-radius: 16px; padding: 14px 18px; margin-bottom: 20px;">
                    <ul class="mb-0" style="margin:0; padding-left: 18px;">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                @if (session('status'))
                  <div class="alert alert-success" style="border-radius: 16px; padding: 14px 18px; margin-bottom: 20px; background: #ecfdf3; border: 1px solid #c7f0d9; color: #166534;">
                    {{ session('status') }}
                  </div>
                @endif

                <form method="POST" action="{{ route('password.forgot.submit') }}" novalidate class="forgot-form" id="forgotForm">
                  @csrf
                  <div class="method-selector" role="radiogroup" aria-label="Select delivery method">
                    <label class="method-option">
                      <input type="radio" name="delivery_method" value="email" {{ old('delivery_method', 'email') === 'email' ? 'checked' : '' }}>
                      <span class="method-content">
                        <span class="method-title">Email reset link</span>
                        <span class="method-desc">Receive a secure link to change your password.</span>
                      </span>
                    </label>
                    <label class="method-option">
                      <input type="radio" name="delivery_method" value="sms" {{ old('delivery_method') === 'sms' ? 'checked' : '' }}>
                      <span class="method-content">
                        <span class="method-title">SMS one-time code</span>
                        <span class="method-desc">Get a 6-digit code delivered by text message.</span>
                      </span>
                    </label>
                  </div>

                  <div class="form-group">
                    <label for="identifier" id="identifierLabel">Email address</label>
                    <div class="input-wrapper">
                      <span class="icon-envelope"></span>
                      <input type="email" id="identifier" name="identifier" placeholder="name@email.com" value="{{ old('identifier') }}" required>
                    </div>
                    <small class="helper-text" id="identifierHelper">We will send a password reset link to this email.</small>
                  </div>

                  <div class="form-actions">
                    <button type="submit" class="btn-submit">Send instructions</button>
                    <a href="{{ route('login.show') }}" class="link-muted">Remembered your password? Sign in</a>
                  </div>
                </form>

                <div class="support-card">
                  <span class="support-title">Need extra help?</span>
                  <p>Our support team is online 24/7 at <a href="mailto:support@foodieland.com">support@foodieland.com</a>. You can also reach us via chat inside the Foodieland app.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    @include('components.footer')

    <style>
      .forgot-page .header2-navbar {
        position: sticky;
        top: 0;
        z-index: 1020;
      }

      .forgot-hero .hero-kicker {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 6px 16px;
        border-radius: 999px;
        background: rgba(249, 109, 0, 0.12);
        color: #f96d00;
        font-weight: 600;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        font-size: 12px;
        margin-bottom: 18px;
      }

      .hero-title {
        font-size: clamp(34px, 4vw, 46px);
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 18px;
      }

      .hero-text {
        font-size: 16px;
        color: #5c6570;
        line-height: 1.7;
        margin-bottom: 26px;
      }

      .hero-meta {
        display: flex;
        flex-direction: column;
        gap: 8px;
        font-size: 14px;
        color: #374151;
        margin-bottom: 24px;
      }

      .hero-meta .muted {
        color: #6b7280;
      }

      .hero-steps {
        list-style: none;
        padding: 0;
        margin: 28px 0 0;
        display: grid;
        gap: 12px;
      }

      .hero-steps li {
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 500;
        color: #2d3744;
      }

      .step-index {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        background: #000000;
        color: #ffffff;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 600;
      }

      .forgot-card {
        background: #ffffff;
        border-radius: 32px;
        padding: clamp(28px, 5vw, 42px);
        box-shadow: 0 24px 58px rgba(15, 15, 15, 0.12);
        border: 1px solid rgba(17, 17, 17, 0.06);
        display: flex;
        flex-direction: column;
        gap: 24px;
      }

      .forgot-card-head h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 6px;
      }

      .forgot-card-head p {
        color: #6d7682;
        font-size: 14px;
        margin: 0;
      }

      .forgot-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
      }

      .method-selector {
        display: grid;
        gap: 12px;
      }

      .method-option {
        display: flex;
        align-items: flex-start;
        gap: 14px;
        background: #ffffff;
        border: 1px solid #dce2eb;
        border-radius: 18px;
        padding: 14px 18px;
        cursor: pointer;
        transition: border-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
      }

      .method-option:hover {
        border-color: #babfcc;
        box-shadow: 0 14px 28px rgba(0, 0, 0, 0.08);
        transform: translateY(-1px);
      }

      .method-option:focus-within {
        border-color: #000000;
        box-shadow: 0 18px 36px rgba(0, 0, 0, 0.12);
      }

      .method-option input {
        appearance: none;
        width: 18px;
        height: 18px;
        border: 2px solid #c4ccd6;
        border-radius: 50%;
        margin-top: 4px;
        position: relative;
        flex-shrink: 0;
        cursor: pointer;
        transition: border-color 0.2s ease;
      }

      .method-option input:focus-visible {
        outline: 2px solid #000000;
        outline-offset: 2px;
      }

      .method-option input:checked {
        border-color: #000000;
      }

      .method-option input:checked::after {
        content: '';
        position: absolute;
        inset: 3px;
        background: #000000;
        border-radius: 50%;
      }

      .method-content {
        display: flex;
        flex-direction: column;
        gap: 4px;
      }

      .method-title {
        font-weight: 600;
        color: #151b25;
      }

      .method-desc {
        font-size: 13px;
        color: #6d7682;
        line-height: 1.5;
      }

      .method-option input:checked + .method-content .method-title {
        color: #000000;
      }

      .method-option input:checked + .method-content .method-desc {
        color: #4b5563;
      }

      .form-group label {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 10px;
        color: #232b36;
      }

      .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        border: 1px solid #dee3ea;
        border-radius: 18px;
        background: #f8fafc;
        padding: 0 18px;
        height: 56px;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
      }

      .input-wrapper:focus-within {
        border-color: #000000;
        box-shadow: 0 14px 26px rgba(0, 0, 0, 0.1);
        background: #ffffff;
      }

      .input-wrapper span[class^="icon-"] {
        color: #94a1b1;
        font-size: 18px;
        margin-right: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 20px;
      }

      .input-wrapper .icon-envelope::before {
        content: '\2709';
      }

      .input-wrapper .icon-phone::before {
        content: '\260E';
      }

      .input-wrapper input {
        flex: 1;
        border: none;
        background: transparent;
        font-size: 15px;
        color: #1e1e1e;
        font-weight: 500;
        outline: none;
      }

      .helper-text {
        font-size: 12px;
        color: #7c8796;
        margin-top: 8px;
        display: block;
      }

      .form-actions {
        display: flex;
        flex-direction: column;
        gap: 12px;
      }

      .btn-submit {
        background: #000000;
        color: #ffffff;
        border: none;
        border-radius: 28px;
        padding: 14px 20px;
        font-weight: 600;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
      }

      .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 18px 36px rgba(0, 0, 0, 0.16);
      }

      .link-muted {
        color: #6f7a88;
        font-size: 14px;
        text-align: center;
      }

      .link-muted:hover {
        color: #000000;
        text-decoration: none;
      }

      .support-card {
        border-radius: 22px;
        background: #f6f9fb;
        padding: 18px 20px;
        border: 1px solid rgba(15, 15, 15, 0.06);
      }

      .support-title {
        font-weight: 600;
        color: #111827;
        display: block;
        margin-bottom: 6px;
      }

      .support-card p {
        margin: 0;
        font-size: 13px;
        color: #5c6570;
      }

      .support-card a {
        font-weight: 600;
        color: #000000;
      }

      @media (max-width: 991.98px) {
        .forgot-hero {
          padding-top: 120px;
        }

        .forgot-page .header2-navbar {
          position: fixed;
        }
      }

      @media (max-width: 767.98px) {
        .forgot-hero {
          padding: 110px 0 70px;
        }

        .forgot-card {
          border-radius: 28px;
        }

        .method-option {
          align-items: center;
        }
      }

      @media (max-width: 575.98px) {
        .forgot-hero {
          padding: 100px 0 60px;
        }

        .hero-steps {
          gap: 10px;
        }

        .method-option {
          flex-direction: row;
        }
      }
    </style>

    <script>
      (function() {
        const methodRadios = Array.from(document.querySelectorAll('input[name="delivery_method"]'));
        const identifierInput = document.getElementById('identifier');
        const identifierLabel = document.getElementById('identifierLabel');
        const identifierHelper = document.getElementById('identifierHelper');
        const iconSpan = document.querySelector('.input-wrapper span[class^="icon-"]');

        const copy = {
          email: {
            label: 'Email address',
            placeholder: 'name@email.com',
            helper: 'We will send a password reset link to this email.',
            inputMode: 'email',
            inputType: 'email',
            icon: 'icon-envelope'
          },
          sms: {
            label: 'Mobile number',
            placeholder: '+15551234567',
            helper: 'We will send a 6-digit reset code via SMS.',
            inputMode: 'tel',
            inputType: 'tel',
            icon: 'icon-phone'
          }
        };

        function updateMethod(value) {
          const config = copy[value] || copy.email;
          identifierLabel.textContent = config.label;
          identifierInput.placeholder = config.placeholder;
          identifierInput.setAttribute('inputmode', config.inputMode);
          identifierInput.setAttribute('type', config.inputType);
          identifierHelper.textContent = config.helper;
          if (iconSpan) {
            iconSpan.className = config.icon;
          }
        }

        methodRadios.forEach(radio => {
          radio.addEventListener('change', (event) => {
            updateMethod(event.target.value);
          });
        });

        const selected = methodRadios.find(radio => radio.checked);
        updateMethod(selected ? selected.value : 'email');
      })();
    </script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
