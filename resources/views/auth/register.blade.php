{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


<x-guest-layout>
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-4 offset-md-2 col-lg-8 offset-lg-2 col-xl-4 offset-xl-4">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label for="frist_name">Name</label>
                                        <input id="name" type="text" class="form-control" type="text"
                                            name="name" :value="old('name')" required autofocus
                                            autocomplete="name">
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="d-block">Password</label>
                                    <input min="5" id="password" type="password" class="form-control pwstrength"
                                        data-indicator="pwindicator" type="password" name="password" required
                                        autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    <div id="pwindicator" class="pwindicator">
                                        <div class="bar"></div>
                                        <div class="label"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password2" class="d-block">Password Confirmation</label>
                                    <input min="5" id="password2" type="password" class="form-control" type="password"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                </div>
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
                            </form>
                        </div>
                    </div>
                    <div class="mt-5 text-center text-muted">
                        Sudah punya akun? <a href="{{route('login')}}">Login</a>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; 2024 <div class="bullet"></div> Dibuat oleh Admin and Team</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
