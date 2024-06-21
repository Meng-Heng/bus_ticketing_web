<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Left element -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Logo -->
      <a class="navbar-brand nav-logo mx-4" href="{{ url('/') }}">
        <img
          class="mx-2"
          src="{{ asset('images/logo/logo.png')}}"
          height="40"
          alt="Bus4U Logo"
          loading="lazy"
        />
        Bus4U
      </a>
    </div>
    <!-- Left element -->
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navigation menu -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex align-items-center">
        <li class="nav-item nav-dropdown open">
          <a data-toggle="dropdown" data-close-others="false" aria-expanded="true">
            <i class="nav-link fas fa-globe nav-fa"></i>
          </a>
              @include('web.utils.partials.language_switcher')
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/ticket-history">
            <i class="fas fa-qrcode nav-fa"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">
            <i class="fas fa-user nav-fa"></i>
          </a>
        </li>
      </ul>
      <!-- Navigation menu -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      <!-- Contact -->
      <a class="nav-contact mx-4" id="contactModal" data-target="demoModal" data-toggle="modal" href="">Contact
      </a>
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->