@extends('layouts.master')
@section('title')
    مشتقات الدم
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
            مشتقات الدم
        @endslot
    @endcomponent


    <style>
        .center {
            display: flex;
            align-items: center;
        }
    </style>
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

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">بيانات المتبرع</h4>
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
                    <h4 class="card-title mb-4"> استخراج المشتقات </h4>

                    <form>

                        <div class="row mt-2">
                            <div class="col-lg-6 center">
                                <div>
                                    <input class="form-check-input" type="checkbox" id="full_blood">
                                    <label class="form-check-label" for="full_blood">
                                        دم كامل
                                    </label>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <label class="form-label" for="red_blood">
                                    مدة الصلاحية
                                </label>

                                <select name="expire_date" id="date_full_blood" class="form-control form-select">
                                    <option value="35">35 يوم </option>
                                    <option value="42">  42 يوم</option>

                                </select>

                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-6 center">
                                <div>
                                    <input class="form-check-input" type="checkbox" id="red_blood">
                                    <label class="form-check-label" for="red_blood">
                                        الدم الاحمر
                                    </label>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <label class="form-label" for="red_blood">
                                    مدة الصلاحية
                                </label>

                                <select name="expire_date" id="date_red_blood" class="form-control form-select">
                                    <option value="35">35 يوم </option>
                                    <option value="42">  42 يوم</option>

                                </select>

                            </div>

                        </div>


                        <div class="row mt-2">
                            <div class="col-lg-6 center">
                                <div>
                                    <input class="form-check-input" type="checkbox" id="plasma">
                                    <label class="form-check-label" for="plasma">
                                        البلازما
                                    </label>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <label class="form-label">
                                    مدة الصلاحية
                                </label>

{{--                                <input type="number" name="expire_date" class="form-control" id="date_plasma_blood">--}}
                                <select name="expire_date" id="date_plasma_blood" class="form-control form-select">
                                    <option value="5">5 ايام </option>
                                </select>

                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-6 center">
                                <div>
                                    <input class="form-check-input" type="checkbox" id="palates">
                                    <label class="form-check-label" for="palates">
                                        الصفائح
                                    </label>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <label class="form-label" for="red_blood">
                                    مدة الصلاحية
                                </label>

{{--                                <input type="number" name="expire_date" class="form-control" id="date_palates_blood">--}}
                                <select name="expire_date" id="date_palates_blood" class="form-control form-select">
                                    <option value="180"> 6 اشهر </option>
                                    <option value="365">   سنه </option>

                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-6 center">
                                <div>
                                    <input class="form-check-input" type="checkbox" id="frozen">
                                    <label class="form-check-label" for="frozen">
                                        الراسب المتجمد
                                    </label>
                                </div>

                            </div>
                            <div class="col-lg-6">

                                <label class="form-label" for="red_blood">
                                    مدة الصلاحية
                                </label>

{{--                                <input type="number" name="expire_date" class="form-control" id="date_frozen_blood">--}}

                                <select name="expire_date" id="date_frozen_blood" class="form-control form-select">
                                    <option value="180"> 6 اشهر </option>
                                    <option value="365">   سنه </option>

                                </select>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <label class="form-label col-lg-3">ملاحظات</label>
                            <div class="col-lg-9">
                                <textarea class="form-control" dir="rtl" name="hp"></textarea>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-9 offset-3">
                                <button id="submit" class=" btn btn-primary btn-block">اكتملت العملية </button>
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

        <script>
            $('#submit').on('click', function(e) {
                e.preventDefault();
                const date_red_blood = document.getElementById('date_red_blood').value;
                const date_plasma_blood = document.getElementById('date_plasma_blood').value;
                const date_palates_blood = document.getElementById('date_palates_blood').value;
                const date_frozen_blood = document.getElementById('date_frozen_blood').value;
                const date_full_blood = document.getElementById('date_full_blood').value;


                let bloods = [];
                $('.is-invalid').removeClass('is-invalid')

                if ($('#full_blood').is(':checked')) {
                    bloods.push({
                        "name": 'الدم الكامل',
                        "expire": date_full_blood
                    })

                }

                if ($('#red_blood').is(':checked')) {
                    bloods.push({
                        "name": 'الدم الاحمر',
                        "expire": date_red_blood
                    })
                }

                if ($('#palates').is(':checked')) {
                    bloods.push({
                        "name": 'الصفائح',
                        "expire": date_palates_blood
                    })
                }

                if ($('#plasma').is(':checked')) {
                    bloods.push({
                        "name": 'البلازما',
                        "expire": date_plasma_blood
                    })
                }

                if ($('#frozen').is(':checked')) {
                    bloods.push({
                        "name": 'الراسب المتجمد',
                        "expire": date_frozen_blood
                    })
                }


                $.ajax({
                    'method': 'post',
                    'url': '{{ route('derivatives.store') }}',
                    'data': {
                        '_token': '{{ csrf_token() }}',
                        'blood_withdraw_id': '{{ $case->bloodWithdraw->id }}',
                        'bloods': bloods
                    },
                    'success': function(res) {
                        toastr.success("تمت الاضافة بنجاح");
                    },
                    'error': function(err) {
                        toastr.error("حدث خطأ في النظام");
                    }
                })

            })
        </script>
    @endsection
