<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fa-solid fa-building-columns"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Perpustakaan</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ ($title === 'Dashboard') ? 'active' : '' }}">
      <a class="nav-link " href="{{ route('dashboard') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
      </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Interface
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item mb-0 {{ ($title === 'Profile') ? 'active' : '' }}">
    <a class="nav-link mb-0 pb-0" href="{{ route('profile.index') }}">
        <i class="fa-solid fa-user"></i>
        <span>Profile</span>
    </a>
  </li>
  <li class="nav-item mb-0 {{ ($title === 'Attendance') ? 'active' : '' }}">
    <a class="nav-link mb-0 pb-0" href="{{ route('attendance.create') }}">
        <i class="fa-sharp fa-solid fa-clipboard-list"></i>
        <span>Absensi</span>
    </a>
  </li>
  <li class="nav-item mb-0 {{ ($title === 'Student') ? 'active' : '' }}">
    <a class="nav-link mb-0 pb-0" href="{{ route('student') }}">
        <i class="fa-regular fa-address-card"></i>
        <span>KTM</span>
    </a>
  </li>
  <li class="nav-item mb-0 {{ ($title === 'Category') ? 'active' : '' }}">
    <a class="nav-link mb-0 pb-0" href="{{ route('category.index') }}">
        <i class="fa-sharp fa-solid fa-calendar"></i>
        <span>Category</span>
    </a>
  </li>
  <li class="nav-item mb-0 {{ ($title === 'Book') ? 'active' : '' }}">
    <a class="nav-link mb-0 pb-0" href="{{ route('book.index') }}">
        <i class="fa-solid fa-book"></i>
        <span>Buku</span>
    </a>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  {{-- <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
          aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
      </a>
      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Custom Utilities:</h6>
              <a class="collapse-item" href="utilities-color.html">Colors</a>
              <a class="collapse-item" href="utilities-border.html">Borders</a>
              <a class="collapse-item" href="utilities-animation.html">Animations</a>
              <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
      </div>
  </li> --}}

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Admin
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
          aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-cog"></i>
          <span>Setting</span>
      </a>
      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Master Admin</h6>
              <a class="collapse-item" href="{{ route('admin.index') }}">Admin</a>
              <a class="collapse-item" href="{{ route('staff.index') }}">Staff</a>
              <a class="collapse-item" href="{{ route('attendance.index') }}">Absensi</a>
              <a class="collapse-item" href="{{ route('borrow.create') }}">Peminjaman</a>
              <a class="collapse-item" href="{{ route('borrow.index') }}">Pengembalian</a>
              <div class="collapse-divider"></div>
              <h6 class="collapse-header">Other Pages:</h6>
              <a class="collapse-item" href="404.html">404 Page</a>
              <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
      </div>
  </li>

  {{-- <!-- Nav Item - Charts -->
  <li class="nav-item">
      <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
  </li>

  <!-- Nav Item - Tables -->
  <li class="nav-item">
      <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
  </li> --}}

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

  <!-- Sidebar Message -->
  {{-- <div class="sidebar-card d-none d-lg-flex">
      <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
      <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
      <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
  </div> --}}

</ul>