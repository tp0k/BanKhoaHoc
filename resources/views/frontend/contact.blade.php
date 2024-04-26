@extends('frontend.layouts.app')
@section('title', 'Contact Us')
@section('header-attr') class="nav-shadow" @endsection

@section('content')

<!-- Breadcrumb Starts Here -->
<div class="py-0 section--bg-white">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb pb-0 mb-0">
                <li class="breadcrumb-item"><a href="index.html" class="fs-6 text-secondary">Trang chủ</a></li>
                <li class="breadcrumb-item active"><a href="contact.html" class="fs-6 text-secondary">Liên hệ</a></li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->

<!-- Contact Hero Area Starts Here -->
<section class="section section--bg-white hero hero--one">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero__img-content">
                    <div class="hero__img-content--main">
                        <img src="{{asset('frontend/dist/images/contact/cnet.ico')}}" alt="image" />
                    </div>
                    <img src="{{asset('frontend/dist/images/shape/dots/dots-img-02.png')}}" alt="shape"
                        class="hero__img-content--shape-01" />
                    <img src="{{asset('frontend/dist/images/shape/rec05.png')}}" alt="shape"
                        class="hero__img-content--shape-02" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero__content-info">
                    <h2 class="font-title--md mb-0">Thương hiệu của chúng tôi</h2>
                    <p class="font-para--lg">
                        Học viện công nghệ CNET là một mảng dịch vụ của Ztech thành lập vào năm 2017, là trung tâm đào tạo, nghiên cứu Công nghệ thông tin tại thành phố Hải Phòng, với các khóa học Quản trị mạng, Quản trị hệ thống, Lập trình web, Lập trình phần mềm, Lập trình mobile... là nơi đào tạo kiến thức, kỹ năng cần thiết năng cao về ảnh công nghệ thông tin tại Hải Phòng.

                    </p>
                    <ul class="hero__content-location">
                        <li>
                            <span><i class="fas fa-map-marker-alt fa-2x"></i></span>
                            <p>Hải Phòng</p>
                        </li>
                        <li>
                            <span><i class="fas fa-map-marker-alt fa-2x"></i></span>
                            <p>Hải Phòng</p>
                        </li>
                        <li>
                            <span><i class="fas fa-map-marker-alt fa-2x"></i></span>
                            <p>Hải Phòng</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get in Touch Area Starts Here -->
<section class="section getin-touch overflow-hidden"
    style="background-image: url({{asset('frontend/dist/images/contact/bg.png')}});">
    <div class="container">
        <div class="row">
            <h2 class="font-title--md text-center">BẤM VÀO ĐÂY!!!!!!!!!!</h2>
            <div class="col-lg-5 pe-lg-4 position-relative mb-4 mb-lg-0">
                <div class="contact-feature d-flex align-items-center">
                    <div class="contact-feature-icon primary-bg">
                     <i class="fas fa-map-marked-alt fa-2x"></i>
                    </div>
                    <div class="contact-feature-text">
                        <h6>Địa chỉ</h6>
                        <p>Tầng 4, toà nhà 22</p>
                        <p>Lý Tự Trọng - Hồng Bàng - Hải Phòng</p>
                    </div>
                </div>

                <div class="contact-feature d-flex align-items-center my-lg-4 my-3">
                    <div class="contact-feature-icon tertiary-bg">
                        <i class="far fa-envelope fa-2x"></i>
                    </div>
                    <div class="contact-feature-text">
                        <h6>Email</h6>
                        <h5>cnetacademy@gmail.com</h5>
                    </div>
                </div>

                <div class="contact-feature d-flex align-items-center">
                    <div class="contact-feature-icon success-bg">
                       <i class="fas fa-phone-alt fa-2x"></i>
                    </div>
                    <div class="contact-feature-text">
                        <h6>Số điện thoại</h6>
                        <h5>0946 075 166 | 0836 666 956</h5>
                    </div>
                </div>
                <img src="{{asset('frontend/dist/images/shape/dots/dots-img-03.png')}}" alt="Shape"
                    class="img-fluid contact-feature-shape" />
            </div>
            <div class="col-lg-7 form-area">
                <form action="#">
                    <div class="row g-3">
                        <div class="col-lg-6">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control form-control--focused" placeholder="Gõ vào đây..."
                                id="name" />
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Gõ vào đây..." id="email" />
                        </div>
                    </div>
                    <div class="row my-lg-2 my-2">
                        <div class="col-12">
                            <label for="subject">Môn học</label>
                            <input type="text" id="subject" class="form-control" placeholder="Gõ vào đây..." />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label for="message">Tin nhắn</label>
                            <textarea id="message" placeholder="Gõ vào đây..." class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-end">
                            <button type="submit" class="button button-lg button--primary fw-normal">Gửi tin nhắn</button>
                        </div>
                    </div>
                </form>
                <div class="form-area-shape">
                    <img src="{{asset('frontend/dist/images/shape/circle3.png')}}" alt="Shape"
                        class="img-fluid shape-01" />
                    <img src="{{asset('frontend/dist/images/shape/circle5.png')}}" alt="Shape"
                        class="img-fluid shape-02" />
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Get in Touch Area Ends Here -->

<!-- Map Area Starts Here -->
<div class="map-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="map-area-frame">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3728.2645643226106!2d106.67707167502661!3d20.861383980746396!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7bcb2b1fac6d%3A0x1dd4e769e80e59c8!2zSOG7jWMgdmnhu4duIGPDtG5nIG5naOG7hyBDTkVU!5e0!3m2!1svi!2sus!4v1713457780146!5m2!1svi!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Map Area Ends Here -->

@endsection