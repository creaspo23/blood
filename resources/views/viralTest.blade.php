@extends('layouts.master')
@section('title')
    الفحص الفيروسي
@endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            الفحص
        @endslot
        @slot('title')
            الفحص الفيروسي
        @endslot
    @endcomponent

    @if ($case->bloodWithdraw)
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col-lg-3 font-weight-bold">
                                <p>رقم الزجاجة</p>
                                <h4>{{ $case->bloodWithdraw->bottle_number }}</h4>
                            </div>

                            <div class="col-lg-3 font-weight-bold">
                                <p> الفصيلة </p>
                                <h4>{{ $case->person->blood_group }}</h4>
                            </div>

                            <div class="col-lg-3 font-weight-bold">
                                <p> تاريخ السحب</p>
                                <h4>{{ $case->bloodWithdraw->created_at }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    @if ($type == 'donation')
                        <h4 class="card-title mb-4">بيانات المتبرع</h4>
                    @elseif($type == 'order')
                        <h4 class="card-title mb-4">بيانات المريض</h4>
                    @elseif($type == 'kid')
                        <h4 class="card-title mb-4">بيانات الطفل</h4>
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
                    <h4 class="card-title mb-4"> الفحص الفيروسي </h4>

                    <form method="post" action="{{ route('viralTest.store') }}">

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">الأمراض</label>
                            <div class="col-lg-9">
                                <select class="select2 form-control select2-multiple" name="result[]" dir="rtl"
                                    multiple="multiple" data-placeholder="حدد" style="width: 100%">
                                    @foreach ($diseases as $disease)
                                        <option>{{$disease->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">ملاحظات</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" dir="rtl" name="notes">{{ $case->viralTest->notes ?? '' }}</textarea>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-9 offset-3">
                                @csrf
                                @if ($type == 'donation')
                                    <input type="hidden" name="donation_id" value="{{ $case->id }}">
                                @endif
                                @if ($type == 'kid')
                                    <input type="hidden" name="kid_id" value="{{ $case->id }}">
                                @endif
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
