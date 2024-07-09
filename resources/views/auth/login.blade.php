<x-guest-layout>
    <section class="section">
        <div class="container mt-5">
            <div class="row">

                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

                    @if ($message = Session::get('error'))
                    <div class="alert alert-warning alert-has-icon">
                        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                        <div class="alert-body">
                        <div class="alert-title">Gagal login google</div>
                        {{ $message }}
                        </div>
                    </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email"
                                        tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                        tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input"
                                            tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>

                            <div class="mt-4 mb-3 text-center">
                                <div class="text-job text-muted">Login With Social</div>
                            </div>
                            <div class=" row sm-gutters">
                                <div class=" col-12">
                                    <a href="{{route('login.google')}}" class=" btn btn-block btn-social btn-google">
                                        <span class="fab fa-google"></span> Google
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center text-muted">
                        Belum punya akun? <a href="{{route('register')}}">Buat akun</a>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; 2024 <div class="bullet"></div> Dibuat oleh Admin and Team</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
