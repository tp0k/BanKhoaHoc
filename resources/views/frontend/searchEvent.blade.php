@extends('frontend.layouts.app')
@section('title', 'Sự kiện')
@section('body-attr') style="background-color: #ebebf2;" @endsection

@push('styles')
<link rel="stylesheet" href="{{asset('frontend/src/scss/vendors/plugin/css/jquery-ui.css')}}" />
@endpush

@section('content')
<!-- Breadcrumb Starts Here -->
<div class="event-sub-section event-sub-section--spaceY eventsearch-sub-section">
    {{-- <div class="gray-box"></div> --}}
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb align-items-center bg-transparent p-0 mb-0">
                <li class="breadcrumb-item">
                    <a href="index.html" class="fs-6 text-secondary">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="course-search.html" class="fs-6 text-secondary">Sự kiện</a>
                </li>
            </ol>
        </nav>
    </div>
<!-- Breadcrumb Ends Here -->
<!-- Event Search Starts Here -->
<section class="section event-search">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto">
                <div class="event-search-bar">
                    <form action="{{ route('searchCourse') }}" method="get">
                        <div class="form-input-group">
                            <input type="text" class="form-control" placeholder="Tìm kiếm khóa học..." name="keywordf">
                            <button class="button button-lg button--primary" type="submit" id="button-addon2">
                                Tìm kiếm
                            </button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 position-relative px-0 mx-0">
                <div class="eventsSlider">
                    @forelse ($eventSearch as $event)
                        <div class="contentCard contentCard--event contentCard--space">
                            <div class="contentCard-top">
                                <a href="{{ route('events') }}">
                                    <img src="{{ asset('uploads/events/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid" />
                                </a>
                            </div>
                            <div class="contentCard-bottom">
                                <h5>
                                    <a href="{{ route('events') }}" class="font-title--card">{{ $event->title }}</a>
                                </h5>
                                <div class="contentCard-more">
                                    <div class="d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/dist/images/icon/location.png') }}" alt="location" />
                                        </div>
                                        <span>{{ $event->location }}</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{ asset('frontend/dist/images/icon/calendar.png') }}" alt="calendar" />
                                        </div>
                                        <span>{{ $event->date }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="contentCard contentCard--event contentCard--space">
                            <h3>Không có sự kiện nào!</h3>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>