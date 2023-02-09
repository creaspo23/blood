<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Oazri Recipt </title>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/font-awesome.css') }}">
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            /* text-align: right; */
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .order-buttons {
            padding: 15px;
            text-align: center;
        }

        @media print {
            .order-buttons {
                display: none;
            }

            /* .table>thead>tr>th{
                border-color: black;
            }
            .table>tbody>tr>td{
                border-top: none;
            } */
        }

        /* .invoice-box.rtl table tr td:nth-child(2) {
    text-align: left;
   } */

        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button4 {
            background-color: white;
            color: black;
            border: 2px solid #e7e7e7;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                <table>
                        <tr>
                            <td width="35%">General Staff headquarte<br>department medical Service <br>Laboratory department<br>Central Blood Bank<br>No : M/D/M<br>DATE : {{ now()->format('Y-m-d') }}</td>
                             <td> <img src="{{ asset('/assets/images/new.jpeg') }}"
                                style="
                                    justify-content:flex-start;  max-width: 180px" /></td>
                            <td width="35%" style="padding-left:90px">الادارة العامة للخدمات الطبية<br>ادارة الطب العلاجي/شعبة المعامل<br>مصرف الدم المركزي<br>نمرة : م / د / م<br> التاريخ: {{ now()->format('Y-m-d') }}</td>
                                    
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td dir>
                                {{-- {{$order->customer->name}}<br />
									{{$order->customer->user->phone}} <br />
                                    {{$order->address}} <br />
									{{$address}} <br />
									@if ($delivery['status'] != 0)
									{{ $delivery['data']['ref_no'] }}
									@endif --}}
                            </td>

                            {{-- <td style="text-align: right">
									<span style="font-size: 15px;">Order No:</span> <span style="font-weight: bold;">#{{$order->id}}</span><br />
									<span style="font-size: 15px;">Order Date :</span> <span style="font-weight: bold;"> {{ \Carbon\Carbon::createFromTimestamp(strtotime($order->created_at))->format('d-m-Y')}}</span><br />
									<span style="font-size: 15px;">Shipping Method:</span> <span style="font-weight: bold;">Reguler</span><br />
								</td> --}}
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
            <div id="wrapper">
                <h3  dir="rtl" style="margin-bottom: 30px">عدد المتبرعين الذين لم يسحب منهم لأسباب:</h3>
        
                <table id="keywords" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th><span>الشهر</span></th>
                            <th><span>عدد المتبرعين</span></th>
                            <th><span>هيمقلوبين منخفض</span></th>
                            <th><span> إستبعاد من الطبيب</span></th>
                            <th rowspan="1" colspan="4" ><span style="margin-left: 20px;">فحوصات المتبرعين</span></th>
                            <th><span>لم يكتمل السحب</span></th>
                            <th><span> لائق</span></th>
        
                        </tr>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>HCV </th>
                            <th>HBV</th>
                            <th>HIV</th>
                            <th>SYPHILIS</th>
        
                            </th>
                        </tr>
        
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center">العدد</td>
                            <td style="text-align: center">{{$donerCount}}</td>
                            <td style="text-align: center">{{$lowHemoglobin}}</td>
                            <td style="text-align: center">{{$ExclusionFromTheDoctor}}</td>
                            <td style="text-align: center">{{$HCV}}</td>
                            <td style="text-align: center">{{$HBV}}</td>
                            <td style="text-align: center">{{$HIV}}</td>
                            <td style="text-align: center">{{$SYPHILIS}}</td>
                            <td style="text-align: center">{{$unCompleteWithDraw}}</td>
                            <td style="text-align: center">{{$Decent}}</td>
        
        
        
        
                        </tr>
        
                    </tbody>
                </table>
            </div>
        

        <table style="padding-top: 40px;">
            <tr>
                <td style="text-align: center">
                    أمدرمان السلاح الطبي<br /> <br/>
                    بنك الدم
                </td>
            </tr>
        </table>
    </div>
    <div class="order-buttons">
        <button class="button button4" onclick="window.print()">
            <i class="fa fa-print"></i>
            <span>طباعة</span>
        </button>
        <a href="{{ url()->previous() }}" class="button button4">
            <i class="fa fa-arrow-left"></i>
            <span>رجوع</span>
        </a>
    </div>
</body>

</html>
