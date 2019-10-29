<?php if (!defined('IN_SITE')) die ('The request not found');
    $error = array();
    require 'config.php';
// BƯỚC 1: KIỂM TRA NẾU LÀ ADMIN THÌ REDIRECT
if (!empty($_SESSION['email'])){
    redirect(base_url('admin/?m=common&a=dashboard'));
}
 

// BƯỚC 2: NẾU NGƯỜI DÙNG SUBMIT FORM
if (isset($_POST["login"]))
{    
    // lấy tên đăng nhập và mật khẩu
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Kiểm tra tên đăng nhập
    if (empty($username)){
        $error['email'] = 'Please, Enter your Email';
    }
     
    // Kiểm tra mật khẩu
    if (empty($password)){
        $error['password'] = 'Please, Enter your Password';
    }
     
    // Nếu không có lỗi
    else {
        # code...
    
        // include file xử lý database user
        $email = htmlspecialchars($_POST['email']);

        // nếu mọi thứ ok thì tức là đăng nhập thành công 
        // nên thực hiện redirect sang trang chủ
        $result=$mysql->query("select * from users where email='$email';");

if ($result->num_rows == 0) {
    # code...
    $_SESSION['message']="User dosen't exits !";
     $error['email']='Not have this email !';
    redirect(base_url('?m=common&a=404.php'));
}
else {
    # code...
    $user=$result->fetch_assoc();
    
  
    $psass=md5($_POST['password']);
    if ($_POST["password"]=== $user['passwords']){
        # code...
        $_SESSION['email']=$user['email'];
        $_SESSION['password']=$user['passwords'];
        $_SESSION['level'] =$user['user_level'];
            
        echo redirect(base_url('admin/?m=common&a=dashboard'));
      
       
    }
    else {
        $error['password']='Password is not correct !';
       // set_logged_logged($user['email'],$user['user_level']);
        redirect(base_url('admin/?m=common&a=404.php'));
    }
}
}
$mysql->close();
    }

 
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../public/css/login_admin.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
   
</head>

<body>
   

        <div class="limiter-form">
            
            <div class="container-login">
                <div class="wrap-login">
                    <form action="<?php echo base_url('admin/?m=common&a=login'); ?>" method="POST" class="login-form validate-form">
                        <span class="login-form-title">

                           ADMIN LOGIN
                        </span>
                        <div class="container-wrap-input">
                        <div class="wrap-input validate-input">
                            <input type="email" class="input" name="email" id="inputEmail4" placeholder="Email">
                             <span id="email-error" class="error"><?php echo $error['email']?></span>
                        </div>                    
                        <div class="wrap-input validate-input">
                            <input type="Password" class="input" name="password" id="inputPassword4"  placeholder="Password">
                            <span id="pass-error" class="error"><?php echo $error['password']?></span>
                        </div>  
                        </div>
                        <div class="container-login-form-btn">
                        <button class="login-form-btn" name="login" value="Login">
                        
                        Sign in
                        </button>
                        </div>

                        <div class="noacc">
                            <span class="tex1">
                                Don't have an account?
                            </span>
                            <a href="#" class="signup">
                            Sign up now
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
         <script>
            function isEmail(emailStr) {
            var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

            if (filter.test(emailStr)) {

                return true;

            }

            else {

                return false;

            }

        }
             $(document).ready(function () {
            $('.validate-form').focusout(function () {
                var email = $.trim($('#inputEmail4').val());
                var pass = $.trim($('#inputPassword4').val());

                var flag = true;

                if (email.length == 0) {

                    $('#email-error').text('Please, Enter Your Email !');
                    $('#email-error').css("color", "red");
                    flag = false;
                }
                else if (isEmail(email) == false) {
                    $('#email-error').text('Email is not correct format !');
                    $('#email-error').css("color", "red");
                    flag = false;
                }
                else {
                    $('#email-error').text('Email Vaild');
                    $('#email-error').css("color", "green");
                }

                if (pass.length <= 0) {
                    $('#pass-error').text('Please, Enter Your Password');
                    $('#pass-error').css("color", "red");
                    flag = false;
                }
                else if (pass.length > 8 || pass.length < 4) {
                    $('#pass-error').text('Password must be have 4-8 characters');
                    $('#pass-error').css("color", "red");
                    flag = false;
                }
                else {
                    $('#pass-error').text('Password Vaild');
                    $('#pass-error').css("color", "green");
                }
                return flag;


            });

        });
        
        </script>
</body>

</html>