@extends('layouts.master')
@section('title')
    الموظفين
@endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            اضافة موظف
        @endslot
        @slot('title')
            النظام
        @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('employees.store') }}" method="post">
                        <div class="row mt-2">
                            <label class="form-label col-lg-3">الاسم</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    dir="rtl" name="name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">المسمى الوظيفي</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control @error('job_title') is-invalid @enderror"
                                    dir="rtl" name="job_title">
                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">الوحدة</label>
                            <div class="col-lg-9">
                                <select class="form-control @error('unit') is-invalid @enderror select2 " dir="rtl"
                                    name="unit" style="width: 100%">
                                    <option>الادارة</option>
                                    <option>الاستقبال</option>
                                    <option>موظف المعمل</option>
                                    <option>معمل السحب</option>
                                    <option>معمل الفحص</option>
                                    <option>معمل المشتقات</option>
                                    <option>معمل التجانس</option>
                                    <option>بنك الدم</option>
                                    <option>الوحدة الطبية</option>
                                </select>

                                @error('unit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">النوع</label>
                            <div class="col-lg-4">
                                <input class="form-check-input" value="نظامي" type="radio" name="type" id="formal">
                                <label class="form-check-label" for="formal">
                                    نظامي
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <input class="form-check-input" value="مدني" type="radio" name="type" id="civilian"
                                    checked>
                                <label class="form-check-label" for="civilian">
                                    مدني
                                </label>
                            </div>
                        </div>

                        <div class="row mt-2" id="rank">
                            <label class="form-label col-lg-3">الرتبة</label>
                            <div class="col-lg-9">
                                <select class="form-control @error('rank') is-invalid @enderror select2" dir="rtl"
                                    name="rank" style="width: 100%">
                                    <option>رقيب</option>
                                    <option>رقيب اول</option>
                                    <option> ملازم </option>
                                    <option> ملازم اول </option>
                                    <option> نقيب </option>
                                    <option> رائد </option>
                                    <option> مقدم </option>
                                    <option> عقيد </option>
                                    <option> عميد </option>
                                    <option> لواء </option>
                                    <option> فريق </option>
                                </select>

                                @error('rank')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">الايميل</label>
                            <div class="col-lg-9">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    dir="rtl" name="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">كلمة المرور</label>
                            <div class="col-lg-9">
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    dir="rtl" name="password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">تاكيد كلمة المرور</label>
                            <div class="col-lg-9">
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" dir="rtl"
                                    name="password_confirmation">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @csrf

                        <div class="row mt-2">
                            <div class="offset-3 col-9">
                                <button class="btn btn-primary" type="submit">اضافة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/table-edits/table-edits.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/table-editable.init.js') }}"></script>

    <script>
        var civilian = $('#civilian')
        var rank = $('#rank')
        var formal = $('#formal')

        if (civilian.is(':checked')) {
            rank.hide()
        }

        if (formal.is(':checked')) {
            rank.show()
        }

        civilian.on('click', function() {
            rank.hide()
        })

        formal.on('click', function() {
            rank.show()
        })
    </script>

    <script></script>
@endsection
