<section class="price-wrap position-relative overflow-hidden pt-xl-8">
	<!-- Grad blur -->
	<div class="bg-primary-grad blur-9 h-300px w-100 opacity-2 position-absolute top-0 start-50 translate-middle-x mt-n7"></div>
	<!-- Title and switch -->
	<div class="container position-relative z-index-2 pt-4 pb-6 pb-xl-8">
		<!-- Breadcrumb -->
		<nav class="mb-2" aria-label="breadcrumb">
			<ol class="breadcrumb pt-0">
				<li class="breadcrumb-item"><a href="{{route('home')}}">{{__('general.home')}}</a></li>
				<li class="breadcrumb-item active" aria-current="page">{{__('general.pricing')}}</li>
			</ol>
		</nav>

		<!-- Title -->
		<h3>{{__('pricing.hero_title')}}</h3>
		<h1 class="fw-bold mb-4">{{__('pricing.hero_title_style_1')}} <span class="text-primary-grad">{{__('pricing.hero_title_style_2')}}</span> {{__('pricing.hero_title_style_3')}}</h1>

		<!-- Switch -->
		<form class="bg-body shadow-primary border border-primary d-inline-flex align-items-center rounded-3 p-3 px-sm-4 py-sm-3" style="--bs-border-opacity: 0.20;">
			<!-- Label -->
			<span class="fw-semibold heading-color">{{__('general.monthly')}}</span>
			<!-- Switch -->
			<div class="form-check form-switch form-check-lg mx-2 mb-0">
				<input class="form-check-input mt-0 price-toggle" type="checkbox" id="flexSwitchCheckDefault">
			</div>
			<!-- Label -->
			<span class="fw-semibold heading-color">{{__('general.yearly')}}</span>
			<span class="badge bg-success ms-2">{{__('pricing.hero_discount')}}</span>
		</form>
	</div>

	<!-- Pricing box START -->
	<div class="container-fluid">
		<div class="max-width-1550">
			<div class="row">
				<!-- Pricing item -->
				<div class="col-md-6 col-xl-3 mb-5 mb-xl-0">
					<div class="card shadow overflow-hidden p-1">
						<!-- Card header -->
						<div class="card-header bg-secondary bg-opacity-50 p-4 pb-0">
							<!-- Icon -->
							<div class="icon-lg bg-body shadow-primary rounded-circle mb-3">
								<i class="bi bi-lightning-charge-fill fa-lg lh-1 heading-color"></i>
							</div>
							<!-- Title and price -->
							<h6 class="mb-3">Basic plan</h6>
							<p class="mb-0"> <span class="h2 mb-0 plan-price" data-monthly-price="$25" data-annual-price="$20">$25</span> /month</p>
							<small>Basic feature for up to 10 users</small>
							<!-- Button -->
							<a href="#" class="btn btn-dark btn-transition w-100 mt-4">Get started</a>
						</div>

						<!-- Card footer -->
						<div class="card-footer bg-secondary bg-opacity-50 p-4">
							<!-- List -->
							<ul class="list-group list-group-borderless mb-0">
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Up to 05 users monthly</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Free 5 host domain</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Google docs style editors</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Support for 30+ languages</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Pricing item -->
				<div class="col-md-6 col-xl-3 mb-5 mb-xl-0">
					<div class="card shadow overflow-hidden p-1">
						<!-- Card header -->
						<div class="card-header bg-secondary bg-opacity-50 p-4 pb-0">
							<!-- Icon -->
							<div class="icon-lg bg-body shadow-primary rounded-circle mb-3">
								<i class="bi bi-send-fill fa-lg lh-1 heading-color"></i>
							</div>
							<!-- Title and price -->
							<h6 class="mb-3">Standard plan</h6>
							<p class="mb-0"> <span class="h2 mb-0 plan-price" data-monthly-price="$59" data-annual-price="$45">$59</span> /month</p>
							<small>Basic feature for up to 50 users</small>
							<!-- Button -->
							<a href="#" class="btn btn-dark btn-transition w-100 mt-4">Get started</a>
						</div>

						<!-- Card footer -->
						<div class="card-footer bg-secondary bg-opacity-50 p-4">
							<!-- List -->
							<ul class="list-group list-group-borderless mb-0">
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Up to 20 users monthly</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Free 12 host domain</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Google docs style editors</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Support for 30+ languages</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Landing pages Web widgets</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Customizable features</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Pricing item -->
				<div class="col-md-6 col-xl-3 mb-5 mb-xl-0">
					<div class="card shadow p-1">
						<!-- Badge -->
						<div class="bg-primary-grad small text-white rounded position-absolute top-0 start-50 translate-middle px-3 py-1">Recommended</div>

						<!-- Card header -->
						<div class="card-header bg-secondary-grad rounded-top p-4 pb-0">
							<!-- Icon -->
							<div class="icon-lg bg-pink rounded-circle mb-3">
								<i class="bi bi-rocket-takeoff-fill fa-lg lh-1 text-white"></i>
							</div>
							<!-- Title and price -->
							<h6 class="mb-3">Enterprise plan</h6>
							<p class="mb-0"> <span class="h2 mb-0 plan-price" data-monthly-price="$99" data-annual-price="$75">$99</span> /month</p>
							<small>Basic feature for up to 80 users</small>
							<!-- Button -->
							<a href="#" class="btn btn-white-shadow w-100 mt-4">Get started</a>
						</div>

						<!-- Card footer -->
						<div class="card-footer bg-secondary-grad p-4">
							<!-- List -->
							<ul class="list-group list-group-borderless mb-0">
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Up to 50 users monthly</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Free 25 host domain</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Google docs style editors</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Support for 30+ languages</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Landing pages Web widgets</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Customizable features</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>24/7 dedicated Support</li>
							</ul>
						</div>
					</div>
				</div>

				<!-- Pricing item -->
				<div class="col-md-6 col-xl-3 mb-5 mb-xl-0">
					<div class="card shadow overflow-hidden p-1">
						<!-- Card header -->
						<div class="card-header bg-secondary bg-opacity-50 position-relative overflow-hidden p-4 pb-0">
							<!-- Blur decoration -->
							<div class="position-absolute top-0 end-0 mt-n8 me-n5">
								<img src="/static/dashkit/images/blur-decoration.svg" class="blur-7 opacity-2 h-300px" alt="Grad shape">
							</div>
							<!-- Icon -->
							<div class="icon-lg bg-body shadow-primary rounded-circle mb-3">
								<i class="bi bi-headset fa-lg lh-1 heading-color"></i>
							</div>
							<!-- Title and price -->
							<h6 class="mb-3">Business plan</h6>
							<h2>Custom</h2>
							<small>Customize feature according to users</small>
							<!-- Button -->
							<a href="#" class="btn btn-dark btn-transition w-100 mt-4">Request pricing</a>
						</div>

						<!-- Card footer -->
						<div class="card-footer bg-secondary bg-opacity-50 p-4">
							<!-- List -->
							<ul class="list-group list-group-borderless mb-0">
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Unlimited projects</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Custom reporting and analytics</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Dedicated account manager</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Tailored support and consulting</li>
								<li class="list-group-item d-flex heading-color mb-0"><i class="bi bi-check-lg text-primary me-1"></i>Customizable features</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pricing box END -->
</section>