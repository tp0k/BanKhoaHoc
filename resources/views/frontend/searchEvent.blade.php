@extends('frontend.layouts.app')
@section('title', 'Sự kiện')
@section('body-attr') style="background-color: #ebebf2;" @endsection

@push('styles')
<link rel="stylesheet" href="{{asset('frontend/src/scss/vendors/plugin/css/jquery-ui.css')}}" />
<style>
    .section.event-search .container {
        max-width: 1200px; 
        margin: 0 auto;
    }

    .section.event-search .jumbotron-wrapper {
        max-width: 80%; /* Giới hạn chiều rộng của jumbotron */
        margin: 0 auto 30px auto; /* Thêm khoảng cách dưới */
    }

    .section.event-search .jumbotron {
        background-color: #00838f;
        color: white;
        padding: 3rem 1.5rem;
        border-radius: .3rem;
    }

    .section.event-search .jumbotron .display-4 {
        font-size: 2.5rem;
        font-weight: 300;
    }

    .section.event-search .jumbotron p.lead {
        font-size: 1.25rem;
        font-weight: 300;
    }

    .section.event-search .card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        overflow: hidden;
        border: none;
        border-radius: .25rem;
        height: 100%; /* Cố định chiều cao */
    }

    .section.event-search .card-body {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        flex: 1;
    }

    .section.event-search .card-body h5 {
        margin-bottom: 0;
    }

    .section.event-search .card-body .text-muted {
        font-size: .875rem;
    }

    .section.event-search .card-body .card-text {
        font-size: 1rem;
        margin-bottom: auto;
    }

    .section.event-search .card-img-right {
        width: 200px;
        height: auto;
        object-fit: cover;
        border-top-right-radius: calc(.25rem - 1px);
        border-bottom-right-radius: calc(.25rem - 1px);
    }

    .section.event-search .jumbotron .col-md-6 {
        max-width: 1200px; 
    }
    /* .section.event-search .events-wrapper {
        max-width: 800px; 
        margin: 0 auto; 
    } */
</style>
@endpush

@section('content')
<div class="gray-box"></div>
<section class="section event-search">
    @php
        $latestEvent = $eventSearch->sortByDesc('created_at')->first();
    @endphp
    <div class="container">
        <div class="jumbotron-wrapper">
    <div class="jumbotron p-3 p-md-5 text-white rounded">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">{{ $latestEvent->title ?? 'Không có sự kiện' }}</h1>
            <p class="lead my-3">{{ $latestEvent->description ?? 'Không có mô tả.' }}</p>
            <p class="lead mb-0"><a href="{{ route('eventDetail', ['id' => $latestEvent->id ?? '#']) }}" class="text-white font-weight-bold">Tiếp tục đọc...</a></p>
            {{-- <img class="card-img-right flex-auto d-none d-md-block" src="{{ asset('uploads/events/' . $latestEvent->image) }}" alt="{{ $latestEvent->title }}"> --}}
        </div>
    </div>
</div>
</div>
{{-- <div class="events-wrapper"> --}}
    <div class="row mb-2">
        @forelse ($eventSearch as $event)
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="mb-0">
                        <a href="{{ route('eventDetail', ['id' => $event->id]) }}" class="text-dark">{{ $event->title }}</a>
                    </h3>
                    <div class="mb-1 text-muted">{{ date('d/m/Y', strtotime($event->created_at)) }}</div>
                    <p class="card-text mb-auto">
                        <a href="{{ route('eventDetail', ['id' => $event->id]) }}" class="text-dark">{{ $event->description }}</a>
                    </p>
                    <a href="{{ route('eventDetail', ['id' => $event->id]) }}">Tiếp tục đọc</a>
                </div>
                <img class="card-img-right flex-auto d-none d-md-block" src="{{ asset('uploads/events/' . $event->image) }}" alt="{{ $event->title }}">
            </div>
        </div>
    {{-- </div>     --}}
        @empty
        <div class="col-12">
            <div class="contentCard contentCard--event contentCard--space">
                <h3>Không có sự kiện nào!</h3>
            </div>
        </div>
        @endforelse
    </div>
</section>
@endsection

@push('scripts')
<script src="{{asset('frontend/src/scss/vendors/plugin/js/price_range_script.js')}}"></script>
<script src="{{asset('frontend/src/scss/vendors/plugin/js/jquery-ui.min.js')}}"></script>
@endpush
