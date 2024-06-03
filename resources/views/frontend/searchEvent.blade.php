@extends('frontend.layouts.app')
@section('title', 'Sự kiện')
@section('body-attr') style="background-color: #ebebf2;" @endsection

@push('styles')
<link rel="stylesheet" href="{{asset('frontend/src/scss/vendors/plugin/css/jquery-ui.css')}}" />
@endpush

@section('content')
<!-- Breadcrumb Starts Here -->
<div class="gray-box"></div>
<div class="event-sub-section event-sub-section--spaceY eventsearch-sub-section">
    
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb align-items-center bg-transparent p-0 mb-0">
                <li class="breadcrumb-item">
                    <a href="index.html" class="fs-6 text-secondary">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="event-search.html" class="fs-6 text-secondary">Sự kiện</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->
<!-- Event Search Starts Here -->
<section class="section event-search">
    <div class="container">
        <div class="row">
            <div class="col-12 position-relative px-0 mx-0">
                <div class="eventsSlider">
                    @forelse ($eventSearch as $event)
                        <div class="contentCard contentCard--event contentCard--space">
                            <div class="contentCard-top">
                                <a href="{{ route('eventDetail', ['id' => $event->id]) }}">
                                    <img src="{{ asset('uploads/events/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid" />
                                </a>                                
                            </div>
                            <div class="contentCard-bottom">
                                <h5>
                                    <a href="{{ route('eventDetail', ['id' => $event->id]) }}" class="font-title--card">{{ $event->title }}</a>
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