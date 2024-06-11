@extends('frontend.layouts.app')
@section('title', 'Về chúng tôi')
@section('header-attr') class="nav-shadow" @endsection

@section('content')
<!-- Breadcrumb Starts Here -->
<div class="py-0">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="http://127.0.0.1:8000/" class="fs-6 text-secondary">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active">
                    <a href="http://127.0.0.1:8000/about" class="fs-6 text-secondary">Về chúng tôi</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->

<!-- About Intro Starts Here -->
<section class="about-intro section">
    <div class="gray-box"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 position-relative mt-4 mt-lg-0" style="z-index: 0;">
                <div class="about-intro__img-wrapper">
                    <img src="{{asset('frontend/dist/images/about/intro.jpg')}}" alt="Intro Image"
                        class="img-fluid rounded-2 ms-lg-5 position-relative intro-image" />
                </div>
                <div class="intro-shape">
                    <img src="{{asset('frontend/dist/images/shape/rec04.png')}}" alt="Shape"
                        class="img-fluid shape-01" />
                    <img src="{{asset('frontend/dist/images/shape/dots/dots-img-09.png')}}" alt="Shape"
                        class="img-fluid shape-02" />
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-intro__textContent">
                    <h2 class="font-title--md mb-3">Một nơi tuyệt vời để phát triển.</h2>
                    <p class="mt-2 mt-lg-1 mb-2 mb-lg-4 text-secondary">
                    CNET Academy - Học viện nghiên cứu và đào tạo Công nghệ thông tin tại thành phố Hải Phòng. Quản trị mạng, quản trị hệ thống, lập trình, phát triển phần mềm, lập trình mobile
                    </p>
                    <p class="text-secondary">
                        Nếu bạn muốn biết về kiến thức công nghệ mới nhất, CNET là nơi bạn nên tìm kiếm.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Intro Ends Here -->

<!-- About Feature Starts Here -->
<section class="section aboutFeature pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-feature dark-feature">
                    <h5 class="text-white font-title--sm">Chúng tôi là ai</h5>
                    <p class="text-lowblack">
                    CNET Academy - Học viện nghiên cứu và đào tạo Công nghệ thông tin tại thành phố Hải Phòng. Quản trị mạng, quản trị hệ thống, lập trình, phát triển phần mềm, lập trình mobile
                    </p>
                </div>
            </div>
            <div class="col-lg-6 mt-4 mt-lg-0">
                <div class="about-feature">
                    <h5 class="font-title--sm">Sứ mệnh</h5>
                    <p class="text-secondary">
                    Phổ cập kiến thức Công nghệ thông tin, giúp người dân Việt Nam không bị tụt hậu so với thế giới, tiến tới có những công ty công nghệ lớn tại Việt Nam.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Feature Ends Here -->

<!-- Brands Starts Here -->
<section class="section overflow-hidden brands pb-lg-0">
    <div class="bg-secondary py-80">
        <div class="container">
            <div class="row mb-40">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="brands__titleContent">
                        <h5 class="mb-2 dark-text font-title--sm">
                            Làm việc với hơn 500+ Trường Trung học & Trường Đại học và các cơ sở giáo dục uy tín.
                        </h5>
                        <p class="font-para--lg">
                            Nằm trong TOP các nền tảng giáo dục online tại Việt Nam.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="brand-area">
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/1.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/2.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/3.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/4.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/2.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                        <div class="brand-area-image">
                            <img src="{{asset('frontend/dist/images/versity/5.png')}}" alt="Brand"
                                class="img-fluid" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
@endpush