@extends('frontend.layouts.app')
@section('title', 'Chi tiết sự kiện')
@section('body-attr') style="background-color: #ebebf2;" @endsection

@push('styles')
<link rel="stylesheet" href="{{asset('frontend/src/scss/vendors/plugin/css/star-rating-svg.css')}}" />
@endpush

@section('content')
<!-- Breadcrumb Starts Here -->
<section class="section event-sub-section">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb align-items-center bg-transparent p-0 mb-0">
                <li class="breadcrumb-item">
                    <a href="index.html" class="fs-6 text-secondary">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="events" class="fs-6 text-secondary">Sự kiện</a>
                </li>
                <li class="breadcrumb-item fs-6 text-secondary d-none d-lg-inline-block" aria-current="page">
                    {{ $eventDetail->title }}
                </li>
            </ol>
        </nav>
        <div class="row event-sub-section-main">
            <div class="col-lg-8">
                <h3 class="font-title--sm">
                    {{ $eventDetail->title }}
                </h3>
            </div>
        </div>
    </div>
</section>

<section class="section event-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="course-overview">
                    <!-- Thumbnails -->
                    <div class="course-overview-image">
                        <img src="{{asset('uploads/events/'.$eventDetail->image)}}" alt="img" />
                            <svg width="23" height="27" viewBox="0 0 23 27" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22.2159 15.9113C22.1179 16.0425 21.6605 16.6002 21.3011 16.9611L21.1051 17.158C18.3608 20.1434 11.5327 24.6379 8.0696 26.0814C8.0696 26.1142 6.01136 26.9672 5.03125 27H4.90057C3.39773 27 1.9929 26.147 1.27415 24.7691C0.882102 24.0146 0.522727 21.8165 0.490057 21.7837C0.196023 19.8153 0 16.8004 0 13.4836C0 10.0061 0.196023 6.85662 0.555398 4.92102C0.555398 4.88821 0.914773 3.11665 1.14347 2.52612C1.50284 1.67315 2.15625 0.951397 2.97301 0.492102C3.62642 0.164034 4.3125 0 5.03125 0C5.78267 0.0328068 7.1875 0.52819 7.7429 0.754557C11.402 2.19806 18.3935 6.92224 21.0724 9.80923C21.5298 10.2685 22.0199 10.8262 22.1506 10.9575C22.706 11.6792 23 12.565 23 13.5197C23 14.3694 22.7386 15.2224 22.2159 15.9113Z"
                                    fill="#1089FF"></path>
                            </svg>
                        </a>
                    </div>
                    {{-- Tabs --}}
                    <ul class="nav course-overview-nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active font-para--lg" id="pills-courseoverview-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-courseoverview" type="button" role="tab"
                                aria-controls="pills-courseoverview" aria-selected="true">
                                Thông tin sự kiện
                            </button>
                        </li>
                    <div class="tab-content course-overview-content" id="pills-tabContentTwo">
                        <div class="tab-pane fade show active" id="pills-courseoverview" role="tabpanel"
                            aria-labelledby="pills-courseoverview-tab">
                            <div class="row course-overview-main mt-4">
                                <div class="course-overview-main-item">
                                    <h6 class="font-title--card">Mô tả</h6>
                                    <p class="mb-3 font-para--lg">{{$eventDetail->description}}</p>
                                </div>
                                <div class="course-overview-main-item mb-0">
                                    <h6 class="font-title--card">Nhà tài trợ</h6>
                                    <p class="mb-2 font-para--lg">{{$eventDetail->hosted_by}}</p>
                                </div>
                                <div class="course-overview-main-item">
                                    <h6 class="font-title--card">Nơi diễn ra</h6>
                                    <p class="mb-2 font-para--lg">{{$eventDetail->location}}</p>
                                </div>
                                <div class="course-overview-main-item">
                                    <h6 class="font-title--card">Chủ đề</h6>
                                    <p class="mb-2 font-para--lg">{{$eventDetail->topic}}</p>
                                </div>
                                <div class="course-overview-main-item mb-0">
                                    <h6 class="font-title--card">Mục tiêu sự kiện</h6>
                                    <p class="mb-2 font-para--lg">{{$eventDetail->goal}}</p>
                                </div>
                                <div class="course-overview-main-item mb-0">
                                    <h6 class="font-title--card">Diễn ra ngày</h6>
                                    <p class="mb-2 font-para--lg">{{ date('d/m/Y', strtotime($eventDetail->date)) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>