<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown u-pro">
            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href=""
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img height="20" width="20%"   class="img-circle "   src={{ Str::contains(auth()->user()->image, 'http') ? auth()->user()->image : '/storage/user/' . auth()->user()->image }} alt="user" class="">
                <span class="hidden-md-down">{{ Auth::user()->name }}
                    &nbsp;</span> </a>
            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                <!-- text-->
                <a href="{{route('user.edit',Auth::user()->id)}}" class="dropdown-item"><i class="ti-user"></i> My
                    Profile</a>

                <!-- text-->
                <div class="dropdown-divider"></div>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item dropdown-footer btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
</div>
</li>
    </ul>
</nav>
