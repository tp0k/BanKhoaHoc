@extends('frontend.layouts.app')
@section('title', "Hồ sơ giảng viên")
@section('body-attr') style="background-color: #ebebf2;" @endsection

@push('styles')
<link rel="stylesheet" href="{{asset('frontend/src/scss/vendors/plugin/css/star-rating-svg.css')}}" />
@endpush

@section('content')
<!-- Breadcrumb Starts Here -->
<div class="py-0">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0">
                <li class="breadcrumb-item">
                    <a href="{{route('home')}}" class="fs-6 text-secondary">Trang chủ</a></li>
                <li class="breadcrumb-item d-none d-lg-inline-block">
                    <a href="{{route('home')}}#instructor_section" class="fs-6 text-secondary">Giảng viên</a></li>
                <li class="breadcrumb-item d-none d-lg-inline-block"><a href="#" class="fs-6 text-secondary">{{$instructor->name_en}}</a></li>
            </ol>
        </nav>
    </div>
</div>

<!-- Instructor Courses Starts Here -->
<section class="section instructor-courses">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="instructor-courses-instructor">
                    <div class="instructor-image mx-auto text-center">
                        <img src="{{asset('uploads/users/'.$instructor->image)}}" alt="Instructor" />
                    </div>
                    <div class="instructor-info text-center">
                        <h5 class="font-title--sm">{{$instructor->name_en}}</h5>
                        <p class="text-secondary mb-3">{{$instructor->designation}}</p>
                       
                    </div>
                    <div class="instructor-course-info ">
                        <div class="instructor-course-info-courses ">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <svg width="32" height="28" viewBox="0 0 32 28" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M2 1.75H10.4C11.8852 1.75 13.3096 2.32361 14.3598 3.34464C15.41 4.36567 16 5.75049 16 7.19444V26.25C16 25.167 15.5575 24.1284 14.7699 23.3626C13.9822 22.5969 12.9139 22.1667 11.8 22.1667H2V1.75Z"
                                        stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M30 1.75H21.6C20.1148 1.75 18.6904 2.32361 17.6402 3.34464C16.59 4.36567 16 5.75049 16 7.19444V26.25C16 25.167 16.4425 24.1284 17.2302 23.3626C18.0178 22.5969 19.0861 22.1667 20.2 22.1667H30V1.75Z"
                                        stroke="currentColor" stroke-width="3" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            @php
                            $course = DB::table('courses')->where('status', 2)->get()->where('instructor_id', $instructor->id);
                            @endphp
                            <div class="text text-center"><h6>{{$course->count()}}</h6></div>
                            <div class="text text-center"><p>Khóa học</p></div>
                        </div>
                    </div>
                    <div class="about-instructor">
                        <h6>Thông tin về giáo viên</h6>
                        <p>{{$instructor->bio}}</p>
                    </div>

                </div>
            </div>


 <!--Liệt kê khóa học-->
            <div class="col-lg-8 mt-4 mt-lg-0">
                <div class="instructor-tabs">
                    <ul class="nav nav-pills instructor-tabs-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-courses-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-courses" type="button" role="tab"
                                aria-selected="true">Khóa học</button>
                        </li>
                    </ul>
     
                    <div class="row event-search-content">
                    @forelse ($course as $c)
                    <div class="col-md-6 mb-4">
                        <div class="contentCard contentCard--course">
                            <div class="contentCard-top">
                                <a href="{{route('courseDetails', encryptor('encrypt', $c->id))}}"><img
                                        src="{{asset('uploads/courses/'.$c->image)}}" alt="images"
                                        class="img-fluid" /></a>
                            </div>
                            <div class="contentCard-bottom">
                                <h5>
                                    <a href="{{route('courseDetails', ['id' => encryptor('encrypt', $c->id)])}}"
                                        class="font-title--card">{{$c->title_en}}</a>
                                </h5>
                                <div class="contentCard-info d-flex align-items-center justify-content-between">
                                    <div class="price">
                                        <span>
                                            @if($c->price == null)
                                                Free
                                            @else
                                                {{ number_format($c->price) }} VNĐ
                                            @endif
                                        </span>
                                        @if($c->old_price)
                                            <del><br>{{ number_format($c->old_price) }} VNĐ</del>
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="contentCard-more">
                                    <div class="d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{asset('frontend/dist/images/icon/star.png')}}"
                                                alt="star" />
                                        </div>
                                        <span>4.5</span>
                                    </div>
                                    <div class="eye d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{asset('frontend/dist/images/icon/eye.png')}}"
                                                alt="eye" />
                                        </div>
                                        <span>24,517</span>
                                    </div>
                                    <div class="book d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{asset('frontend/dist/images/icon/book.png')}}"
                                                alt="location" />
                                        </div>
                                        <span>{{$c->lesson}} bài</span>
                                    </div>
                                    <div class="clock d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{asset('frontend/dist/images/icon/Clock.png')}}"
                                                alt="clock" />
                                        </div>
                                        <span>{{$c->duration}} giờ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-6 mb-4">
                        <div class="contentCard contentCard--course">
                            <h3>Tạm thời chưa có khóa học</h3>
                        </div>
                    </div>
                    @endforelse
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Instructor Courses Ends Here -->
@endsection

@push('scripts')
<script src="{{asset('frontend/src/scss/vendors/plugin/js/jquery.star-rating-svg.js')}}"></script>
<script>
    // Toggle Menu
            const toggleMenu = document.querySelector(".menu-icon-container");
            const sidebar = document.querySelector(".navbar-mobile");
            const crossSidebar = document.querySelector(".navbar-mobile--cross");
            let menuicon = document.querySelector(".menu-icon");

            toggleMenu.addEventListener("click", function () {
                sidebar.classList.toggle("show");
                document.body.classList.toggle("over");
            });

            crossSidebar.addEventListener("click", function () {
                sidebar.classList.remove("show");
                menuicon.classList.remove("transformed");
            });

            var navMenu = [].slice.call(document.querySelectorAll(".navbar-mobile__menu-item"));

            for (var y = 0; y < navMenu.length; y++) {
                navMenu[y].addEventListener("click", function () {
                    menuClick(this);
                });
            }

            function menuClick(current) {
                const active = current.classList.contains("open");
                navMenu.forEach((el) => el.classList.remove("open"));
                if (active) {
                    current.classList.remove("open");
                } else {
                    current.classList.add("open");
                }
            }

            $(".my-rating").starRating({
                starSize: 30,
                activeColor: "#FF7A1A",
                hoverColor: "#FF7A1A",
                ratedColors: ["#FF7A1A", "#FF7A1A", "#FF7A1A", "#FF7A1A", "#FF7A1A"],
                starShape: "rounded",
            });
            $(".menu-icon-container").on("click", function () {
                $(".menu-icon").toggleClass("transformed");
            });
</script>
@endpush