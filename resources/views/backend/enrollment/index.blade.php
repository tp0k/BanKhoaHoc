@extends('backend.layouts.app')
@section('title', 'Danh sách tuyển sinh')

@push('styles')
<!-- Datatable -->
<link href="{{asset('vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endpush

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Tuyển sinh khóa học</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('enrollment.index')}}">Tuyển sinh khóa học</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('enrollment.index')}}">Tất cả</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tất cả danh sách tuyển sinh </h4>
                                <a href="{{route('enrollment.create')}}" class="btn btn-primary">Thêm mới</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>{{__('#')}}</th>
                                                <th>{{__('Tên học viên')}}</th>
                                                <th>{{__('Tên khoá học')}}</th>
                                                <th>{{__('Ảnh khoá học')}}</th>
                                                <th>{{__('Đã thanh toán')}}</th>
                                                <th>{{__('Ngày đăng ký')}}</th>
                                                <th>{{__('Hành động')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($enrollment as $e)
                                            <tr>
                                                <td><img class="rounded-circle" width="35" height="35"
                                                        src="{{asset('uploads/students/'.$e->student?->image)}}"
                                                        alt="">
                                                </td>
                                                <td><strong>{{$e->student?->name_en}}</strong></td>
                                                <td><strong>{{$e->course?->title_en}}</strong></td>
                                                <td><img class="img fluid" width="100"
                                                        src="{{asset('uploads/courses/'.$e->course?->image)}}"
                                                        alt="">
                                                </td>
                                                <td><strong>{{$e->course?->price==null?'Free': number_format($e->course?->price).' VNĐ'}}</strong></td>
                                                <td><strong>{{$e->enrollment_date}}</strong></td>
                                                <td>
                                                    <a href="{{route('enrollment.edit', encryptor('encrypt',$e->id))}}"
                                                        class="btn btn-sm btn-primary" title="Sửa"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                                        title="Xoá" onclick="$('#form{{$e->id}}').submit()"><i
                                                            class="la la-trash-o"></i></a>
                                                    <form id="form{{$e->id}}"
                                                        action="{{route('enrollment.destroy', encryptor('encrypt',$e->id))}}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <th colspan="6" class="text-center">Không tìm thấy đăng ký</th>
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

@endsection

@push('scripts')
<!-- Datatable -->
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>

@endpush