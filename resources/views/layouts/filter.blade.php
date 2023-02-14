@extends('layouts.master')
@section('title')
    استخراج التقارير
@endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            استخراج
        @endslot
        @slot('title')
            التقارير
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <form action="#" method="get" id="form">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <label for="">من تاريخ</label>
                        <input type="date" name="form_date" class="form-control" id="form_date">

                    </div>
                    <div class="col-4">
                        <label for=""> الي تاريخ</label>
                        <input type="date" name="to_date" class="form-control" id="to_date">

                    </div>
                    <div class="col-4">
                        <label for=""> نوع التقرير</label>
                        <select type="text" name="type" class="form-control" onchange="getActions(this)"
                            id="select">
                            <option value="">حدد</option>
                            <option value="BloodDischarged">بنك الدم</option>
                            <option value="viralDiseasesinvoice">الفحص الفيروسي</option>
                            <option value="xclusionFromTheDoctor"> استبعاد من طبيب</option>
                            <option value="donersWithDraw"> عدم السحب</option>
                            <option value="polcythemiasrReport"> مرضي زيادة الدم</option>
                        </select>
                    </div>
                    <br>
                    <div class="col-12 mt-5">
                        <button style="margin-right: 45%" type="submit" class="btn btn-primary">بحث</button>

                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection

@section('script')
    <script>
        function getActions() {
            var select = document.getElementById('select').value;

            var form = document.getElementById('form');
            // var form_date = document.getElementById('form_date').value;
            // var to_date = document.getElementById('to_date').value;

            if (select == "BloodDischarged") {
                form.action = "{{ route('BloodDischarged') }}";

            }
            if (select == "polcythemiasrReport") {
                form.action = "{{ route('polcythemiasrReport') }}";
            }
            if (select == "viralDiseasesinvoice") {
                form.action = "{{ route('viralDiseases-invoice') }}";

            }
            if (select == "exclusionFromTheDoctor") {
                form.action = "{{ route('exclusionFromTheDoctor') }}";

            }
            if (select == "donersWithDraw") {
                form.action = "{{ route('doners-WithDraw') }}";

            }


        }
    </script>
@endsection
