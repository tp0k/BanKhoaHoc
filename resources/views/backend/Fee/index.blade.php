@extends('backend.layouts.app')
@section('title', 'Danh sách học phí')

@push('styles')
<!-- Datatable -->
<link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Danh sách học phí</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Bảng tin</a></li>
                    <li class="breadcrumb-item active">Học phí</li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example30" class="display" style="min-width: 900px; font-size: 12px;" >
                                    <style>
                                        table#example30 th, table#example30 td{
                                            padding: 5px;  
                                            border-bottom: 1px solid black;  }</style>
                                        <thead>
                                            <tr>
                                                <th class>{{__('#')}}</th>
                                                <th class>{{__('Mã giao dịch')}}</th>
                                                <th class>{{__('Mã người dùng')}}</th>
                                                <th class>{{__('ID khóa học')}}</th>
                                                <th class>{{__('Số tiền')}}</th>
                                                <th class="col-3">{{__('Nội dung')}}</th>
                                                <th class>{{__('Ngân hàng')}}</th>
                                                <th class="col-1.5">{{__('Trạng thái')}}</th>
                                                <th class>{{__('Thời gian thanh toán')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                            @php
                            $vnpayment = DB::table('vpayments')->orderBy('p_time', 'desc')->get()
                            @endphp
                                            @forelse ($vnpayment as $c)
                                            <tr>
                                                <td>{{$c->id}}</td>
                                                <td><strong>{{$c->transaction_id}}</strong></td>
                                                <td><strong>{{$c->user_id}}</strong></td>
                                                <td>{{$c->course_ids}}</td>
                                                <td>{{$c->amount}}</td>
                                                <td>{{$c->note}}</td>
                                                <td>{{$c->code_bank}}</td>
                                                <td><strong> @if($c->vnp_response_code == '00')
                                                    Thành công
                                                @else
                                                    Không thành công
                                                @endif</strong></td>
                                                <td>{{$c->p_time}}</td>
                                               
                                            </tr>
                                            @empty
                                            <tr>
                                                <th colspan="7" class="text-center">Không có mã giảm giá nào</th>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
<!-- Datatable -->
<script src="{{asset('public/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/js/plugins-init/datatables.init.js')}}"></script>
@endpush