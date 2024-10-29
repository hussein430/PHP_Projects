<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الاسئلة الشائعة</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Font Awesome -->
    <link href="fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="fontawesome/css/brands.css" rel="stylesheet">
    <link href="fontawesome/css/solid.css" rel="stylesheet">

</head>

<body>
    <div>
        <table class="table_heading">
            <tr>
                <td>
                    <p>صفحة الاسئلة الشائعة</p>
                </td>
                <td><a href="index.php"><img src="img/arrowBack.gif" alt="arrow" class="arrowBack"></a></td>
            </tr>
        </table>
    </div>

    <div class="Ask_location">
        <button class="ask_btn">اين مقر الشركة</button>
        <div class="info">
            <p>مقر الشركة في بغداد</p>
        </div>
    </div>

    <div class="Ask_Delivery">
        <button class="ask_btn">هل تتوفر خدمة توصيل</button>
        <div class="info">
            <p>نعم تتوفر خدمة توصيل</p>
            <p>يمكنك الأتصال على الرقم التالي </p>
            <p>077111111</p>
            <p>لحجز طلبك</p>
        </div>
    </div>

    <div class="Ask_Price">
        <button class="ask_btn">لماذا الأسعار رخيصة</button>
        <div class="info">
            <p>أسعارنا بلجملة</p>
        </div>
    </div>

    <script>
        var hussein = document.getElementsByClassName("ask_btn");
        var i;
        for (i = 0; i < hussein.length; i++) {
            hussein[i].addEventListener("click", function() {
                this.classList.toggle("click_btn");
                var space = this.nextElementSibling;
                if (space.style.maxHeight) {
                    space.style.maxHeight = null;
                } else {
                    space.style.maxHeight = space.scrollHeight + "px";
                }
            });
        }
    </script>

</body>

</html>