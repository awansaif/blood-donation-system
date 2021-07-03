<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="https://coreui.io/demo/free/3.4.0/assets/brand/coreui.svg#full"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="https://coreui.io/demo/free/3.4.0/assets/brand/coreui.svg#signet"></use>
        </svg>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ Route('admin.dashboard') }}">
                <svg class="c-sidebar-nav-icon">
                    <use
                        xlink:href="https://coreui.io/demo/free/3.4.0/vendors/@coreui/icons/svg/free.svg#cil-speedometer">
                    </use>
                </svg>
                Dashboard
                <span class="badge badge-info">Home</span>
            </a>
        </li>
        <li class="c-sidebar-nav-title">Members</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ Route('admin.users.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="https://coreui.io/demo/free/3.4.0/vendors/@coreui/icons/svg/free.svg#cil-drop">
                    </use>
                </svg>
                Users
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ Route('admin.organization.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="https://coreui.io/demo/free/3.4.0/vendors/@coreui/icons/svg/free.svg#cil-drop">
                    </use>
                </svg>
                Organization
            </a>
        </li>
        <li class="c-sidebar-nav-title">Setting</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="https://coreui.io/demo/free/3.4.0/vendors/@coreui/icons/svg/free.svg#cil-puzzle">
                    </use>
                </svg>
                BASIC
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ Route('admin.news.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        News
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ Route('admin.cities.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Cities
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="{{ Route('admin.bloodgroup.index') }}">
                        <span class="c-sidebar-nav-icon"></span>
                        Blood Groups
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
        data-class="c-sidebar-minimized"></button>
</div>
