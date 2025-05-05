<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="flex items-center py-4 px-6 h-header-height">
            <a href="{{route('dashboard')}}" class="b-brand flex items-center gap-3">
                <!-- ========   Change your logo from here   ============ -->
                <img src="{{asset('images/logo.png')}}" class="img-fluid logo-lg" alt="logo" width="120">
                <span class="badge bg-success-500/10 text-success-500 rounded-full theme-version">{{role}}</span>
            </a>
        </div>
        <div class="navbar-content h-[calc(100vh_-_74px)] py-2.5">
            <div class="card pc-user-card mx-[15px] mb-[15px] bg-theme-sidebaruserbg dark:bg-themedark-sidebaruserbg">
                <div class="card-body !p-5">
                    <div class="flex items-center">
                        <img class="shrink-0 w-[45px] h-[45px] rounded-full" src="/static/dashkit/images/uploads/{{user_session_photo}}" alt="user-image">
                        <div class="ml-4 mr-2 grow">
                            <h6 class="mb-0">{{user_session_name}}</h6>
                            <small>{{role}}</small>
                        </div>
                        <a class="shrink-0 btn btn-icon inline-flex btn-link-secondary" data-pc-toggle="collapse" href="#pc_sidebar_userlink">
                            <svg class="pc-icon w-[22px] h-[22px]">
                                <use xlink:href="#custom-sort-outline"></use>
                            </svg>
                        </a>
                    </div>
                    <div class="hidden pc-user-links" id="pc_sidebar_userlink">
                        <div class="pt-3 *:flex *:items-center *:py-2 *:gap-2.5 hover:*:text-primary-500">
                            <a href="{{route('profile')}}">
                                <i class="text-lg leading-none ti ti-user"></i>
                                <span>My Account</span>
                            </a>
                            <a href="#!">
                                <i class="text-lg leading-none ti ti-lock"></i>
                                <span>Lock Screen</span>
                            </a>
                            <a href="malscan">
                                <i class="text-lg leading-none ti ti-virus"></i>
                                <span>Malscan</span>
                            </a>
                            <a href="{{route('setting')}}">
                                <i class="text-lg leading-none ti ti-settings"></i>
                                <span>Settings</span>
                            </a>
                            <a href="{{route('signout')}}">
                                <i class="text-lg leading-none ti ti-power"></i>
                                <span>Logout</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-status-up"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                        <span class="pc-arrow">
                            <i data-feather="chevron-right"></i>
                        </span>
                        <span class="pc-badge">1</span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a class="pc-link" href="dashboard">Default</a>
                        </li>
                    </ul>
                </li>
                <hr class="border-secondary-500/10 my-4">
                <div class="card border-0 shadow-none drp-upgrade-card mb-0 bg-cover" style="background-image: url(/static/dashkit/dashboard/images/img-profile-card.jpg)">
                    <div class="card-body">
                        <div class="flex -space-x-3 overflow-hidden *:flex *:items-center *:justify-center *:rounded-full *:w-10 *:h-10 hover:*:z-10 *:border-2 *:border-white">
                            <img src="/static/dashkit/dashboard/images/avatar-1.jpg" alt="user-image" class="avtar">
                            <img src="/static/dashkit/dashboard/images/avatar-2.jpg" alt="user-image" class="avtar">
                            <img src="/static/dashkit/dashboard/images/avatar-3.jpg" alt="user-image" class="avtar">
                            <img src="/static/dashkit/dashboard/images/avatar-4.jpg" alt="user-image" class="avtar">
                            <img src="/static/dashkit/dashboard/images/avatar-5.jpg" alt="user-image" class="avtar">
                            <span class="avtar bg-theme-cardbg dark:bg-themedark-cardbg overflow-hidden">
                                <span class="flex items-center justify-center w-full h-full bg-primary-500/10 text-primary-500">+20</span>
                            </span>
                        </div>
                        <h3 class="my-4 text-dark">
                            245.3k <small class="text-muted">Followers</small>
                        </h3>
                        <div class="btn btn-warning inline-flex items-center justify-center">
                            <svg class="pc-icon me-2 w-[22px] h-[22px]">
                                <use xlink:href="#custom-logout-1-outline"></use>
                            </svg>
                            Upgrade to Business
                        </div>
                    </div>
                </div>
            </ul>
        </div>
    </div>
</nav>