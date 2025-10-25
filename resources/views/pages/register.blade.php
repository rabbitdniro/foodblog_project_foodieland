<!DOCTYPE html>
<html lang="en">
  <head>
    @include('components.head')
  </head>
  <body class="register-page" style="margin:0; background:#ffffff; color:#17212b; font-family:'Poppins', Arial, sans-serif;">
    @include('components.header2')

    <main>
      <!-- Hero Intro -->
      <section class="register-hero" style="padding: 140px 0 80px; position: relative; overflow: hidden; background: radial-gradient(circle at top left, rgba(0,0,0,0.04), transparent 46%);">
        <div class="container">
          <div class="row align-items-center gy-5">
            <div class="col-lg-6 order-lg-2">
              <span class="hero-kicker">Join the community</span>
              <h1 class="hero-title">Create your Foodieland account in minutes</h1>
              <p class="hero-text">Get unlimited access to meal plans, seasonal menus, and personalised recipe recommendations.</p>
              <div class="hero-stats">
                <div>
                  <span class="metric-value">250k+</span>
                  <span class="metric-label">Members worldwide</span>
                </div>
                <div>
                  <span class="metric-value">3k+</span>
                  <span class="metric-label">Tested recipes</span>
                </div>
              </div>
            </div>
            <div class="col-lg-5 order-lg-1">
              <div class="register-card">
                <div class="register-card-head">
                  <h2>Create account</h2>
                  <p>Fill in the details below to get started</p>
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

                <form method="POST" action="{{ route('register.submit') }}" novalidate class="register-form">
                  @csrf
                  <div class="form-group">
                    <label for="name">Full name</label>
                    <div class="input-wrapper">
                      <span class="icon-user"></span>
                      <input type="text" id="name" name="name" placeholder="e.g. Olivia Martin" value="{{ old('name') }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email address</label>
                    <div class="input-wrapper">
                      <span class="icon-envelope"></span>
                      <input type="email" id="email" name="email" placeholder="you@email.com" value="{{ old('email') }}" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="mobile">Mobile number</label>
                    <div class="input-wrapper">
                      <span class="icon-phone"></span>
                      <input type="tel" id="mobile" name="mobile" placeholder="+1 555 123 4567" value="{{ old('mobile') }}" required pattern="^\+?[0-9]{8,15}$">
                    </div>
                    <small class="helper-text">Include your country code. Numbers only.</small>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                      <span class="icon-lock"></span>
                      <input type="password" id="password" name="password" placeholder="Minimum 6 characters" required minlength="6">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password_confirmation">Confirm password</label>
                    <div class="input-wrapper">
                      <span class="icon-lock"></span>
                      <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Re-enter password" required minlength="6">
                    </div>
                  </div>

                  <div class="form-actions">
                    <button type="submit" class="btn-submit">Create account</button>
                    <p class="terms-note">By continuing, you agree to our <a href="#">Terms</a> and <a href="#">Privacy Policy</a>.</p>
                  </div>
                </form>

                <div class="divider"><span>or sign up with</span></div>

                <div class="social-signups">
                  <button type="button" class="social-btn">
                    <span class="social-icon" aria-hidden="true">G</span>
                    Google
                  </button>
                  <button type="button" class="social-btn">
                    <span class="social-icon" aria-hidden="true">f</span>
                    Facebook
                  </button>
                </div>

                <p class="signin-prompt">Already have an account? <a href="{{ route('login.show') }}">Sign in</a></p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Highlight section -->
      <section class="highlight-section" style="padding: 40px 0 90px;">
        <div class="container">
          <div class="highlight-card">
            <div class="highlight-copy">
              <h3>Weekly menus curated by chefs</h3>
              <p>Enjoy step-by-step guidance, smart grocery lists, and community support that keeps you inspired every week.</p>
            </div>
            <div class="highlight-perks">
              <div>
                <span class="perk-icon">🍳</span>
                <span class="perk-title">Live cook-alongs</span>
              </div>
              <div>
                <span class="perk-icon">📦</span>
                <span class="perk-title">Smart pantry tips</span>
              </div>
              <div>
                <span class="perk-icon">📝</span>
                <span class="perk-title">Meal tracking</span>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    @include('components.footer')

    <style>
      .register-page .header2-navbar {
        position: sticky;
        top: 0;
        z-index: 1020;
      }

      .register-hero .hero-kicker {
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
        font-size: clamp(34px, 4vw, 48px);
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 16px;
      }

      .hero-text {
        font-size: 16px;
        color: #5f6d7a;
        line-height: 1.7;
        margin-bottom: 24px;
      }

      .hero-stats {
        display: flex;
        gap: clamp(16px, 6vw, 48px);
        flex-wrap: wrap;
      }

      .hero-stats .metric-value {
        display: block;
        font-size: 28px;
        font-weight: 700;
        color: #000000;
      }

      .hero-stats .metric-label {
        font-size: 14px;
        color: #6b6b6b;
      }

      .register-card {
        background: #ffffff;
        border-radius: 32px;
        padding: clamp(28px, 5vw, 42px);
        box-shadow: 0 26px 60px rgba(15, 15, 15, 0.12);
        border: 1px solid rgba(17, 17, 17, 0.06);
      }

      .register-card-head h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 6px;
      }

      .register-card-head p {
        color: #6f6f6f;
        font-size: 14px;
        margin-bottom: 26px;
      }

      .register-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
      }

      .form-group label {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 10px;
        color: #2d2d2d;
      }

      .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        border: 1px solid #e2e6ea;
        border-radius: 18px;
        background: #f9fbfd;
        padding: 0 18px;
        height: 56px;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
      }

      .input-wrapper:focus-within {
        border-color: #111827;
        box-shadow: 0 12px 24px rgba(17, 24, 39, 0.09);
        background: #ffffff;
      }

      .input-wrapper span[class^="icon-"] {
        color: #98a7b7;
        font-size: 18px;
        margin-right: 12px;
      }

      .input-wrapper input {
        flex: 1;
        border: none;
        background: transparent;
        font-size: 15px;
        color: #1b1b1b;
        font-weight: 500;
        outline: none;
      }

      .helper-text {
        font-size: 12px;
        color: #8b98a9;
        margin-top: 8px;
        display: block;
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

      .terms-note {
        margin: 0;
        font-size: 12px;
        color: #7c8794;
      }

      .terms-note a {
        color: #000000;
        font-weight: 600;
      }

      .divider {
        position: relative;
        text-align: center;
        margin: 26px 0;
        font-size: 12px;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: #a0aebe;
      }

      .divider::before,
      .divider::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 35%;
        height: 1px;
        background: linear-gradient(90deg, rgba(0, 0, 0, 0.1), transparent);
      }

      .divider::before {
        left: 0;
      }

      .divider::after {
        right: 0;
      }

      .social-signups {
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
        border: 1px solid #e6e9ec;
        background: #ffffff;
        font-weight: 600;
        color: #344053;
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
        background: #f1f5f9;
        font-weight: 700;
        font-size: 14px;
        color: #000000;
      }

      .signin-prompt {
        text-align: center;
        font-size: 14px;
        margin-top: 24px;
      }

      .signin-prompt a {
        font-weight: 600;
        color: #000000;
      }

      .highlight-card {
        display: flex;
        flex-direction: column;
        gap: 24px;
        align-items: flex-start;
        background: #f7fbff;
        border-radius: 28px;
        padding: 32px clamp(24px, 6vw, 60px);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 18px 40px rgba(15, 15, 15, 0.08);
      }

      .highlight-copy h3 {
        font-size: clamp(24px, 3vw, 30px);
        font-weight: 700;
        margin-bottom: 12px;
      }

      .highlight-copy p {
        margin: 0;
        color: #63758a;
        line-height: 1.7;
      }

      .highlight-perks {
        display: flex;
        flex-wrap: wrap;
        gap: clamp(16px, 4vw, 40px);
      }

      .perk-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
      }

      .perk-title {
        display: block;
        font-weight: 600;
        margin-top: 8px;
        color: #1c2a39;
      }

      @media (max-width: 991.98px) {
        .register-hero {
          padding-top: 120px;
        }

        .register-page .header2-navbar {
          position: fixed;
        }

        .hero-stats {
          gap: 24px;
        }
      }

      @media (max-width: 767.98px) {
        .register-hero {
          padding: 110px 0 70px;
        }

        .register-card {
          border-radius: 28px;
        }

        .social-signups {
          grid-template-columns: 1fr;
        }

        .highlight-card {
          padding: 28px 22px;
        }
      }

      @media (max-width: 575.98px) {
        .register-hero {
          padding: 100px 0 60px;
        }

        .hero-stats .metric-value {
          font-size: 24px;
        }

        .highlight-perks {
          gap: 18px;
        }
      }
    </style>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
