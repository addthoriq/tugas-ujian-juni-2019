<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-danger elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('home.index')}}" class="brand-link navbar-danger">
    <img src="{{asset('adminlte3/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">PUSDA</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('adminlte3/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-header">Menu</li>
        <li class="nav-item">
          <a href="{{route('home.index')}}" class="nav-link {{Request::is('/')?'active':''}}">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Beranda
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link {{Request::is('book','book/create','category','category/create')?'active':''}}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Buku
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('category.index')}}" class="nav-link {{Request::is('category','category/create')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori Buku</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('book.index')}}" class="nav-link {{Request::is('book','book/create')?'active':''}}">
                <i class="far fa-circle nav-icon"></i>
                <p>Daftar Buku</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{route('loan-book.index')}}" class="nav-link {{Request::is('loan-book','loan-book/create')?'active':''}}">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Peminjaman
            </p>
          </a>
        </li>
        <li class="nav-header">Pengaturan</li>
        <li class="nav-item">
          <a href="{{route('member.index')}}" class="nav-link {{Request::is('member','member/create')?'active':''}}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Anggota
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
