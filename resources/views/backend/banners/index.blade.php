@extends('backend.layouts.app')
@section('title', 'Danh sách Banners')

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
                    <h4>Danh sách Banners</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('admin.banner.index')}}">Banners</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('admin.banner.index')}}">Tất cả Banners</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-toggle="tab"
                            class="nav-link btn-primary mr-1 show active">Trình bày dạng danh sách</a></li>
                    <li class="nav-item"><a href="#grid-view" data-toggle="tab" class="nav-link btn-primary">Trình bày dạng ô</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tất cả danh sách Banners </h4>
                                <a href="{{route('admin.banner.create')}}" class="btn btn-primary">Thêm mới</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>{{__('#')}}</th>
                                                <th>{{__('Tên Banner')}}</th>
                                                {{-- <th>{{__('Trạng thái')}}</th> --}}
                                                <th>{{__('Ảnh Banner')}}</th>
                                                <th>{{__('Tác động')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($banners as $banner)
                                            <tr>
                                                <td><strong>{{$banner->id}}</strong></td>
                                                <td><strong>{{$banner->title_banner}}</strong></td>
                                                <td>
                                                    <img class="rounded" width="200" height="100"
                                                        src="{{asset('banners/'.$banner->image)}}"
                                                        alt="{{$banner->title_banner}}">
                                                </td>
                                                <td>
                                                    <a href="{{route('admin.banner.edit', $banner->id)}}"
                                                        class="btn btn-sm btn-primary" title="Edit"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                                        title="Delete" onclick="$('#form{{$banner->id}}').submit()"><i
                                                            class="la la-trash-o"></i></a>
                                                    <form id="form{{$banner->id}}"
                                                        action="{{route('admin.banner.destroy', $banner->id)}}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <th colspan="7" class="text-center">Không tìm thấy banner</th>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="grid-view" class="tab-pane fade col-lg-12">
                        <div class="row">
                            @forelse ($banners as $banner)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card card-profile">
                                    <div class="card-header justify-content-end pb-0">
                                        <div class="dropdown">
                                            <button class="btn btn-link" type="button" data-toggle="dropdown">
                                                <span class="dropdown-dots fs--1"></span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right border py-0">
                                                <div class="py-2">
                                                    <a class="dropdown-item"
                                                        href="{{route('admin.banner.edit', $banner->id)}}">Sửa</a>
                                                    <a class="dropdown-item text-danger"
                                                        href="javascript:void(0);" onclick="$('#form{{$banner->id}}').submit()">Xóa</a>
                                                    <form id="form{{$banner->id}}" action="{{route('admin.banner.destroy', $banner->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="text-center">
                                            <div class="profile-photo">
                                                <img src="{{asset('banners/'.$banner->image)}}"
                                                    class="w-100" alt="">
                                            </div>
                                            <h3 class="mt-4 mb-1">{{$banner->title_banner}}</h3>
                                            <ul class="list-group mb-3 list-group-flush">
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span>#Sl.</span><strong>{{$banner->id}}</strong>
                                                </li>
                                                {{-- <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Status:</span>
                                                    <strong><span class="badge {{$banner->status==1?"
                                                        badge-success":"badge-danger"}}">@if($banner->status==1){{__('Active')}}
                                                    @else{{__('Inactive')}} @endif</span></strong>
                                                </li> --}}
                                                <li class="list-group-item px-0 d-flex justify-content-between">
                                                    <span class="mb-0">Tạo từ :</span>
                                                    <strong>{{$banner->created_at}}</strong>
                                                </li>
                                            </ul>
                                            <a class="btn btn-outline-primary btn-rounded mt-3 px-4"
                                                href="#">Đọc thêm</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card card-profile">
                                    <div class="card-body pt-2">
                                        <div class="text-center">
                                            <p class="mt-3 px-4">Không tìm thấy banner</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforelse
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
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>
@endpush
