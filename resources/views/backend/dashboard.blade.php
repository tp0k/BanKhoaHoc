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
                        {{-- <div class="card-body text-center mt-3">
                            <div class="ico-sparkline">
                                <div id="sparkline12"></div>
                            </div>
                        </div> --}}
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
                            <h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> {{ $totalCourses }}</h5>
                        </div>
                        {{-- <div class="card-body p-0 mt-2">
                            <div class="px-4"><span class="bar1"
                                    data-peity='{ "fill": ["rgb(0, 0, 128)", "rgb(7, 135, 234)"]}'>6,2,8,4,-3,8,1,-3,6,-5,9,2,-8,1,4,8,9,8,2,1</span>
                            </div>
                        </div> --}}
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