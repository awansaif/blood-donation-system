<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{ Auth::guard('donor')->user()->avatar ? asset(Auth::guard('donor')->user()->avatar) : 'https://ui-avatars.com/api/?background=303030&color=f1f1f1&name='. Auth::guard('donor')->user()->name  }}"
                    class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'donor.dashboard' ? 'active' : '' }}"
                            href="{{ Route('donor.dashboard') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'admin.users.index' ? 'active' : '' }}"
                            href="#">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">News</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'admin.quizzes.index'  ? 'active' : '' }}"
                            href="#">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Quizzes</span>
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
