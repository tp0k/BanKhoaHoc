@extends('backend.layouts.app')
@section('title', 'Thêm sự kiện')

@push('styles')
<!-- Pick date -->
<link rel="stylesheet" href="{{asset('vendor/pickadate/themes/default.css')}}">
<link rel="stylesheet" href="{{asset('vendor/pickadate/themes/default.date.css')}}">
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
                    <h4>Thêm sự kiện</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('event.index')}}">Sự kiện</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('event.create')}}">Thêm sự kiện</a>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Thông tin sự kiện</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('event.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Tiêu đề</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}">
                                @if($errors->has('title'))
                                    <span class="text-danger"> {{$errors->first('title')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">Mô tả tóm tắt</label>
                                <textarea name="description" class="form-control">{{old('description')}}</textarea>
                                @if($errors->has('description'))
                                    <span class="text-danger"> {{$errors->first('description')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">Nội dung chính</label>
                                <textarea name="content" class="form-control">{{old('content')}}"></textarea>
                                @if($errors->has('content'))
                                    <span class="text-danger"> {{$errors->first('content')}}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="form-label">Ảnh</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary">Lưu</button>
                                <button type="button" class="btn btn-light">Huỷ</button>
                            </div>
                        </form>
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
<!-- pickdate -->
<script src="{{asset('vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('vendor/pickadate/picker.time.js')}}"></script>
<script src="{{asset('vendor/pickadate/picker.date.js')}}"></script>

<!-- Pickdate -->
<script src="{{asset('js/plugins-init/pickadate-init.js')}}"></script>

<!-- CKEditor -->
{{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
<script>
    // function initCKEditor(elementId) {
    //     CKEDITOR.replace(elementId, {
    //         filebrowserBrowseUrl: "{{ asset('ckfinder/ckfinder.html') }}",
    //         filebrowserImageBrowseUrl: "{{ asset('ckfinder/ckfinder.html?type=Images') }}",
    //         filebrowserUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
    //         filebrowserImageUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}"
    //     });
    // }
    // initCKEditor('content');
    CKEDITOR.replace('content');
</script>
@endpush
