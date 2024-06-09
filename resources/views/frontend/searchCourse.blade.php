@extends('frontend.layouts.app')
@section('title', 'Khoá học')
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
                    <a href="course-search.html" class="fs-6 text-secondary">Khoá học</a>
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
            <div class="col-lg-4 d-none d-lg-block">
                <div class="accordion sidebar-filter" id="sidebarFilter">
                    <!-- Search by Category  -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="categoryAcc">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#categoryCollapse" aria-expanded="true"
                                aria-controls="categoryCollapse">
                                Danh mục khoá học
                            </button>
                        </h2>
                        <div id="categoryCollapse" class="accordion-collapse collapse show"
                            aria-labelledby="categoryAcc" data-bs-parent="#sidebarFilter">
                            <div class="accordion-body">
                                <form action="{{route('search2Course')}}" method="get">
                                    @csrf
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" name="category" value=""
                                                {{!$selectedCategories ? 'checked' : '' }}>
                                            <label> Tất cả </label>
                                        </div>
                                        <p class="check-details">
                                            {{$allCourse->count()}}
                                        </p>
                                    </div>
                                    @forelse($category as $cat)
                                    @php
                                    $courseCount = $cat->course()->where('status', 2)->count();
                                    @endphp
                                    <div class="accordion-body__item">
                                        <div class="check-box">
                                            <input type="checkbox" class="checkbox-primary" name="categories[]" value="{{ $cat->id }}" 
                                                {{ in_array($cat->id, (array)$selectedCategories) ? 'checked' : '' }}>
                                            <label> {{$cat->category_name}} </label>
                                        </div>
                                        <p class="check-details">
                                            {{$courseCount}}
                                        </p>
                                    </div>
                                    @empty
                                    @endforelse
                                    <button type="submit" class="button button--primary">Lọc</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

            <div class="col-lg-8">
                <div class="event-search-results">
                    <div class="event-search-results-heading">
                        {{-- <div class="nice-select" tabindex="0">
                            <span class="current">Tất cả</span>
                            <ul class="list">
                                <li data-value="Nothing" data-display=" Mới nhất" class="option selected focus">
                                    Tất cả
                                </li>
                                <li data-value="Nothing" data-display=" Mới nhất" class="option selected focus">
                                Mới nhất
                                </li>
                            </ul>
                        </div> --}}
                        <p>{{$course->count()}} Kết quả tìm kiếm.</p>
                        <button class="button button-lg button--primary button--primary-filter d-lg-none" id="filter">
                            <span>
                                <svg width="19" height="16" viewBox="0 0 19 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.3335 14.9999V9.55554" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M3.3335 6.4444V1" stroke="white" stroke-width="1.7" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path d="M9.55469 14.9999V8" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M9.55469 4.88886V1" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.7773 14.9999V11.1111" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M15.7773 7.99995V1" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M1 9.55554H5.66663" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M7.22217 4.88867H11.8888" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M13.4443 11.1111H18.111" stroke="white" stroke-width="1.7"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                            Lọc
                        </button>
                    </div>
                </div>

                {{-- Courses --}}
                <div class="row event-search-content">
                    @forelse ($course as $c)
                    <div class="col-md-6 mb-4 course-item">
                        <div class="contentCard contentCard--course">
                            <div class="contentCard-top">
                                <a href="{{route('courseDetails', encryptor('encrypt', $c->id))}}">
                                    <img src="{{asset('uploads/courses/'.$c->image)}}" alt="images" class="img-fluid" />
                                </a>
                            </div>
                            <div class="contentCard-bottom">
                                <h5>
                                    <a href="{{route('courseDetails', ['id' => encryptor('encrypt', $c->id)])}}" class="font-title--card">{{$c->title_en}}</a>
                                </h5>
                                <div class="contentCard-info d-flex align-items-center justify-content-between">
                                    <a href="{{route('instructorProfile', encryptor('encrypt', $c->instructor?->id))}}" class="contentCard-user d-flex align-items-center">
                                        <img src="{{asset('uploads/users/'.$c->instructor?->image)}}" alt="Instructor Image" class="rounded-circle" height="34" width="34" />
                                        <p class="font-para--md">{{$c->instructor?->name_en}}</p>
                                    </a>
                                    <div class="price">
                                        @if($c->price == null)
                                            Free
                                        @else
                                            {{ number_format($c->price) }} VNĐ
                                        @endif
                                        @if($c->old_price)
                                            <del><br>{{ number_format($c->old_price) }} VNĐ</del>
                                        @endif
                                    </div>
                                </div>
                                <div class="contentCard-more">
                                    <div class="d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{asset('frontend/dist/images/icon/star.png')}}" alt="star" />
                                        </div>
                                        <span>4.5</span>
                                    </div>
                                    <div class="eye d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{asset('frontend/dist/images/icon/eye.png')}}" alt="eye" />
                                        </div>
                                        <span>24,517</span>
                                    </div>
                                    <div class="book d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{asset('frontend/dist/images/icon/book.png')}}" alt="location" />
                                        </div>
                                        <span>{{$c->lesson}} bài</span>
                                    </div>
                                    <div class="clock d-flex align-items-center">
                                        <div class="icon">
                                            <img src="{{asset('frontend/dist/images/icon/Clock.png')}}" alt="clock" />
                                        </div>
                                        <span>{{$c->duration}} Tháng</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-md-6 mb-4">
                        <div class="contentCard contentCard--course">
                            <h3>Không tìm thấy khóa học</h3>
                        </div>
                    </div>
                    @endforelse
                </div>
                
                <div class="pagination-group mt-lg-5 mt-2">
                    <a href="#" class="p_prev" onclick="changePage(currentPage - 1)">
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.414" height="16.828" viewBox="0 0 9.414 16.828">
                            <path data-name="Icon feather-chevron-left" d="M20.5,23l-7-7,7-7"
                                transform="translate(-12.5 -7.586)" fill="none" stroke="#1a2224" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2"></path>
                        </svg>
                    </a>
                    <a href="#" class="cdp_i active" onclick="changePage(1)">01</a>
                    <a href="#" class="cdp_i" onclick="changePage(2)">02</a>
                    <a href="#" class="cdp_i" onclick="changePage(3)">03</a>
                    <a href="#" class="p_next" onclick="changePage(currentPage + 1)">
                        <svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1.5 1L8.5 8L1.5 15" stroke="#35343E" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </a>
                </div>
                
            </div>
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
<script>
    const itemsPerPage = 4;
    let currentPage = 1;
    const items = document.querySelectorAll('.course-item');
    const totalPages = Math.ceil(items.length / itemsPerPage);

    function showPage(page) {
        currentPage = page;
        items.forEach((item, index) => {
            item.style.display = (index >= (page - 1) * itemsPerPage && index < page * itemsPerPage) ? 'block' : 'none';
        });
        document.querySelectorAll('.cdp_i').forEach((link, index) => {
            link.classList.toggle('active', index + 1 === page);
        });
    }

    function changePage(page) {
        if (page > 0 && page <= totalPages) {
            showPage(page);
        }
    }

    // Initialize the first page
    showPage(1);
</script>


@endpush