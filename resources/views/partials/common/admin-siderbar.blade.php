<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="" class="brand-link">
    <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
      class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
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
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Accessory Manager
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('dashboard.accessory.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>
          </ul>
          {{-- <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('dashboard.accessory.create')}}" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Create</p>
          </a>
        </li>
      </ul> --}}
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{route('dashboard.accessory.search')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Search</p>
          </a>
        </li>
      </ul>
      </li>
      <li class="nav-item has-treeview">
        <a href="{{route('dashboard.category.index')}}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Category Manager
          </p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Car Manager
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('dashboard.maker.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Maker List</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('dashboard.class.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Class List</p>
            </a>
          </li>
        </ul>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{route('dashboard.model.index')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Model List</p>
            </a>
          </li>
        </ul>
      </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>