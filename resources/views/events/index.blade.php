@extends('frontend.layouts.app')
@section('title', 'Sự kiện')
@section('body-attr') style="background-color: #ebebf2;" @endsection

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
                    <a href="course-search.html" class="fs-6 text-secondary">Sự kiện</a>
                </li>
            </ol>
        </nav>
    </div>
</div>
<!-- Breadcrumb Ends Here -->

<!-- Event Search Starts Here -->

<section class="section event-search">
    <div class="container">
        
        <div class="row event-search-content">
            @forelse ($events as $event)
            <div class="col-md-6 mb-4">
                <div class="contentCard contentCard--course">
                    <div class="contentCard-top">
                        <a href="{{route('eventDetails', encryptor('encrypt', $event->id))}}">
                            <img src="{{asset('uploads/events/'.$event->image)}}" alt="images" class="img-fluid" />
                        </a>
                    </div>
                    <div class="contentCard-bottom">
                        <h5>
                            <a href="{{route('eventDetails', encryptor('encrypt', $event->id))}}" class="font-title--card">{{$event->title}}</a>
                        </h5>
                        <p class="text-white">{{$event->description}}</p>
                        <div class="d-flex justify-content-between">
                            <span class="text-white">{{$event->location}}</span>
                            <span class="text-white">{{$event->date}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-6 mb-4">
                <div class="contentCard contentCard--course">
                    <h3>Không tìm thấy sự kiện</h3>
                </div>
            </div>
            @endforelse
        </div>

        <div class="pagination-group mt-lg-5 mt-2">
            <a href="#" class="p_prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828"
                    viewBox="0 0 9.414 16.828">
                    <path data-name="Icon feather-chevron-left" d="M20.5,23l-7-7,7-7"
                        transform="translate(-12.5 -7.586)" fill="none" stroke="#1a2224" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2"></path>
                </svg>
            </a>
            <a href="#!1" class="cdp_i active">01</a>
            <a href="#!2" class="cdp_i">02</a>
            <a href="#!3" class="cdp_i">03</a>

            <a href="#!+1" class="p_next">
                <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.5 1L8.5 8L1.5 15" stroke="#35343E" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round"></path>
                </svg>
            </a>
        </div>
    </div>
</section>

@endsection


@push('scripts')
<script src="{{asset('frontend/src/scss/vendors/plugin/js/price_range_script.js')}}"></script>
<script src="{{asset('frontend/src/scss/vendors/plugin/js/jquery-ui.min.js')}}"></script>
<script>
    const filterBtn = document.querySelector("#filter");
            const cross = document.querySelector(".filter--cross");

            filterBtn.addEventListener("click", function () {
                let sidebar = document.querySelector(".filter-sidebar");
                sidebar.classList.toggle("active");
            });

            cross.addEventListener("click", function () {
                let sidebar = document.querySelector(".filter-sidebar");
                sidebar.classList.remove("active");
            });
</script>

@endpush
