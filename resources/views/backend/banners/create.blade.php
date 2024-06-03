
@extends('backend.layouts.app')
@section('title', 'Thêm banners')

@push('styles')
<!-- Pick date -->
<link rel="stylesheet" href="{{asset('vendor/pickadate/themes/default.css')}}">
<link rel="stylesheet" href="{{asset('vendor/pickadate/themes/default.date.css')}}">
@endpush

@section('content')<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Thêm Banner</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.banner.index') }}">Banner</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.banner.create') }}">Thêm Banner</a></li>
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
                        <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Tiêu đề Banner</label>
                                        <input type="text" class="form-control" name="title_banner" value="{{ old('title_banner') }}">
                                    </div>
                                    @if($errors->has('title_banner'))
                                    <span class="text-danger"> {{ $errors->first('title_banner') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Mô tả</label>
                                        <textarea class="form-control" name="description">{{ old('description') }}</textarea>
                                    </div>
                                    @if($errors->has('description'))
                                    <span class="text-danger"> {{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Sự kiện liên quan</label>
                                        <select class="form-control" name="events_id">
                                            @forelse ($events as $event)
                                                <option value="{{ $event->id }}" {{ old('events_id') == $event->id ? 'selected' : '' }}>
                                                    {{ $event->title }}
                                                </option>
                                            @empty
                                                <option value="">Không tìm thấy sự kiện</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    
                                
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Ảnh Banner</label>
                                        <div class="form-group fallback w-100">
                                            <input type="file" class="dropify" name="image">
                                        </div>
                                    </div>
                                    @if($errors->has('image'))
                                    <span class="text-danger"> {{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <a href="{{ route('admin.banner.index') }}" class="btn btn-light">Hủy</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- pickdate -->
<script src="{{asset('vendor/pickadate/picker.js')}}"></script>
<script src="{{asset('vendor/pickadate/picker.time.js')}}"></script>
<script src="{{asset('vendor/pickadate/picker.date.js')}}"></script>

<!-- Pickdate -->
<script src="{{asset('js/plugins-init/pickadate-init.js')}}"></script>
@endpush