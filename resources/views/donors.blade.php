@extends('layouts.master')
@section('title')
    سجل التبرعات
@endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            السجل
        @endslot
        @slot('title')
            سجل التبرعات
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">

                    {{-- <form action="{{ route('Filter') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div>
                                    <label class="form-label">اسم المتبرع</label>
                                    <input class="form-control" dir="rtl" type="text" name="name"
                                        value="{{ request()->input('name') }}">
                                </div>

                                <div>
                                    <label class="form-label"> اسم المتبرع له</label>
                                    <input class="form-control" dir="rtl" type="text" name="name_of_donar" value="{{request()->input('name_of_donar')}}">
                                </div>

                            </div>


                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div>
                                    <label class="form-label">الفصيلة</label>
                                    <select class="form-control select2 " dir="rtl" name="group" style="width: 100%"
                                        value={{ request()->input('group') }}>
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

                                <div>
                                    <label class="form-label">الكمية</label>
                                    <input class="form-control" dir="rtl" type="number" name="qty"
                                        value="{{ request()->input('qty') }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div>
                                    <label class="form-label">تاريخ التبرع</label>
                                    <input class="form-control" dir="rtl" type="date" name="DOD"
                                        value="{{ request()->input('DOD') }}">
                                </div>

                                <div>
                                    <label class="form-label">رقم التبرع</label>
                                    <input class="form-control" dir="rtl" type="text" name="donation_id"
                                        value="{{ request()->input('donation_id') }}">
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12">
                                <div>
                                    <label class="form-label">نوع التبرع</label>
                                    <select class="form-control select2 " dir="rtl" name="type" style="width: 100%"
                                        value="{{ request()->input('type') }}">
                                        <option> الكل </option>
                                        <option> عادي </option>
                                        <option> fresh </option>
                                    </select>
                                </div>

                                <div>
                                    <label class="form-label">الحالة</label>
                                    <select class="form-control select2 " dir="rtl" name="status" style="width: 100%"
                                        value={{ request()->input('status') }}>
                                        <option></option>
                                        <option> معمل الدم </option>
                                        <option> فحص الطبيب </option>
                                        <option> سحب الدم </option>
                                        <option> مكتمل </option>
                                        <option> مستبعد </option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <button class="btn btn-success btn-block mt-2" type="submit" style="width: 100%">
                                    بحث
                                </button>
                            </div>

                        </div>
                    </form> --}}

                    <div class="table-responsive mt-4">
                        <table id="myTable" class="table table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>الوحدة</th>
                                    <th>الفصيلة </th>
                                    {{-- <th>النوع </th>
                                    <th>الكمية </th> --}}
                                    <th>تاريخ الطلب</th>
                                    <th>الحالة</th>
                                    <th>الخيارات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($donations as $donation)
                                    <tr>
                                        <td>{{ $donation->id }}</td>
                                        <td>{{ $donation->person->name ?? '' }}</td>
                                        <td>{{ $donation->order->unit ?? '' }}</td>
                                        <td>{{ $donation->order->person->blood_group ?? '' }}</td>
                                        {{-- <td>
                                            @if (is_array($donation->order) || is_object($donation->order))
                                            @foreach ($donation->order as $order)
                                                {{ $order->bloods->blood_type ?? '' }}
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @if (is_array($donation->order) || is_object($donation->order))
        
                                                @foreach ($donation->order as $order)
                                                    {{ $order->bloods->quantity ?? '' }}
                                                @endforeach
                                            @endif
                                        </td> --}}
                                        <td>{{ $donation->order->created_at ?? '' }}</td>
                                        <td>
                                            @if ($donation->status == 'الانتظار')
                                                <span class="badge bg-soft-warning" style="font-size:small ">الإنتظار</span>
                                            @elseif($donation->status == 'مكتمل')
                                                <span class="badge bg-soft-success" style="font-size:small ">مكتمل</span>
                                            @elseif($donation->status == 'مرفوض')
                                                <span class="badge bg-soft-danger" style="font-size:small ">
                                                    مرفوض
                                                </span>
                                            @elseif($donation->status == 'ملغي')
                                                <span class="badge bg-soft-secondary" style="font-size:small ">ملغي</span>
                                            @endif
                                        </td>

                                        <td>@include('partials.donation-options')</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                autoWidth: false,
                order: [ [0, 'desc'] ]


            });

        });
    </script>
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
@endsection
