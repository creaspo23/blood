@extends('layouts.master')
@section('title') طلب فحص @endsection4

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') الفحوصات الاخرى @endslot
        @slot('title') طلب فحص @endslot
    @endcomponent

    <form action="{{route('investigations.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                            <div class="row mt-2 dropdown">
                                <label class="form-label dropdown-toggle col-lg-3">اسم المريض</label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" dir="rtl" name="name" id="name"  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="dropdown-menu" id="name_menu" aria-labelledby="name">

                                    </div>
                                    <span class="invalid-feedback" role="alert">
                                    </span>
                                </div>
                            </div>

                            <div class="row mt-2">
                                <label class="form-label col-lg-3">النوع</label>
                                <div class="col-lg-4">
                                    <input class="form-check-input" value="ذكر" type="radio" name="gender" id="male" checked>
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
                                    <select class="form-control select2" id="unit" dir="rtl" name="unit" style="width: 100%">
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

                            <div class="row mt-2">
                                <label class="form-label col-lg-3">المعاملة</label>
                                <div class="col-lg-4">
                                    <input class="form-check-input" value="تامين" type="radio" name="type" id="تامين">
                                    <label class="form-check-label" for="تامين">
                                        تامين
                                    </label>
                                </div>

                                <div class="col-lg-4">
                                    <input class="form-check-input" value="اقتصادي" type="radio" name="type" id="اقتصادي" checked>
                                    <label class="form-check-label" for="اقتصادي">
                                        اقتصادي
                                    </label>
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
                        <h4 class="card-title"> الفحوصات </h4>
                        <div class="row mt-4">
                            <label class="form-check-label col-lg-3" for="red_blood">
                                AB screening
                            </label>
                            <div class="col-lg-9">
                                <input class="form-check-input" type="checkbox" name="tests[]" value="AB screening"  id="red_blood">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-check-label col-lg-3" for="plasma">
                                AB identification
                            </label>
                            <div class="col-lg-9">
                                <input class="form-check-input" type="checkbox" name="tests[]" value="AB identification" id="plasma">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-check-label col-lg-3" for="palates">
                                AB titration
                            </label>
                            <div class="col-lg-9">
                                <input class="form-check-input" type="checkbox" name="tests[]" value="AB titration" id="palates">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="offset-3 col-9">
                                <button class="btn btn-primary" type="submit">اضافة</button>
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
        $(function () {
            $("#name_menu").css({
                'width': ($("#name").width() + 'px')
            });
        })

        $('#name').on('keyup', function () {
            $.ajax({
                'method': 'get',
                'url': '{{route('people.index')}}',
                'data': {'name': $('#name').val()},
                'success': function (res) {
                    var names = ''
                    for (const element of res) {

                        var a = 'dd';
                       names += '<a class="dropdown-item" onclick="setItem( \' ' + element.name +'  \',  \'' + element.birth_date +'\',  \'' + element.gender +'\')">' + element.name + '</a>';
                    }
                    $('#name_menu').html(names)
                },
                'error': function (err) {
                    console.log(err)
                }
            })
        })
    </script>


@endsection
