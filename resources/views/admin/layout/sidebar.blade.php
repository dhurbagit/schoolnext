 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
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
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>

          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Slider

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('manage-slider')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage slider</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('create-slider')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Slider</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-image"></i>
              <p>
                Gallery

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('manage-gallery')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Album</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('create-gallery')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Album</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- -------------}}
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-columns"></i>
              <p>
                Testimonial

              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('manage-testimonial')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Testimonial</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('create-testimonial')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Testimonial</p>
                </a>
              </li>

            </ul>
          </li>
          {{-- -------------}}

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
