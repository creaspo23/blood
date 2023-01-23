<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invoice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        .page-break {
            page-break-after: always;
        }

        .bg-grey {
            background: #F3F3F3;
        }

        .text-right {
            text-align: left;
        }

        .w-full {
            width: 100%;
        }

        .small-width {
            width: 15%;
        }

        .invoice {
            background: white;
            border: 1px solid #CCC;
            font-size: 14px;
            padding: 48px;
            margin: 20px 0;
        }
    </style>
    <style>
        body {
            background: white !important;
            font-family: XB Riyaz;
        }
    </style>
</head>

<body class="bg-grey" dir="rtl">

    <div class="container container-smaller">

        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="invoice">


                    <div class="row">


                        <div class="col-sm-5 text-right">
                            <table class="w-full">
                                <tbody>
                                    <tr>
                                        <th style="text-align: center"> تقرير مصرف الدم </th>
                                        {{-- <td> {{ Now()->format('Y-m-d') }} </td> --}}
                                    </tr>
                                    <tr>
                                        <th style="text-align: center"> تقرير شهر {{ Now()->format('M') }} </th>
                                        {{-- <td> {{ $trip->id }} </td> --}}
                                    </tr>

                                </tbody>
                            </table>

                            <div style="margin-bottom: 0px">&nbsp;</div>

                            <table class="w-full">
                                <tbody>
                                    <tr class="well" style="padding: 5px">
                                        <th style="padding: 5px;text-align: center">
                                            <div>الدم المتبرع به حسب الفصيلة</div>
                                        </th>
                                        <td style="padding: 5px"><strong> </strong></td>
                                    </tr>
                                </tbody>
                            </table>


                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">الشهر</th>
                                <th scope="col">A+</th>
                                <th scope="col">A-</th>
                                <th scope="col">B+</th>
                                <th scope="col">B-</th>
                                <th scope="col">AB+</th>
                                <th scope="col">AB-</th>
                                <th scope="col">O+</th>
                                <th scope="col">O-</th>
                                <th scope="col">المجموع</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>

                    <hr>


                </div>
            </div>
        </div>
    </div>

</body>

</html>
