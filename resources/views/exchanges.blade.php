@extends('layouts.master')
@section('title')
    صرف الدم
@endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            بنك الدم
        @endslot
        @slot('title')
            صرف الدم
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">بيانات الطلب</h4>
                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">رقم الطلب</div>
                        <div class="col-lg-9"> {{ $order->id }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الوحدة</div>
                        <div class="col-lg-9"> {{ $order->unit }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الاسم</div>
                        <div class="col-lg-9">{{ $order->person->name }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">تاريخ الميلاد</div>
                        <div class="col-lg-9"> {{ $order->person->birth_date }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">الفصيلة</div>
                        <div class="col-lg-9"> {{ $order->person->blood_group }} </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">نوع الدم</div>
                        <div class="col-lg-9">
                            @foreach ($order->bloods as $blood)
                                {{ $blood->blood_type . ',' }}
                            @endforeach
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-lg-3 font-weight-bold" style="font-weight: bold">تاريخ الطلب</div>
                        <div class="col-lg-9"> {{ $order->created_at }} </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div>
                <div class="card ">
                    <div class="card-body" id="bloods">
                        <h4 class="card-title mb-4"> بيانات السحب </h4>
                        <form method="POST" action="{{ route('exchanges.store') }}">
                            @csrf
                            <div class="row mt-2">
                                <label class="form-label col-lg-3">
                                    <span class="row">
                                        <span class="col-sm-2">
                                            <input type="checkbox" name="red_blood">
                                        </span>
                                        <span class="col-sm-10">
                                            الدم الاحمر
                                        </span>
                                    </span>
                                </label>
                                <div class="col-lg-9">
                                    <select class="select2 form-control select2-multiple" name="bottles[]" dir="rtl"
                                        multiple="multiple" data-placeholder="حدد" style="width: 100%">
                                        @foreach ($derivatives as $derivative)
                                            @if ($derivative->blood_type == 'الدم الاحمر')
                                                <option value="{{ $derivative->id }}">
                                                    {{ $derivative->bottle_number }}
                                                    ({{ $derivative->withdraw->processable->person->blood_group }})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="form-label col-lg-3">
                                    <span class="row">
                                        <span class="col-sm-2">
                                            <input type="checkbox" name="plasma" >
                                        </span>
                                        <span class="col-sm-10">
                                            البلازما
                                        </span>
                                    </span>
                                </label>
                                <div class="col-lg-9">
                                    <select class="select2 form-control select2-multiple" name="bottles[]" dir="rtl"
                                        multiple="multiple" data-placeholder="حدد" style="width: 100%">
                                        @foreach ($derivatives as $derivative)
                                            @if ($derivative->blood_type == 'البلازما')
                                                <option value="{{ $derivative->id }}">
                                                    {{ $derivative->bottle_number }}
                                                    ({{ $derivative->withdraw->processable->person->blood_group }})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <label class="form-label col-lg-3">
                                    <span class="row">
                                        <span class="col-sm-2">
                                            <input type="checkbox" name="plates">
                                        </span>
                                        <span class="col-sm-10">
                                            الصفائح
                                        </span>
                                    </span>
                                </label>
                                <div class="col-lg-9">
                                    <select class="select2 form-control select2-multiple" name="bottles[]" dir="rtl"
                                        multiple="multiple" data-placeholder="حدد" style="width: 100%">
                                        @foreach ($derivatives as $derivative)
                                            @if ($derivative->blood_type == 'الصفائح')
                                                <option value="{{ $derivative->id }}">
                                                    {{ $derivative->bottle_number }}
                                                    ({{ $derivative->withdraw->processable->person->blood_group }})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="form-label col-lg-3">
                                    <span class="row">
                                        <span class="col-sm-2">
                                            <input type="checkbox" name="frozen">
                                        </span>
                                        <span class="col-sm-10">
                                            الراسب المتجمد
                                        </span>
                                    </span>
                                </label>
                                <div class="col-lg-9">
                                    <select class="select2 form-control select2-multiple" name="bottles[]" dir="rtl"
                                        multiple="multiple" data-placeholder="حدد" style="width: 100%">
                                        @foreach ($derivatives as $derivative)
                                            @if ($derivative->blood_type == 'الراسب المتجمد')
                                                <option value="{{ $derivative->id }}">
                                                    {{ $derivative->bottle_number }}
                                                    ({{ $derivative->withdraw->processable->person->blood_group }})
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <label class="form-label col-lg-3">المستشفى</label>
                                <div class="col-lg-4">
                                    <input class="form-check-input" value="السلاح الطبي" type="radio" name="hospital"
                                        id="السلاح الطبي">
                                    <label class="form-check-label" for="السلاح الطبي">
                                        السلاح الطبي
                                    </label>
                                </div>

                                <div class="col-lg-4">
                                    <input class="form-check-input" value="علياء" type="radio" name="hospital"
                                        id="علياء" checked>
                                    <label class="form-check-label" for="علياء">
                                        علياء
                                    </label>
                                </div>
                            </div>
                            <div id="others" style="display: none">
                                <div class="row mt-2">
                                    <label class="form-label col-lg-3">
                                        <span class="row">

                                            <span class="col-sm-10">
                                                الإسم
                                            </span>
                                        </span>
                                    </label>
                                    <div class="col-lg-9">
                                        <input type="text" name="name" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label class="form-label col-lg-3">
                                        <span class="row">

                                            <span class="col-sm-10">
                                                تاريخ الميلاد
                                            </span>
                                        </span>
                                    </label>
                                    <div class="col-lg-9">
                                        <input type="date" name="birth_date" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label class="form-label col-lg-3">
                                        <span class="row">

                                            <span class="col-sm-10">
                                                النوع
                                            </span>
                                        </span>
                                    </label>
                                    <div class="col-lg-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="ذكر" name="gender">
                                            <label class="form-check-label" for="inlineCheckbox1"> ذكر</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="انثي"
                                                name="gender">
                                            <label class="form-check-label" for="inlineCheckbox2"> انثي</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label class="form-label col-lg-3">
                                        <span class="row">
                                            <span class="col-sm-2">
                                                <input type="checkbox" name="blood_group">
                                            </span>
                                            <span class="col-sm-10">
                                                فصيله الدم
                                            </span>
                                        </span>
                                    </label>
                                    <div class="col-lg-9">
                                        <select class="form-control select2 @error('blood_group') is-invalid @enderror "
                                            dir="rtl" name="blood_group" id="blood_group" style="width: 100%">
                                            <option></option>

                                            <option>A+</option>
                                            <option>B+</option>
                                            <option>AB+</option>
                                            <option>O+</option>
                                            <option>A-</option>
                                            <option>B-</option>
                                            <option>AB-</option>
                                            <option>O-</option>

                                        </select>
                                    </div>
                                </div>

                            </div>
                            <label for="" style="margin-left: 30px;margin-top: 10px">نوع التبرع</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="داخلي"
                                    name="type">
                                <label class="form-check-label" for="inlineCheckbox1"> داخلي</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="lorem" value="خارجي"
                                    name="type" onchange="changed()">
                                <label class="form-check-label" for="inlineCheckbox2"> خارجي</label>
                            </div>

                            <input type="hidden" name="order_id" value="{{ $order->id }}" id="">
                            {{-- <input type="hidden" name="hospital" value="{{ $order->hospital }}" id=""> --}}

                            <div style="margin-top: 10px">
                                <button type="submit" class="btn btn-success">حفظ</button>
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
        <script>
            function changed() {
                let out = document.getElementById("lorem");
                if (out.checked) {

                    document.getElementById("others").style.display = "block";
                } else {
                    document.getElementById("others").style.display = "none";

                }
            }
        </script>
        <script>
            $(function() {
                $('#bloods select').prop('disabled', true);
            })

            $('#bloods :input:checkbox').on('change', function() {
                $(this.parentNode.parentNode.parentNode.parentNode.children[1].children[0]).prop('disabled', true);
                if ($(this).is(':checked')) {
                    $(this.parentNode.parentNode.parentNode.parentNode.children[1].children[0]).prop('disabled', false);
                }
            })

            $.ajax({
                'method': 'get',
                'url': '{{ route('bottles') }}',
                'success': function(res) {
                    console.log(res)
                },
                'error': function(err) {

                }
            });
        </script>
    @endsection
