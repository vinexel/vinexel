<section class="pt-5 overflow-hidden">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-5">
                <h2 class="mb-2 mb-lg-4">{{__('home.about_title')}}</h2>
                <p class="mb-2 mb-lg-4">{{__('home.about_text')}}</p>
                <ul class="list-group list-group-borderless mb-3 mb-lg-4">
                    <li class="list-group-item d-flex heading-color fw-semibold pb-0"><i class="bi bi-check-circle text-primary me-2"></i>{{__('home.about_advantage_1')}}</li>
                    <li class="list-group-item d-flex heading-color fw-semibold pb-0"><i class="bi bi-check-circle text-primary me-2"></i>{{__('home.about_advantage_2')}}</li>
                    <li class="list-group-item d-flex heading-color fw-semibold pb-0"><i class="bi bi-check-circle text-primary me-2"></i>{{__('home.about_advantage_3')}}</li>
                </ul>
                <div class="d-flex gap-3 flex-wrap">
                    <li class="nav-item ms-2 d-none d-sm-block">
                        <a href="#" class="btn btn-sm btn-dark mb-0" data-bs-toggle="offcanvas" data-bs-target="#scheduleCall" aria-controls="scheduleCall"><i class="bi bi-calendar-week me-2"></i>{{__('home.about_button')}}</a>
                    </li>
                    <a href="{{route('contact')}}" class="link-primary-grad icon-link icon-link-hover">{{__('home.about_link')}} <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 position-relative ms-auto ps-lg-4">
                <div class="position-absolute start-0 bottom-0 ms-n6 mb-5 d-none d-sm-block">
                    <img src="{{ asset('images/08.png') }}" class="blur-1 z-index-9 position-relative" alt="shape decoration">
                </div>
                <img src="{{ asset('images/04.jpg') }}" class="rounded-4 position-relative z-index-2" alt="about image">
            </div>
        </div>
    </div>
</section>