@extends('layouts.master')
@section('title')
    اضافة طلب دم
    @endsection4

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            النظام
        @endslot
        @slot('title')
            اضافة طلب دم
        @endslot
    @endcomponent

    <form action="" id="form">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-2 dropdown">
                            <label class="form-label dropdown-toggle col-lg-3">اسم المريض</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" dir="rtl" name="name" id="name"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-menu" id="name_menu" aria-labelledby="name">

                                </div>
                                <span class="invalid-feedback" role="alert">
                                </span>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">النوع</label>
                            <div class="col-lg-4">
                                <input class="form-check-input" value="ذكر" type="radio" name="gender" id="male"
                                    checked>
                                <label class="form-check-label" for="male">
                                    ذكر
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <input class="form-check-input" value="انثى" type="radio" name="gender" id="female">
                                <label class="form-check-label" for="female">
                                    انثى
                                </label>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">  العمر </label>
                            <div class="col-lg-9">
                                <input type="date" class="form-control" dir="rtl" name="birth_date" id="birth_date">
                                <span class="invalid-feedback" role="alert">
                                </span>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">الوحدة</label>
                            <div class="col-lg-9">
                                <select class="form-control select2" id="unit" dir="rtl" name="unit"
                                    style="width: 100%">
                                    <option>العناية المكثفة</option>
                                    <option>العناية الحثيثة</option>
                                    <option>الطوارئ</option>
                                    <option>الولادة</option>
                                    <option>الجراحة</option>
                                    <option>الباطنية</option>
                                    <option>الاطفال</option>
                                    <option>النفسية</option>
                                    <option>الشمالي</option>
                                    <option>الغربي</option>
                                    <option>الكلى</option>
                                    <option>العظام</option>
                                    <option>المسالك البولية</option>
                                    <option>امراض الدم</option>
                                    <option>الجلدية</option>
                                    <option>الاذن والانف والحنجرة</option>
                                    <option>اسر الضباط</option>
                                    <option>جناح الضباط</option>
                                </select>
                            </div>
                            <span class="invalid-feedback" role="alert">
                            </span>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">التشخيص</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" dir="rtl" name="diagnosis" id="diagnosis">
                            </div>
                            <span class="invalid-feedback" role="alert">
                            </span>
                        </div>
                        {{-- <div class="row mt-2">
                            <label class="orm-label col-lg-3">الفصيلة</label>
                            <div class="col-lg-9">
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

                        </div> --}}

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
                                <input class="form-check-input" value="علياء" type="radio" name="hospital" id="علياء"
                                    checked>
                                <label class="form-check-label" for="علياء">
                                    علياء
                                </label>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">المعاملة</label>
                            <div class="col-lg-4">
                                <input class="form-check-input" value="تامين" type="radio" name="type"
                                    id="تامين">
                                <label class="form-check-label" for="تامين">
                                    تامين
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <input class="form-check-input" value="اقتصادي" type="radio" name="type"
                                    id="اقتصادي" checked>
                                <label class="form-check-label" for="اقتصادي">
                                    اقتصادي
                                </label>
                            </div>
                        </div>


                        <div class="row mt-2">
                            <label class="form-label col-lg-3"> fresh </label>
                            <div class="col-lg-9">
                                <input type="checkbox" class="form-check" dir="rtl" name="hp" id="fresh" onchange="(e)=>{lorem()}" >
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" id="bloods">
                        <div class="row mt-2">
                            <div class="col-lg-3">
                                <span class="invalid-feedback" role="alert">
                                    الرجاء اختيار دم
                                </span>
                                <input class="form-check-input" type="checkbox" id="full_blood">
                                <label class="form-check-label" for="full_blood">
                                    دم كامل
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" name="name" disabled id="full_blood_qt"
                                    placeholder="الكمية">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3">
                                <input class="form-check-input" type="checkbox" id="red_blood">
                                <label class="form-check-label" for="red_blood">
                                    الدم الاحمر
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" name="name" disabled id="red_blood_qt"
                                    placeholder="الكمية">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3">
                                <input class="form-check-input" type="checkbox" id="plasma">
                                <label class="form-check-label" for="plasma">
                                    البلازما
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" name="name" disabled id="plasma_qt"
                                    placeholder="الكمية">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3">
                                <input class="form-check-input" type="checkbox" id="palates">
                                <label class="form-check-label" for="palates">
                                    الصفائح
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" name="name" disabled id="palates_qt"
                                    placeholder="الكمية">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-3">
                                <input class="form-check-input" type="checkbox" id="frozen">
                                <label class="form-check-label" for="frozen">
                                    الراسب المتجمد
                                </label>
                            </div>
                            <div class="col-lg-9">
                                <input type="number" class="form-control" name="name" disabled id="frozen_qt"
                                    placeholder="الكمية">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="offset-3 col-9">
                                <button class="btn btn-primary" id="submit">اضافة</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>

    <script>
        function lorem(e) {
            console.log('lorem');

        }


        $(function() {
            $("#name_menu").css({
                'width': ($("#name").width() + 'px')
            });
        })

        $('#name').on('keyup', function() {
            $.ajax({
                'method': 'get',
                'url': '{{ route('people.index') }}',
                'data': {
                    'name': $('#name').val()
                },
                'success': function(res) {
                    var names = ''
                    for (const element of res) {
                        var a = 'dd';
                        names += '<a class="dropdown-item" onclick="setItem( \' ' + element.name +
                            '  \',  \'' + element.birth_date + '\',  \'' + element.gender + '\')">' +
                            element.name + '</a>';
                    }
                    $('#name_menu').html(names)
                },
                'error': function(err) {
                    console.log(err)
                }
            })
        })

        function setItem(name, birth_date, gender) {
            $('#name').val(name)
            $('#birth_date').val(birth_date)
            if (gender == 'ذكر') {
                $('#male').prop('checked', true);
            }

            if (gender == 'انثى') {
                $('#female').prop('checked', true);
            }
        }
    </script>

    <script>
        $('#bloods :input:checkbox').on('change', function() {
            $(this.parentNode.parentNode.children[1].children[0]).prop('disabled', true);
            if ($(this).is(':checked')) {
                $(this.parentNode.parentNode.children[1].children[0]).prop('disabled', false);
            }
        })

        $('#fresh').on('change', function() {
            $('#bloods :input:checkbox').prop('disabled', false);
            if ($(this).is(':checked')) {
                $('#bloods :input:checkbox').prop('checked', false);
                $('#bloods :input').prop('disabled', true);

                $('#bloods :input:checkbox:first').prop('checked', true);
                $('#bloods :input:checkbox:first').prop('disabled', false);
                $('#bloods :input:text:first').prop('checked', true);
            }
            $('#submit').prop('disabled', false);
        })
    </script>

    <script>
        $('#submit').on('click', function(e) {
            e.preventDefault();
            var bloods = [];
            $('.is-invalid').removeClass('is-invalid')

            if ($('#full_blood').is(':checked')) {
                bloods.push({
                    blood_type: 'الدم الكامل',
                    quantity: $('#full_blood_qt').val()
                })
            }

            if ($('#red_blood').is(':checked')) {
                bloods.push({
                    blood_type: 'الدم الاحمر',
                    quantity: $('#red_blood_qt').val()
                })
            }

            if ($('#palates').is(':checked')) {
                bloods.push({
                    blood_type: 'الصفائح',
                    quantity: $('#palates_qt').val()
                })
            }

            if ($('#plasma').is(':checked')) {
                bloods.push({
                    blood_type: 'البلازما',
                    quantity: $('#plasma_qt').val()
                })
            }

            if ($('#frozen').is(':checked')) {
                bloods.push({
                    blood_type: 'الراسب المتجمد',
                    quantity: $('#frozen_qt').val()
                })
            }


            $.ajax({
                'method': 'post',
                'url': '{{ route('orders.store') }}',
                'data': {
                    '_token': '{{ csrf_token() }}',
                    'name': $('#name').val(),
                    'diagnosis': $('#diagnosis').val(),
                    'gender': $('input[name="gender"]:checked').val(),
                    'birth_date': $('#birth_date').val(),
                    'unit': $('#unit').find(":selected").val(),
                    'hospital': $('input[name="hospital"]:checked').val(),
                    'type': $('input[name="type"]:checked').val(),
                    'fresh': $('#fresh').is(':checked') ? 1 : 0,
                    'bloods': bloods
                },
                'success': function(res) {
                    toastr.success("تمت العملية بنجاح");
                    $('#form').each(function() {
                        this.reset();
                    });
                },
                'error': function(err) {
                    var errors = Object.entries(err.responseJSON.errors)
                    for (var i of errors) {
                        $('#' + i[0]).addClass('is-invalid')
                        $($('#' + i[0]).siblings()[0]).html('<strong>' + i[1] + '</strong>')
                    }

                    toastr.error("لم يتم الادخال بطريقة صحيحة");

                }
            })

        })
    </script>
@endsection
