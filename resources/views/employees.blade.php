@extends('layouts.master')
@section('title') الموظفين @endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') الموظفين @endslot
        @slot('title') النظام @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <a href="{{route('employees.create')}}" class="btn btn-primary">اضافة</a>
                    </div>

                    <h4 class="card-title">اضافة موظف</h4>
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
                                    <th data-priority="1">الوظيفة</th>
                                    <th data-priority="1">الوحدة</th>
                                    <th data-priority="1">الايميل</th>
                                    <th data-priority="1">تعديل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($employees as $employee)
                                    <tr >
                                        <td>
                                            {{$employee->id}}
                                        </td>
                                        <td>
                                            {{$employee->name}}
                                        </td>
                                        <td>
                                            {{$employee->job_title}}
                                        </td>
                                        <td>
                                            {{$employee->unit}}
                                        </td>
                                        <td>
                                            {{$employee->user->email}}
                                        </td>
                                        <td style="width: 100px">
                                            <a href="{{route('employees.edit', $employee->id)}}" class="btn btn-outline-secondary btn-sm edit" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
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


@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/rwd-table/rwd-table.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/table-responsive.init.js') }}"></script>

@endsection
