@extends('backend.layouts.app')
@section('title', 'Danh sách tin tức')

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
                    <h4>Danh sách tin tức</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('event.index')}}">Tin tức</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('event.index')}}">Tất cả tin tức</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh sách tin tức </h4>
                                <a href="{{route('event.create')}}" class="btn btn-primary">Thêm mới</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>{{__('Thứ tự')}}</th>
                                                <th>{{__('Tin tức')}}</th>
                                                <th>{{__('Chủ để')}}</th>
                                                <th>{{__('Vị trí')}}</th>
                                                <th>{{__('Ngày')}}</th>
                                                <th>{{__('Kích hoạt')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($event as $e)
                                            <tr>
                                                <td><img src="{{asset('uploads/events/'.$e->image)}}"
                                                        class="w-100" height="50"></td>
                                                <td><strong>{{$e->title}}</strong></td>
                                                <td><strong>{{$e->topic}}</strong></td>
                                                <td>{{$e->location}}</td>
                                                <td>{{ \Carbon\Carbon::parse($e->date)->format('j F, Y, l') }}</td>
                                                <td>
                                                    <a href="{{route('event.edit', $e->id)}}"
                                                        class="btn btn-sm btn-primary" title="Edit"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                                        title="Delete" onclick="$('#form{{$e->id}}').submit()"><i
                                                            class="la la-trash-o"></i></a>
                                                    <form id="form{{$e->id}}"
                                                        action="{{route('event.destroy', $e->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <th colspan="6" class="text-center">Không tìm thấy tin tức nào </th>
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
<script src="{{asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/plugins-init/datatables.init.js')}}"></script>
@endpush