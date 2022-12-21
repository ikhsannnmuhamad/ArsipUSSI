<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link" class="d-block" style="">
      <img src="/assets/img/LOGO.png" alt="" class="asd">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class

               with font-awesome or any other icon font library -->

                @if (auth()->user()->level=='1')
                <li class="nav-item">
                    <a href="/user" class="nav-link {{ Request::is('user*') ? 'active' : '' }}">
                      <i class="nav-icon fas fa-user"></i>
                      <p>
                        Manage User
                      </p>
                    </a>
                </li>
                @endif

            <li class="nav-item">
              <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <style>
    .asd{
      width: 90px;
      height: 90px;
      margin-left: 70px
    }
  </style>
