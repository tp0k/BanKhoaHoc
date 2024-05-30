@extends('backend.layouts.app')
@section('title', 'Dashboard')

@section('content')
    <!--**********************************
                Content body start
            ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="widget-stat card bg-primary overflow-hidden">
                        <div class="card-header">
                            <h3 class="card-title text-white">Tổng học viên</h3>
                            <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> {{ $totalStudents }}</h5>
                        </div>
                        <div class="card-body text-center mt-3">
                            <div class="ico-sparkline">
                                <div id="sparkline12"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-xl-3 col-xxl-3 col-sm-6">
                    <div class="widget-stat card bg-success overflow-hidden">
                        <div class="card-header">
                            <h3 class="card-title text-white">Học viên mới</h3>
                            <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i>{{ $enrollmentStatistics }}</h5>
                        </div>
                        <div class="card-body text-center mt-4 p-0">
                            <div class="ico-sparkline">
                                <div id="spark-bar-2"></div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-66">
                    <div class="widget-stat card bg-secondary overflow-hidden">
                        <div class="card-header pb-3">
                            <h3 class="card-title text-white">Tổng khoá học</h3>
                            <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i>{{ $totalCourses }}</h5>
                        </div>
                        <div class="card-body p-0 mt-2">
                            <div class="px-4"><span class="bar1"
                                    data-peity='{ "fill": ["rgb(0, 0, 128)", "rgb(7, 135, 234)"]}'>6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-6 col-sm-6">
                    <div class="widget-stat card bg-danger overflow-hidden">
                        <div class="card-header pb-3">
                            <h3 class="card-title text-white">Tổng doanh thu</h3>
                            <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> {{ $totalPayments }}</h5>
                        </div>
                        {{-- <div class="card-body p-0 mt-1">
                            <span class="peity-line-2" data-width="100%">7,6,8,7,3,8,3,3,6,5,9,2,8</span>
                        </div> --}}
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thống kê doanh thu</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="paymentLineChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-xxl-6 col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thống kê số học viên</h3>
                        </div>
                        <div class="card-body">
                            <canvas id="enrollmentBarChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-xxl-8 col-lg-8 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Giao nhiệm vụ</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table header-border table-hover verticle-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nhiệm vụ</th>
                                            <th scope="col">Giáo viên được chỉ định</th>
                                            <th scope="col">Trạng thái</th>
                                            <th scope="col">Quá trình</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>1</th>
                                            <td>Báo cáo công việc</td>
                                            <td>Lan tô</td>
                                            <td><span class="badge badge-rounded badge-primary">Done</span></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 70%;" role="progressbar">
                                                        <span class="sr-only">70% hoàn thành</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>2</th>
                                            <td>Báo cáo thu phí</td>
                                            <td>Dan Nguyen</td>
                                            <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" style="width: 70%;"
                                                        role="progressbar">
                                                        <span class="sr-only">70% hoàn thành</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>3</th>
                                            <td>Báo cáo quản lý</td>
                                            <td>Thảo Phương</td>
                                            <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" style="width: 70%;"
                                                        role="progressbar">
                                                        <span class="sr-only">70% hoàn thành</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>4</th>
                                            <td>Trạng thái tài liệu</td>
                                            <td>Thanh Lê</td>
                                            <td><span class="badge badge-rounded badge-danger">Đang bị khoá</span></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" style="width: 70%;"
                                                        role="progressbar">
                                                        <span class="sr-only">70% hoàn thành</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>5</th>
                                            <td>Trạng thái vị trí</td>
                                            <td>Hoa Hoàng</td>
                                            <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" style="width: 70%;"
                                                        role="progressbar">
                                                        <span class="sr-only">70% hoàn thành</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>6</th>
                                            <td>Báo cáo công việc</td>
                                            <td>Thảo Tạ</td>
                                            <td><span class="badge badge-rounded badge-primary">DONE</span></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 70%;" role="progressbar">
                                                        <span class="sr-only">70% hoàn thành</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Thông báo</h4>
                        </div>
                        <div class="card-body">
                            <div class="widget-todo dz-scroll" style="height:370px;" id="DZ_W_Notifications">
                                <ul class="timeline">
                                    <li>
                                        <div class="timeline-badge primary"></div>
                                        <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img class="rounded-circle" alt="image" width="50"
                                                src="{{asset('images/profile/education/pic1.jpg')}}">
                                            <div class="col">
                                                <h5 class="mb-1">Tiến sĩ TrungDuc gửi cho bạn ảnh</h5>
                                                <small class="d-block">02 April 2024 - 02:26 PM</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="timeline-badge warning"></div>
                                        <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img class="rounded-circle" alt="image" width="50"
                                                src="{{asset('images/profile/education/pic2.jpg')}}">
                                            <div class="col">
                                                <h5 class="mb-1">Đã tạo báo cáo thành công</h5>
                                                <small class="d-block">02 April 2024 - 02:26 PM</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="timeline-badge danger"></div>
                                        <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img class="rounded-circle" alt="image" width="50"
                                                src="{{asset('images/profile/education/pic3.jpg')}}">
                                            <div class="col">
                                                <h5 class="mb-1">Nhắc nhở: Thời gian hoàn thành!</h5>
                                                <small class="d-block">02 April 2024 - 02:26 PM</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="timeline-badge success"></div>
                                        <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img class="rounded-circle" alt="image" width="50"
                                                src="{{asset('images/profile/education/pic4.jpg')}}">
                                            <div class="col">
                                                <h5 class="mb-1">Tiến sĩ Phương Thảo Gửi cho bạn ảnh</h5>
                                                <small class="d-block">02 April 2024 - 02:26 PM</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="timeline-badge warning"></div>
                                        <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img class="rounded-circle" alt="image" width="50"
                                                src="{{asset('images/profile/education/pic5.jpg')}}">
                                            <div class="col">
                                                <h5 class="mb-1">Báo cáo được tạo thành công</h5>
                                                <small class="d-block">02 April 2024 - 02:26 PM</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="timeline-badge dark"></div>
                                        <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img class="rounded-circle" alt="image" width="50"
                                                src="{{asset('images/profile/education/pic6.jpg')}}">
                                            <div class="col">
                                                <h5 class="mb-1">Nhắc nhở : Thời gian hoàn thành!</h5>
                                                <small class="d-block">02 April 2024 - 02:26 PM</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="timeline-badge info"></div>
                                        <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img class="rounded-circle" alt="image" width="50"
                                                src="{{asset('images/profile/education/pic7.jpg')}}">
                                            <div class="col">
                                                <h5 class="mb-1">Tiến sĩ Phương gửi cho bạn ảnh</h5>
                                                <small class="d-block">02 April 2024 - 02:26 PM</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="timeline-badge danger"></div>
                                        <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img class="rounded-circle" alt="image" width="50"
                                                src="{{asset('images/profile/education/pic8.jpg')}}">
                                            <div class="col">
                                                <h5 class="mb-1">Báo cáo được tạo thành công</h5>
                                                <small class="d-block">02 April 2024 - 02:26 PM</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="timeline-badge success"></div>
                                        <a class="timeline-panel text-muted mb-3 d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img class="rounded-circle" alt="image" width="50"
                                                src="{{asset('images/profile/education/pic9.jpg')}}">
                                            <div class="col">
                                                <h5 class="mb-1">Nhắc nhở : Thời gian hoàn thành!</h5>
                                                <small class="d-block">02 April 2024 - 02:26 PM</small>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="timeline-badge warning"></div>
                                        <a class="timeline-panel text-muted d-flex align-items-center"
                                            href="javascript:void(0);">
                                            <img class="rounded-circle" alt="image" width="50"
                                                src="{{asset('images/profile/education/pic10.jpg')}}">
                                            <div class="col">
                                                <h5 class="mb-1">Tiến sĩ Phương gửi cho bạn ảnh</h5>
                                                <small class="d-block">02 April 2024 - 02:26 PM</small>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách học viên mới </h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0 table-striped">
                                    <thead>
                                        <tr>
                                            <th class="px-5 py-3">Tên</th>
                                            <th class="py-3">Nhân viên được chỉ định</th>
                                            <th class="py-3">Chi nhánh</th>
                                            <th class="py-3">Trạng thái</th>
                                            <th class="py-3">Ngày bàn giao</th>
                                            <th class="py-3">Sửa</th>
                                        </tr>
                                    </thead>
                                    <tbody id="customers">
                                        <tr class="btn-reveal-trigger">
                                            <td class="p-3">
                                                <a href="javascript:void(0);">
                                                    <div class="media d-flex align-items-center">
                                                        <div class="avatar avatar-xl mr-2">
                                                            <img class="rounded-circle img-fluid"
                                                                src="{{asset('images/avatar/5.png')}}" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-0 fs--1">Dan Nguyễn</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="py-2">Tô Lan</td>
                                            <td class="py-2">Phương Thảo</td>
                                            <td><span class="badge badge-rounded badge-primary">DONE</span></td>
                                            <td class="py-2">30/03/2024</td>
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                        class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                        class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="btn-reveal-trigger">
                                            <td class="p-3">
                                                <a href="javascript:void(0);">
                                                    <div class="media d-flex align-items-center">
                                                        <div class="avatar avatar-xl mr-2">
                                                            <img class="rounded-circle img-fluid"
                                                                src="{{asset('images/avatar/1.png')}}" alt=""
                                                                width="30">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-0 fs--1">Hoa Hoàng</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="py-2">Hoa Hoàng</td>
                                            <td class="py-2">Máy tính</td>
                                            <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                            <td class="py-2">11/03/2024</td>
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                        class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                        class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="btn-reveal-trigger">
                                            <td class="p-3">
                                                <a href="javascript:void(0);">
                                                    <div class="media d-flex align-items-center">
                                                        <div class="avatar avatar-xl mr-2">
                                                            <img class="rounded-circle img-fluid"
                                                                src="{{asset('images/avatar/5.png')}}" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-0 fs--1">Tuyết Trần</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="py-2">Huế Đỗ</td>
                                            <td class="py-2">Lan</td>
                                            <td><span class="badge badge-rounded badge-primary">DONE</span></td>
                                            <td class="py-2">05/04/2016</td>
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                        class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                        class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="btn-reveal-trigger">
                                            <td class="p-3">
                                                <a href="javascript:void(0);">
                                                    <div class="media d-flex align-items-center">
                                                        <div class="avatar avatar-xl mr-2">
                                                            <img class="rounded-circle img-fluid"
                                                                src="{{asset('images/avatar/1.png')}}" alt=""
                                                                width="30">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-0 fs--1">Trang</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="py-2">Quang</td>
                                            <td class="py-2">Máy tính</td>
                                            <td><span class="badge badge-rounded badge-danger">Đang khoá</span></td>
                                            <td class="py-2">05/03/2024</td>
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                        class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                        class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="btn-reveal-trigger">
                                            <td class="p-3">
                                                <a href="javascript:void(0);">
                                                    <div class="media d-flex align-items-center">
                                                        <div class="avatar avatar-xl mr-2">
                                                            <img class="rounded-circle img-fluid"
                                                                src="{{asset('images/avatar/1.png')}}" alt=""
                                                                width="30">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-0 fs--1">Tính</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="py-2">Trang Phạm</td>
                                            <td class="py-2">Thu ngân</td>
                                            <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                            <td class="py-2">17/03/2024</td>
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                        class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                        class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="btn-reveal-trigger">
                                            <td class="p-3">
                                                <a href="javascript:void(0);">
                                                    <div class="media d-flex align-items-center">
                                                        <div class="avatar avatar-xl mr-2">
                                                            <img class="rounded-circle img-fluid"
                                                                src="{{asset('images/avatar/5.png')}}" width="30"
                                                                alt="">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-0 fs--1">Quỳnh Phạm</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="py-2">Quỳnh Trần</td>
                                            <td class="py-2">Máy tính</td>
                                            <td><span class="badge badge-rounded badge-danger">Đang bị khoá</span></td>
                                            <td class="py-2">12/02/2024</td>
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                        class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                        class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                        <tr class="btn-reveal-trigger">
                                            <td class="p-3">
                                                <a href="javascript:void(0);">
                                                    <div class="media d-flex align-items-center">
                                                        <div class="avatar avatar-xl mr-2">
                                                            <img class="rounded-circle img-fluid"
                                                                src="{{asset('images/avatar/1.png')}}" alt=""
                                                                width="30">
                                                        </div>
                                                        <div class="media-body">
                                                            <h5 class="mb-0 fs--1">Đan Thị</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="py-2">Thị Đan</td>
                                            <td class="py-2">Cơ khí</td>
                                            <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                            <td class="py-2">15/01/2024</td>
                                            <td>
                                                <a href="edit-student.html" class="btn btn-sm btn-primary"><i
                                                        class="la la-pencil"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger"><i
                                                        class="la la-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--**********************************
                Content body end
 ***********************************-->

@endsection

@push('scripts')
<!-- Chart ChartJS plugin files -->
{{-- <script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Dữ liệu thống kê số học viên theo các tháng
var enrollmentMonths = Array.from({length: 12}, (_, i) => i + 1);
var enrollmentData = Array(12).fill(null);

// Duyệt qua dữ liệu thống kê số học viên đã có và cập nhật dữ liệu cho các tháng tương ứng
@foreach($enrollmentStatisticsByMonth as $enrollment)
    enrollmentData[{{ $enrollment->month - 1 }}] = {{ $enrollment->total_enrollments }};
@endforeach

// Vẽ biểu đồ cột cho số học viên
var enrollmentCtx = document.getElementById('enrollmentBarChart').getContext('2d');
var enrollmentChart = new Chart(enrollmentCtx, {
    type: 'bar',
    data: {
        labels: enrollmentMonths.map(month => 'Tháng ' + month),
        datasets: [{
            label: 'Số học viên',
            data: enrollmentData,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

// Dữ liệu thống kê doanh thu theo các tháng
var paymentMonths = Array.from({length: 12}, (_, i) => i + 1);
var paymentData = Array(12).fill(null);

// Duyệt qua dữ liệu thống kê doanh thu đã có và cập nhật dữ liệu cho các tháng tương ứng
@foreach($totalPaymentsByMonth as $payment)
    paymentData[{{ $payment->month - 1 }}] = {{ $payment->total_payments }};
@endforeach

// Vẽ biểu đồ đường cho doanh thu
var paymentCtx = document.getElementById('paymentLineChart').getContext('2d');
var paymentChart = new Chart(paymentCtx, {
    type: 'line',
    data: {
        labels: paymentMonths.map(month => 'Tháng ' + month),
        datasets: [{
            label: 'Doanh thu',
            data: paymentData,
            fill: false,
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 2
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>
<!-- Chart piety plugin files -->
<script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>

<!-- Chart sparkline plugin files -->
<script src="{{asset('vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Demo scripts -->
<script src="{{asset('js/dashboard/dashboard-3.js')}}"></script>
@endpush