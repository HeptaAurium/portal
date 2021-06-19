<nav class="navbar navbar-default navbar-expand bg-custom topnav w-100 d-flex flex-row border-bottom    ">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header fixed-brand d-flex flex-row">
        <button type="button" class="navbar-toggle collapsed border-0 bg-transparent d-md-none menu-toggle"
            data-toggle="collapse" id="menu-toggle">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </button>
        <a class="navbar-brand d-md-none mx-auto" href="#">
            <img src="{{ asset($settings->logo_path) }}" alt="{{ $settings->business_name }}" class="img-fluid"
                style="height:50px">
        </a>
    </div>
    <!-- navbar-header-->
    <div class="collapse navbar-collapse ml-auto">
        <ul class="nav navbar-nav ml-auto justify-content-end">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
    <!-- bs-example-navbar-collapse-1 -->
</nav>

