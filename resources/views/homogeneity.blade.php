@extends('layouts.master')
@section('title')
    التجانس
@endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            التجانس
        @endslot
        @slot('title')
            فحص التجانس
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">بيانات المريض</h4>
                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">رقم الطلب</div>
                        <div class="col-lg-9"> {{ $dontion->id }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الوحدة</div>
                        <div class="col-lg-9"> {{ $dontion->order->hospital }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الاسم</div>
                        <div class="col-lg-9"> {{ $dontion->order->person->name }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">تاريخ الميلاد</div>
                        <div class="col-lg-9"> {{ $dontion->order->person->birth_date }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الفصيلة</div>
                        <div class="col-lg-9">{{ $dontion->order->person->blood_group }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">نوع الدم</div>
                        <div class="col-lg-9">
                            @foreach ($dontion->order->bloods as $blood)
                                {{ $blood->blood_type . ' ' }}
                            @endforeach
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">تاريخ الطلب</div>
                        <div class="col-lg-9"> {{ $dontion->order->created_at->format('y-m-d') }} </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div>
                <div class="card ">
                    <div class="card-body">

                        <form method="POST" action="{{route('homogeneity.store')}}">
                            @csrf
                            <div class="row mt-2">
                                <label class="form-label col-lg-3">نوع الدم</label>
                                <div class="col-lg-9">
                                    <select class="select2 form-control select2-multiple" dir="rtl" multiple="multiple"
                                        data-placeholder="حدد" style="width: 100%"  >
                                        <optgroup label="">
                                            @foreach ($dontion->order->bloods as $blood)
                                                <option value="{{ $blood->blood_type }}"> {{ $blood->blood_type }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <label class="form-label col-lg-3">الزجاجات</label>
                                <div class="col-lg-9">
                                    <select class="select2 form-control select2-multiple" dir="rtl" multiple="multiple"
                                        data-placeholder="حدد" style="width: 100%" name="bottels[]">

                                        <optgroup label="">
                                            @foreach ($bottels as $bottel)
                                                <option value="{{ $bottel->bottle_number }}">{{ $bottel->bottle_number }}
                                                </option>
                                            @endforeach

                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title mb-4"> بيانات الزجاجة </h4>
   
                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold">رقم الزجاجة</div>
                            <div class="col-lg-9"> {{ $dontion->bloodWithdraw->bottle_number }} </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الفصيلة</div>
                            <div class="col-lg-9"> {{ $dontion->person->blood_group }} </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold">نوع الدم</div>
                            <div class="col-lg-9"> بلازما </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold">تاريخ الصلاحية</div>
                            <div class="col-lg-9">
                                {{ $dontion->bloodWithdraw->created_at->format('y-m-d /H:I:s') }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title mb-4"> تجانس الدم </h4>


                            <div class="row mt-2">
                                <label class="form-label col-lg-3">ملاحظات</label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" dir="rtl" name="note"></textarea>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <div class="col-lg-9 offset-3">
                                    <input type="hidden" name="order_id" id="" value="{{$dontion->order->id}}">
                                    <input type="hidden" name="dontion_id" id="" value="{{$dontion->id}}">
                                    <input type="hidden" name="person_id" id="" value="{{$dontion->person->id}}">

                                    <button type="submit" class=" btn btn-primary btn-block">نجحت العملية</button>
                                    <button type="submit" class=" btn btn-danger btn-block"> فشلت</button>
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
    @endsection
