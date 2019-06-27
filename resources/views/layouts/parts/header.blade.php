<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark navbar-danger">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- SEARCH FORM -->
  {{-- @include('layouts.parts.search') --}}

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    {{-- @include('layouts.parts.messages') --}}
    <!-- Notifications Dropdown Menu -->
    {{-- @include('layouts.parts.notif') --}}
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
