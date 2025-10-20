<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="scheduleCall" aria-labelledby="scheduleCallLabel">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title" id="scheduleCallLabel">Schedule a call</h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <form class="row g-3">
            <div class="col-12">
                <label class="form-label">Your name *</label>
                <input type="text" class="form-control form-control-sm" placeholder="Full name">
            </div>

            <div class="col-12">
                <label class="form-label">Email address *</label>
                <input type="email" class="form-control form-control-sm" id="floatingInput" placeholder="name@example.com">
            </div>

            <div class="col-6">
                <label class="form-label">Schedule date *</label>
                <input type="date" class="form-control form-control-sm">
            </div>

            <div class="col-6">
                <label class="form-label">Schedule date *</label>
                <input type="time" class="form-control form-control-sm">
            </div>

            <div class="col-12">
                <label class="form-label">Phone number *</label>
                <input type="text" class="form-control form-control-sm" placeholder="(xxx) xx xxxx">
            </div>

            <div class="col-12">
                <label class="form-label">Subject *</label>
                <input type="text" class="form-control form-control-sm" placeholder="Subject name">
            </div>

            <div class="col-12">
                <label class="form-label">Message *</label>
                <textarea class="form-control" placeholder="Write your message here...." id="floatingTextarea2" style="height: 150px"></textarea>
            </div>

            <button class="btn btn-primary mb-0">Send a message</button>
        </form>

    </div>
</div>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="signin" aria-labelledby="signinLabel">
    <div class="offcanvas-header">
        <h6 class="offcanvas-title" id="signinLabel">{{__('general.login')}}</h6>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <form class="row g-3" action="{{ route('auth.signin') }}" method="POST">
            <div class="col-12">
                <label class="form-label">Email address *</label>
                <input type="email" class="form-control form-control-sm" name="user_email" id="floatingInput" placeholder="vinexel@vinexel.com" value="vinexel@vinexel.com">
            </div>

            <div class="col-12">
                <label class="form-label">Password *</label>
                <input type="password" class="form-control form-control-sm" name="user_password" placeholder="vinexel" value="vinexel">
            </div>


            <button class="btn btn-primary mb-0" type="submit" name="submit">{{__('general.login')}}</button>
        </form>

        <div class="col-12 mt-5 text-center">
            <a href="{{route('signin')}}" class="btn btn-sm btn-primary mb-0">Other login page<i class="bi bi-arrow-right ms-2"></i></a>
        </div>
    </div>
</div>