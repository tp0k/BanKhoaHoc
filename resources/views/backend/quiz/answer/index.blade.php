@extends('backend.layouts.app')
@section('title', 'Danh sách câu trả lời')

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
                    <h4>Danh sách câu trả lời</h4>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('answer.index')}}">Câu trả lời</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('answer.index')}}">Câu trả lời</a>
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
                                <h4 class="card-title">Tất cả câu trả lời </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>{{__('#')}}</th>
                                                <th>{{__('Student')}}</th>
                                                <th>{{__('Question')}}</th>
                                                <th>{{__('Answer')}}</th>
                                                <th>{{__('Action')}}</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($answer as $a)
                                            <tr>
                                                <td>{{$a->id}}</td>
                                                <td>{{$a->student?->name_en}}</td>
                                                <td>{{$a->question?->content}}</td>
                                                <td>{{$a->answer}}</td>
                                                <td>
                                                    <a href="{{route('answer.edit', encryptor('encrypt',$a->id))}}"
                                                        class="btn btn-sm btn-primary" title="Edit"><i
                                                            class="la la-pencil"></i></a>
                                                    <a href="javascript:void(0);" class="btn btn-sm btn-danger"
                                                        title="Delete" onclick="$('#form{{$a->id}}').submit()"><i
                                                            class="la la-trash-o"></i></a>
                                                    <form id="form{{$a->id}}"
                                                        action="{{route('answer.destroy', encryptor('encrypt',$a->id))}}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <th colspan="5" class="text-center"><h1>Không tìm thấy câu trả lời</h1></th>
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