<aside
    class="sidebar bg-custom sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-left"
    id="sidenav-main">
    <button type="button" class="navbar-toggle collapsed border-0 bg-transparent d-md-none menu-toggle">
        <i class="fa fa-times" aria-hidden="true"></i>
    </button>
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute right-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/home">
            <img src="{{ asset($settings->logo_path) }}" alt="{{ $settings->business_name }}" class="img-fluid"
                style="height:50px">
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav sidebar-ul">
            <li class="nav-item">
                <a class="nav-link active" href="/home">
                    <div class="side-icon"><i class="fa fa-home" aria-hidden="true"></i></div> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link accordion-heading align-items-center" data-toggle="collapse" data-target="#students">
                    <div class="side-icon"><i class="fa fa-users" aria-hidden="true"></i></div> Members
                </a>
                <ul class="nav nav-list collapse inner-ul" id="students">
                    <a class="nav-link" href="/members">
                        <div class="side-icon-inner"><i class="fa fa-circle" aria-hidden="true"></i></div> <span
                            class="side-mini-text"> List all members </span>
                    </a>
                    @can('register-members')
                        <a class="nav-link" href="/members/create">
                            <div class="side-icon-inner"><i class="fa fa-circle" aria-hidden="true"></i></div>
                            <span class="side-mini-text"> Add Member </span>
                        </a>
                    @endcan
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link accordion-heading align-items-center" data-toggle="collapse" data-target="#settings">
                    <div class="side-icon"><i class="fa fa-cogs" aria-hidden="true"></i></div> Settings
                </a>
                <ul class="nav nav-list collapse inner-ul" id="settings">
                    <a class="nav-link" href="/students">
                        <div class="side-icon-inner"><i class="fa fa-circle" aria-hidden="true"></i></div> <span
                            class="side-mini-text">General Settings </span>
                    </a>
                </ul>
            </li>

        </ul>
    </div>
</aside>
