<section class="position-relative pt-0">
	<div class="container bg-secondary-grad rounded-4 p-4 p-md-6 p-xxl-8">

		<div class="inner-container-small">
			<!-- Title -->
			<h1 class="fw-bold mb-2 lh-base text-center"><i class="bi bi-emoji-smile me-2"></i>{{__('general.say')}}
				<span class="cd-headline clip big-clip is-full-width text-primary-grad mb-0">
					<span class="typed" data-type-text="{{__('contact.form_greeting')}}"></span>
				</span>
			</h1>
			<p class="text-center">{{__('contact.form_text')}}</p>

			<!-- Form START -->
			<form class="row form-border-transparent g-3 mt-4">
				<div class="col-md-6">
					<label class="form-label">Your name</label>
					<input type="text" class="form-control">
				</div>
	
				<div class="col-md-6">
					<label class="form-label">Email address</label>
					<input type="email" class="form-control" id="floatingInput">
				</div>

				<div class="col-md-6">
					<label class="form-label">Mobile number</label>
					<input type="text" class="form-control">
				</div>
	
				<div class="col-md-6">
					<label class="form-label">Subject</label>
					<input type="text" class="form-control">
				</div>
	
				<div class="col-12">
					<label class="form-label">Message</label>
					<textarea class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
				</div>

				<div class="col-12">
					<!-- Check box -->
					<div class="form-check">
						<input type="checkbox" class="form-check-input border" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1">I agree that my data is <a href="#" class=" hover-underline-animation text-primary-hover">collected and stored</a>.</label>
					</div>
				</div>

				<div class="col-12 d-sm-flex align-items-center gap-3 mt-4">
					<!-- Button -->
					<button class="btn btn-primary mb-2 mb-md-0">Send a message</button>
					<!-- Social links -->
					<ul class="list-inline mb-0 ms-auto">
						<li class="list-inline-item small heading-color">Connect with:</li>
						<li class="list-inline-item"> <a href="#" class="heading-color text-primary-hover"><i class="bi bi-facebook"></i></a> </li>
						<li class="list-inline-item"> <a href="#" class="heading-color text-primary-hover"><i class="bi bi-instagram"></i></a> </li>
						<li class="list-inline-item"> <a href="#" class="heading-color text-primary-hover"><i class="bi bi-twitter-x"></i></a> </li>
						<li class="list-inline-item"> <a href="#" class="heading-color text-primary-hover"><i class="bi bi-linkedin"></i></a> </li>
					</ul>
				</div>
			</form>
			<!-- Form END -->
		</div>
	</div>
</section>