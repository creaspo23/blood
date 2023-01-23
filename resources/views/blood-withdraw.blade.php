@extends('layouts.master')
@section('title')
    سحب الدم
@endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            السحب
        @endslot
        @slot('title')
            سحب الدم
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    @if ($type == 'donation')
                        <h4 class="card-title mb-4">بيانات المتبرع</h4>
                    @elseif($type == 'order')
                        <h4 class="card-title mb-4">بيانات المريض</h4>
                    @endif
                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">رقم العينة</div>
                        <div class="col-lg-9"> {{ $case->id }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الاسم</div>
                        <div class="col-lg-9"> {{ $case->person->name }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الجنس</div>
                        <div class="col-lg-9"> {{ $case->person->gender }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">تاريخ الميلاد</div>
                        <div class="col-lg-9"> {{ $case->person->birth_date }} </div>
                    </div>

                    @if ($type == 'order')
                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold"> الوحدة </div>
                            <div class="col-lg-9"> {{ $case->unit }} </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold"> التشخيص </div>
                            <div class="col-lg-9"> {{ $case->diagnosis }} </div>
                        </div>
                    @endif

                    @if ($type == 'donation')
                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold">رقم الهاتف</div>
                            <div class="col-lg-9"> {{ $case->person->phone }} </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold">العنوان</div>
                            <div class="col-lg-9"> {{ $case->person->address }} </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold" style="font-weight: bold">المهنة</div>
                            <div class="col-lg-9"> {{ $case->person->job_title }} </div>
                        </div>
                    @endif

                    <hr>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الفصيلة</div>
                        <div class="col-lg-9"> {{ $case->person->blood_group }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">HB</div>
                        <div class="col-lg-9"> {{ $case->bloodTest->HB ?? '' }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">ملاحظات </div>
                        <div class="col-lg-9"> {{ $case->bloodTest->notes ?? '' }} </div>
                    </div>

                    <hr>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الوزن</div>
                        <div class="col-lg-9"> {{ $case->doctorTest->weight ?? '' }} KG </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">ضغط الدم</div>
                        <div class="col-lg-9"> {{ $case->doctorTest->BP ?? '' }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold"> ملاحظات الطبيب </div>
                        <div class="col-lg-9"> {{ $case->doctorTest->notes ?? '' }} </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4"> سحب الدم </h4>

                    <form method="post" action="{{ route('withdraw.store') }}">
                        @csrf

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">وقت السحب</label>
                            <div class="col-lg-9">
                                <select name="time" id="time" class="form-control form-select">
                                    <option value="5">اقل من 5 دقائق</option>
                                    <option value="10">اقل من 10 دقائق</option>
                                    <option value="15">اقل من 15 دقبقة</option>
                                    <option value="20">اكثر من 15 دقيقة</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">ملاحظات</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" dir="rtl" name="notes"></textarea>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-9 offset-3">
                                @if ($type == 'donation')
                                    <input type="hidden" name="donation_id" value="{{ $case->id }}">
                                @endif
                                @if ($type == 'order')
                                    <input type="hidden" name="order_id" value="{{ $case->id }}">
                                @endif
                                @if ($type == 'polcythemia')
                                <input type="hidden" name="polycythemias_id" value="{{ $case->id }}">
                            @endif

                        @if($type == 'kid')
                        <input type="hidden" name="kid_id" value="{{$case->id}}">
                    @endif
                                <input type="hidden" name="failed" value="0">
                                <button type="submit" class=" btn btn-primary btn-block">نجح السحب</button>
                                <button type="submit" onclick="failed()" class=" btn btn-danger btn-block">فشل
                                    السحب</button>
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
