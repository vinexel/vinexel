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
                    <form action="{{ route('auth.verify') }}" method="POST">
                        <div class="mb-3">
                            <input type="text" name="code" class="form-control" id="floatingInput" placeholder="Input your verification code" value="{{verification_code}}" required>
                        </div>
                        <div class="mt-4">
                            <button name="submit" id="submit" class="btn btn-primary w-full">Finish</button>
                        </div>
                        <p class="mt-5 text-muted">Tidak yakin? batalkan pendafataran <a href="{{route('home')}}" class="f-w-400 text-primary">Batalkan</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>