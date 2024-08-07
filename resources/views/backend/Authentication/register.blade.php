@extends('backend.layouts.appAuth')
@section('title', 'Đăng ký nhân viên')

@section('content')

<div class="authincation h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-md-6">
                <div class="authincation-content">
                    <div class="row no-gutters">
                        <div class="col-xl-12">
                            <div class="auth-form">
                                <h4 class="text-center mb-4">Đăng ký tài khoản nhân viên</h4>
                                <form action="{{route('register.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label><strong>Họ và tên</strong></label>
                                        <input type="text" class="form-control" value="{{old('name')}}" name="name"
                                            id="name" placeholder="Họ và tên của bạn">
                                        @if($errors->has('name'))
                                        <small class="d-block text-danger">{{$errors->first('name')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Email</strong></label>
                                        <input type="email" class="form-control" value="{{old('email')}}" name="email"
                                            id="email" placeholder="example@email.com">
                                        @if($errors->has('email'))
                                        <small class="d-block text-danger">{{$errors->first('email')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Số điện thoại</strong></label>
                                        <input type="text" class="form-control" value="{{old('contact_en')}}"
                                            name="contact_en" id="contact_en" placeholder="Số điện thoại">
                                        @if($errors->has('contact_en'))
                                        <small class="d-block text-danger">{{$errors->first('contact_en')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <strong>Mật khẩu</strong>
                                            <small class="d-block text-muted">Có ít nhất 8 ký tự gồm chữ hoa, thường, số, và ký tự đặc biệt.</small>
                                        </label>
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="Nhập mật khẩu">
                                        @if($errors->has('password'))
                                        <small class="d-block text-danger">{{$errors->first('password')}}</small>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label><strong>Nhập lại mật khẩu</strong></label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="Nhập lại mật khẩu">
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                                    </div>
                                </form>
                                <div class="new-account mt-3">
                                    <p>Đã có tài khoản? <a class="text-primary" href="{{route('login')}}">Đăng nhập</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection