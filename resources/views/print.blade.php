<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<td style="text-align: right">
    <?php echo DNS1D::getBarcodeHTML("12", 'EAN13'); ?>

</td>

<button class="button buttonphp4" onclick="window.print()">
    <i class="fa fa-print"></i>
    <span>طباعة</span>
</button>
</body>
</html>
