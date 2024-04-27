@extends('backend.layouts.app')
@section('title', 'Admin Dashboard')

@push('styles')
<link rel="stylesheet" href="{{asset('vendor/jqvmap/css/jqvmap.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/chartist/css/chartist.min.css')}}">
<link rel="stylesheet" href="{{asset('css/skin-2.css')}}">
@endpush

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-primary overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title text-white">Tổng số học sinh</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 422</h5>
                    </div>
                    <div class="card-body text-center mt-3">
                        <div class="ico-sparkline">
                            <div id="sparkline12"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-success overflow-hidden">
                    <div class="card-header">
                        <h3 class="card-title text-white">Học viên mới</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 357</h5>
                    </div>
                    <div class="card-body text-center mt-4 p-0">
                        <div class="ico-sparkline">
                            <div id="spark-bar-2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-secondary overflow-hidden">
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white">Tổng khóa học</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 547</h5>
                    </div>
                    <div class="card-body p-0 mt-2">
                        <div class="px-4"><span class="bar1"
                                data-peity='{ "fill": ["rgb(0, 0, 128)", "rgb(7, 135, 234)"]}'>6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-3 col-sm-6">
                <div class="widget-stat card bg-danger overflow-hidden">
                    <div class="card-header pb-3">
                        <h3 class="card-title text-white">Tổng chi phí</h3>
                        <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 3280$</h5>
                    </div>
                    <div class="card-body p-0 mt-1">
                        <span class="peity-line-2" data-width="100%">7,6,8,7,3,8,3,3,6,5,9,2,8</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Báo cáo thu nhập/chi phí</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart_2"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Báo cáo thu nhập/chi phí</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="areaChart_1"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-xxl-8 col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Phân công nhiệm vụ</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-hover verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nhiệm vụ</th>
                                        <th scope="col">Chức vụ</th>
                                        <th scope="col">Trạng thái</th>
                                        <th scope="col">Tiến trình</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>1</th>
                                        <td>Báo cáo thiết kế làm việc</td>
                                        <td>Tạ Thảo</td>
                                        <td><span class="badge badge-rounded badge-primary">DONE</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%;" role="progressbar">
                                                    <span class="sr-only">Hoàn thành 70%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>Báo cáo thu chi</td>
                                        <td>Lan</td>
                                        <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" style="width: 70%;"
                                                    role="progressbar">
                                                    <span class="sr-only">Hoàn thành 70%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>Quản lý báo cáo</td>
                                        <td>Thảo</td>
                                        <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" style="width: 70%;"
                                                    role="progressbar">
                                                    <span class="sr-only">Hoàn thành 70%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>4</th>
                                        <td>Quản lý thư viện</td>
                                        <td>Lê Tuyết</td>
                                        <td><span class="badge badge-rounded badge-danger">Bị cấm</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" style="width: 70%;"
                                                    role="progressbar">
                                                    <span class="sr-only">Hoàn thành 70%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>5</th>
                                        <td>Quản lý trạng thái</td>
                                        <td>Thảo Tạ</td>
                                        <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" style="width: 70%;"
                                                    role="progressbar">
                                                    <span class="sr-only">Hoàn thành 70%</span>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>6</th>
                                        <td>Quản lý thiết kế</td>
                                        <td>Đan Nguyễn</td>
                                        <td><span class="badge badge-rounded badge-primary">DONE</span></td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 70%;" role="progressbar">
                                                    <span class="sr-only">Hoàn thành 70%</span>
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
                                            <h5 class="mb-1">Dr Đan đã gửi 1 ảnh</h5>
                                            <small class="d-block">02 Tháng 4 2024 - 02:26 PM</small>
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
                                            <h5 class="mb-1">Tạo báo cáo thành công</h5>
                                            <small class="d-block">02 Tháng 4 2024 - 02:26 PM</small>
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
                                            <h5 class="mb-1">Thông báo: Giờ hoàn thành!</h5>
                                            <small class="d-block">02 Tháng 4 2024 - 02:26 PM</small>
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
                                            <h5 class="mb-1">Dr Đan đã gửi 1 ảnh</h5>
                                            <small class="d-block">02 Tháng 4 2024 - 02:26 PM</small>
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
                                            <h5 class="mb-1">Tạo báo cáo thành công</h5>
                                            <small class="d-block">02 Tháng 4 2024 - 02:26 PM</small>
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
                                            <h5 class="mb-1">Thông báo: Giờ hoàn thành!</h5>
                                            <small class="d-block">02 Tháng 4 2024 - 02:26 PM</small>
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
                                            <h5 class="mb-1">Dr Đan đã gửi 1 ảnh</h5>
                                            <small class="d-block">02 Tháng 4 2024 - 02:26 PM</small>
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
                                            <h5 class="mb-1">Tạo báo cáo thành công</h5>
                                            <small class="d-block">02 Tháng 4 2024 - 02:26 PM</small>
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
                                            <h5 class="mb-1">Thông báo: Giờ hoàn thành!</h5>
                                            <small class="d-block">02 Tháng 4 2024 - 02:26 PM</small>
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
                                            <h5 class="mb-1">Dr Đan đã gửi 1 ảnh</h5>
                                            <small class="d-block">02 Tháng 4 2024 - 02:26 PM</small>
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
                        <h4 class="card-title">Danh sách học sinh mới </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm mb-0 table-striped">
                                <thead>
                                    <tr>
                                        <th class="px-5 py-3">Tên</th>
                                        <th class="py-3">Trình độ</th>
                                        <th class="py-3">Vị trí</th>
                                        <th class="py-3">Trạng thái</th>
                                        <th class="py-3">Ngày vào học</th>
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
                                                        <h5 class="mb-0 fs--1">Đan Nguyễn</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Lan Tô</td>
                                        <td class="py-2">Cơ khí</td>
                                        <td><span class="badge badge-rounded badge-primary">DONE</span></td>
                                        <td class="py-2">30/03/2018</td>
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
                                                        <h5 class="mb-0 fs--1">Tạ Thảo</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Tạ Thảo</td>
                                        <td class="py-2">Sửa máy tính</td>
                                        <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                        <td class="py-2">11/07/2017</td>
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
                                                        <h5 class="mb-0 fs--1">Tạ Thảo</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Tạ Thảo</td>
                                        <td class="py-2">Cơ khí</td>
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
                                                        <h5 class="mb-0 fs--1">Tạ Thảo</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Tạ Thảo </td>
                                        <td class="py-2">Sửa máy tính </td>
                                        <td><span class="badge badge-rounded badge-danger">Bị cấm</span></td>
                                        <td class="py-2">05/04/2018</td>
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
                                                        <h5 class="mb-0 fs--1">Tạ Thảo</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Tạ Thảo</td>
                                        <td class="py-2">Thu ngân</td>
                                        <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                        <td class="py-2">17/03/2016</td>
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
                                                        <h5 class="mb-0 fs--1">Tạ Thảo</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Tạ Thảo</td>
                                        <td class="py-2">Sửa máy tính</td>
                                        <td><span class="badge badge-rounded badge-danger">Bị cấm</span></td>
                                        <td class="py-2">12/07/2014</td>
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
                                                        <h5 class="mb-0 fs--1">Tạ Thảo</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td class="py-2">Đan Nguyễn</td>
                                        <td class="py-2">Cơ khí</td>
                                        <td><span class="badge badge-rounded badge-warning">Đang chờ</span></td>
                                        <td class="py-2">15/06/2014</td>
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

@endsection

@push('scripts')
<!-- Chart ChartJS plugin files -->
<script src="{{asset('vendor/chart.js/Chart.bundle.min.js')}}"></script>

<!-- Chart piety plugin files -->
<script src="{{asset('vendor/peity/jquery.peity.min.js')}}"></script>

<!-- Chart sparkline plugin files -->
<script src="{{asset('vendor/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Demo scripts -->
<script src="{{asset('js/dashboard/dashboard-3.js')}}"></script>
@endpush