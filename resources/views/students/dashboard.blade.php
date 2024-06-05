@extends('frontend.layouts.app')
@section('title', "Dashboard học viên")
@section('body-attr') style="background-color: #ebebf2; " @endsection
<style>
    .ms-20px {
    margin-left: 20px !important;
}
</style>

@section('content')

<!-- Breadcrumb Starts Here -->
<div class="py-0">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb align-items-center bg-transparent mb-0">
                <li class="breadcrumb-item"><a href="#" class="fs-6 text-secondary">Trang chủ</a></li>
                <li class="breadcrumb-item fs-6 text-secondary" aria-current="page">Hồ sơ của bạn</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Students Info area Starts Here -->
<section class="section students-info">
    {{-- <div class="gray-box"></div> --}}
    <div class="container">
        <div class="students-info-intro">
            <!-- profile Details   -->
            <div class="students-info-intro__profile">
                <div>
                    <div class="students-info-intro-start">
                        <div class="image">
                            <img src="{{ asset('uploads/students/' . $student_info->image) }}" alt="Student" />
                        </div>
                        <div class="text">
                            <h5>{{$student_info->name_en}}</h5>
                            <p>{{$student_info->profession?$student_info->profession:'Student'}}</p>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="students-info-intro-end">
                        <div class="enrolled-courses">
                            <div class="enrolled-courses-icon">
                                <svg width="28" height="26" viewBox="0 0 28 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1 1.625H8.8C10.1791 1.625 11.5018 2.15764 12.477 3.10574C13.4521 4.05384 14 5.33974 14 6.68056V24.375C14 23.3694 13.5891 22.405 12.8577 21.6939C12.1263 20.9828 11.1343 20.5833 10.1 20.5833H1V1.625Z"
                                        stroke="#1089FF" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path
                                        d="M27 1.625H19.2C17.8209 1.625 16.4982 2.15764 15.523 3.10574C14.5479 4.05384 14 5.33974 14 6.68056V24.375C14 23.3694 14.4109 22.405 15.1423 21.6939C15.8737 20.9828 16.8657 20.5833 17.9 20.5833H27V1.625Z"
                                        stroke="#1089FF" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="enrolled-courses-text">
                                <h6 class="font-title--xs">{{$enrollment?$enrollment->count():0}}</h6>
                                <p class="fs-6 mt-1">Khóa học đã đăng ký</p>
                            </div>
                        </div>
                        <div class="completed-courses">
                            <div class="completed-courses-icon">
                                <svg width="22" height="26" viewBox="0 0 22 26" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M19.1716 3.95235C19.715 4.14258 20.078 4.65484 20.078 5.23051V13.6518C20.078 16.0054 19.2226 18.2522 17.7119 19.9929C16.9522 20.8694 15.9911 21.552 14.9703 22.1041L10.5465 24.4938L6.11516 22.1028C5.09312 21.5508 4.13077 20.8694 3.36983 19.9916C1.85791 18.2509 1 16.0029 1 13.6468V5.23051C1 4.65484 1.36306 4.14258 1.90641 3.95235L10.0902 1.07647C10.3811 0.974511 10.6982 0.974511 10.9879 1.07647L19.1716 3.95235Z"
                                        stroke="#00AF91" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M7.30688 12.4002L9.65931 14.7538L14.5059 9.90723" stroke="#00AF91"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="completed-courses-text">
                                <h5 class="font-title--xs">0</h5>
                                <p class="fs-6 mt-1">Khóa học đã hoàn thành</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Nav  -->
            <nav class="students-info-intro__nav">
                <div class="nav" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                        aria-selected="true">Bảng điều khiển</button>

                    <button class="nav-link" id="nav-coursesall-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-coursesall" type="button" role="tab" aria-controls="nav-coursesall"
                        aria-selected="false">Tất cả khóa học</button>

                    <button class="nav-link" id="nav-activecourses-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-activecourses" type="button" role="tab" aria-controls="nav-activecourses"
                        aria-selected="false">
                        Khóa học đang học
                    </button>

                    <button class="nav-link" id="nav-completedcourses-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-completedcourses" type="button" role="tab"
                        aria-controls="nav-completedcourses" aria-selected="false">
                        Khóa học đã hoàn thành
                    </button>

                    <button class="nav-link" id="nav-purchase-tab" data-bs-toggle="tab" data-bs-target="#nav-purchase"
                        type="button" role="tab" aria-controls="nav-purchase" aria-selected="false">Lịch sử thanh toán</button>

                    <button class="nav-link "><a href="{{route('student_profile')}}"
                            class="text-secondary">Hồ sơ</a></button>

                    <button class="nav-link "><a href="{{route('home')}}" class="text-secondary">Trang chủ</a></button>
                </div>
            </nav>
        </div>

        <div class="students-info-main">
            <div class="tab-content" id="nav-tabContent">
                {{-- Profile Info --}}
                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                    aria-labelledby="nav-profile-tab">
                    {{-- <div class="tab-content__profile"> --}}
                    <div>
                        <section class="section section--bg-white calltoaction">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 col-12 mx-auto text-center">
                                        <h5 class="font-title--sm">Hãy thêm khoá học bạn mong muốn</h5>
                                        <p class="my-4 font-para--lg">
                                            Hãy là người không ngừng học hỏi, vì thế giới thay đổi nhanh chóng và chỉ những người học hỏi mới có thể theo kịp.                                        </p>
                                        <a href="{{route('searchCourse')}}"
                                            class="button button-md button--primary">Đi thôi!</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                {{-- All Courses --}}
                <div class="tab-pane fade" id="nav-coursesall" role="tabpanel" aria-labelledby="nav-coursesall-tab">
                    <div class="row">
                        @forelse ($enrollment as $a)
                        <div class="col-lg-4 col-md-6 col-md-6 mb-4">
                            <div class="contentCard contentCard--watch-course">
                                <div class="contentCard-top">
                                    <a href="#"><img src="{{asset('uploads/courses/'.$a->course?->image)}}"
                                            alt="images" class="img-fluid" /></a>
                                </div>
                                <div class="contentCard-bottom">
                                    <h5>
                                        <a href="{{route('courseDetails', encryptor('encrypt', $a->course?->id))}}"
                                            class="font-title--card">{{$a->course?->title_en}}</a>
                                    </h5>
                                    <div class="contentCard-info d-flex align-items-center justify-content-between">
                                        <a href="{{route('instructorProfile', encryptor('encrypt', $a->course?->instructor->id))}}"
                                            class="contentCard-user d-flex align-items-center">
                                            <img src="{{asset('uploads/users/'.$a->course?->instructor?->image)}}"
                                                alt="client-image" class="rounded-circle" height="34" width="34" />
                                            <p class="font-para--md">{{$a->course?->instructor?->name_en}}</p>
                                        </a>
                                        {{-- <div class="contentCard-course--status d-flex align-items-center">
                                            <span class="percentage">43%</span>
                                            <p>Kết thúc</p>
                                        </div> --}}
                                    </div>
                                    <a class="button button-md button--primary-outline w-100 my-3"
                                        href="{{route('watchCourse', encryptor('encrypt', $a->course?->id))}}">Vào học ngay</a>
                                    {{-- <div class="contentCard-watch--progress">
                                        <span class="percentage" style="width: 43%;"></span>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 py-5">
                            <div class="col-md-6 col-12 mx-auto text-center">
                                <h5 class="font-title--sm">Bạn chưa đăng ký khóa học nào...</h5>
                                <p class="my-4 font-para--lg">
                                    Danh sách khóa học của bạn trống!
                                </p>
                                <a href="{{route('searchCourse')}}" class="button button-md button--primary">Đăng Ký Ngay!</a>
                            </div>
                        </div>
                        @endforelse

                        <div class="col-lg-12 mt-lg-5">
                            <div class="pagination justify-content-center pb-0">
                                <div class="pagination-group">
                                    <a href="#" class="p_prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                            viewBox="0 0 9.414 16.828">
                                            <path data-name="Icon feather-chevron-left" d="M20.5,23l-7-7,7-7"
                                                transform="translate(-12.5 -7.586)" fill="none" stroke="#1a2224"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                        </svg>
                                    </a>
                                    <a href="#!1" class="cdp_i active">01</a>
                                    <a href="#!2" class="cdp_i">02</a>
                                    <a href="#!3" class="cdp_i">03</a>
                                    <a href="#!+1" class="p_next">
                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.5 1L8.5 8L1.5 15" stroke="#35343E" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Active Courses --}}
<div class="tab-pane fade" id="nav-activecourses" role="tabpanel" aria-labelledby="nav-activecourses-tab">
    <div class="row">
        @php
            $hasincompleteCourses = false;
        @endphp
                    @forelse($enrollment as $a)
            @php
                $course = $incompleteCourses->firstWhere('id', $a->course_id);
            @endphp

            @if($course)
            @php
                $hasincompleteCourses = true;
            @endphp
                <div class="col-lg-4 col-md-6 col-md-6 mb-4">
                    <div class="contentCard contentCard--watch-course">
                        <div class="contentCard-top">
                            <a href="#"><img src="{{ asset('uploads/courses/'.$course->image) }}" alt="images" class="img-fluid" /></a>
                        </div>
                        <div class="contentCard-bottom">
                            <h5>
                                <a href="{{ route('courseDetails', encryptor('encrypt', $course->id)) }}" class="font-title--card">{{ $course->title_en }}</a>
                            </h5>
                            <div class="contentCard-info d-flex align-items-center justify-content-between">
                                <a href="{{ route('instructorProfile', encryptor('encrypt', $course->instructor->id)) }}" class="contentCard-user d-flex align-items-center">
                                    <img src="{{ asset('uploads/users/'.$course->instructor->image) }}" alt="client-image" class="rounded-circle" height="34" width="34" />
                                    <p class="font-para--md">{{ $course->instructor->name_en }}</p>
                                </a>
                                <div class="contentCard-course--status d-flex align-items-center">
                                    <span class="percentage">{{ round($course->completionPercentage, 2) }}%</span>
                                    <p>Chưa hoàn thành</p>
                                </div>
                            </div>
                            <a class="button button-md button--primary-outline w-100 my-3" href="{{ route('watchCourse', encryptor('encrypt', $course->id)) }}">Vào học ngay</a>
                            <div class="contentCard-watch--progress">
                                <span class="percentage" style="width: {{ round($course->completionPercentage, 2) }}%;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-12 py-5">
                <div class="col-md-6 col-12 mx-auto text-center">
                    <h5 class="font-title--sm">Bạn chưa đăng ký khóa học nào...</h5>
                    <p class="my-4 font-para--lg">Danh sách khóa học của bạn trống!</p>
                    <a href="{{ route('searchCourse') }}" class="button button-md button--primary">Đăng Ký Ngay!</a>
                </div>
            </div>
        @endforelse
        @if(!$hasincompleteCourses)
            <!-- Nếu không có khóa học nào hoàn thành được hiển thị -->
            <div class="col-12 py-5">
                <div class="col-md-6 col-12 mx-auto text-center">
                    <h5 class="font-title--sm">Bạn chưa đăng ký khóa học nào...</h5>
                    <p class="my-4 font-para--lg">Danh sách khóa học của bạn trống!</p>
                </div>
            </div>
        @endif
    
                    <div class="col-lg-12 mt-lg-5">
                        <div class="pagination justify-content-center pb-0">
                            <div class="pagination-group">
                                <a href="#" class="p_prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                        viewBox="0 0 9.414 16.828">
                                        <path data-name="Icon feather-chevron-left" d="M20.5,23l-7-7,7-7"
                                            transform="translate(-12.5 -7.586)" fill="none" stroke="#1a2224"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                    </svg>
                                </a>
                                <a href="#!1" class="cdp_i active">01</a>
                                <a href="#!2" class="cdp_i">02</a>
                                <a href="#!3" class="cdp_i">03</a>
                                <a href="#!+1" class="p_next">
                                    <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.5 1L8.5 8L1.5 15" stroke="#35343E" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
               
                {{-- Completed Courses --}}
                <div class="tab-pane fade" id="nav-completedcourses" role="tabpanel"
                    aria-labelledby="nav-completedcourses-tab">
                    
                <div class="row">
                    @php
            $hasCompletedCourses = false;
        @endphp
                    @forelse($enrollment as $a)
            @php
                $course = $completedCourses->firstWhere('id', $a->course_id);
            @endphp

            @if($course)
            @php
                $hasCompletedCourses = true;
            @endphp
                    <div class="col-lg-4 col-md-6 col-md-6 mb-4">
                        <div class="contentCard contentCard--watch-course">
                            <div class="contentCard-top">
                                <a href="#"><img src="{{asset('uploads/courses/'.$course->image)}}" alt="images" class="img-fluid" /></a>
                            </div>
                            <div class="contentCard-bottom">
                                <h5>
                                    <a href="{{route('courseDetails', encryptor('encrypt', $course->id))}}" class="font-title--card">{{ $course->title_en }}</a>
                                </h5>
                                <div class="contentCard-info d-flex align-items-center justify-content-between">
                                    <a href="{{route('instructorProfile', encryptor('encrypt', $course->instructor->id))}}" class="contentCard-user d-flex align-items-center">
                                        <img src="{{asset('uploads/users/'.$course->instructor->image)}}" alt="client-image" class="rounded-circle" height="34" width="34" />
                                        <p class="font-para--md">{{ $course->instructor->name_en }}</p>
                                    </a>
                                    <div class="contentCard-course--status d-flex align-items-center">
                                        <span class="percentage">100%</span>
                                        <p>Đã hoàn thành</p>
                                    </div>
                                </div>
                                <a class="button button-md button--primary-outline w-100 my-3" href="{{route('watchCourse', encryptor('encrypt', $course->id))}}">Xem lại khóa học</a>
                                <div class="contentCard-watch--progress">
                                    <span class="percentage" style="width: 100%;"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                    <div class="col-12 py-5">
                        <div class="col-md-6 col-12 mx-auto text-center">
                            <h5 class="font-title--sm">Bạn chưa hoàn thành khóa học nào...</h5>
                            <p class="my-4 font-para--lg">Danh sách khóa học của bạn trống!</p>
                        </div>
                    </div>
                    @endforelse
                    @if(!$hasCompletedCourses)
            <!-- Nếu không có khóa học nào hoàn thành được hiển thị -->
            <div class="col-12 py-5">
                <div class="col-md-6 col-12 mx-auto text-center">
                    <h5 class="font-title--sm">Bạn chưa hoàn thành khóa học nào...</h5>
                    <p class="my-4 font-para--lg">Danh sách khóa học của bạn trống!</p>
                </div>
            </div>
        @endif
                    <div class="col-lg-12 mt-lg-5">
                        <div class="pagination justify-content-center pb-0">
                            <div class="pagination-group">
                                <a href="#" class="p_prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                        viewBox="0 0 9.414 16.828">
                                        <path data-name="Icon feather-chevron-left" d="M20.5,23l-7-7,7-7"
                                            transform="translate(-12.5 -7.586)" fill="none" stroke="#1a2224"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                    </svg>
                                </a>
                                <a href="#!1" class="cdp_i active">01</a>
                                <a href="#!2" class="cdp_i">02</a>
                                <a href="#!3" class="cdp_i">03</a>
                                <a href="#!+1" class="p_next">
                                    <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.5 1L8.5 8L1.5 15" stroke="#35343E" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                {{-- <div class="tab-pane fade" id="nav-completedcourses" role="tabpanel"
                    aria-labelledby="nav-completedcourses-tab">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-md-6 mb-4">
                            <div class="contentCard contentCard--watch-course">
                                <div class="contentCard-top">
                                    <a href="#"><img
                                            src="{{asset('frontend/dist/images/courses/demo-img-02.png')}}"
                                            alt="images" class="img-fluid" /></a>
                                </div>
                                <div class="contentCard-bottom">
                                    <h5>
                                        <a href="#" class="font-title--card">Khoá học MCSA</a>
                                    </h5>
                                    <div class="contentCard-info d-flex align-items-center justify-content-between">
                                        <a href="instructor-profile.html"
                                            class="contentCard-user d-flex align-items-center">
                                            <img src="{{asset('frontend/dist/images/courses/7.png')}}"
                                                alt="client-image" class="rounded-circle" />
                                            <p class="font-para--md">Lan Tô</p>
                                        </a>
                                        <div class="contentCard-course--status d-flex align-items-center">
                                            <span class="percentage">100%</span>
                                            <p>Kết thúc</p>
                                        </div>
                                    </div>
                                    <a class="button button-md button--primary-outline w-100 my-3" href="#">Khóa học đang xem</a>
                                    <div class="contentCard-watch--progress">
                                        <span class="percentage" style="width: 100%;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-md-6 mb-4">
                            <div class="contentCard contentCard--watch-course">
                                <div class="contentCard-top">
                                    <a href="#"><img
                                            src="{{asset('frontend/dist/images/courses/demo-img-03.png')}}"
                                            alt="images" class="img-fluid" /></a>
                                </div>
                                <div class="contentCard-bottom">
                                    <h5>
                                        <a href="#" class="font-title--card">Khoá học Python cho trẻ</a>
                                    </h5>
                                    <div class="contentCard-info d-flex align-items-center justify-content-between">
                                        <a href="instructor-profile.html"
                                            class="contentCard-user d-flex align-items-center">
                                            <img src="{{asset('frontend/dist/images/courses/7.png')}}"
                                                alt="client-image" class="rounded-circle" />
                                            <p class="font-para--md">Lan Tô</p>
                                        </a>
                                        <div class="contentCard-course--status d-flex align-items-center">
                                            <span class="percentage">100%</span>
                                            <p>Kết thúc</p>
                                        </div>
                                    </div>
                                    <a class="button button-md button--primary-outline w-100 my-3" href="#">Khóa học đang xem</a>
                                    <div class="contentCard-watch--progress">
                                        <span class="percentage" style="width: 100%;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-md-6 mb-4">
                            <div class="contentCard contentCard--watch-course">
                                <div class="contentCard-top">
                                    <a href="#"><img
                                            src="{{asset('frontend/dist/images/courses/demo-img-04.png')}}"
                                            alt="images" class="img-fluid" /></a>
                                </div>
                                <div class="contentCard-bottom">
                                    <h5>
                                        <a href="#" class="font-title--card">Khoá học Python nâng cao</a>
                                    </h5>
                                    <div class="contentCard-info d-flex align-items-center justify-content-between">
                                        <a href="instructor-profile.html"
                                            class="contentCard-user d-flex align-items-center">
                                            <img src="{{asset('frontend/dist/images/courses/7.png')}}"
                                                alt="client-image" class="rounded-circle" />
                                            <p class="font-para--md">Đan Nguyễn</p>
                                        </a>
                                        <div class="contentCard-course--status d-flex align-items-center">
                                            <span class="percentage">100%</span>
                                            <p>Kết thúc</p>
                                        </div>
                                    </div>
                                    <a class="button button-md button--primary-outline w-100 my-3" href="#">Khóa học đang xem</a>
                                    <div class="contentCard-watch--progress">
                                        <span class="percentage" style="width: 100%;"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mt-lg-5">
                            <div class="pagination justify-content-center pb-0">
                                <div class="pagination-group">
                                    <a href="#" class="p_prev">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                                            viewBox="0 0 9.414 16.828">
                                            <path data-name="Icon feather-chevron-left" d="M20.5,23l-7-7,7-7"
                                                transform="translate(-12.5 -7.586)" fill="none" stroke="#1a2224"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                        </svg>
                                    </a>
                                    <a href="#!1" class="cdp_i active">01</a>
                                    <a href="#!2" class="cdp_i">02</a>
                                    <a href="#!3" class="cdp_i">03</a>
                                    <a href="#!+1" class="p_next">
                                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.5 1L8.5 8L1.5 15" stroke="#35343E" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                {{-- Purchase History --}}
                <div class="tab-pane fade" id="nav-purchase" role="tabpanel" aria-labelledby="nav-purchase-tab">
                    @foreach ($vpayments as $payment)
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <div class="purchase-area">
                                <div class="purchase-area-close">
                                    <a href="#">
                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 1L1 11" stroke="#F15C4C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M1 1L11 11" stroke="#F15C4C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                                
                                <div class="d-flex align-items-lg-center align-items-start flex-column flex-lg-row">
                                    <div class="purchase-area-items">
                                        <div class="purchase-area-items-start d-flex align-items-lg-center flex-column flex-lg-row">
                                            <div class="trans_id">
                                                <a href="#">
                                                    {{$payment->id}}
                                                </a>
                                            </div>
                                            <div class="text d-flex flex-column flex-lg-row">
                                                <div class="text-main ms-20px">
                                                    <h6><a href="#">{{$payment->note}}</a></h6>
                                                    <p> By <a href="#">{{$payment->code_bank}}</a></p>
                                                </div>
                                                <p class="ms-2">{{ $payment->amount ? number_format($payment->amount) . ' VNĐ' : 'Free' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="purchase-area-items-end">
                                        <p>{{$payment->time}}</p>
                                        <dl class="row">
                                            <dt class="col-sm-4">Mã khóa học</dt>
                                            <dd class="col-sm-8">{{ $payment->course_ids }}</dd>
                                            <dt class="col-sm-4">Mã giao dịch</dt>
                                            <dd class="col-sm-8">{{ $payment->code_vnpay }}</dd>
                                            <dt class="col-sm-4">Ngân hàng</dt>
                                            <dd class="col-sm-8">{{ $payment->code_bank }}</dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row mt-lg-5 mt-4">
                        <div class="col-lg-12 text-center">
                            <p style="color: #42414b !important; font-size: 18px !important;">
                            Tuyệt! Bạn đã xem tất cả lịch sử mua hàng của mình.
                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g filter="url(#filter0_d)">
                                        <path d="M15.8653 26.6346C23.1194 26.4329 28.8365 20.3887 28.6347 13.1346C28.433 5.8805 22.3888 0.163433 15.1347 0.365178C7.88061 0.566922 2.16355 6.61108 2.36529 13.8652C2.56704 21.1193 8.61119 26.8363 15.8653 26.6346Z" fill="url(#paint0_radial)" />
                                        <path d="M15.8653 26.6346C23.1194 26.4329 28.8365 20.3887 28.6347 13.1346C28.433 5.8805 22.3888 0.163433 15.1347 0.365178C7.88061 0.566922 2.16355 6.61108 2.36529 13.8652C2.56704 21.1193 8.61119 26.8363 15.8653 26.6346Z" fill="url(#paint1_linear)" />
                                        <path d="M28.0022 13.1522C28.1942 20.0569 22.7524 25.81 15.8477 26.002C8.94295 26.1941 3.18988 20.7523 2.99785 13.8476C2.80582 6.94284 8.24756 1.18977 15.1523 0.997737C22.057 0.805709 27.8101 6.24744 28.0022 13.1522Z" stroke="#D67504" stroke-opacity="0.27" stroke-width="1.26563" />
                                    </g>
                                    <path d="M17.7944 8.07061C16.9534 8.34992 15.9151 8.39547 15.5022 8.40458C15.0893 8.39547 14.0449 8.34992 13.2069 8.07061C11.61 7.5393 9.03846 7.20231 7.07718 7.24785C5.62595 7.28429 4.12311 7.47859 3.18801 7.66683C2.77208 7.75184 2.50794 8.15866 2.6051 8.57156L2.70528 8.99963C2.76297 9.24859 2.95728 9.43379 3.20016 9.5188C3.32464 9.56434 3.44608 9.64632 3.50073 9.79205C3.66771 10.2444 4.57852 12.9252 5.07036 13.918C5.47415 14.7286 6.56712 15.4239 9.10829 15.436C12.7242 15.4512 13.9751 13.0588 14.5519 11.5165C14.6126 11.3556 14.7037 11.0459 14.7857 10.7454C14.9041 10.3173 15.1652 9.89526 15.2805 9.83454C15.3504 9.80115 15.4293 9.7708 15.5083 9.7708C15.5902 9.7708 15.6692 9.80115 15.739 9.83454C15.8544 9.89526 16.1094 10.3173 16.2278 10.7454C16.3098 11.0459 16.4072 11.3556 16.468 11.5165C17.0448 13.0588 18.2956 15.4512 21.9116 15.436C24.4528 15.4239 25.5458 14.7286 25.9496 13.918C26.4414 12.9252 27.3522 10.2444 27.5192 9.79205C27.5738 9.64632 27.6952 9.56434 27.8197 9.5188C28.0626 9.43379 28.2569 9.24859 28.3145 8.99963L28.4147 8.57156C28.5119 8.15866 28.2477 7.75184 27.8318 7.66683C26.8967 7.47859 25.3939 7.28429 23.9427 7.24785C21.9814 7.20231 19.4098 7.5393 17.813 8.07061Z" fill="#FFD382" />
                                    <path d="M17.7944 8.07061C16.9534 8.34992 15.9151 8.39547 15.5022 8.40458C15.0893 8.39547 14.0449 8.34992 13.2069 8.07061C11.61 7.5393 9.03846 7.20231 7.07718 7.24785C5.62595 7.28429 4.12311 7.47859 3.18801 7.66683C2.77208 7.75184 2.50794 8.15866 2.6051 8.57156L2.70528 8.99963C2.76297 9.24859 2.95728 9.43379 3.20016 9.5188C3.32464 9.56434 3.44608 9.64632 3.50073 9.79205C3.66771 10.2444 4.57852 12.9252 5.07036 13.918C5.47415 14.7286 6.56712 15.4239 9.10829 15.436C12.7242 15.4512 13.9751 13.0588 14.5519 11.5165C14.6126 11.3556 14.7037 11.0459 14.7857 10.7454C14.9041 10.3173 15.1652 9.89526 15.2805 9.83454C15.3504 9.80115 15.4293 9.7708 15.5083 9.7708C15.5902 9.7708 15.6692 9.80115 15.739 9.83454C15.8544 9.89526 16.1094 10.3173 16.2278 10.7454C16.3098 11.0459 16.4072 11.3556 16.468 11.5165C17.0448 13.0588 18.2956 15.4512 21.9116 15.436C24.4528 15.4239 25.5458 14.7286 25.9496 13.918C26.4414 12.9252 27.3522 10.2444 27.5192 9.79205C27.5738 9.64632 27.6952 9.56434 27.8197 9.5188C28.0626 9.43379 28.2569 9.24859 28.3145 8.99963L28.4147 8.57156C28.5119 8.15866 28.2477 7.75184 27.8318 7.66683C26.8967 7.47859 25.3939 7.28429 23.9427 7.24785C21.9814 7.20231 19.4098 7.5393 17.813 8.07061Z" fill="url(#paint2_radial)" fill-opacity="0.9" />
                                    <path d="M15.5022 8.40458L15.5109 15.5L15.5053 15.5L15.5022 8.40458Z" fill="#FEE4D4" />
                                    <path d="M15.5022 8.40458L15.5109 15.5L15.5053 15.5L15.5022 8.40458Z" fill="url(#paint3_linear)" />
                                    <path d="M15.5109 15.5C15.51 15.5006 15.5098 15.501 15.5083 15.501C15.507 15.501 15.506 15.5006 15.5053 15.5L15.5109 15.5Z" fill="url(#paint4_linear)" />
                                    <path d="M15.5109 15.5C15.51 15.5006 15.5098 15.501 15.5083 15.501C15.507 15.501 15.506 15.5006 15.5053 15.5L15.5109 15.5Z" fill="#9A735E" fill-opacity="0.6" />
                                    <path d="M15.0106 15.0052L15.5 15.5M15.0106 15.9948L15.5 15.5M15.5 15.5L15.9894 15.9948M15.5 15.5L15.9894 15.0052" stroke="url(#paint5_linear)" stroke-opacity="0.34" />
                                    <path d="M15.5106 8.40456C15.0953 8.39429 14.0537 8.34876 13.2166 8.07056C11.6225 7.53926 9.051 7.20226 7.08971 7.2478C5.63848 7.28423 4.13563 7.47854 3.20054 7.66677C2.7846 7.75178 2.52046 8.15861 2.61762 8.57151L2.7178 8.99958C2.77549 9.24854 2.9698 9.43374 3.21268 9.51875C3.33716 9.56429 3.4586 9.64627 3.51325 9.792C3.68024 10.2444 4.59105 12.9251 5.08289 13.9179C5.48668 14.7286 6.57964 15.4239 9.12082 15.4359C10.7596 15.4432 11.7372 14.983 12.417 14.4356C13.0836 13.899 13.593 13.2276 13.9486 12.7133C14.0702 12.5291 14.1705 12.3773 14.2351 12.2808C14.2675 12.2323 14.2896 12.1983 14.3006 12.1803L14.3056 12.1718C14.3208 12.1442 14.3381 12.1105 14.3524 12.0803C14.3747 12.0321 14.3906 11.999 14.3962 11.9878L14.3971 11.986C14.4113 11.9576 14.4354 11.9052 14.4605 11.8485C14.5104 11.735 14.5775 11.5498 14.6534 11.3592C14.8081 10.978 15.0521 10.3443 15.275 9.83454C15.3448 9.80115 15.4238 9.7708 15.5028 9.7708C15.5856 9.7708 15.6645 9.80115 15.7344 9.83454C15.8497 9.89526 16.1047 10.3173 16.2231 10.7454C16.305 11.0459 16.3961 11.3556 16.4568 11.5165C17.0336 13.0588 18.2845 15.4512 21.9005 15.4359C24.4417 15.4239 25.5346 14.7286 25.9384 13.9179C26.4303 12.9251 27.3411 10.2444 27.5081 9.792C27.5628 9.64627 27.6842 9.56429 27.8087 9.51875C28.0516 9.43374 28.2459 9.24854 28.3036 8.99958L28.4038 8.57151C28.501 8.15861 28.2368 7.75178 27.8208 7.66677C26.8857 7.47854 25.3829 7.28423 23.9316 7.2478C21.9704 7.20226 19.3988 7.53926 17.802 8.07056C16.9648 8.34876 15.9232 8.39429 15.508 8.40456C15.5074 8.40458 15.5068 8.40458 15.5062 8.40458L15.5106 8.40456Z" fill="url(#paint6_radial)" fill-opacity="0.4" />
                                    <defs>
                                        <filter id="filter0_d" x="0.523773" y="0.116089" width="30.2325" height="30.2325" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                                            <feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                                            <feOffset />
                                            <feGaussianBlur stdDeviation="0.4" />
                                            <feColorMatrix values="0 0 0 0 0.968627 0 0 0 0 0.454902 0 0 0 0 0.0156863 0 0 0 0.12 0" />
                                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow" />
                                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape" />
                                        </filter>
                                        <radialGradient id="paint0_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(13.5038 17.2529) rotate(-73.4881) scale(21.4737 20.4591)">
                                            <stop stop-color="#FFD282" />
                                            <stop offset="1" stop-color="#FECD70" />
                                        </radialGradient>
                                        <linearGradient id="paint1_linear" x1="8.09757" y1="1.56879" x2="23.4415" y2="28.4415" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.0454545" stop-color="#FFEE91" stop-opacity="0" />
                                            <stop offset="0.875" stop-color="#FFCE6F" />
                                        </linearGradient>
                                        <radialGradient id="paint2_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(15.1531 14.6637) rotate(-90) scale(16.0498 17.5578)">
                                            <stop stop-opacity="0.24" />
                                            <stop offset="1" stop-opacity="0" />
                                        </radialGradient>
                                        <linearGradient id="paint3_linear" x1="15.5031" y1="8.40458" x2="15.5031" y2="15.5" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#F0B389" />
                                            <stop offset="0.494215" stop-color="#9A735E" />
                                            <stop offset="1" stop-color="#9A735E" stop-opacity="0" />
                                        </linearGradient>
                                        <linearGradient id="paint4_linear" x1="15.509" y1="15.5005" x2="15.503" y2="15.501" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#9A735E" stop-opacity="0" />
                                            <stop offset="1" stop-color="#9A735E" stop-opacity="0.6" />
                                        </linearGradient>
                                        <linearGradient id="paint5_linear" x1="15.5" y1="15" x2="15.5" y2="16" gradientUnits="userSpaceOnUse">
                                            <stop stop-color="#AB6B52" />
                                            <stop offset="1" stop-color="#AB6B52" stop-opacity="0" />
                                        </linearGradient>
                                        <radialGradient id="paint6_radial" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(21.4521 8.25803) rotate(134.909) scale(3.85588 4.50749)">
                                            <stop stop-opacity="0.8" />
                                            <stop offset="1" stop-opacity="0" />
                                        </radialGradient>
                                    </defs>
                                </svg>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@endsection
