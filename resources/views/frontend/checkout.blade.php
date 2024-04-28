@extends('frontend.layouts.app')
@section('title', 'Thanh toán')
@section('body-attr') style="background-color: #ebebf2;" @endsection

@section('content')

<!-- Breadcrumb Starts Here -->
<div class="py-0">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 align-items-center">
                <li class="breadcrumb-item"><a href="index.html" class="fs-6 text-secondary">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="checkout.html" class="fs-6 text-secondary">Thanh Toán</a></li>
            </ol>
        </nav>
    </div>
</div>

<!-- Checkout Area Starts Here -->
<section class="section checkout-area">
    <div class="container">
        @if(request()->session()->get('studentLogin'))

        <div class="row">
            <div class="col-lg-6 checkout-area-checkout">
                <h6 class="checkout-area__label">Kiểm hàng</h6>
                <div class="checkout-tab">
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-checkout" role="tabpanel"
                            aria-labelledby="pills-checkout-tab">
                            <form action="{{route('payment.ssl.submit')}}" method="post">
                                @csrf
                                <div class="mb-4">
                                    <div class="ps-0 ">
                                        <label class="text-danger"> *
                                            Vui lòng kiểm lại trước khi thanh toán
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="button button-lg button--primary w-100"> Ấn vào đây để thanh toán
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="checkout-area-summery">
                    <h6 class="checkout-area__label">Cơ bản</h6>

                    <div class="cart">
                        <div class="cart__includes-info cart__includes-info--bordertop-0">
                            <div class="productContent__wrapper">
                                @php $total = 0 @endphp
                                @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                @php $total += $details['price'] * $details['quantity'] @endphp
                                <div class="productContent">
                                    <div class="productContent-item__img productContent-item">
                                        <img src="{{asset('uploads/courses/' . $details['image'])}}"
                                            alt="checkout" />
                                    </div>
                                    <div class="productContent-item__info productContent-item">
                                        <h6 class="font-para--lg">
                                            <a
                                                href="{{route('courseDetails', encryptor('encrypt', $id))}}">{{$details['title_en']}}</a>
                                        </h6>
                                        <p>by {{$details['instructor']}}</p>
                                        <div class="price">
                                            <h6 class="font-para--md">{{$details['price'] ? 'VNĐ' . $details['price'] :
                                                'Free'}}</h6>
                                            <p><del>{{$details['old_price'] ? 'VNĐ' . $details['old_price'] : ''}}</del>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif

                            </div>
                        </div>
                        <div class="cart__checkout-process">
                            <ul>
                                <li>
                                    <p>Subtotal</p>
                                    <p>{{'VNĐ' . number_format((float) session('cart_details')['cart_total'] , 2)}}
                                    </p>
                                    {{-- {{ 'VNĐ' . (session('cart_details') && array_key_exists('cart_total',
                                    session('cart_details')) ? number_format(session('cart_details')['cart_total'], 2) :
                                    '0.00') }} --}}
                                </li>
                                <li>
                                    <p>Coupon Discount ({{session('cart_details')['discount'] ?? 0.00}}%)</p>
                                    <p>{{'VNĐ' . number_format((float) isset(session('cart_details')['discount_amount']) ?
                                        session('cart_details')['discount_amount']: 0.00 , 2)}}</p>
                                </li>
                                <li>
                                    <p>Thuế (15%)</p>
                                    <p>{{'VNĐ' . number_format((float) session('cart_details')['tax'] , 2)}}</p>
                                    {{-- {{ 'VNĐ' . (session('cart_details') && array_key_exists('tax',
                                    session('cart_details')) ? number_format(session('cart_details')['tax'], 2) :
                                    '0.00') }} --}}
                                </li>
                                <li>
                                    <p class="font-title--card">Tổng:</p>
                                    <p class="total-price font-title--card">{{'VNĐ' .
                                        number_format((float)session('cart_details')['total_amount'] , 2)}}</p>
                                    {{-- {{ 'VNĐ' . (session('cart_details') && array_key_exists('total_amount',
                                    session('cart_details')) ? number_format(session('cart_details')['total_amount'], 2)
                                    : '0.00') }} --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <!-- SignIn Area Starts Here -->
        <section class="section signin overflow-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 offset-xl-3 order-2 order-xl-0">
                        <div class="signup-area-textwrapper">
                            <h2 class="font-title--md mb-0">Đăng nhập</h2>
                            <p class="mt-2 mb-lg-4 mb-3">Chưa có tài khoản?
                                <a href="#" onclick="hide_signin()" class="text-black-50">Đăng kí</a>
                            </p>
                            <form action="{{route('studentLogin.check','checkout')}}" method="POST">
                                @csrf
                                <div class="form-element">
                                    <label for="email">Email</label>
                                    <input type="email" placeholder="Username" id="email" name="email" />
                                    @if($errors->has('email'))
                                    <small class="d-block text-danger">{{$errors->first('email')}}</small>
                                    @endif
                                </div>
                                <div class="form-element">
                                    <div class="d-flex justify-content-between">
                                        <label for="password">Password</label>
                                        <a href="forget-password.html" class="text-primary fs-6">Quên mật khẩu</a>
                                    </div>
                                    <div class="form-alert-input">
                                        <input type="password" placeholder="Type here..." id="password"
                                            name="password" />
                                        <div class="form-alert-icon" onclick="showPassword('password',this);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-eye">
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
                                    <button type="submit" class="button button-lg button--primary w-100">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SignIn Area Ends Here -->

        <!-- SignUp Area Starts Here -->
        <section class="signup" style="display:none">
            <div class="container">
                <div class="row align-items-center justify-content-md-center">
                    <div class="col-lg-5 order-2 order-lg-0">
                        <div class="signup-area-textwrapper">
                            <h2 class="font-title--md mb-0">Đăng kí</h2>
                            <p class="mt-2 mb-lg-4 mb-3">Đã có tài khoản? <a href="#" onclick="hide_signin()"
                                    class="text-black-50">Đăng nhập</a></p>
                            <form action="{{route('studentRegister.store','checkout')}}" method="POST">
                                @csrf
                                <div class="form-element">
                                    <label for="name">Tên đầy đủ</label>
                                    <input type="text" placeholder="Enter Your Name" id="name" value="{{old('name')}}"
                                        name="name" />
                                    @if($errors->has('name'))
                                    <small class="d-block text-danger">{{$errors->first('name')}}</small>
                                    @endif
                                </div>
                                <div class="form-element">
                                    <label for="email">Email</label>
                                    <input type="email" placeholder="example@email.com" id="email"
                                        value="{{old('email')}}" name="email" />
                                    @if($errors->has('email'))
                                    <small class="d-block text-danger">{{$errors->first('email')}}</small>
                                    @endif
                                </div>
                                <div class="form-element">
                                    <label for="password" class="w-100" style="text-align: left;">mật khẩu</label>
                                    <div class="form-alert-input">
                                        <input type="password" placeholder="Type here..." id="password"
                                            name="password" />
                                        <div class="form-alert-icon" onclick="showPassword('password',this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-eye">
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
                                        <input type="password" placeholder="Type here..." name="password_confirmation"
                                            id="password_confirmation" />
                                        <div class="form-alert-icon"
                                            onclick="showPassword('password_confirmation',this)">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-eye">
                                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                <circle cx="12" cy="12" r="3"></circle>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-element d-flex align-items-center terms">
                                    <input class="checkbox-primary me-1" type="checkbox" id="agree" />
                                    <label for="agree" class="text-secondary mb-0">Lưu thay đổi <a href="#"
                                            style="text-decoration: underline;">Điều khoản</a> and <a href="#"
                                            style="text-decoration: underline;">Giấy phép bảo mật</a></label>
                                </div>
                                <div class="form-element">
                                    <button type="submit" class="button button-lg button--primary w-100">Đăng ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7 order-1 order-lg-0">
                        <div class="signup-area-image">
                            <img src="{{asset('frontend/dist/images/signup/Illustration.png')}}"
                                alt="Illustration Image" class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- SignUp Area Ends Here -->

        @endif
    </div>
</section>
<!-- Checkout Area Ends Here -->

@endsection

@push('scripts')
<script>
    function hide_signin(){
        $('.signin').toggle();
        $('.signup').toggle();
    }
</script>
@endpush