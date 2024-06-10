@extends('backend.layouts.app')
@section('title', 'Danh sách câu hỏi')

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
                    <h4>Danh sách khoá học</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('question.index')}}">Câu hỏi</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('question.index')}}">Tất cả câu hỏi</a>
                    </li>
                </ol>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <ul class="nav nav-pills mb-3">
                    <li class="nav-item"><a href="#list-view" data-toggle="tab"
                            class="nav-link btn-primary mr-1 show active">Trình bày dạng danh sách</a></li>
                    <li class="nav-item"><a href="javascript:void(0);" data-toggle="tab"
                            class="nav-link btn-primary">Trình bày dạng ô</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="row tab-content">
                    <div id="list-view" class="tab-pane fade active show col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Danh sách câu hỏi </h4>
                                <a href="{{route('question.create')}}" class="btn btn-primary">Thêm mới</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>{{__('Quiz')}}</th>
                                                <th>{{__('Kiểu')}}</th>
                                                <th>{{__('Câu hỏi')}}</th>
                                                <th>{{__('Chọn A')}}</th>
                                                <th>{{__('Chọn B')}}</th>
                                                <th>{{__('Chọn C')}}</th>
                                                <th>{{__('Chọn D')}}</th>
                                                <th>{{__('Câu trả lời đúng')}}</th>
                                                <th>{{__('Hành động')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($question as $q)
                                            <tr>
                                                <td>{{$q->quiz?->title}}</td>
                                                <td>
                                                    {{ $q->type == 'multiple_choice' ? __('Multiple Choice') : '' }}
                                                </td>                                                
                                                <td>{{$q->content}}</td>
                                                <td>{{$q->option_a}}</td>
                                                <td>{{$q->option_b}}</td>
                                                <td>{{$q->option_c}}</td>
                                                <td>{{$q->option_d}}</td>
                                                <td>{{$q->correct_answer == 'a' ? 'Option-A' : ($q->correct_answer ==
                                                    'b' ? 'Option-B' : ($q->correct_answer == 'c' ? 'Option-C' :
                                                    'Option-D'))}}</td>
                                                <td>
                                                    <a href="{{route('question.edit', encryptor('encrypt',$q->id))}}"
                                                        class="btn btn-sm btn-primary" title="Edit"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                                        title="Delete" onclick="$('#form{{$q->id}}').submit()"><i
                                                            class="la la-trash-o"></i></a>
                                                    <form id="form{{$q->id}}"
                                                        action="{{route('question.destroy', encryptor('encrypt',$q->id))}}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <th colspan="5" class="text-center">Không tìm thấy câu hỏi nào</th>
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