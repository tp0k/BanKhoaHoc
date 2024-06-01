@php
    $appNameParts = preg_split('/(?=[A-Z])/', env('APP_NAME'), -1, PREG_SPLIT_NO_EMPTY);
    $firstPart = isset($appNameParts[0]) ? $appNameParts[0] : ''; // Lấy phần đầu tiên của chuỗi
    $secondPart = isset($appNameParts[1]) ? $appNameParts[1] : ''; // Lấy phần thứ hai của chuỗi
@endphp

<!DOCTYPE html>
<html lang="{{str_replace('_','_', app()->getLocale())}}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    {{-- <title>{{ENV('APP_NAME')}} | @yield('title')</title> --}}
    <title>@yield('title','Dashboard') - {{ $firstPart }} {{ $secondPart }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logovuong.jpg')}}">
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style1.css')}}">

    @stack('styles')

</head>

<body>


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="{{route('home')}}" class="brand-logo">
                <img class="logo-abbr" src="{{asset('images/logo-white.png')}}" alt="">
                <img class="logo-compact" src="{{asset('images/d-logo.png')}}" alt="">
                <img class="brand-title" src="{{asset('images/d-logo.png')}}" alt="">
                <strong>CNET ACADEMY</strong>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form action="{{route('search1Course')}}" method="get">
                                        <input class="form-control" type="search" placeholder="Tìm kiếm khóa học"
                                            aria-label="Search" name="keyword">
                                    </form> 
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell ai-icon" href="#" role="button" data-toggle="dropdown">
                                    <svg id="icon-user" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                                    </svg>
                                    <div class="pulse-css"></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-user"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Đan</strong> đã thêm <strong>học viên</strong>
                                                        thành công
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-shopping-cart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Lan</strong> đã mua Light Dashboard 2.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="danger"><i class="ti-bookmark"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Jenny</strong> đã đánh dấu <strong>ticket</strong> chưa được giải quyết.
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="primary"><i class="ti-heart"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong>Tuyết</strong> đã mua Light Dashboard 1.0.</p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="success"><i class="ti-image"></i></span>
                                            <div class="media-body">
                                                <a href="#">
                                                    <p><strong> Hoa</strong> đã thêm <strong>khách hàng</strong>
                                                        thành công
                                                    </p>
                                                </a>
                                            </div>
                                            <span class="notify-time">3:20 am</span>
                                        </li>
                                    </ul>
                                    <a class="all-notification" href="#">Xem tất cả thông báo <i
                                            class="ti-arrow-right"></i></a>
                                </div>
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" title="Thông tin hồ sơ" href="#" role="button" data-toggle="dropdown">
                                    <img src="{{asset('uploads/users/'.request()->session()->get('image'))}}"
                                        width="20" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{route('userProfile')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <span class="ml-2">Hồ sơ</span>
                                    </a>
                                    <a href="email-inbox.html" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                            <path
                                                d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                            </path>
                                            <polyline points="22,6 12,13 2,6"></polyline>
                                        </svg>
                                        <span class="ml-2">Nhắn tin </span>
                                    </a>
                                    <a href="{{route('logOut')}}" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-log-out">
                                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                            <polyline points="16 17 21 12 16 7"></polyline>
                                            <line x1="21" y1="12" x2="9" y2="12"></line>
                                        </svg>
                                        <span class="ml-2">Đăng xuất </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @if(fullAccess())
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Bảng quản trị</li>
                    <li><a class="ai-icon" href="{{route('dashboard')}}" aria-expanded="false">
                            <i class="las la-tachometer-alt"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="ai-icon" href="{{route('home')}}" aria-expanded="false">
                            <i class="las la-home"></i>
                            <span class="nav-text">Trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-label">Menu chính</li>
                    <li><a class="" href="{{route('role.index')}}" aria-expanded="false">
                            <i class="las la-cog"></i>
                            <span class="nav-text">Quyền</span>
                        </a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="la la-universal-access"></i>
                            <span class="nav-text">Vai trò</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('user.index')}}"><i class="la la-users"></i>Users</a></li>
                            <li><a href="{{route('instructor.index')}}"><i
                                        class="las la-chalkboard-teacher"></i>Giáo viên</a>
                            </li>
                            <li><a href="{{route('student.index')}}"><i class="las la-book-reader"></i>Học viên</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="las la-school"></i>
                            <span class="nav-text">Khóa học</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('courseCategory.index')}}"><i class="la la-list"></i>Danh mục khóa học</a>
                            </li>
                            <li><a href="{{route('courseList')}}"><i class="las la-school"></i>Môn học</a></li>
                            <li><a href="{{route('course.index')}}"><i class="las la-book-open"></i>Tất cả khóa học</a></li>
                            <li><a href="{{route('lesson.index')}}"><i class="las la-chalkboard"></i>Bài giảng</a></li>
                            <li><a href="{{route('material.index')}}"><i class="las la-atom"></i></i>Tư liệu</a></li>
                        </ul>
                    </li>
                    <li><a class="" href="{{route('enrollment.index')}}" aria-expanded="false">
                            <i class="las la-bullseye"></i>
                            <span class="nav-text">Tuyển sinh</span>
                        </a>
                    </li>
                    <li><a class="" href="{{route('event.index')}}" aria-expanded="false">
                            <i class="las la-icons"></i>
                            <span class="nav-text">Tin tức</span>
                        </a>
                    </li>
                    <li><a class="" href="{{route('coupon.index')}}" aria-expanded="false">
                            <i class="las la-tags"></i>
                            <span class="nav-text">Giảm giá</span>
                        </a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="las la-tasks"></i>
                            <span class="nav-text">Quizzes</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('quiz.index')}}"><i class="las la-icons"></i>Tất cả Quizzes</a></li>
                            <li><a href="{{route('question.index')}}"><i
                                        class="las la-question-circle"></i>Questions</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="las la-star-half-alt"></i>
                            <span class="nav-text">Đánh giá</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('review.index')}}"><i class="las la-wave-square"></i>Tất cả đánh giá</a>
                            </li>
                            <li><a href="{{route('review.index')}}"><i class="las la-star"></i>Đánh giá</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="las la-comment"></i>
                            <span class="nav-text">Diễn đàn</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('discussion.index')}}"><i class="las la-comment-alt"></i>Thảo luận</a>
                            </li>
                            <li><a href="{{route('message.index')}}"><i class="las la-envelope"></i>Messages</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="las la-money-check"></i>
                            <span class="nav-text">Thanh toán</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="{{route('fee.index')}}"><i class="las la-money-bill"></i>Thống kê học phí</a></li>
                            <li><a href="javascript:void()"><i class="lab la-gg-circle"></i>Phí đăng ký</a></li>
                            <li><a href="{{route('coupon.index')}}"><i class="las la-tags"></i>Mã giảm giá</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        @endif

        @if(!fullAccess())
            <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Ban giảng viên</li>
                    <li><a class="ai-icon" href="{{route('dashboard')}}" aria-expanded="false">
                            <i class="las la-tachometer-alt"></i> <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li><a class="ai-icon" href="{{route('home')}}" aria-expanded="false">
                            <i class="las la-home"></i><span class="nav-text">Trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-label">Menu chính</li>
                    <li><a href="{{route('instructor.index')}}">
                            <i class="las la-chalkboard-teacher"></i>Danh sách giảng viên
                        </a>
                    </li>
                    <li><a href="{{route('student.index')}}"><i class="las la-book-reader"></i>Danh sách học viên</a></li>
                    <li><a href="{{route('course.index')}}"><i class="las la-book-open"></i>Tất cả khóa học</a></li>
                    <li><a href="{{route('lesson.index')}}"><i class="las la-chalkboard"></i>Bài giảng của hóa học </a></li>
                    <li><a href="{{route('material.index')}}"><i class="las la-atom"></i>Tư liệu của khóa học</a></li>
                    <li><a href="{{route('coupon.index')}}"><i class="las la-tags"></i>Giảm giá</a></li>
                    <li><a href="{{route('enrollment.index')}}"><i class="las la-bullseye"></i>Tuyển sinh</a></li>
                </ul>
            </div>
            </div>
        @endif
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->

        @yield('content')

        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>© 2024 - CNET. Đã đăng ký Bản quyền
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('vendor/global/global.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/custom.min.js')}}"></script>
    <script src="{{asset('js/dlabnav-init.js')}}"></script>

    <!-- Svganimation scripts -->
    <script src="{{asset('vendor/svganimation/vivus.min.js')}}"></script>
    <script src="{{asset('vendor/svganimation/svg.animation.js')}}"></script>
    <script src="{{asset('js/styleSwitcher.js')}}"></script>

    @stack('scripts')
    {{-- TOASTER --}}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" />
    <script>
        @if(Session::has('success'))  
    				toastr.success("{{ Session::get('success') }}");  
    		@endif  
    		@if(Session::has('info'))  
    				toastr.info("{{ Session::get('info') }}");  
    		@endif  
    		@if(Session::has('warning'))  
    				toastr.warning("{{ Session::get('warning') }}");  
    		@endif  
    		@if(Session::has('error'))  
    				toastr.error("{{ Session::get('error') }}");  
    		@endif  
    </script>
    {{-- {!! Toastr::message() !!} --}}
</body>

</html>