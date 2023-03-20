@extends('layouts.master')
@section('title')
    سجل الفحوصات الاخري
@endsection

@section('css')
    <!-- plugin css -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            السجل
        @endslot
        @slot('title')
            الفحوصات الاخري
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-14">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="card-title" style="text-align: center">

                                </h4>

                            </div>
                        </div>
                    </div>

                    <table id="myTable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>اسم المريض</th>
                                <th> النوع</th>
                                <th> تاريخ الميلاد </th>

                                <th>نوع المعامله </th>

                                <th>تاريخ الطلب</th>
                                <th>الحالة</th>
                                <th>AB screening</th>
                                <th>AB identification</th>
                                <th>AB titration</th>
                                <th>الخيارات</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($investigations as $investigation)
                                <tr>
                                    <td style="text-align: center">{{ $investigation->id }}</td>
                                    <td style="text-align: center">{{ $investigation->person->name ?? '' }}</td>
                                    <td style="text-align: center">{{ $investigation->person->gender ?? '' }}</td>
                                    <td style="text-align: center">{{ $investigation->person->birth_date ?? '' }}</td>

                                    <td style="text-align: center">{{ $investigation->type }}</td>

                                    <td style="text-align: center">{{ $investigation->created_at->format('y-m-d') ?? '' }}
                                    </td>
                                    <td style="text-align: center">
                                        @if ($investigation->status == 'الانتظار')
                                            <span class="badge bg-soft-warning" style="font-size:small ">الإنتظار</span>
                                        @elseif($investigation->status == 'مكتمل')
                                            <span class="badge bg-soft-success" style="font-size:small ">مكتمل</span>
                                        @elseif($investigation->status == 'مرفوض')
                                            <span class="badge bg-soft-danger" style="font-size:small ">
                                                مرفوض
                                            </span>
                                        @elseif($investigation->status == 'ملغي')
                                            <span class="badge bg-soft-secondary" style="font-size:small ">ملغي</span>
                                        @endif
                                    </td>
                                    @php
                                        $AB_screening=$investigation->tests()->where('test','AB screening')->get();
                                        $AB_identification=$investigation->tests()->where('test','AB identification')->get();
                                        $AB_titration=$investigation->tests()->where('test','AB titration')->get();
                                    @endphp
                                    @foreach ($AB_screening as $item)

                                            <td>
                                                {{$item->result }}

                                            </td>



                                            @endforeach
                                    @foreach ($AB_identification as $item)


                                            <td>
                                                {{$item->result }}

                                            </td>


                                    @endforeach
                                    @foreach ($AB_titration as $item)


                                            <td>
                                                {{$item->result }}

                                            </td>

                                    @endforeach
                                    @if(count($investigation->tests)==0)
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    @endif


                                    <td>@include('partials.investigations-options')</td>
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
                order: [
                    [0, 'desc']
                ]

            });

        });
    </script>
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
@endsection
