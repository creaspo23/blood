@extends('layouts.master')
@section('title') المعمل @endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') الفحص @endslot
        @slot('title') المعمل@endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                        <h4 class="card-title mb-4">بيانات المريض</h4>
                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">رقم العينة</div>
                        <div class="col-lg-9"> {{$investigation->id}} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الاسم</div>
                        <div class="col-lg-9"> {{$investigation->person->name}} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الجنس</div>
                        <div class="col-lg-9"> {{$investigation->person->gender}} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">تاريخ الميلاد</div>
                        <div class="col-lg-9"> {{$investigation->person->birth_date}} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold"> التشخيص </div>
                        <div class="col-lg-9">  {{$investigation->diagnosis}}  </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title mb-4">  الفحص  </h4>

                <form method="post" action="{{route('bloodTest.store')}}">
                            {{($tests)}}

                        @if()
                            <div class="row">
                                <label class="form-label col-lg-4">AB screening</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2 @error('name') is-invalid @enderror " dir="rtl" name="blood_group" id="blood_group" style="width: 100%">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        @endif

                        @if(1)
                            <div class="row">
                                <label class="form-label col-lg-4">AB screening</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2 @error('name') is-invalid @enderror " dir="rtl" name="blood_group" id="blood_group" style="width: 100%">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        @endif

                        @if(1)
                            <div class="row">
                                <label class="form-label col-lg-4">AB screening</label>
                                <div class="col-lg-8">
                                    <select class="form-control select2 @error('name') is-invalid @enderror " dir="rtl" name="blood_group" id="blood_group" style="width: 100%">
                                        <option></option>
                                    </select>
                                </div>
                            </div>
                        @endif


                    <div class="row mt-2">
                        <div class="col-lg-9 offset-3">
                            @csrf
                            <button type="submit" class=" btn btn-primary btn-block">حفظ</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>


@endsection
