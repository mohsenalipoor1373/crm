@extends('layouts.app')

@section('content')
    <div class="limiter" style="font-family: Shabnam" dir="rtl">
        <div class="container-login100" style="font-family: Shabnam">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
                    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}"
                          autocomplete="off">
                        @csrf
                        <span class="login100-form-title p-b-33" style="font-family: Shabnam">
						 سیستم مدیریت
					</span>

                    <div class="wrap-input100 validate-input" data-validate = "وارد کردن نام کاربری الزامی میباشد">
                        <input class="input100" type="text" id="email" name="email" placeholder="نام کاربری"
                               style="font-family: Shabnam" autocomplete="off">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 rs1 validate-input" data-validate="وارد کردن کلمه عبور الزامی میباشد">
                        <input class="input100" type="password" name="password" autocomplete="off"
                               id="password" placeholder="کلمه عبور" style="font-family: Shabnam">
                        <span class="focus-input100-1"></span>
                        <span class="focus-input100-2"></span>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <div class="container-login100-form-btn m-t-20">
                        <button type="submit" class="login100-form-btn" style="font-family: Shabnam">
                            ورود به نرم افزار
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
