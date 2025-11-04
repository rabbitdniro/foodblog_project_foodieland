<!DOCTYPE html>
<html lang="en">
  <head>
    @include('components.head')
  </head>
  <body class="otp-page" style="margin:0; background:#fbfbfb; color:#101827; font-family:'Poppins', Arial, sans-serif;">
    @include('components.header2')

    <main>
      <section class="otp-hero" style="padding: 140px 0 80px; position: relative; overflow: hidden; background: radial-gradient(circle at top left, rgba(0,0,0,0.05), transparent 46%);">
        <div class="container">
          <div class="row align-items-center gy-5">
            <div class="col-lg-6">
              <span class="hero-kicker">Secure verification</span>
              <h1 class="hero-title">Enter the 6-digit code we just sent</h1>
              <p class="hero-text">We use one-time passwords to keep your account safe. Check your inbox or SMS for the code and enter it below within 5 minutes.</p>
              <div class="hero-meta">
                <span><strong>Code sent to:</strong> <span class="muted">{{ old('identifier', '•••• •••• 4567') }}</span></span>
                <span><strong>Expires in:</strong> <span class="countdown" id="otpCountdown">04:59</span></span>
              </div>
            </div>
            <div class="col-lg-5 offset-lg-1">
              <div class="otp-card">
                <div class="otp-card-head">
                  <h2>Verify identity</h2>
                  <p>Type each digit into the boxes. Paste is supported.</p>
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

                <form method="POST" action="{{ route('otp.verify') }}" id="otpForm" novalidate class="otp-form">
                  @csrf
                  <div class="form-group">
                    <label class="form-label">One-time password</label>
                    <div class="otp-grid">
                      @for ($i = 1; $i <= 6; $i++)
                        <input type="text" class="otp-input" maxlength="1" inputmode="numeric" pattern="[0-9]" aria-label="Digit {{ $i }}" />
                      @endfor
                    </div>
                    <input type="hidden" name="otp" id="otpHidden">
                  </div>

                  <div class="form-actions">
                    <button type="submit" class="btn-submit">Verify code</button>
                    <a href="{{ route('login.show') }}" class="link-muted">Use a different number or email</a>
                  </div>
                </form>

                <div class="resend-row">
                  <span>Didn’t receive the code?</span>
                  <button type="button" class="link-button" id="resendOtp">Resend OTP</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    @include('components.footer')

    <style>
      .otp-page .header2-navbar {
        position: sticky;
        top: 0;
        z-index: 1020;
      }

      .otp-hero .hero-kicker {
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
        color: #5f6b78;
        line-height: 1.7;
        margin-bottom: 24px;
      }

      .hero-meta {
        display: flex;
        flex-direction: column;
        gap: 8px;
        font-size: 14px;
        color: #374151;
      }

      .hero-meta .muted {
        color: #6b7280;
      }

      .otp-card {
        background: #ffffff;
        border-radius: 32px;
        padding: clamp(28px, 5vw, 42px);
        box-shadow: 0 26px 60px rgba(15, 15, 15, 0.12);
        border: 1px solid rgba(17, 17, 17, 0.06);
        display: flex;
        flex-direction: column;
        gap: 24px;
      }

      .otp-card-head h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 6px;
      }

      .otp-card-head p {
        color: #6f7682;
        font-size: 14px;
        margin: 0;
      }

      .otp-form {
        display: flex;
        flex-direction: column;
        gap: 22px;
      }

      .form-label {
        font-weight: 600;
        font-size: 14px;
        margin-bottom: 12px;
        color: #232b36;
      }

      .otp-grid {
        display: grid;
        grid-template-columns: repeat(6, minmax(52px, 1fr));
        gap: 12px;
      }

      .otp-input {
        width: 100%;
        height: 56px;
        border-radius: 18px;
        border: 1px solid #dbe0e8;
        text-align: center;
        font-size: 22px;
        font-weight: 600;
        color: #101827;
        background: #f8fafc;
        padding: 0;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
      }

      .otp-input:focus {
        outline: none;
        border-color: #000000;
        box-shadow: 0 16px 28px rgba(0, 0, 0, 0.12);
        background: #ffffff;
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

      .resend-row {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: #6b7280;
      }

      .link-button {
        border: none;
        background: transparent;
        color: #000000;
        font-weight: 600;
        cursor: pointer;
        padding: 0;
      }

      .link-button:disabled {
        color: #b5bcc6;
        cursor: not-allowed;
      }

      @media (max-width: 991.98px) {
        .otp-hero {
          padding-top: 120px;
        }

        .otp-page .header2-navbar {
          position: fixed;
        }
      }

      @media (max-width: 767.98px) {
        .otp-hero {
          padding: 110px 0 70px;
        }

        .otp-card {
          border-radius: 28px;
        }

        .otp-grid {
          gap: 10px;
        }
      }

      @media (max-width: 575.98px) {
        .otp-hero {
          padding: 100px 0 60px;
        }

        .otp-grid {
          grid-template-columns: repeat(6, minmax(0, 1fr));
          gap: 8px;
        }

        .otp-input {
          height: 52px;
          font-size: 20px;
        }
      }

      @media (max-width: 420px) {
        .otp-grid {
          gap: 6px;
        }

        .otp-input {
          border-radius: 14px;
          height: 48px;
          font-size: 18px;
        }
      }
    </style>

    <script>
      (function() {
        const inputs = Array.from(document.querySelectorAll('.otp-input'));
        const hidden = document.getElementById('otpHidden');
        const countdownEl = document.getElementById('otpCountdown');
        const resendBtn = document.getElementById('resendOtp');
        let remaining = 299;

        function updateHidden() {
          hidden.value = inputs.map(i => i.value.replace(/\D/g, '') || '').join('');
        }

        function setCountdown(seconds) {
          const m = String(Math.floor(seconds / 60)).padStart(2, '0');
          const s = String(seconds % 60).padStart(2, '0');
          countdownEl.textContent = m + ':' + s;
        }

        function tick() {
          if (remaining > 0) {
            remaining -= 1;
            setCountdown(remaining);
            setTimeout(tick, 1000);
          } else {
            resendBtn.disabled = false;
          }
        }

        inputs.forEach((input, idx) => {
          input.addEventListener('input', (e) => {
            e.target.value = e.target.value.replace(/\D/g, '');
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

        resendBtn.addEventListener('click', () => {
          resendBtn.disabled = true;
          remaining = 299;
          setCountdown(remaining);
          setTimeout(tick, 1000);
        });

        resendBtn.disabled = true;
        setCountdown(remaining);
        setTimeout(tick, 1000);
      })();
    </script>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
