@extends('frontend.layouts.app')
@section('title', 'Chi tiết khóa học')
@section('body-attr') style="background-color: #ebebf2;" @endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@push('styles')
<link rel="stylesheet" href="{{asset('frontend/src/scss/vendors/plugin/css/star-rating-svg.css')}}" />
@endpush
@php
            $enrollment=DB::table('enrollments')
            ->join('courses','courses.id','=','enrollments.course_id')
            ->where('enrollments.course_id', $course->id)->get();
            $review=DB::table('reviews')
            ->join('courses','courses.id','=','reviews.course_id')
            ->join('students','students.id','=','reviews.student_id')
            ->where('reviews.course_id', $course->id)
            ->select('reviews.*','courses.*','students.*', 'reviews.created_at as reviews_created_at')//đổi tên cột created của reviews
            ->get();
@endphp
@section('content')
<!-- ---------------------------------------------------------- -->
<section class="section event-sub-section">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb align-items-center bg-transparent p-0 mb-0">
                <li class="breadcrumb-item">
                    <a href="index.html" class="fs-6 text-secondary">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#" class="fs-6 text-secondary">Khóa học</a>
                </li>
                <li class="breadcrumb-item fs-6 text-secondary d-none d-lg-inline-block" aria-current="page">
                    {{ $course->title_en }}
                </li>
            </ol>
        </nav>
        <div class="row event-sub-section-main">
            <div class="col-lg-8">
                <h3 class="font-title--sm">
                    {{ $course->title_en }}
                </h3>
                <div class="created-by d-flex align-items-center">
                    <div class="created-by-image me-3">
                        <img src="{{asset('uploads/users/'.$course->instructor?->image)}}" class="rounded-circle"
                            alt="Ảnh giảng viên" height="75" width="75" />
                    </div>
                    <div class="created-by-text">
                        <p>Tạo bởi</p>
                        <h6>
                            <a href="{{route('instructorProfile', encryptor('encrypt', $course->instructor->id))}}">{{$course->instructor?->name_en}}
                            </a>
                        </h6>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="icon-with-date d-flex align-items-lg-center">
                    <div class="icon-with-date-start d-flex align-items-center">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.94438 2.34287L11.7457 5.96656C11.8359 6.14934 12.0102 6.2769 12.2124 6.30645L16.2452 6.88901C16.4085 6.91079 16.5555 6.99635 16.6559 7.12701C16.8441 7.37201 16.8153 7.71891 16.5898 7.92969L13.6668 10.7561C13.5183 10.8961 13.4522 11.1015 13.4911 11.3014L14.1911 15.2898C14.2401 15.6204 14.0145 15.93 13.684 15.9836C13.5471 16.0046 13.4071 15.9829 13.2826 15.9214L9.69082 14.0384C9.51037 13.9404 9.29415 13.9404 9.1137 14.0384L5.49546 15.9315C5.1929 16.0855 4.82267 15.9712 4.65778 15.6748C4.59478 15.5551 4.57301 15.419 4.59478 15.286L5.29479 11.2975C5.32979 11.0984 5.26368 10.8938 5.11901 10.753L2.18055 7.92735C1.94099 7.68935 1.93943 7.30201 2.17821 7.06246C2.17899 7.06168 2.17977 7.06012 2.18055 7.05935C2.27932 6.9699 2.40066 6.91001 2.5321 6.88668L6.56569 6.30412C6.76713 6.27223 6.94058 6.14623 7.03236 5.96345L8.83215 2.34287C8.90448 2.19587 9.03281 2.08309 9.18837 2.03176C9.3447 1.97965 9.51582 1.99209 9.66282 2.06598C9.78337 2.12587 9.88215 2.22309 9.94438 2.34287Z"
                                stroke="#FF7A1A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="font-para--md">{{$review->avg('rating')}} Sao <span>({{$review->count()}} lượt đánh giá)</span></p>
                    </div>
                    <div class="icon-with-date-end d-flex align-items-center">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9 16.5C13.1421 16.5 16.5 13.1421 16.5 9C16.5 4.85786 13.1421 1.5 9 1.5C4.85786 1.5 1.5 4.85786 1.5 9C1.5 13.1421 4.85786 16.5 9 16.5Z"
                                stroke="#FFC91B" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M9 4.5V9L12 10.5" stroke="#FFC91B" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <p class="font-para--md">{{$course->duration}} Tháng</p>
                    </div>
                </div>
                <div class="icon-with-date d-flex align-items-lg-cente mb-0">
                    <div class="icon-with-date-start d-flex align-items-center">
                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 9C1 9 4 3 9.25 3C14.5 3 17.5 9 17.5 9C17.5 9 14.5 15 9.25 15C4 15 1 9 1 9Z"
                                stroke="#1089FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M9.25 11.25C10.4926 11.25 11.5 10.2426 11.5 9C11.5 7.75736 10.4926 6.75 9.25 6.75C8.00736 6.75 7 7.75736 7 9C7 10.2426 8.00736 11.25 9.25 11.25Z"
                                stroke="#1089FF" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="font-para--md">{{$enrollment->count();}} đã đăng ký</p>
                    </div>
                    <div class="icon-with-date-end d-flex align-items-center">
                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.5 2.25H6C6.79565 2.25 7.55871 2.56607 8.12132 3.12868C8.68393 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 8.76295 14.581 8.34099 14.159C7.91903 13.7371 7.34674 13.5 6.75 13.5H1.5V2.25Z"
                                stroke="#00AF91" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            <path
                                d="M16.5 2.25H12C11.2044 2.25 10.4413 2.56607 9.87868 3.12868C9.31607 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 9.23705 14.581 9.65901 14.159C10.081 13.7371 10.6533 13.5 11.25 13.5H16.5V2.25Z"
                                stroke="#00AF91" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="font-para--md">{{$course->lesson}} video</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- -->


<section class="section event-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="course-overview">
     <!-- Thumbnails-------------------------------------------------------- -->
                    <div class="course-overview-image">
                        <img src="{{asset('uploads/courses/thumbnails/'.$course->thumbnail_image)}}" alt="img" />
                        <a class="popup-video play-button" href="{{$course->thumbnail_video}}">
                            <svg width="23" height="27" viewBox="0 0 23 27" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.2159 15.9113C22.1179 16.0425 21.6605 16.6002 21.3011 16.9611L21.1051 17.158C18.3608 20.1434 11.5327 24.6379 8.0696 26.0814C8.0696 26.1142 6.01136 26.9672 5.03125 27H4.90057C3.39773 27 1.9929 26.147 1.27415 24.7691C0.882102 24.0146 0.522727 21.8165 0.490057 21.7837C0.196023 19.8153 0 16.8004 0 13.4836C0 10.0061 0.196023 6.85662 0.555398 4.92102C0.555398 4.88821 0.914773 3.11665 1.14347 2.52612C1.50284 1.67315 2.15625 0.951397 2.97301 0.492102C3.62642 0.164034 4.3125 0 5.03125 0C5.78267 0.0328068 7.1875 0.52819 7.7429 0.754557C11.402 2.19806 18.3935 6.92224 21.0724 9.80923C21.5298 10.2685 22.0199 10.8262 22.1506 10.9575C22.706 11.6792 23 12.565 23 13.5197C23 14.3694 22.7386 15.2224 22.2159 15.9113Z"
                                    fill="#1089FF"></path>
                            </svg>
                        </a>
                    </div>
    {{-- Tabs --}}
                    <ul class="nav course-overview-nav nav-pills mb-3" style="display: flex;white-space: nowrap;width: 100%;" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active font-para--lg" id="pills-courseoverview-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-courseoverview" type="button" role="tab"
                                aria-controls="pills-courseoverview" aria-selected="true">
                                Tổng quan
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link font-para--lg" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">
                                Chương trình giảng dạy
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link font-para--lg" id="pills-c-instructor-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-c-instructor" type="button" role="tab"
                                aria-controls="pills-c-instructor" aria-selected="false">
                                Giáo viên
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link me-0 font-para--lg" id="pills-course-review-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-review" type="button" role="tab"
                                aria-controls="pills-course-review-tab" aria-selected="false">
                                Đánh giá
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content course-overview-content" id="pills-tabContentTwo">

          <!-- -------------------------tổng quan------------------------- -->
                        <div class="tab-pane fade show active" id="pills-courseoverview" role="tabpanel"
                            aria-labelledby="pills-courseoverview-tab">
                            <div class="row course-overview-main mt-4">
                                <div class="course-overview-main-item">
                                    <h6 class="font-title--card">Mô tả</h6>
                                    <p class="mb-3 font-para--lg">{{$course->description_en}}</p>
                                </div>
                                <div class="course-overview-main-item">
                                    <h6 class="font-title--card">Yêu cầu</h6>
                                    <p class="mb-2 font-para--lg">{{$course->prerequisites_en}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- -->

     <!------------------------------- chươngn trình học------------------- -->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile">
                            <div class="row">
                                <div class="course-curriculum-area">
                                    <div class="curriculum-area">
                                        <div class="curriculum-area-top" role="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                                            <div class="curriculum-area-top-start">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20" fill="none">
                                                    <path d="M15.8332 7.08337L9.99984 12.9167L4.1665 7.08337"
                                                        stroke="#42414B" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                                <p class="font-para--lg">Các bài học miễn phí</p>
                                            </div>
                                            <div class="curriculum-area-top-end">
                                                <div class="total-lesson">
                                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.5 2.75H6C6.79565 2.75 7.55871 3.06607 8.12132 3.62868C8.68393 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 8.76295 15.081 8.34099 14.659C7.91903 14.2371 7.34674 14 6.75 14H1.5V2.75Z"
                                                            stroke="#00AF91" stroke-width="1.8" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M16.5 2.75H12C11.2044 2.75 10.4413 3.06607 9.87868 3.62868C9.31607 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 9.23705 15.081 9.65901 14.659C10.081 14.2371 10.6533 14 11.25 14H16.5V2.75Z"
                                                            stroke="#00AF91" stroke-width="1.8" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <p>1 Bài học</p>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="curriculum-area-bottom collapse show" id="collapse1">
                                            <div class="curriculum-description">
                                                <div class="curriculum-description-start">
                                                    <p>
                                                        @php
                                                        $video1 = DB::table('materials')
                                                            ->join('lessons', 'materials.lesson_id', '=', 'lessons.id')
                                                            ->where('lessons.course_id', $course->id)
                                                            ->first();
                                                        @endphp
                                                        <a href="{{ $video1 ? asset('uploads/courses/contents/'.$video1->content) : 'none' }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-play-circle">
                                                                <circle cx="12" cy="12" r="10"></circle>
                                                                <polygon points="10 8 16 12 10 16 10 8"></polygon>
                                                            </svg>
                                                        </a>
                                                        <a href="{{ $video1 ? asset('uploads/courses/contents/'.$video1->content) : 'none' }}">
                                                            {{$video1->title??"không có video miễn phí"}}</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                               <!--------- khung 2----------------------------------->
                                    <div class="curriculum-area">
                                        <div class="curriculum-area-top collapsed" role="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false"
                                            aria-controls="collapse2">
                                            <div class="curriculum-area-top-start">
                                                <a class=" mua font-para--lg" href="#">Mua ngay để xem</a>
                                                <script>
                                                    $(document).ready(function() {
                                                    $('.mua').click(function() {
                                                        $('html, body').animate({
                                                            scrollTop: $("#cartsection").offset().top
                                                        }, 500);
                                                    });
                                                });

                                                </script>
                                            </div>
                                            <div class="curriculum-area-top-end">
                                                <div class="total-lesson">
                                                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M1.5 2.75H6C6.79565 2.75 7.55871 3.06607 8.12132 3.62868C8.68393 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 8.76295 15.081 8.34099 14.659C7.91903 14.2371 7.34674 14 6.75 14H1.5V2.75Z"
                                                            stroke="#00AF91" stroke-width="1.8" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                        <path
                                                            d="M16.5 2.75H12C11.2044 2.75 10.4413 3.06607 9.87868 3.62868C9.31607 4.19129 9 4.95435 9 5.75V16.25C9 15.6533 9.23705 15.081 9.65901 14.659C10.081 14.2371 10.6533 14 11.25 14H16.5V2.75Z"
                                                            stroke="#00AF91" stroke-width="1.8" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                    <p>{{$course->count('lesson') - 1}} Bài học</p>
                                                </div>
                                                <div class="total-hours">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-lock">
                                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2">
                                                        </rect>
                                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!--  -->

<!----------------------- chi tiết gv ------------------------------>
                        <div class="tab-pane fade" id="pills-c-instructor" role="tabpanel"
                            aria-labelledby="pills-c-instructor-tab">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="course-instructor">
                                        <div class="course-instructor-info">
                                            <div class="instructor-image">
                                                <img src="{{asset('uploads/users/'.$course->instructor?->image)}}"
                                                    alt="Instructor" height="125" width="125" />
                                            </div>
                                            <div class="instructor-text">
                                                <h6 class="font-title--xs mb-0">
                                                    <a
                                                        href="{{route('instructorProfile', encryptor('encrypt', $course->instructor->id))}}">{{$course->instructor?->name_en}}</a>
                                                </h6>
                                                <p class="font-para--md">
                                                    {{($course->instructor?->designation)?$course->instructor?->designation:' '}}</p>
                                                <div class="d-flex align-items-center instructor-text-bottom">
                                                    
                                                    <div class="d-flex align-items-center ratings-icon">
                                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M1.5 2.25H6C6.79565 2.25 7.55871 2.56607 8.12132 3.12868C8.68393 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 8.76295 14.581 8.34099 14.159C7.91903 13.7371 7.34674 13.5 6.75 13.5H1.5V2.25Z"
                                                                stroke="#00AF91" stroke-width="1.8"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path
                                                                d="M16.5 2.25H12C11.2044 2.25 10.4413 2.56607 9.87868 3.12868C9.31607 3.69129 9 4.45435 9 5.25V15.75C9 15.1533 9.23705 14.581 9.65901 14.159C10.081 13.7371 10.6533 13.5 11.25 13.5H16.5V2.25Z"
                                                                stroke="#00AF91" stroke-width="1.8"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>

                                                        <p class="font-para--md"><p>{{$course?->instructor?->courses()->where('status', 2)->count()}}</p><p> Khóa học</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="lead-p font-para--lg">
                                            {{($course->instructor?->title)?$course->instructor?->title:' '}}</p>
                                        <p class="font-para--md">
                                            {{($course->instructor?->bio)?$course->instructor?->bio:' '}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  -->

       <!------------------review---------------------------------- -->
                        <div class="tab-pane fade show course-review-content" id="pills-review" role="tabpanel"
                            aria-labelledby="pills-review">
                            <div class="tab-content" id="pills-tabContent">

                                <div class="tab-pane fade show active" id="pills-pills-review" role="tabpanel"
                                    aria-labelledby="pills-pills-review">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="instructor-rating-area d-flex">
                                                <div class="rating-number">
                                                    <h2>{{$review->avg('rating');}}</h2>
                                                    @php
                                                        $rating = $review->avg('rating');
                                                    @endphp

                                                    <div class="rating-icon">
                                                        <ul class="list-inline">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <li class="list-inline-item">
                                                                    @if ($i <= $rating)
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#ff7a1a" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    @else
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    @endif
                                                                </li>
                                                            @endfor
                                                        </ul>
                                                    </div>  

                                                    
                                                    <p>Đánh giá khoá học</p>
                                                </div>
                                            </div>
                                            <div class="students-feedback">
                                                <div class="students-feedback-heading">
                                                    <h5 class="font-title--card">Đánh giá của học sinh
                                                        <span>({{$review->count('rating')}})</span>
                                                    </h5>
                                                    <div class="right">
                                                        <div class="dropdown ms-2">
                                                            <button
                                                                class="dropdown-toggle font-para--md border-0 bg-white"
                                                                type="button" id="dropdownMenu2"
                                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                                Tất cả đánh giá
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach ($review as $r)
                                                
                                                <div class="students-feedback-item">
                                                    <div class="feedback-rating">
                                                        <div class="feedback-rating-start">
                                                            <div class="image">
                                                                <img src="{{asset('frontend/dist/images/ellipse/user.jpg')}}"
                                                                    alt="Image" />
                                                            </div>
                                                            <div class="text">
                                                                <h6 class="font-para--md">
                                                                    <a href="students-profile.html">{{$r->name_en}}</a>
                                                                </h6>
                                                                <p>{{$r->reviews_created_at}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="feedback-rating-end">
                                                            <ul
                                                                class="testimonial__item-star d-flex align-items-center">
                                                                @php
                                                                    $rating_one = $r->rating;
                                                                @endphp 

                                                                @for ($i = 1; $i <= 5; $i++)
                                                                <li class="list-inline-item">
                                                                    @if ($i <= $rating_one)
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#ff7a1a" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    @else
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                                                            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                                        </svg>
                                                                    @endif
                                                                </li>
                                                                @endfor 
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach

                                                {{-- <div class="text-center">
                                                    <button class="button button-md button--primary-outline"
                                                        type="button">
                                                        Xem thêm
                                                    </button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ................................ -->
                    </div>
                </div>
            </div>
            {{-- Price Details Section --}}
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="courseCard--wrapper">
                    <div class="cart">
                        <div class="cart__price">
                            <div class="current-price">
                                <h3 class="font-title--sm">{{$course->price? number_format($course->price). 'VNĐ':'Free'}}</h3>
                            </div>
                            <div class="current-discount">
                                <p><del>{{$course->old_price? number_format($course->old_price).'VNĐ':''}}</del></p>
                                <p class="font-para--md">Giảm giá</p>
                            </div>
                        </div>
                        <section id="cartsection">
                        <div class="cart__checkout-process">

                                <form action="{{route('watchCourse', encryptor('encrypt', $course->id))}}">
                                    <button type="submit" class="button button-lg button--primary-outline mt-3 w-100">Vào học ngay</button>
                                </form>

                        </div></section>
                        <div class="cart__includes-info">
                            <h6 class="font-title--card">Khóa học bao gồm:</h6>
                            <ul>
                                <li>
                                    <span><img src="{{asset('frontend/dist/images/icon/dollar.png')}}"
                                            alt="dollar" /></span>
                                    <p class="font-para--md">Thời hạn vĩnh viễn</p>
                                </li>
                                <li>
                                    <span><img src="{{asset('frontend/dist/images/icon/clock-2.png')}}"
                                            alt="clock" /></span>
                                    <p class="font-para--md">Đảm bảo hoàn tiền trong 30 ngày</p>
                                </li>
                                <li>
                                    <span><img src="{{asset('frontend/dist/images/icon/paper-plus.png')}}"
                                            alt="paper-plus" /></span>
                                    <p class="font-para--md">Tệp bài tập miễn phí</p>
                                </li>
                                <li>
                                    <span><img src="{{asset('frontend/dist/images/icon/airplay.png')}}"
                                            alt="airplay" /></span>
                                    <p class="font-para--md">Truy cập thiết bị di động</p>
                                </li>
                                <li>
                                    <span><img src="{{asset('frontend/dist/images/icon/clipboard.png')}}"
                                            alt="clipboard" /></span>
                                    <p class="font-para--md">Chứng chỉ</p>
                                </li>
                            </ul>
                        </div>
                        <div class="cart__share-content">
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Related Course --}}
<section class="section new-course-feature section--bg-offwhite-five">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <h2 class="font-title--md text-center">Khóa học liên quan</h2>
            </div>
        </div>
        <div class="row">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
                    <div class="row">
                        <div class="col-12 position-relative px-0 mx-0">
                            <div class="eventsSlider slick-slider">
                                @forelse ($relatedCourses as $rc)
                                <div class="col-xl-4 col-md-6">
                                    <div class="contentCard contentCard--course">
                                        <div class="contentCard-top">
                                            <a href="{{ route('courseDetails', ['id' => encryptor('encrypt', $rc->id)]) }}">
                                                <img src="{{ asset('uploads/courses/'.$rc->image) }}" alt="images" class="img-fluid" />
                                            </a>
                                        </div>
                                        <div class="contentCard-bottom">
                                            <h5>
                                                <a href="{{ route('courseDetails', ['id' => encryptor('encrypt', $rc->id)]) }}" class="font-title--card">{{ $rc->title_en }}</a>
                                            </h5>
                                            <div class="contentCard-info d-flex align-items-center justify-content-between">
                                                <a href="{{ route('instructorProfile', encryptor('encrypt', $rc->instructor->id)) }}" class="contentCard-user d-flex align-items-center">
                                                    <img src="{{ asset('uploads/users/'.$rc->instructor->image) }}" alt="client-image" class="rounded-circle" height="34" width="34" />
                                                    <p class="font-para--md">{{ $rc->instructor->name_en }}</p>
                                                </a>
                                                <div class="price">
                                                    <span>{{ $rc->price ? number_format($rc->price).'VNĐ' : 'Free' }}</span>
                                                    <del>{{ $rc->old_price ? number_format($rc->old_price). 'VNĐ' : '' }}</del>
                                                </div>
                                            </div>
                                            <div class="contentCard-more">
                                                <div class="d-flex align-items-center">
                                                    <div class="icon">
                                                        <img src="{{ asset('frontend/dist/images/icon/star.png') }}" alt="star" />
                                                    </div>
                                                    <span>4.5</span>
                                                </div>
                                                <div class="eye d-flex align-items-center">
                                                    <div class="icon">
                                                        <img src="{{ asset('frontend/dist/images/icon/eye.png') }}" alt="eye" />
                                                    </div>
                                                    <span>24,517</span>
                                                </div>
                                                <div class="book d-flex align-items-center">
                                                    <div class="icon">
                                                        <img src="{{ asset('frontend/dist/images/icon/book.png') }}" alt="location" />
                                                    </div>
                                                    <span>{{ $rc->lesson ? $rc->lesson : 0 }} Bài giảng</span>
                                                </div>
                                                <div class="clock d-flex align-items-center">
                                                    <div class="icon">
                                                        <img src="{{ asset('frontend/dist/images/icon/Clock.png') }}" alt="clock" />
                                                    </div>
                                                    <span>{{ $rc->duration ? $rc->duration : 0 }} Tháng</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-xl-4 col-md-6">
                                    <div class="contentCard contentCard--course">
                                        <h3>Không có khóa học liên quan!</h3>
                                    </div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <div class="new-course-overlay">
        <img src="{{ asset('frontend/dist/images/shape/circle5.png') }}" alt="shape" class="img-fluid shape01" />
        <img src="{{ asset('frontend/dist/images/shape/dots/dots-img-15.png') }}" alt="shape"
            class="img-fluid shape02" />
    </div>
</section>
@endsection

@push('scripts')
<script src="{{asset('frontend/src/scss/vendors/plugin/js/jquery.star-rating-svg.js')}}"></script>
<script>
    // Đánh giá của học sinh
            $(".rating-icons-2").starRating({
                starSize: 30,
                activeColor: "#FF7A1A",
                hoverColor: "#FF7A1A",
                ratedColors: ["#FF7A1A", "#FF7A1A", "#FF7A1A", "#FF7A1A", "#FF7A1A"],
                emptyColor: "red",
                initialRating: 5,
                readOnly: true,
                useFullStars: true,
                starGradient: {
                    start: "#FF7A1A",
                    end: "#FF7A1A",
                },
            });
</script>
@endpush