<!DOCTYPE html>
<html lang="en">
  <head>
    @include('components.head')
  </head>
  <body class="login-page" style="margin:0; background:#ffffff; color:#1a1a1a; font-family:'Poppins', Arial, sans-serif;">
    @include('components.header2')

    <main>
      <!-- Hero Intro -->
      <section class="login-hero" style="padding: 140px 0 80px; position: relative; overflow: hidden; background: radial-gradient(circle at top right, rgba(249,109,0,0.08), transparent 45%);">
        <div class="container">
          <div class="row align-items-center gy-5">
            <div class="col-lg-6">
              <span class="hero-kicker">Welcome back</span>
              <h1 class="hero-title">Sign in to continue exploring Foodieland recipes</h1>
              <p class="hero-text">Access your saved favourites, personalised meal plans, and exclusive cooking classes tailored just for you.</p>
              <ul class="hero-benefits">
                <li><span class="icon-check"></span> Stay in sync across devices</li>
                <li><span class="icon-check"></span> Unlock weekly chef tips and masterclasses</li>
                <li><span class="icon-check"></span> Save recipes and create shopping lists instantly</li>
              </ul>
            </div>
            <div class="col-lg-5 offset-lg-1">
              <div class="login-card">
                <div class="login-card-head">
                  <h2>Sign in</h2>
                  <p>Enter your details to continue</p>
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

                <form method="POST" action="{{ route('login.submit') }}" novalidate class="login-form">
                  @csrf
                  <div class="form-group">
                    <label for="login">Email or mobile number</label>
                    <div class="input-wrapper">
                      <span class="icon-envelope"></span>
                      <input type="text" id="login" name="login" placeholder="name@email.com or +15551234567" value="{{ old('login') }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                      <span class="icon-lock"></span>
                      <input type="password" id="password" name="password" placeholder="Your password" required minlength="6">
                    </div>
                  </div>

                  <div class="form-actions">
                    <button type="submit" class="btn-submit">Continue</button>
                    <a href="{{ route('password.forgot.show') }}" class="link-muted">Forgot password?</a>
                  </div>
                </form>

                <div class="divider"><span>or continue with</span></div>

                <div class="social-logins">
                  <button type="button" class="social-btn">
                    <span class="social-icon" aria-hidden="true">G</span>
                    Google
                  </button>
                  <button type="button" class="social-btn">
                    <span class="social-icon" aria-hidden="true">f</span>
                    Facebook
                  </button>
                </div>

                <p class="signup-prompt">Don’t have an account? <a href="{{ route('register.show') }}">Create one</a></p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Trust badge section -->
      <section class="trust-section" style="padding: 40px 0 100px;">
        <div class="container">
          <div class="trust-card">
            <h3>Loved by over 250k home cooks</h3>
            <div class="trust-metrics">
              <div>
                <span class="metric-value">4.9<span>/5</span></span>
                <span class="metric-label">Average rating</span>
              </div>
              <div>
                <span class="metric-value">2.5k+</span>
                <span class="metric-label">Curated recipes</span>
              </div>
              <div>
                <span class="metric-value">24/7</span>
                <span class="metric-label">Community support</span>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    @include('components.footer')

    <style>
      .login-page .header2-navbar {
        position: sticky;
        top: 0;
        z-index: 1020;
        background: #000;
      }

      .login-hero .hero-kicker {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 6px 14px;
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
        font-size: clamp(34px, 4vw, 48px);
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 16px;
      }

      .hero-text {
        font-size: 16px;
        color: #666666;
        line-height: 1.7;
        margin-bottom: 26px;
      }

      .hero-benefits {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        gap: 10px;
      }

      .hero-benefits li {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 500;
        color: #3a3a3a;
      }

      .hero-benefits .icon-check {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #22c55e;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 10px;
      }

      .login-card {
        background: #ffffff;
        border-radius: 32px;
        padding: clamp(28px, 5vw, 42px);
        box-shadow: 0 24px 60px rgba(15, 15, 15, 0.12);
        border: 1px solid rgba(22, 22, 22, 0.05);
      }

      .login-card-head h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 6px;
      }

      .login-card-head p {
        color: #6f6f6f;
        font-size: 14px;
        margin-bottom: 28px;
      }

      .login-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
      }

      .form-group label {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 10px;
        color: #303030;
      }

      .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        border: 1px solid #e6e6e6;
        border-radius: 18px;
        background: #f9f9f9;
        padding: 0 18px;
        height: 56px;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
      }

      .input-wrapper:focus-within {
        border-color: #000000;
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
        background: #ffffff;
      }

      .input-wrapper span[class^="icon-"] {
        color: #b0b0b0;
        font-size: 18px;
        margin-right: 12px;
      }

      .input-wrapper input {
        flex: 1;
        border: none;
        background: transparent;
        font-size: 15px;
        color: #1f1f1f;
        font-weight: 500;
        outline: none;
      }

      .form-actions {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 6px;
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
        color: #6f6f6f;
        font-size: 14px;
        text-align: center;
      }

      .link-muted:hover {
        color: #000000;
        text-decoration: none;
      }

      .divider {
        position: relative;
        text-align: center;
        margin: 28px 0;
        font-size: 12px;
        letter-spacing: 0.2em;
        text-transform: uppercase;
        color: #a1a1a1;
      }

      .divider::before,
      .divider::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 36%;
        height: 1px;
        background: linear-gradient(90deg, rgba(0, 0, 0, 0.1), transparent);
      }

      .divider::before {
        left: 0;
      }

      .divider::after {
        right: 0;
      }

      .social-logins {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 12px;
      }

      .social-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 20px;
        border: 1px solid #e8e8e8;
        background: #ffffff;
        font-weight: 600;
        color: #333333;
        transition: border-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease;
      }

      .social-btn:hover {
        transform: translateY(-2px);
        border-color: #000000;
        box-shadow: 0 16px 28px rgba(0, 0, 0, 0.08);
      }

      .social-icon {
        width: 26px;
        height: 26px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #f1f1f1;
        font-weight: 700;
        font-size: 14px;
        color: #000000;
      }

      .signup-prompt {
        text-align: center;
        font-size: 14px;
        margin-top: 26px;
      }

      .signup-prompt a {
        font-weight: 600;
        color: #000000;
      }

      .trust-card {
        display: flex;
        flex-direction: column;
        gap: 22px;
        align-items: center;
        background: #fafafa;
        border-radius: 28px;
        padding: 32px clamp(24px, 6vw, 60px);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 18px 40px rgba(15, 15, 15, 0.08);
      }

      .trust-card h3 {
        font-size: clamp(22px, 3vw, 28px);
        font-weight: 700;
        margin: 0;
      }

      .trust-metrics {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 24px;
        width: 100%;
      }

      .metric-value {
        display: block;
        font-size: 28px;
        font-weight: 700;
        color: #000000;
      }

      .metric-value span {
        font-size: 16px;
        font-weight: 600;
        color: #6b6b6b;
        margin-left: 4px;
      }

      .metric-label {
        display: block;
        color: #6b6b6b;
        font-size: 14px;
        margin-top: 4px;
      }

      @media (max-width: 991.98px) {
        .login-hero {
          padding-top: 120px;
        }

        .hero-benefits {
          grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        .login-card {
          margin-top: 12px;
        }

        .login-page .header2-navbar {
          position: fixed;
        }
      }

      @media (max-width: 767.98px) {
        .login-hero {
          padding: 110px 0 70px;
        }

        .login-card {
          border-radius: 26px;
        }

        .social-logins {
          grid-template-columns: 1fr;
        }

        .trust-card {
          padding: 28px 22px;
        }
      }

      @media (max-width: 575.98px) {
        .login-hero {
          padding: 100px 0 60px;
        }

        .hero-benefits {
          gap: 8px;
        }

        .metric-value {
          font-size: 24px;
        }
      }
    </style>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
