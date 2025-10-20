<section class="bg-secondary position-relative overflow-hidden">
    <span>
        <svg class="position-absolute top-0 start-0 mt-lg-n6" viewBox="0 0 1950 237" style="enable-background:new 0 0 1950 237;" xml:space="preserve">
            <path class="fill-body" d="M1949.5,0H0v164c717.2,131.2,1598.5,54.7,1949.5,0V0z"></path>
        </svg>
    </span>
    <div class="container position-relative z-index-9 pt-5 pt-xxl-8">
        <div class="row g-4 align-items-center">
            <div class="col-lg-4">
                <h2 class="mb-3 mb-lg-4"> {{__('home.pricing_title')}}</h2>
                <p class="mb-4">{{__('home.pricing_text')}}</p>
                <a href="{{route('pricing')}}" class="btn btn-primary-grad icon-link icon-link-hover">{{__('home.pricing_compare')}} <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="col-lg-8 ms-auto ps-xl-6">
                <div class="row align-items-center g-0">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <div class="card bg-body text-center align-items-center p-4 pe-5 me-md-n3">
                            <div class="card-header bg-transparent d-flex flex-column align-items-center p-0">
                                <div class="icon-xl bg-secondary d-flex justify-content-center align-items-center text-white rounded-circle mb-3">
                                    <img src="{{ asset('images/rocket.png') }}" class="h-40px" alt="rocket">
                                </div>
                                <h6 class="mb-3">Basic plan</h6>
                                <span class="text-primary-grad"> <span class="h1 fw-bold">$25</span> /month</span>
                            </div>
                            <div class="card-body w-100 p-0 mt-3">
                                <ul class="list-group list-group-borderless text-center mb-4">
                                    <li class="list-group-item mb-0"><i class="bi bi-check-lg text-success me-1"></i>Customizable features</li>
                                    <li class="list-group-item mb-0"><i class="bi bi-check-lg text-success me-1"></i>Basic support</li>
                                    <li class="list-group-item mb-0"><i class="bi bi-check-lg text-success me-1"></i>Monthly updates</li>
                                    <li class="list-group-item mb-0"><i class="bi bi-check-lg text-success me-1"></i>Up to 50 Users</li>
                                </ul>
                                <a href="{{route('contact')}}" class="btn btn-dark w-100 mb-0">Get started</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-primary text-center align-items-center p-4 pt-5">
                            <div class="text-bg-dark rounded position-absolute top-0 start-50 translate-middle px-3 py-1">Most popular</div>
                            <div class="card-header bg-transparent d-flex flex-column align-items-center p-0">
                                <div class="icon-xl bg-body d-flex justify-content-center align-items-center text-white rounded-circle mb-3">
                                    <img src="{{ asset('images/thunder.png') }}" class="h-40px" alt="thunder">
                                </div>
                                <h6 class="mb-3 text-white">Standard plan</h6>
                                <span class="text-white"> <span class="h1 text-white fw-bold">$120</span> /month</span>
                            </div>
                            <div class="card-body w-100 p-0 mt-3">
                                <ul class="list-group list-group-borderless text-center opacity-8 mb-4">
                                    <li class="list-group-item text-white mb-0"><i class="bi bi-check-lg me-1"></i>All basic plan features</li>
                                    <li class="list-group-item text-white mb-0"><i class="bi bi-check-lg me-1"></i>Priority support</li>
                                    <li class="list-group-item text-white mb-0"><i class="bi bi-check-lg me-1"></i>Access to advanced features</li>
                                    <li class="list-group-item text-white mb-0"><i class="bi bi-check-lg me-1"></i>Up to 100 Users</li>
                                    <li class="list-group-item text-white mb-0"><i class="bi bi-check-lg me-1"></i>Dedicated account manager</li>
                                </ul>
                                <a href="{{route('contact')}}" class="btn btn-white w-100 mb-0">Get started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>