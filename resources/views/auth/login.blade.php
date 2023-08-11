@extends('layouts.auth.app')

@section('title', 'Sign In')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">

                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <img src="{{ asset('assets/images/logo-login.png') }}" alt="" height="100" />
                        <h5 class="mt-3 text-primary">Welcome Back, Please Enter Your Details </h5>
                        <p class="text-muted">Drafter Monitoring System</p>
                    </div>
                    <div class="p-2 mt-4">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div class="mb-3" id="input-email">
                                <label for="nik" class="form-label">Nik</label>
                                <input type="nik" class="form-control" id="nik" placeholder="Enter Nik"
                                    name="nik" value="{{ old('email') }}" autocomplete="nik" autofocus tabindex="1">
                                <x-form.validation.error name="nik" />
                            </div>

                            <div class="mb-3" id="input-password">
                                <div class="float-end">
                                    <a href="{{ route('password.request') }}" class="text-muted">Forgot password?</a>
                                </div>
                                <label class="form-label" for="password-input">Password</label>
                                <div class="position-relative auth-pass-inputgroup mb-3">
                                    <input type="password" class="form-control pe-5 password-input"
                                        placeholder="Enter password" id="password-input" name="password"
                                        autocomplete="current-password" tabindex="2">
                                    <button
                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                        type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                    <x-form.validation.error name="password" />
                                </div>
                            </div>

                            {{-- <div class="mb-3 d-none" id="input-nik">
              <label for="nik" class="form-label">No NIK</label>
              <input type="teks" class="form-control" id="nik" placeholder="Enter NO NIK" name="nik"
                value="{{ old('nik') }}">
              <x-form.validation.error name="nik" />
            </div> --}}

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="auth-remember-check"
                                    name="remember" {{ old('remember') ? 'checked' : '' }} tabindex="3">
                                <label class="form-check-label" for="auth-remember-check">Remember me</label>
                            </div>

                            <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit" tabindex="4">Sign In</button>
                            </div>

                            {{-- <div class="mt-4 text-center">
              <div class="signin-other-title">
                <h5 class="fs-13 mb-4 title">Sign In with</h5>
              </div>
              <div>
                <button id="btn-login-with-email" type="button"
                  class="btn btn-primary btn-icon waves-effect waves-light">Email</button>
                <button id="btn-login-with-nik" type="button"
                  class="btn btn-danger btn-icon waves-effect waves-light">NIK</button>
              </div>
            </div> --}}
                        </form>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="mt-4 text-center">
                <p class="mb-0">Don't have an account ? <a href="{{ route('register') }}"
                        class="fw-semibold text-primary text-decoration-underline"> Signup </a> </p>
            </div>

        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(() => {
            const btnLoginWithEmail = $('#btn-login-with-email')
            const btnLoginWithnik = $('#btn-login-with-nik')

            const inputEmail = $('#input-email')
            const inputPassword = $('#input-password')
            const inputNik = $('#input-nik')

            btnLoginWithEmail.click(() => {
                // show input email, password
                inputEmail.removeClass('d-none')
                inputPassword.removeClass('d-none')

                // hide input nik
                inputNik.addClass('d-none')
            })

            btnLoginWithnik.click(() => {
                // show input nik
                inputNik.removeClass('d-none')

                // hide input email, password
                inputEmail.addClass('d-none')
                inputPassword.addClass('d-none')
            })
        })
    </script>
@endpush
