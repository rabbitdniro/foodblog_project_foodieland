<style>
@media (min-width: 992px) {
  .navbar-toggler {
    display: none !important;
  }
  
  .navbar-collapse {
    display: flex !important;
  }
}

@media (max-width: 991.98px) {
  .navbar-toggler {
    display: block !important;
  }
  
  .navbar-collapse .navbar-nav {
    flex-direction: column !important;
    width: 100% !important;
    text-align: center !important;
  }
  
  .navbar-collapse .navbar-nav .nav-item {
    width: 100% !important;
    margin-bottom: 0.5rem !important;
  }
  
  .navbar-collapse .navbar-nav .nav-link {
    display: block !important;
    width: 100% !important;
    text-align: center !important;
    padding: 1rem !important;
    border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
  }
  
  .navbar-collapse .navbar-nav .nav-item.cta .nav-link {
    margin-top: 1rem !important;
    border-radius: 5px !important;
    border-bottom: none !important;
  }
}
</style>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" style="background: #000000 !important;">
	    <div class="container" style="display: flex; width: 100%; align-items: center; justify-content: space-between;">
	      <a class="navbar-brand" href="/" style="color: #ffffff !important;">Food Land</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation" style="border-color: #fff;">
	        <span class="menu-icon"></span>
	        <span class="menu-label">Menu</span>
	      </button>

	      <div class="navbar-collapse collapse" id="ftco-nav">
	      <ul class="navbar-nav ml-auto">
	      <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a href="/" class="nav-link" style="color: {{ Request::is('/') ? '#d4a574' : '#ffffff' }} !important; padding: 0.5rem 1rem !important;">Home</a></li>
	      <li class="nav-item {{ Request::is('about') ? 'active' : '' }}"><a href="/about" class="nav-link" style="color: {{ Request::is('about') ? '#d4a574' : '#ffffff' }} !important; padding: 0.5rem 1rem !important;">About</a></li>
	      <li class="nav-item {{ Request::is('menu') ? 'active' : '' }}"><a href="/menu" class="nav-link" style="color: {{ Request::is('menu') ? '#d4a574' : '#ffffff' }} !important; padding: 0.5rem 1rem !important;">Menu</a></li>
	      <li class="nav-item {{ Request::is('blog') ? 'active' : '' }}"><a href="/blog" class="nav-link" style="color: {{ Request::is('blog') ? '#d4a574' : '#ffffff' }} !important; padding: 0.5rem 1rem !important;">Stories</a></li>
	      <li class="nav-item {{ Request::is('contact') ? 'active' : '' }}"><a href="/contact" class="nav-link" style="color: {{ Request::is('contact') ? '#d4a574' : '#ffffff' }} !important; padding: 0.5rem 1rem !important;">Contact</a></li>
	      <li class="nav-item cta"><a href="/reservation" class="nav-link" style="background-color: #d4a574 !important; color: white !important; padding: 0.5rem 1rem !important;">Book a table</a></li>
	      </ul>
	      </div>
	    </div>
	  </nav>
