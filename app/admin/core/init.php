<?php

//Kết nối database
    require_once 'config/config.php';
    require_once 'library/function_lib.php';

    //Thông tin chung
    $_DOMAIN='http://localhost:8899/ASS_PRODUCT_MANAGEMENT/app/admin';
    date_default_timezone_set('Asia/Ho_Chi_Minh'); 
    $date_current = '';
    $date_current = date("Y-m-d H:i:sa");

    //khởi tạo session

    session_start();

    if (isset($_SESSION['user']))
    {
        $user = $_SESSION['user'];
    }
    else
    {
        $user = '';
    }

?>