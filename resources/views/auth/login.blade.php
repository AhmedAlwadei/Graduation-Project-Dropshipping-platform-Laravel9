@extends('user.Layouts.app')

@section('Content')
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="d-flex justify-content-center py-4">
                    <a href="index.html" class="logo d-flex align-items-center w-auto">
                        <img src="assets/img/logo.png" alt="">
                        {{-- <span class="d-none d-lg-block">{{ __('تسجيل الدخول') }}</span> --}}
                    </a>
                </div><!-- End Logo -->

                <div class="card login mb-3" style="font-size: 20px !important;">
                    <div class="card-body">
                        <div class="pt-4 pb-2">
                            <h5 class="card-title text-center pb-0 fs-4">تسجيل الدخول الى حسابك</h5>
                            <p class="text-center small">ادخل اسم المستخدم وكلمة السر </p>
                        </div>

                        <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate>
                            @csrf

                            <div class="col-12">
                                <label for="userLogin" class="form-label">الاسم/الهاتف/الايميل</label>
                                <div class="input-group has-validation">
                                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                                    <input type="text" name="userLogin" class="form-control @error('userLogin') is-invalid @enderror" id="userLogin" required value="{{ old('userLogin') }}" autocomplete="userLogin" autofocus>
                                    @error('userLogin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <div class="invalid-feedback">ادخل اسم المستخدم او الايميل</div>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="password" class="form-label">{{ __('كلمة السر') }}</label>
                                <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="invalid-feedback">ادخل كلمة السر</div>
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <label class="form-check-label" for="rememberMe">تذكرني</label>
                                    <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit">{{ __('دخول') }}</button>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">ليس لديك حساب؟ <a href="{{ route('register') }}">{{ __('انشاء حساب') }}</a></p>
                            </div>
                            <div class="col-12">
                                <p class="small mb-0">نسيت كلمة السر؟ <a href="{{ route('password.request') }}">{{ __('استعادة كلمة السر') }}</a></p>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="credits">
                    {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
                </div>

            </div>
        </div>
    </div>
@endsection
