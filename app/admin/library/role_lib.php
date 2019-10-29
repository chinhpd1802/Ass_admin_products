<?php
    session_start();
    function set_logged($email, $level){
        $_SESSION['ss_user_token']=array(
            'email' =>$email,
            'user_level' => $level
        );
    }

    function set_logout(){
        
        session_destroy();
    }


    function is_logged(){
        $user= $_SESSION['ss_user_token'];
        return $user;
    }
    function is_admin(){
        $user= is_logged();
        if (!empty($user['user_level']) && $user['user_level'] == '1') {
            # code...
            echo "là admin";
            return true;
        }
        return false;
    }
    // Lấy username người dùng hiện tại
function get_current_username(){
    $user  = is_logged();
    return isset($user['email']) ? $user['email'] : '';
}

function is_supper_admin(){
    $user = is_logged();
    if (!empty($user['user_level']) && $user['user_level'] == '1' && $user['username'] == 'Admin'){
        return true;
    }
    false;
}
?>