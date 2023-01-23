@extends('layouts.master')
@section('title')  الامراض الفيروسية @endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
    
    </style>
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') النظام @endslot
        @slot('title')   الامراض الفيروسية @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('viralDiseases.store')}}" method="post">
                        <div class="row">
                            <div class="col-lg-8">
                                <input type="text" name="name" class="form-control" placeholder="اسم المرض الفيروسي">
                            </div>
                            <div class="col-lg-2 pt-2">
                                <input class="form-check-input" name="permanent" value="1" type="checkbox" id="permanent">
                                <label class="form-check-label" for="permanent">
                                    مزمن
                                </label>
                            </div>
                            <div class="col-lg-2">
                                @csrf
                                <button class="btn btn-primary" type="submit">حفظ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-rep-plugin">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table">
                                <thead>
                                <tr>
                                    <th data-priority="1">#</th>
                                    <th data-priority="1">الاسم</th>
                                    <th data-priority="1">مزمن</th>
                                    <th data-priority="1">تعديل</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($diseases as $disease)
                                    <tr >
                                        <td>
                                            {{$disease->id}}
                                        </td>
                                        <td>
                                            {{$disease->name}}
                                        </td>
                                        <td>
                                            @if($disease->permanent == 1)
                                                مزمن
                                            @else
                                                غير مزمن
                                            @endif
                                        </td>
                                        <td style="width: 100px">
                                            <a class="btn btn-outline-secondary btn-sm edit" title="Edit" data-bs-toggle="modal" data-bs-target="#modal-{{$disease->id}}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>

                                            <!--  Large modal example -->
                                            <div class="modal fade bs-example-modal-lg" id="modal-{{$disease->id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mt-0" id="myLargeModalLabel"> تعديل </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('viralDiseases.store')}}" method="post">
                                                                <div class="row">
                                                                    <div class="col-lg-8">
                                                                        <input type="text" name="name" class="form-control" value="{{$disease->name}}" placeholder="اسم المرض الفيروسي">
                                                                    </div>
                                                                    <div class="col-lg-2 pt-2">
                                                                        <input class="form-check-input" name="permanent" value="1" type="checkbox" {{$disease->permanent == '1'? 'checked' : ''}}  id="permanent">
                                                                        <label class="form-check-label" for="permanent">
                                                                            مزمن
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-lg-2">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$disease->id}}">
                                                                        <button class="btn btn-primary" type="submit">حفظ</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->

                                            <a href="" class="btn btn-outline-secondary btn-sm edit" title="delete" onclick="event.preventDefault();
                                                     document.getElementById('delete-form-{{$disease->id}}').submit();">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>

                                            <form id="delete-form-{{$disease->id}}" action="{{ route('viralDiseases.destroy', $disease->id) }}" method="POST" style="display: none;">
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>

@endsection
