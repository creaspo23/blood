@extends('layouts.master')
@section('title') الاطفال حديثي الولادة  @endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle') الاطفال حديثي الولادة @endslot
        @slot('title') اضافة @endslot
    @endcomponent

    <form action="{{route('kids.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-2 dropdown">
                            <label class="form-label dropdown-toggle col-lg-3">اسم الام</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" dir="rtl" name="name" id="name"  data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="dropdown-menu" id="name_menu" aria-labelledby="name">

                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3"> تاريخ الميلاد </label>
                            <div class="col-lg-9">
                                <input type="hidden" name="gender" value="انثى">
                                <input type="date" class="form-control @error('birth_date') is-invalid @enderror" dir="rtl" name="birth_date" id="birth_date">
                                @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-2 dropdown">
                            <label class="form-label dropdown-toggle col-lg-3">اسم الطفل</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control @error('child_name') is-invalid @enderror" dir="rtl" name="child_name" id="child_name">
                                @error('child_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3">النوع</label>
                            <div class="col-lg-4">
                                <input class="form-check-input" value="ذكر" type="radio" name="child_gender" id="male" checked>
                                <label class="form-check-label" for="male">
                                    ذكر
                                </label>
                            </div>

                            <div class="col-lg-4">
                                <input class="form-check-input" value="انثى" type="radio" name="child_gender" id="female">
                                <label class="form-check-label" for="female">
                                    انثى
                                </label>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <label class="form-label col-lg-3"> تاريخ الميلاد </label>
                            <div class="col-lg-9">
                                <input type="date" class="form-control @error('child_birth_date') is-invalid @enderror" dir="rtl" name="child_birth_date" id="child_birth_date">
                                @error('child_birth_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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
                        if (element.gender == 'انثى') {
                            names += '<a class="dropdown-item" onclick="setItem( \' ' + element.name +'  \',  \'' + element.birth_date +'\',  \'' + element.gender +'\',  \'' + element.phone +'\', \'' + element.job_title +'\',  \'' + element.address +'\')">' + element.name + '</a>';
                        }
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
