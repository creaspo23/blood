@extends('layouts.master')
@section('title')
    لوحة التحكم
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            الرئيسية
        @endslot
        @slot('title')
            لوحة التحكم
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="total-revenue-chart"></div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{ \App\Models\Order::count() }}</span></h4>
                        <p class="text-muted mb-0">المرضى</p>
                    </div>

                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="orders-chart"> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span
                                data-plugin="counterup">{{ \App\Models\Donation::where('status', '=', 'الانتظار')->count() }}</span>
                        </h4>
                        <p class="text-muted mb-0"> المتبرعين</p>
                    </div>

                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="customers-chart"> </div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span data-plugin="counterup">{{\App\Models\Derivative::count()}}</span></h4>
                        <p class="text-muted mb-0">الخزنة</p>
                    </div>

                </div>
            </div>
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">

            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="growth-chart"></div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"> <span data-plugin="counterup">{{\App\Models\Exchange::count()}}</span></h4>
                        <p class="text-muted mb-0">المنصرف</p>
                    </div>

                </div>
            </div>
        </div> <!-- end col-->
    </div> <!-- end row-->

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="total-revenue-chart"></div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"><span
                                data-plugin="counterup">{{ App\Models\ExternalExchange::count() }}</span></h4>
                        <p class="text-muted mb-0">التبرعات الخارجية</p>
                    </div>

                </div>
            </div>
        </div> <!-- end col-->


        <div class="col-md-6">

            <div class="card">
                <div class="card-body">
                    <div class="float-end mt-2">
                        <div id="growth-chart"></div>
                    </div>
                    <div>
                        <h4 class="mb-1 mt-1"> <span
                                data-plugin="counterup">{{ App\Models\Order::where('fresh', '=', 1)->count() }}</span></h4>
                        <p class="text-muted mb-0">fresh blood</p>
                    </div>

                </div>
            </div>
        </div> <!-- end col-->
    </div> <!-- end row-->

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton5"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold">الترتيب بـ :</span> <span class="text-muted">سنوي<i
                                        class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5">
                                <a class="dropdown-item" href="#">شهري</a>
                                <a class="dropdown-item" href="#">سنوي</a>
                                <a class="dropdown-item" href="#">اسبوعي</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">احصائيات فصائل الدم</h4>


                    <input type="hidden" name="" id="list" value="{{json_encode($list,true)}}">

                    <div class="mt-3">
                        <div id="sales-analytics-chart" class="apex-charts"   dir="ltr"></div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>

{{-- 
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="float-end">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-reset" href="#" id="dropdownMenuButton5"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold">الترتيب بـ :</span> <span class="text-muted">سنوي<i
                                        class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton5">
                                <a class="dropdown-item" href="#">شهري</a>
                                <a class="dropdown-item" href="#">سنوي</a>
                                <a class="dropdown-item" href="#">اسبوعي</a>
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">احصائيات بنك الدم</h4>

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>الفصيلة</th>
                                    <th>المتبرعين</th>
                                    <th>المدخل</th>
                                    <th>المنصرف</th>
                                    <th>الثلاجة</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        A+
                                    </td>
                                    <td>
                                        300
                                    </td>
                                    <td>
                                        250
                                    </td>
                                    <td>
                                        200
                                    </td>
                                    <td>
                                        100
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        B+
                                    </td>
                                    <td>
                                        300
                                    </td>
                                    <td>
                                        250
                                    </td>
                                    <td>
                                        200
                                    </td>
                                    <td>
                                        100
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        AB+
                                    </td>
                                    <td>
                                        300
                                    </td>
                                    <td>
                                        250
                                    </td>
                                    <td>
                                        200
                                    </td>
                                    <td>
                                        100
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        O+
                                    </td>
                                    <td>
                                        300
                                    </td>
                                    <td>
                                        250
                                    </td>
                                    <td>
                                        200
                                    </td>
                                    <td>
                                        100
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        A-
                                    </td>
                                    <td>
                                        300
                                    </td>
                                    <td>
                                        250
                                    </td>
                                    <td>
                                        200
                                    </td>
                                    <td>
                                        100
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        B-
                                    </td>
                                    <td>
                                        300
                                    </td>
                                    <td>
                                        250
                                    </td>
                                    <td>
                                        200
                                    </td>
                                    <td>
                                        100
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        AB-
                                    </td>
                                    <td>
                                        300
                                    </td>
                                    <td>
                                        250
                                    </td>
                                    <td>
                                        200
                                    </td>
                                    <td>
                                        100
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        O-
                                    </td>
                                    <td>
                                        300
                                    </td>
                                    <td>
                                        250
                                    </td>
                                    <td>
                                        200
                                    </td>
                                    <td>
                                        100
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> --}}
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>


@endsection