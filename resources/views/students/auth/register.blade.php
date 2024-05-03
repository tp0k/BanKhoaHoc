@extends('frontend.layouts.app')
@section('title', 'Đăng ký')
@section('header-attr') class="nav-shadow" @endsection

@section('content')
<!-- SignUp Area Starts Here -->
<section class="signup-area signin-area p-3">
    <div class="container">
        <div class="row align-items-center justify-content-md-center">
            <div class="col-lg-5 order-2 order-lg-0">
                <div class="signup-area-textwrapper">
                    <h2 class="font-title--md mb-0">Đăng ký học viên</h2>
                    <form action="{{route('studentRegister.store','studentdashboard')}}" method="POST">
                        @csrf
                        <div class="form-element">
                                <label for="name">Họ và tên</label>
                                <input type="text" placeholder="Họ và tên của bạn" id="name" value="{{old('name')}}" name="name" />
                                @if($errors->has('name'))
                                    <small class="d-block text-danger">{{$errors->first('name')}}</small>
                                @endif
                        </div>
                        <div class="form-element">
                                <label for="email">Email</label>
                                <input type="email" placeholder="example@email.com" id="email" value="{{old('email')}}" name="email" />
                                @if($errors->has('email'))
                                    <small class="d-block text-danger">{{$errors->first('email')}}</small>
                                @endif
                        </div>
                        <div class="form-element">
                            <label for="password" class="w-100" style="text-align: left;">
                                <label >mật khẩu</label>
                                <small class="d-block text-muted">Có ít nhất 8 ký tự gồm chữ hoa, thường, số, và ký tự đặc biệt.</small>
                            </label>
                            
                            <div class="form-alert-input">
                                <input type="password" placeholder="Mật khẩu của bạn" id="password"  name="password"/>
                                <div class="form-alert-icon" onclick="showPassword('password',this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                                @if($errors->has('password'))
                                    <small class="d-block text-danger">{{$errors->first('password')}}</small>
                                @endif
                            </div>
                        </div>
                        <div class="form-element">
                            <label for="password_confirmation" class="w-100" style="text-align: left;">Nhập lại mật khẩu</label>
                            <div class="form-alert-input">
                                <input type="password" placeholder="Nhập lại mật khẩu của bạn" name="password_confirmation" id="password_confirmation" />
                                <div class="form-alert-icon" onclick="showPassword('password_confirmation',this)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-eye">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="form-element d-flex align-items-center terms">
                            <input class="checkbox-primary me-1" type="checkbox" id="agree" />
                            <label for="agree" class="text-secondary mb-0">Chấp nhận <a href="#"
                                    style="text-decoration: underline;"> điều khoản</a> và <a href="#"
                                    style="text-decoration: underline;"> chính sách bảo mật</a></label>
                        </div>
                        <div class="form-element">
                            <button type="submit" class="button button-lg button--primary w-100">Đăng ký</button>
                        </div>
                    </form>
                    <p class="mt-2 mb-lg-4 mb-3">Đã có tài khoản? <a href="{{route('studentLogin')}}" class="text-black-50">Đăng nhập</a></p>
                </div>
            </div>
            <div class="col-lg-7 order-1 order-lg-0">
                <div class="signup-area-image">
                    <img src="{{asset('frontend/dist/images/signup/Illustration.png')}}" alt="Illustration Image"
                        class="img-fluid" /> 
                </div>
            </div>
        </div>
    </div>
</section>
<!-- SignUp Area Ends Here -->

@endsection