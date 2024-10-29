<?php

    setcookie("Token" , null , '-1' , '/') ;
    setcookie("User" , null , '-1' , '/') ;
    setcookie("hussein" , null , '-1' , '/') ;

    echo '
    <link rel="stylesheet" href="css/style.css">
    <body class="body-pop-up-already_login">
        <div class="pop_up_already_login">
            <img src="img/comp_3.gif" />
            <p class="pop_up_p">تم تسجيل المغادرة</p>
        </div>
    </body>
    <meta http-equiv="refresh" content="3 , url=index.php"/>
    ';

?>
