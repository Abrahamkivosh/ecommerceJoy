<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
      <img src="{{asset('admin/dist/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">JK-Jiji</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <a href="{{route('user.edit',Auth::user()->id)}}">
        <div class="image">
          <img  src={{ Str::contains(auth()->user()->image, 'http') ? auth()->user()->image : '/storage/user/' . auth()->user()->image }} alt="user"
           class="img-circle elevation-2" >
        </div>
    </a>
        <div class="info">
          <a href="{{route('user.edit',Auth::user()->id)}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
       @if (Auth::user()->is_admin ==1)
       <li class="nav-item">
        <a href="{{route('categories.index')}}" class="nav-link">
          <i class="nav-icon fas fa-th"></i>
          <p>
            Categories
          </p>
        </a>
      </li>


       @endif
       <li class="nav-item">
        <a href="{{route('products.index')}}" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Products
          </p>
        </a>
      </li>
          <li class="nav-item">
            <a href="{{route('orders.index')}}" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
               Orders
              </p>
            </a>
          </li>
          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-star"></i>
              <p>
                Reviews
              </p>
            </a>
          </li> --}}
          @if (Auth::user()->is_admin==1)
          <li class="nav-item">
            <a href="{{route('user.index')}}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Users
              </p>
            </a>
          </li>
          @endif

          {{-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Payments
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Simple Tables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>DataTables</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>jsGrid</p>
                </a>
              </li>
            </ul>
          </li> --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
