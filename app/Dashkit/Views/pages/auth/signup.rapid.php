<div class="auth-main relative">
    <div class="auth-wrapper v2 flex items-center w-full h-full min-h-screen">
        <div class="auth-form flex items-center justify-center grow flex-col min-h-screen bg-cover relative p-6 bg-theme-cardbg dark:bg-themedark-cardbg">
            <div class="card sm:my-12 w-full max-w-[480px] border-none shadow-none">
                <div class="card-body sm:!p-10">
                    <div class="text-center">
                        <div class="my-4">
                            <a href="{{route('home')}}">
                                <img src="{{asset('images/logo.png')}}" alt="img" class="mx-auto" width="120">
                            </a>
                        </div>
                    </div>
                    {{ flash() }}
                    <form action="{{ route('auth.signup') }}" method="POST">
                        <div class="mb-3">
                            <input type="text" name="user_name" class="form-control" placeholder="Full Name" required>
                        </div>
                        <div class="grid grid-cols-12 gap-x-6">
                            <div class="col-span-12 sm:col-span-6">
                                <div class="mb-3">
                                    <input type="email" name="user_email" class="form-control" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6">
                                <div class="mb-3">
                                    <input type="number" name="user_phone" class="form-control" placeholder="Phone Number" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="user_password" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="mb-4">
                            <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <div class="mb-4">
                            <input type="number" name="user_pin" class="form-control" placeholder="PIN Number" required>
                        </div>
                        <div class="flex mt-1 justify-between items-center flex-wrap">
                            <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" id="customCheckc1" checked="">
                                <label class="form-check-label text-muted" for="customCheckc1">I agree to all the Terms & Condition</label>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button name="submit" id="submit" class="btn btn-primary w-full">Next</button>
                        </div>
                    </form>
                    <div class="relative my-5">
                        <div aria-hidden="true" class="absolute flex inset-0 items-center">
                            <div class="w-full border-t border-theme-border dark:border-themedark-border"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="px-4 bg-theme-cardbg dark:bg-themedark-cardbg">OR</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <div class="grid my-4">
                            <button type="button" class="btn mt-2 flex items-center justify-center gap-2 text-theme-bodycolor dark:text-themedark-bodycolor bg-theme-bodybg dark:bg-themedark-bodybg border border-theme-border dark:border-themedark-border hover:border-primary-500 dark:hover:border-primary-500">
                                <img src="{{asset('auth/images/facebook.svg')}}" alt="img">
                                <span>Sign In with Facebook</span>
                            </button>
                            <button type="button" class="btn mt-2 flex items-center justify-center gap-2 text-theme-bodycolor dark:text-themedark-bodycolor bg-theme-bodybg dark:bg-themedark-bodybg border border-theme-border dark:border-themedark-border hover:border-primary-500 dark:hover:border-primary-500">
                                <img src="{{asset('auth/images/google.svg')}}" alt="img">
                                <span>Sign In with Google</span>
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-between items-end flex-wrap mt-4">
                        <h6 class="f-w-500 mb-0">Already have an Account?</h6>
                        <a href="{{ route('signin') }}" class="text-primary-500">Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->