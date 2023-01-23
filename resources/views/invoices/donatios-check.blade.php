<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css?family=Amarante');

    html,
    body,
    div,
    span,
    applet,
    object,
    iframe,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    blockquote,
    pre,
    a,
    abbr,
    acronym,
    address,
    big,
    cite,
    code,
    del,
    dfn,
    em,
    img,
    ins,
    kbd,
    q,
    s,
    samp,
    small,
    strike,
    strong,
    sub,
    sup,
    tt,
    var,
    b,
    u,
    i,
    center,
    dl,
    dt,
    dd,
    ol,
    ul,
    li,
    fieldset,
    form,
    label,
    legend,
    table,
    caption,
    tbody,
    tfoot,
    thead,
    tr,
    th,
    td,
    article,
    aside,
    canvas,
    details,
    embed,
    figure,
    figcaption,
    footer,
    header,
    hgroup,
    menu,
    nav,
    output,
    ruby,
    section,
    summary,
    time,
    mark,
    audio,
    video {
        margin: 0;
        padding: 0;
        border: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
        outline: none;
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    html {
        overflow-y: scroll;
    }

    body {
        background: #eee url('https://i.imgur.com/eeQeRmk.png');
        /* https://subtlepatterns.com/weave/ */
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 62.5%;
        line-height: 1;
        color: #585858;
        padding: 22px 10px;
        padding-bottom: 55px;
    }

    ::selection {
        background: #5f74a0;
        color: #fff;
    }

    ::-moz-selection {
        background: #5f74a0;
        color: #fff;
    }

    ::-webkit-selection {
        background: #5f74a0;
        color: #fff;
    }

    br {
        display: block;
        line-height: 1.6em;
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
        display: block;
    }

    ol,
    ul {
        list-style: none;
    }

    input,
    textarea {
        -webkit-font-smoothing: antialiased;
        -webkit-text-size-adjust: 100%;
        -ms-text-size-adjust: 100%;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        outline: none;
    }

    blockquote,
    q {
        quotes: none;
    }

    blockquote:before,
    blockquote:after,
    q:before,
    q:after {
        content: '';
        content: none;
    }

    strong,
    b {
        font-weight: bold;
    }

    table {
        border-collapse: collapse;
        border-spacing: 0;
    }

    img {
        border: 0;
        max-width: 100%;
    }

    h1 {
        font-family: 'Amarante', Tahoma, sans-serif;
        font-weight: bold;
        font-size: 3.6em;
        line-height: 1.7em;
        margin-bottom: 10px;
        text-align: center;
    }


    /** page structure **/
    #wrapper {
        display: block;
        width: 850px;
        background: #fff;
        margin: 0 auto;
        padding: 10px 17px;
        -webkit-box-shadow: 2px 2px 3px -1px rgba(0, 0, 0, 0.35);
    }

    #keywords {
        margin: 0 auto;
        font-size: 1.2em;
        margin-bottom: 15px;
    }


    #keywords thead {
        cursor: pointer;
        background: #c9dff0;
    }

    #keywords thead tr th {
        font-weight: bold;
        padding: 12px 30px;
        padding-left: 42px;
    }

    #keywords thead tr th span {
        padding-right: 20px;
        background-repeat: no-repeat;
        background-position: 100% 100%;
    }

    #keywords thead tr th.headerSortUp,
    #keywords thead tr th.headerSortDown {
        background: #acc8dd;
    }

    #keywords thead tr th.headerSortUp span {
        background-image: url('https://i.imgur.com/SP99ZPJ.png');
    }

    #keywords thead tr th.headerSortDown span {
        background-image: url('https://i.imgur.com/RkA9MBo.png');
    }


    #keywords tbody tr {
        color: #555;
    }

    #keywords tbody tr td {
        text-align: center;
        padding: 15px 10px;
    }

    #keywords tbody tr td.lalign {
        text-align: left;
    }
</style>

<body dir="rtl">
    <div id="wrapper">
        <h1>فحوصات المتبرعين</h1>

        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th colspan="2"><span>HCV</span></th>
                    <th colspan="2"><span>HBV</span></th>
                    <th colspan="2"><span>HIV</span></th>
                    <th colspan="2"><span>SYPHILIS</span></th>
                </tr>
                <tr>
                    <th colspan="1"><span>Reactive</span></th>
                    <th><span>Non-Reactive</span></th>

                    <th colspan="1"><span>Reactive</span></th>
                    <th><span>Non-Reactive</span></th>

                    <th colspan="1"><span>Reactive</span></th>
                    <th><span>Non-Reactive</span></th>

                    <th colspan="1"><span>Reactive</span></th>
                    <th><span>Non-Reactive</span></th>


                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="1">801</td>
                    <td>3</td>
                    <td colspan="1">801</td>
                    <td>65</td>

                    <td colspan="1">801</td>
                    <td>7</td>

                    <td colspan="1">801</td>
                    <td>45</td>

            </tbody>
        </table>
    </div>
    <div id="wrapper">
        <h3>عدد المتبرعين الذين لم يسحب منهم لأسباب:</h3>

        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th><span>الشهر</span></th>
                    <th><span>عدد المتبرعين</span></th>
                    <th><span>هيمقلوبين منخفض</span></th>
                    <th><span> إستبعاد من الطبيب</span></th>
                    <th rowspan="1" colspan="4"><span>فحوصات المتبرعين</span></th>
                    <th><span>لم يكتمل السحب</span></th>
                    <th><span> لائق</span></th>

                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>
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
                    <td style="text-align: center">801</td>
                    <td style="text-align: center">0</td>
                    <td style="text-align: center">42</td>
                    <td style="text-align: center">65</td>
                    <td style="text-align: center">3</td>
                    <td style="text-align: center">45</td>
                    <td style="text-align: center">3</td>
                    <td style="text-align: center">0</td>
                    <td style="text-align: center">639</td>




                </tr>

            </tbody>
        </table>
    </div>
    <div id="wrapper">
        <h3>استبعاد من الطبيب</h3>

        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th><span>استبعاد من الطبيب</span></th>
                    <th><span>علاجات مستديمه</span></th>
                    <th><span>امراض مزمنه</span></th>
                    <th><span> هيمقلوبين مرتفع</span></th>
                    <th><span>هيمقلوبين منخفض</span></th>
                    <th><span> ضغط دم مرتفع</span></th>
                    <th><span>ضغط دم منخفض</span></th>
                    <th><span> اسباب اخري</span></th>
                    <th><span> عدد اللائقين</span></th>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>المجموع</td>
                    <td>4</td>
                    <td>2</td>
                    <td>8</td>
                    <td>4</td>
                    <td>9</td>
                    <td>5</td>
                    <td>10</td>
                    <td>639</td>


            </tbody>
        </table>
    </div>
    <div id="wrapper">
        <h3> اسباب اخري</h3>

        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th><span> العدد</span></th>
                    <th><span>يستعمل مضاد حيوي</span></th>
                    <th><span> الوزن قليل</span></th>
                    <th><span>العمر اقل من 18</span></th>
                    <th><span> خلع ضرس</span></th>
                    <th><span> عدد اللائقين</span></th>


                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>المجموع</td>
                    <td>4</td>
                    <td>2</td>
                    <td>8</td>
                    <td>4</td>
                    <td>639</td>


            </tbody>
        </table>
    </div>
    <div id="wrapper">
        <h3> جدول يوضح مرضي زياده الدم</h3>

        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>#</th>
                    <th><span> النوع</span></th>
                    <th><span>العدد</span></th>


                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>مدني</td>
                    <td>29</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>تأمين عسكري</td>
                    <td>51</td>
                </tr>
                <tr>
                    <td> 3</td>
                    <td> المجموع</td>
                    <td>80</td>
                </tr>


            </tbody>
        </table>
    </div>
    <div id="wrapper">
        <h3> جدول يوضح إقتصاد داخل السلاح</h3>

        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>الشهر</th>
                    <th><span>العدد</span></th>


                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>سبتمر</td>
                    <td>120</td>
                </tr>

            </tbody>
        </table>
    </div>
    <div id="wrapper">
        <h3> جدول يوضح إقتصاد خارج السلاح</h3>

        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>الشهر</th>
                    <th><span>العدد</span></th>


                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>سبتمر</td>
                    <td>8</td>
                </tr>

            </tbody>
        </table>
    </div>
    <div id="wrapper">
        <h3>الدم المنصرف داخل السلاح حسب الفصيله </h3>

        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th><span>الشهر </span></th>
                    <th><span> A+</span></th>
                    <th><span> A-</span></th>
                    <th><span> B+ </span></th>
                    <th><span> B-</span></th>
                    <th><span> AB+</span></th>
                    <th><span> AB-</span></th>
                    <th><span> O+</span></th>
                    <th><span> O-</span></th>
                    <th><span> المجموع</span></th>

                </tr>

            </thead>
            <tbody>
                <tr>
                    <td>العدد</td>
                    <td>108</td>
                    <td>48</td>
                    <td>206</td>
                    <td>46</td>
                    <td>78</td>
                    <td>30</td>
                    <td>208</td>
                    <td>37</td>
                    <td>758</td>



            </tbody>
        </table>
    </div>
    <div id="wrapper">
        <h3> الدم المنصرف داخل السلاح حسب المستشفيات والأقسام</h3>

        <table id="keywords" cellspacing="0" cellpadding="0">
            <thead>
                <tr>
                    <th>القسم</th>
                    <th><span>العدد</span></th>


                </tr>

            </thead>
            <tbody>

                <tr>
                    <td>الطوارئ والإصابات</td>
                    <td>198</td>
                </tr>
                <tr>
                    <td>العائلات </td>
                    <td>180</td>
                </tr>
                <tr>
                    <td>الأطفال </td>
                    <td>82</td>
                </tr>
                <tr>
                    <td>الأنف والأذن والحنجرة </td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>الباطنيه </td>
                    <td>15</td>
                </tr>
                <tr>
                    <td>الجراحه </td>
                    <td>98</td>
                </tr>
                <tr>
                    <td>العظام </td>
                    <td>75</td>
                </tr>
                <tr>
                    <td>غسيل الكلس </td>
                    <td>62</td>
                </tr>
                <tr>
                    <td>العناية </td>
                    <td>25</td>
                </tr>
                <tr>
                    <td>العظام </td>
                    <td>75</td>
                </tr>
                <tr>
                    <td>المسالك </td>
                    <td>6</td>
                </tr>
                <tr>
                    <td>الجلديه </td>
                    <td>4</td>
                </tr>
                <tr>
                    <td>المجموع </td>
                    <td>758</td>
                </tr>

            </tbody>
        </table>
    </div>
</body>

</html>
