@extends('backend.layouts.app')
@section('title', 'Thêm câu hỏi')

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
                    <h4>Thêm câu hỏi</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('question.index')}}">Câu hỏi</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('question.create')}}">Thêm câu hỏi</a>
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
                        <form action="{{route('question.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Quiz</label>
                                        <select class="form-control" name="quizId">
                                            @forelse ($quiz as $q)
                                            <option value="{{$q->id}}" {{old('quizId')==$q->id?'selected':''}}>
                                                {{$q->title}}</option>
                                            @empty
                                            <option value="">Không tìm thấy bài kiểm tra nào</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    @if($errors->has('quizId'))
                                    <span class="text-danger"> {{ $errors->first('quizId') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Loại Câu Hỏi</label>
                                        <select class="form-control" name="questionType">
                                            <option value="multiple_choice" @if(old('questionType')=='multiple_choice' ) selected @endif>
                                            Nhiều lựa chọn
                                            </option>
                                            <option value="true_false" @if(old('questionType')=='true_false' ) selected
                                                @endif>True False
                                            </option>
                                            <option value="short_answer" @if(old('questionType')=='short_answer' ) selected @endif>Câu trả lời ngắn
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Nội dung câu hỏi</label>
                                        <textarea class="form-control"
                                            name="questionContent">{{old('questionContent')}}</textarea>
                                    </div>
                                    @if($errors->has('questionContent'))
                                    <span class="text-danger"> {{ $errors->first('questionContent') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Lựa chọn A</label>
                                        <input type="text" class="form-control" name="optionA" value="{{old('optionA')}}">
                                    </div>
                                    @if($errors->has('optionA'))
                                    <span class="text-danger"> {{ $errors->first('optionA') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Lựa chọn B</label>
                                        <input type="text" class="form-control" name="optionB" value="{{old('optionB')}}">
                                    </div>
                                    @if($errors->has('optionB'))
                                    <span class="text-danger"> {{ $errors->first('optionB') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Lựa chọn C</label>
                                        <input type="text" class="form-control" name="optionC" value="{{old('optionC')}}">
                                    </div>
                                    @if($errors->has('optionC'))
                                    <span class="text-danger"> {{ $errors->first('optionC') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Lựa chọn D</label>
                                        <input type="text" class="form-control" name="optionD" value="{{old('optionD')}}">
                                    </div>
                                    @if($errors->has('optionD'))
                                    <span class="text-danger"> {{ $errors->first('optionD') }}</span>
                                    @endif
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label">Trả lời đúng</label>
                                        <select class="form-control" name="correctAnswer">
                                            <option value="a" @if(old('correctAnswer')=='a' ) selected @endif>Lựa chọn A</option>
                                            <option value="b" @if(old('correctAnswer')=='b' ) selected @endif>Lựa chọn B</option>
                                            <option value="c" @if(old('correctAnswer')=='c' ) selected @endif>Lựa chọn C</option>
                                            <option value="d" @if(old('correctAnswer')=='d' ) selected @endif>Lựa chọn D</option>
                                        </select>
                                    </div>
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