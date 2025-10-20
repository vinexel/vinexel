<div class="auth-main relative">
    <div class="auth-wrapper v1 flex items-center w-full h-full min-h-screen">
        <div class="auth-form flex items-center justify-center grow flex-col min-h-screen bg-cover relative p-6 bg-[url('../images/authentication/img-auth-bg.jpg')] dark:bg-none dark:bg-themedark-bodybg">
            <div class="card sm:my-12 w-full max-w-[480px] shadow-none">
                <div class="card-body !p-10">
                    <a href="{{route('dashboard')}}">
                        <img src="{{asset('images/logo.png')}}" class="mb-4 img-fluid" alt="img" width="120">
                    </a>
                    <div class="mb-4">
                        <h3 class="mb-2">
                            <b>Reset Password</b>
                        </h3>
                        {{ flash() }}
                        <p class="text-muted">Please choose your new password</p>
                    </div>
                    <form action="ChangePasswordProcess" method="POST">
                        <div class="mb-3">
                            <input name="user_email" value="{{user_session_email}}" class="form-control" id="floatingInput" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Old Password</label>
                            <input type="password" name="current_password" class="form-control" id="floatingInput" placeholder="Password">
                        </div>
                        <hr class="border-secondary-500/10 my-4">
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" name="new_password" class="form-control" id="floatingInput" placeholder="Password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm New Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="floatingInput1" placeholder="Confirm Password">
                        </div>
                        <div class="grid mt-4">
                            <button type="submit" name="submit" class="btn btn-primary disabled">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>