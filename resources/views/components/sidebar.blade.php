<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="">Backend Siakad</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="">BE SK</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('home') }}"><i class="fas fa-fire-flame-curved"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Starter</li>
            <li class="{{ $type_menu === 'user' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('index') }}"><i class="fas fa-user-group"></i><span>Users</span></a>
            </li>
        </ul>

        {{-- <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
