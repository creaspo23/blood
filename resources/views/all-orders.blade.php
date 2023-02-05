@extends('layouts.master')
@section('title')
    طلبات الدم
@endsection

@section('css')
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    @component('common-components.breadcrumb')
        @slot('pagetitle')
            طلبات
        @endslot
        @slot('title')
            الدم
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="card-title" style="text-align: center">
                                    طلبات الدم
                                </h4>

                            </div>
                        </div>
                    </div>

                    <table id="myTable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>الإسم</th>
                                <th>الوحده</th>
                                <th>التشخيص</th>
                                <th>الحاله</th>
                                <th>أنشاءت بتاريخ</th>
                                <th>الخيارات</th>

                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->person->name }}</td>
                                    <td>{{ $order->unit }}</td>
                                    <td>
                                        {{ $order->diagnosis }}
                                    </td>
                                    <td>
                                        @if ($order->status == 'الانتظار')
                                            <span class="badge bg-soft-warning" style="font-size:small ">الإنتظار</span>
                                        @elseif($order->status == 'مكتمل')
                                            <span class="badge bg-soft-success" style="font-size:small ">مكتمل
                                            </span>
                                        @else
                                            <span class="badge bg-soft-danger" style="font-size:small ">
                                                ملغي
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{ $order->created_at->format('y-m-d') }}</td>

                                    <td>@include('partials.order-options')</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
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
