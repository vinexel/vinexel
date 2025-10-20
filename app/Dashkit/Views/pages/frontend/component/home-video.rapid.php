<section class="bg-body position-relative overflow-hidden">
    <div class="bg-dark h-500px w-100 position-absolute top-0 start-0">
        <div class="position-absolute top-0 start-0 translate-middle">
            <img src="{{ asset('images/blur-decoration-2.svg') }}" class="opacity-1 blur-8" alt="Grad shape">
        </div>
        <span class="position-absolute start-0 bottom-0">
            <svg class="fill-body" width="1920" height="99" viewBox="0 0 1920 99" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 93L1946 0V99H0V93Z"></path>
            </svg>
        </span>
    </div>
    <div class="container position-relative">
        <div class="row mb-4 mb-md-6">
            <div class="col-md-6">
                <h2 class="text-white mb-0">{{__('home.video_title')}}</h2>
            </div>
        </div>
        <div class="bg-parallax position-relative h-400px h-xl-500px rounded-4 overflow-hidden" style="background:url({{ asset('images/05.jpg') }}) no-repeat; background-size:cover; background-position:center;">

            <div class="bg-overlay bg-purple opacity-1"></div>

            <div class="position-absolute top-50 start-50 translate-middle z-index-2">
                <a href="https://www.youtube.com/embed/tXHviS-4ygo" class="btn btn-icon btn-xl btn-white btn-round mb-0" data-glightbox="" data-gallery="Video"><i class="bi bi-play-fill fa-lg"></i></a>
            </div>
        </div>
        <div class="inner-container-small bg-body shadow-primary rounded-3 text-center py-3 mt-5">
            <p class="mb-0 px-2 px-sm-5 px-md-0">{{__('home.video_question')}}
                <a href="contact-us" class="fw-semibold heading-color hover-underline-animation">{{__('home.video_button')}}</a>
            </p>
        </div>
    </div>
</section>