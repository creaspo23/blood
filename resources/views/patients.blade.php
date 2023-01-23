@extends('layouts.master')
@section('title') سجل الطلبيات  @endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')  السجل @endslot
        @slot('title')   سجل الطلبيات  @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    <form action="" method="get">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div>
                                    <label class="form-label">الاسم</label>
                                    <input class="form-control" dir="rtl" type="text"  name="hp">
                                </div>

                                <div>
                                    <label class="form-label">الوحدة</label>
                                    <select class="form-control select2 " dir="rtl" name="group" style="width: 100%">
                                        <option ></option>
                                        <option>الطوارئ</option>
                                        <option>الولادة</option>
                                        <option>الجراحة</option>
                                        <option>الباطنية</option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div>
                                    <label class="form-label">الفصيلة</label>
                                    <select class="form-control select2 " dir="rtl" name="group" style="width: 100%">
                                        <option>الكل</option>
                                        <optgroup label="Positives">
                                            <option>A+</option>
                                            <option>B+</option>
                                            <option>AB+</option>
                                            <option>O+</option>
                                        </optgroup>
                                        <optgroup label="Negatives">
                                            <option>A-</option>
                                            <option>B-</option>
                                            <option>AB-</option>
                                            <option>O-</option>
                                        </optgroup>
                                    </select>
                                </div>

                                <div>
                                    <label class="form-label">الكمية</label>
                                    <input class="form-control" dir="rtl" type="number"  name="hp">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div>
                                    <label class="form-label">تاريخ الطلب</label>
                                    <input class="form-control" dir="rtl" type="date"  name="hp">
                                </div>

                                <div>
                                    <label class="form-label">رقم الطلب</label>
                                    <input class="form-control" dir="rtl" type="text"  name="hp">
                                </div>


                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div>
                                    <label class="form-label">نوع الدم</label>
                                    <select class="form-control select2 " dir="rtl" name="group" style="width: 100%">
                                        <option>الكل</option>
                                        <option>دم احمر</option>
                                        <option>دم ابيض</option>
                                        <option>صفائح</option>
                                        <option>بلازما</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="form-label">الحالة</label>
                                    <select class="form-control select2 " dir="rtl" name="group" style="width: 100%">
                                        <option ></option>
                                        <option>مكتمل</option>
                                        <option>الانتظار</option>
                                        <option>ملغي</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <button class="btn btn-success btn-block mt-2" type="submit" style="width: 100%">
                                    بحث
                                </button>
                            </div>

                        </div>
                    </form>

                    <div class="table-responsive mt-4">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الوحدة</th>
                                    <th>الفصيلة </th>
                                    <th>النوع </th>
                                    <th>الكمية </th>
                                    <th>تاريخ الطلب</th>
                                    <th>الحالة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>احمد محمد حمزة</td>
                                    <td>الطوارئ</td>
                                    <td>A+</td>
                                    <td>دم احمر</td>
                                    <td>3</td>
                                    <td>01-01-2022</td>
                                    <td>
                                        <span class="badge rounded-pill bg-soft-success font-size-12">
                                            مكتمل
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>2</td>
                                    <td>حسن محمد حمزة</td>
                                    <td>الطوارئ</td>
                                    <td>A+</td>
                                    <td> صفائح</td>
                                    <td>3</td>
                                    <td>01-01-2022</td>
                                    <td>
                                        <span class="badge rounded-pill bg-soft-info font-size-12">
                                            الانتظار
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>3</td>
                                    <td>عوضية حسن علي</td>
                                    <td>الولادة</td>
                                    <td>AB+</td>
                                    <td>بلازما</td>
                                    <td>3</td>
                                    <td>01-01-2022</td>
                                    <td>
                                        <span class="badge rounded-pill bg-soft-dark font-size-12">
                                            ملغي
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>


@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>

@endsection
