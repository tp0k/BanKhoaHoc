@extends('backend.layouts.app')
@section('title', 'Sửa Banner')

@push('styles')
<!-- Pick date -->
<link rel="stylesheet" href="{{ asset('vendor/pickadate/themes/default.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/pickadate/themes/default.date.css') }}">
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
                    <h4>Sửa Banner</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.banner.index') }}">Banners</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0);">Sửa Banner</a></li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Thông tin Banner</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.banner.update', $banner->id) }}" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Tên Banner</label>
                                        <input type="text" class="form-control" name="title"
                                               value="{{ old('title', $banner->title) }}">
                                    </div>
                                    @if($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Sự kiện</label>
                                        <select name="events_id" class="form-control">
                                            @foreach ($events as $event)
                                                <option value="{{ $event->id }}" {{ $banner->events_id == $event->id ? 'selected' : '' }}>
                                                    {{ $event->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($errors->has('events_id'))
                                        <span class="text-danger">{{ $errors->first('events_id') }}</span>
                                    @endif
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <label class="form-label">Ảnh</label>
                                    <div class="form-group fallback w-100">
                                        <input type="file" class="dropify" data-default-file="{{ asset('banners/'.$banner->image) }}" name="image">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <button type="button" class="btn btn-light" onclick="window.location='{{ route('admin.banner.index') }}'">Hủy</button>
                                </div>
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
<script src="{{ asset('vendor/pickadate/picker.js') }}"></script>
<script src="{{ asset('vendor/pickadate/picker.time.js') }}"></script>
<script src="{{ asset('vendor/pickadate/picker.date.js') }}"></script>

<!-- Pickdate -->
<script src="{{ asset('js/plugins-init/pickadate-init.js') }}"></script>
@endpush
