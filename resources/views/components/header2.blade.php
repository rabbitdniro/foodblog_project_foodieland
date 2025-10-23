<style>
  .header2-navbar {
    background: #000000 !important;
    padding: 18px 0;
  }

  .header2-navbar .navbar-brand {
    color: #ffffff !important;
    font-weight: 700;
    font-size: 22px;
  }

  .header2-navbar .navbar-brand:hover {
    color: #d4a574 !important;
  }

  .header2-navbar .navbar-nav .nav-link {
    color: #ffffff !important;
    padding: 0.5rem 1rem !important;
    font-weight: 500;
    transition: color 0.2s ease;
  }

  .header2-navbar .navbar-nav .nav-link:hover,
  .header2-navbar .navbar-nav .nav-item.active .nav-link {
    color: #d4a574 !important;
  }

  .header2-navbar .navbar-nav .nav-item.cta .nav-link {
    background: #d4a574 !important;
    color: #ffffff !important;
    border-radius: 999px;
    padding: 0.5rem 1.25rem !important;
    font-weight: 600;
  }

  .header2-navbar .navbar-toggler {
    border-color: rgba(255, 255, 255, 0.4) !important;
  }

  .header2-navbar .navbar-toggler:focus {
    outline: none;
    box-shadow: none;
  }

  .header2-navbar .navbar-toggler-icon {
    display: inline-block;
    width: 20px;
    height: 2px;
    background: #ffffff;
    position: relative;
  }

  .header2-navbar .navbar-toggler-icon::before,
  .header2-navbar .navbar-toggler-icon::after {
    content: '';
    position: absolute;
    left: 0;
    width: 20px;
    height: 2px;
    background: #ffffff;
  }

  .header2-navbar .navbar-toggler-icon::before {
    top: -6px;
  }

  .header2-navbar .navbar-toggler-icon::after {
    top: 6px;
  }

  @media (max-width: 991.98px) {
    .header2-navbar {
      padding: 14px 0;
    }

    .header2-navbar .navbar-collapse {
      background: #000000;
      border-radius: 14px;
      padding: 18px;
      margin-top: 12px;
    }

    .header2-navbar .navbar-nav {
      flex-direction: column;
      width: 100%;
      gap: 6px;
    }

    .header2-navbar .navbar-nav .nav-link {
      width: 100%;
      text-align: center;
      padding: 12px 0 !important;
    }

    .header2-navbar .navbar-nav .nav-item.cta .nav-link {
      margin-top: 8px;
    }
  }
</style>

<nav class="navbar navbar-expand-lg navbar-dark header2-navbar">
  <div class="container" style="display: flex; width: 100%; align-items: center; justify-content: space-between;">
    <a class="navbar-brand" href="/">Food Land</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header2-nav" aria-controls="header2-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      <span style="color: #ffffff; font-weight: 600; font-size: 14px; text-transform: uppercase; margin-left: 8px; letter-spacing: 0.08em;">Menu</span>
    </button>

    <div class="collapse navbar-collapse" id="header2-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a href="/" class="nav-link">Home</a></li>
        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}"><a href="/about" class="nav-link">About</a></li>
        <li class="nav-item {{ Request::is('menu') ? 'active' : '' }}"><a href="/menu" class="nav-link">Menu</a></li>
        <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}"><a href="/blog" class="nav-link">Stories</a></li>
        <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}"><a href="/contact" class="nav-link">Contact</a></li>
        <li class="nav-item cta"><a href="/reservation" class="nav-link">Book a table</a></li>
      </ul>
    </div>
  </div>
</nav>
