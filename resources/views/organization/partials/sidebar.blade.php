<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{ Auth::guard('org')->user()->logo ? asset(Auth::guard('org')->user()->logo) : 'https://ui-avatars.com/api/?background=303030&color=f1f1f1&name='. Auth::guard('org')->user()->name  }}"
                    class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'org.dashboard' ? 'active' : '' }}"
                            href="{{ Route('org.dashboard') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'org.office.index' ? 'active' : '' }}"
                            href="{{ Route('org.office.index') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Offices</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                </ul>
            </div>
        </div>
    </div>
</nav>
