<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset("assets/dist/img/logo.png")}}" alt="registration.pk" class="brand-image" style="width: 60px; height:60px; object-fit: contain">
      <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <div class="form-inline mt-3">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <li class="nav-item">
            <a href="{{ route('admin.dashboard',['tehsil' => '6', 'province' => '1']) }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.school') }}" class="nav-link {{ Request::is('admin/school') || Request::is('admin/school/add') ? 'active' : '' }}">
              <i class="nav-icon fa fa-university"></i>
              <p>
                Manage School
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.location') }}" class="nav-link {{ Request::is('admin/locations') || Request::is('admin/locations/add') ? 'active' : '' }}">
              <i class="nav-icon fa fa-location-arrow"></i>
              <p>
                Manage Locations
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.geolocator') }}" class="nav-link {{ Request::is('admin/geolocator') ? 'active' : '' }}">
              <i class="nav-icon fa fa-map-marker"></i>
              <p>
                Geo Locator
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Manage Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-address-card"></i>
              <p>
                Manage News & Events
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-comment"></i>
              <p>
                Messages
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.logout') }}" class="nav-link">
              <i class="nav-icon fa fa-lock"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>