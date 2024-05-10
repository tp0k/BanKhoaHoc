@extends('backend.layouts.app')
@section('title', 'Thêm tài liệu')

@push('styles')
<!-- Pick date -->
<link rel="stylesheet" href="{{asset('vendor/pickadate/themes/default.css')}}">
<link rel="stylesheet" href="{{asset('vendor/pickadate/themes/default.date.css')}}">
@endpush

@section('content')

<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Thêm tài liệu</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('material.index')}}">Tài liệu</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('material.create')}}">Thêm tài liệu</a>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Thông tin cơ bản</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('material.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Tiêu đề</label>
                                        <input type="text" class="form-control" name="materialTitle"
                                            value="{{old('materialTitle')}}">
                                    </div>
                                    @if($errors->has('materialTitle'))
                                    <span class="text-danger"> {{ $errors->first('materialTitle') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Bài giảng</label>
                                        <select class="form-control" name="lessonId">
                                            @forelse ($lesson as $l)
                                            <option value="{{$l->id}}" {{old('lessonId')==$l->id?'selected':''}}>
                                                {{$l->title}}</option>
                                            @empty
                                            <option value="">Không tìm thấy bài giảng</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    @if($errors->has('lessonId'))
                                    <span class="text-danger"> {{ $errors->first('lessonId') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Loại tài liệu</label>
                                        <select class="form-control" name="materialType">
                                            <option value="video" @if(old('materialType')=='video' ) selected @endif>
                                                Video
                                            </option>
                                            <option value="document" @if(old('materialType')=='document' ) selected
                                                @endif>Văn bản
                                            </option>
                                            <option value="quiz" @if(old('materialType')=='quiz' ) selected @endif>Câu hỏi
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Nội dung</label>
                                        <input type="file" class="form-control" name="content">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Url</label>
                                        <textarea class="form-control"
                                            name="contentURL">{{old('contentURL')}}</textarea>
                                    </div>
                                    @if($errors->has('contentURL'))
                                    <span class="text-danger"> {{ $errors->first('contentURL') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <button type="submit" class="btn btn-light">Huỷ</button>
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