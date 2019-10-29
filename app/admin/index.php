<?php
define("IN_SITE", true);


// Lấy module và action trên URL

 
$module = isset($_GET['m']) ? $_GET['m'] : '';
$action = isset($_GET['a']) ? $_GET['a'] : '';
 
// Trường hợp người dùng không truyền module và action
// thì ta lấy module mặc định là common
// và action mặc định là login
if (empty($module) || empty($action)){
    $module = 'common';
    $action = 'login';
}
 
// Tạo đường dẫn và lưu vào biến $path
$path = 'modules/'.$module . '/' . $action . '.php';
 
// Trường hợp URL chạy đúng
if (file_exists($path)) {
    
    include_once ('library/session_lib.php');
    include_once ('library/DB.php');
    //include_once ('config/config.php');
    include_once ('library/role_lib.php');
    include_once ('library/helper_lib.php');
   // include_once ('library/functon_lib.php');
    include_once ($path);
    require_once($path);
} 
else {
    // Trường hợp URL không tồn tại thì thông báo lỗi
    include_once ('modules/common/404.php');
}

?>