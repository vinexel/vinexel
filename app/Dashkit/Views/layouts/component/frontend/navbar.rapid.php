<div class="header-absolute">
    <div class="alert fade show bg-primary border-0 rounded-0 text-center overflow-hidden z-index-9 py-2 m-0 d-none d-lg-block" role="alert">
        <div class="container d-flex justify-content-between px-2 px-xl-4">
            <ul class="list-inline d-flex flex-wrap gap-3 text-white mb-0">
                <li class="list-inline-item small fw-light"><i class="bi bi-headset me-2"></i>{{__('general.call_us')}}: <a href="#" class="link-white">+123 555 66 </a></li>
                <li class="list-inline-item small fw-light"><i class="bi bi-envelope me-2"></i>{{__('general.email')}}: <a href="#" class="link-white">example@gmail.com</a></li>
            </ul>
            <ul class="list-inline mb-0">
                <li class="list-inline-item small text-white">{{__('general.follow_us')}}: </li>
                <li class="list-inline-item"> <a href="#" class="link-white"><i class="bi bi-facebook"></i></a> </li>
                <li class="list-inline-item"> <a href="#" class="link-white"><i class="bi bi-instagram"></i></a> </li>
                <li class="list-inline-item"> <a href="#" class="link-white"><i class="bi bi-twitter-x"></i></a> </li>
                <li class="list-inline-item"> <a href="#" class="link-white"><i class="bi bi-linkedin"></i></a> </li>
            </ul>
        </div>
    </div>
    <header class="header-sticky bg-transparent">
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <a class="navbar-brand me-0" href="/">
                    <img class="light-mode-item navbar-brand-item" src="{{asset('images/logo.png')}}" alt="logo">
                    <img class="dark-mode-item navbar-brand-item" src="{{asset('images/logo.png')}}" alt="logo">
                </a>
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="navbar-nav navbar-nav-scroll dropdown-hover mx-auto">
                        <li class="nav-item"> <a class="nav-link" href="{{ route('home') }}">{{__('general.home')}}</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="{{ route('pricing') }}">{{__('general.pricing')}}</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('contact')}}">{{__('general.contact')}}</a> </li>
                        <li class="nav-item"> <a class="nav-link" href="{{route('about')}}">{{__('general.about')}}</a> </li>
                        <li class="nav-item d-lg-none">
                            <div class="text-center">
                                <a href="{{route('signin')}}" class="btn btn-sm btn-primary mb-0">{{__('general.login')}}</a>
                                <a href="{{route('signup')}}" class="btn btn-sm btn-primary ms-2 mb-0">{{__('general.register')}}</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <ul class="nav align-items-center dropdown-hover ms-sm-2">

                    <li class="nav-item dropdown dropdown-animation">
                        <button class="btn btn-link mb-0 px-2 lh-1" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="bi bi-circle-half theme-icon-active fill-mode fa-fw" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
                                <use href="#"></use>
                            </svg>
                        </button>

                        <ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light">
                                    <svg width="16" height="16" fill="currentColor" class="bi bi-brightness-high-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"></path>
                                        <use href="#"></use>
                                    </svg>{{__('general.light')}}
                                </button>
                            </li>
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-moon-stars-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"></path>
                                        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"></path>
                                        <use href="#"></use>
                                    </svg>{{__('general.dark')}}
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-half fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"></path>
                                        <use href="#"></use>
                                    </svg>{{__('general.auto')}}
                                </button>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">{{__('general.language')}}</a>
                        <ul class="dropdown-menu min-w-auto dropdown-menu-end">
                            <li> <a class="dropdown-item" href="?lang=en">English</a> </li>
                            <li> <a class="dropdown-item" href="?lang=id">Indonesia</a> </li>
                            <li> <a class="dropdown-item" href="?lang=example">Example Key</a> </li>
                        </ul>
                    </li>

                    {% if session %}
                    <li class="nav-item ms-2 d-none d-sm-block">
                        <a href="{{route('dashboard')}}" class="btn btn-sm btn-primary mb-0">Dashboard<i class="bi bi-arrow-right ms-2"></i></a>
                    </li>
                    {% else %}
                    <li class="nav-item ms-2 d-none d-sm-block">
                        <a href="{{ route('signin') }}" class="btn btn-sm btn-primary mb-0" data-bs-toggle="offcanvas" data-bs-target="#signin" aria-controls="signin">{{__('general.login')}}<i class="bi bi-arrow-right ms-2"></i></a>
                    </li>
                    {% endif %}

                    <li class="nav-item">
                        <button class="navbar-toggler ms-sm-3 p-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-animation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</div>