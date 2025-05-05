<footer class="bg-dark pt-8 pt-md-9 position-relative" data-bs-theme="dark">
    <div class="container">
        <div class="row g-4 justify-content-between">
            <div class="col-lg-4">
                <a href="index.html">
                    <img class="h-40px" src="{{asset('images/logo.png')}}" alt="logo">
                </a>
                <p class="my-3 my-lg-4">{{__('general.footer_company_text')}}</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-secondary" href="#"><i class="bi bi-facebook lh-base"></i></a> </li>
                    <li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-secondary" href="#"><i class="bi bi-instagram lh-base"></i></a> </li>
                    <li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-secondary" href="#"><i class="bi bi-twitter-x lh-base"></i></a> </li>
                    <li class="list-inline-item"> <a class="btn btn-xs btn-icon btn-secondary" href="#"><i class="bi bi-linkedin lh-base"></i></a> </li>
                </ul>
            </div>
            <div class="col-lg-6 col-xxl-4">
                <div class="row g-4">
                    <div class="col-6">
                        <h6 class="mb-3 mb-sm-4">Company</h6>
                        <ul class="nav flex-column gap-1">
                            <li class="nav-item"><a class="nav-link pt-0" href="{{route('about')}}">{{__('general.about')}}</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">{{__('general.contact')}}</a></li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <h6 class="mb-3 mb-sm-4">Other</h6>
                        <ul class="nav flex-column gap-1">
                            <li class="nav-item"><a class="nav-link" href="{{route('pricing')}}">{{__('general.pricing')}} <span class="badge bg-success ms-2">{{__('general.new')}}</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <hr class="mt-xl-5 mb-0 opacity-1">

        <!-- Bottom footer -->
        <div class="d-md-flex justify-content-between align-items-center text-center text-lg-start py-4">
            <div class="text-body small mb-3 mb-md-0"> {{__('general.copyrights')}} ©{{ "now"|date("Y") }} Dashkit. {{__('general.build_by')}} <a href="https://visioniconic.com/" target="_blank" class="text-body text-primary-hover hover-underline-animation">ICONIC GROUP</a>. </div>
            <ul class="nav d-flex justify-content-center gap-1 mb-0">
                <li class="nav-item"><a class="nav-link small py-0" href="#">Privacy policy</a></li>
                <li class="nav-item"><a class="nav-link small py-0 pe-0" href="#">Terms & conditions</a></li>
            </ul>
        </div>
    </div>
</footer>