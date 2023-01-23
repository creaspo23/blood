@extends('layouts.master')
@section('title') الموظفين @endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') تعديل موظف @endslot
        @slot('title') النظام @endslot
    @endcomponent


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('employees.update', $employee->id)}}" method="post">
                        <div class="row mt-2">
                            <label class="form-label col-lg-3">الاسم</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" dir="rtl" name="name" value="{{$employee->name}}">
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
                                <input type="text" class="form-control @error('job_title') is-invalid @enderror" dir="rtl" name="job_title" value="{{$employee->job_title}}">
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
                                <select class="form-control @error('unit') is-invalid @enderror select2 " dir="rtl" name="unit" style="width: 100%">
                                     <option {{$employee->unit == 'الادارة'? 'selected' : ''}}>الادارة</option>
                                     <option {{$employee->unit == 'الاستقبال'? 'selected' : ''}}>الاستقبال</option>
                                     <option {{$employee->unit == 'معمل الدم'? 'selected' : ''}}>معمل الدم</option>
                                     <option {{$employee->unit == 'معمل المشتقات'? 'selected' : ''}}>معمل المشتقات</option>
                                     <option {{$employee->unit == 'معمل التجانس'? 'selected' : ''}}>معمل التجانس</option>
                                     <option {{$employee->unit == 'بنك الدم'? 'selected' : ''}}>بنك الدم</option>
                                     <option {{$employee->unit == 'الوحدة الطبية'? 'selected' : ''}}>الوحدة الطبية</option>
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
                                <input class="form-check-input" value="نظامي" type="radio" name="type" id="formal" {{$employee->type == 'نظامي'? 'checked' : ''}}>
                                <label class="form-check-label" for="formal">
                                    نظامي
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <input class="form-check-input" value="مدني" type="radio" name="type" id="civilian" {{$employee->type == 'مدني'? 'checked' : ''}}>
                                <label class="form-check-label" for="civilian">
                                    مدني
                                </label>
                            </div>
                        </div>

                        <div class="row mt-2" id="rank">
                            <label class="form-label col-lg-3">الرتبة</label>
                            <div class="col-lg-9">
                                <select class="form-control @error('rank') is-invalid @enderror select2" dir="rtl" name="rank" style="width: 100%">
                                    <option {{$employee->rank == 'رقيب'? 'selected' : ''}}>رقيب</option>
                                    <option {{$employee->rank == 'رقيب اول'? 'selected' : ''}}>رقيب اول</option>
                                    <option {{$employee->rank == 'ملازم'? 'selected' : ''}}> ملازم </option>
                                    <option {{$employee->rank == 'ملازم اول'? 'selected' : ''}}> ملازم اول </option>
                                    <option {{$employee->rank == 'نقيب'? 'selected' : ''}}> نقيب </option>
                                    <option {{$employee->rank == 'رائد'? 'selected' : ''}}> رائد </option>
                                    <option {{$employee->rank == 'مقدم'? 'selected' : ''}}> مقدم </option>
                                    <option {{$employee->rank == 'عقيد'? 'selected' : ''}}> عقيد </option>
                                    <option {{$employee->rank == 'عميد'? 'selected' : ''}}> عميد </option>
                                    <option {{$employee->rank == 'لواء'? 'selected' : ''}}> لواء </option>
                                    <option {{$employee->rank == 'فريق'? 'selected' : ''}}> فريق </option>
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
                                <input type="email" class="form-control @error('email') is-invalid @enderror" dir="rtl" name="email" value="{{$employee->user->email}}">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @csrf
                        @method('put')

                        <div class="row mt-2">
                            <div class="offset-3 col-9">
                                <button class="btn btn-primary" type="submit">تعديل</button>
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

        civilian.on('click', function () {
            rank.hide()
        })

        formal.on('click', function () {
            rank.show()
        })
    </script>


@endsection
