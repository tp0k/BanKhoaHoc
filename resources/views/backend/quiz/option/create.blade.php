@extends('backend.layouts.app')
@section('title', 'Add Option')

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
                    <h4>Thêm lựa chọn</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('option.index')}}">Lựa chọn</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('option.create')}}">Thêm lựa chọn</a>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-xxl-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Thông tin chi tiết</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('option.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Câu hỏi</label>
                                        <select class="form-control" name="questionId">
                                            @forelse ($question as $q)
                                            <option value="{{$q->id}}" {{old('questionId')==$q->id?'selected':''}}>
                                                {{$q->content}}</option>
                                            @empty
                                            <option value="">Không thấy câu hỏi</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    @if($errors->has('questionId'))
                                    <span class="text-danger"> {{ $errors->first('questionId') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Lựa chọn</label>
                                        <input type="text" class="form-control" name="optionText" value="{{old('optionText')}}">
                                    </div>
                                    @if($errors->has('optionText'))
                                    <span class="text-danger"> {{ $errors->first('optionText') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Đúng hay sai</label>
                                        <select class="form-control" name="is_correct">
                                            <option value="1" @if(old('is_correct')==1) selected @endif>Đúng</option>
                                            <option value="0" @if(old('is_correct')==0) selected @endif>Sai</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    <button type="submit" class="btn btn-light">Hủy</button>
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