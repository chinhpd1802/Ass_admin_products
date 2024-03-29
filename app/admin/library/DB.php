<?php
function db_get_list($sql){
    
    global $mysql;
    $data  = array();
    $result = mysqli_query($mysql, $sql);
    while ($row = mysqli_fetch_assoc($result)){
        $data[]=  $row;
    }
    return $data;
}
 
// Hàm lấy chi tiết, dùng select theo ID vì nó trả về 1 record
function db_get_row($sql){
    
    global $mysql;
    $result = mysqli_query($mysql, $sql);
    $row = array();
    if (mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }    
    return $row;
}
 
// Hàm thực thi câu truy  vấn insert, update, delete
function db_execute($sql){
    
    global $mysql;
    return mysqli_query($mysql, $sql);
}
// Hàm tạo câu truy vấn có thêm điều kiện Where
function db_create_sql($sql, $filter = array())
{    
    // Chuỗi where
    $where = '';
     
    // Lặp qua biến $filter và bổ sung vào $where
    foreach ($filter as $field => $value){
        if ($value != ''){
            $value = addslashes($value);
            $where .= "AND $field = '$value', ";
        }
    }
     
    // Remove chữ AND ở đầu
    $where = trim($where, 'AND');
    // Remove ký tự , ở cuối
    $where = trim($where, ', ');
     
    // Nếu có điều kiện where thì nối chuỗi
    if ($where){
        $where = ' WHERE '.$where;
    }
     
    // Return về câu truy vấn
    return str_replace('{where}', $where, $sql);
}



?>