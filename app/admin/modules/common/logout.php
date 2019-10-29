<?php 
if (!defined('IN_SITE')) die('The request not found'); 
 
// Xóa session login
//
 session_destroy();
// Chuyển hướng sang trang login
redirect(base_url('admin/?m=common&a=login'));


?>