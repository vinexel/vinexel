<section class="bg-body position-relative pt-0 pb-5 pb-sm-0">
    <div class="position-absolute top-100 start-0 translate-middle z-index-2 ms-5 ms-xl-9 mt-5 d-none d-sm-block">
        <img src="{{ asset('') }}images/10.png" class="h-500px h-xl-700px rtl-flip" alt="">
    </div>
    <div class="container position-relative z-index-9">
        <div class="row align-items-center mb-4 mb-md-5">
            <div class="col-md-7 col-lg-5">
                <h2 class="mb-0">{{__('home.testimonial_title')}}</h2>
            </div>
        </div>
        <div class="swiper" data-swiper-options="{
				" spacebetween":="" 30,="" "breakpoints" :="" {="" "576" :="" {"slidesperview":="" 1},="" "768" :="" 2},="" "992" :="" 3}="" },="" "navigation" :{="" "nextel" :".swiper-button-next",="" "prevel" :".swiper-button-prev"="" }}"="">

            <div class="swiper-wrapper row">
                <div class="swiper-slide col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card bg-secondary bg-opacity-50 bg-blur rounded-4 p-4 h-100">
                        <div class="card-body p-0 mb-4">
                            <ul class="list-inline mb-3">
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-half text-warning"></i></li>
                            </ul>
                            <blockquote>
                                <p class="heading-color mb-0">{{__('home.testimonial_client_1')}}</p>
                            </blockquote>
                        </div>
                        <div class="card-footer bg-transparent p-0">
                            <div class="d-flex align-items-center">
                                <div class="avatar flex-shrink-0">
                                    <img class="avatar-img rounded-circle" src="{{ asset('images/09.jpg') }}" alt="avatar">
                                </div>
                                <div class="ms-3">
                                    <p class="lead heading-color fw-semibold mb-0">{{__('home.testimonial_client_1_name')}}</p>
                                    <small>{{__('home.testimonial_client_1_job')}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card bg-secondary bg-opacity-50 bg-blur rounded-4 p-4 h-100">
                        <div class="card-body p-0 mb-4">
                            <ul class="list-inline mb-3">
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-half text-warning"></i></li>
                            </ul>
                            <blockquote>
                                <p class="heading-color mb-0">{{__('home.testimonial_client_2')}}</p>
                            </blockquote>
                        </div>
                        <div class="card-footer bg-transparent p-0">
                            <div class="d-flex align-items-center">
                                <div class="avatar flex-shrink-0">
                                    <img class="avatar-img rounded-circle" src="{{ asset('images/07.jpg') }}" alt="avatar">
                                </div>
                                <div class="ms-3">
                                    <p class="lead heading-color fw-semibold mb-0">{{__('home.testimonial_client_2_name')}}</p>
                                    <small>{{__('home.testimonial_client_2_job')}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card bg-secondary bg-opacity-50 bg-blur rounded-4 p-4 h-100">
                        <div class="card-body p-0 mb-4">
                            <ul class="list-inline mb-3">
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-fill text-warning"></i></li>
                                <li class="list-inline-item me-0"><i class="bi bi-star-half text-warning"></i></li>
                            </ul>
                            <blockquote>
                                <p class="heading-color mb-0">{{__('home.testimonial_client_2')}}</p>
                            </blockquote>
                        </div>
                        <div class="card-footer bg-transparent p-0">
                            <div class="d-flex align-items-center">
                                <div class="avatar flex-shrink-0">
                                    <img class="avatar-img rounded-circle" src="{{ asset('images/01.jpg') }}" alt="avatar">
                                </div>
                                <div class="ms-3">
                                    <p class="lead heading-color fw-semibold mb-0">{{__('home.testimonial_client_2_name')}}</p>
                                    <small>{{__('home.testimonial_client_2_job')}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>