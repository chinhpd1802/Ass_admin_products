<?php if (!defined('IN_SITE')) die ('The request not found');
if (empty($_SESSION['email'])){
    redirect(base_url('admin/?m=common&a=login'));
}
?>
<?php include_once('share/header.php'); 
    include_once('share/sidebar.php'); 
    require_once 'config.php';?>
<?php 
 $msg=array();
if (isset($_POST['upload'])) {
       
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
   $id=$_POST['id'];
   $name=$_POST['dname'];
   $title=$_POST['title'];
   $price=$_POST['price'];
   $pricesale=$_POST['pricesale'];
   
   
   $checkId=$mysql->query("select * from products where product_id='$id';");
   if($checkId->num_rows > 0){
           $msg['id']="ID aleary exist ! ";
   
   }
   else{
    
    // image file directory
    $target = "../upload/".basename($image);
    
    $sql = "INSERT INTO products (product_id,product_name,id_catagory,price_shop,price_market,path_img) VALUES ('$id', '$name', '$title', '$price','$pricesale','$image');";
    // execute query
    mysqli_query($mysql, $sql);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo '<p> Add Product Successfuly !</p>';
        
    }else{
       
    }
    }
  
}
$mysql->close();

?>

<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>

        </div>
    </nav>
    <!-- Default form register -->
    <form class="positionss text-center border border-light p-5" action="<?php echo base_url('admin/?m=admin_user&a=add'); ?>" method="post" enctype="multipart/form-data">
        <p class="h4 mb-4">Product Infomation </p>

        <div class="form-row mb-4">
            <div class="col">
                <!-- ID -->
                <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="ID" name="id">
                <span><?php echo $msg['id'];?></span>
            </div>
            <div class="col">
                <!-- Name-->
                <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Name Product" name="dname">
            </div>
        </div>

        <!-- Title -->
        <input type="text" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="Title" name="title">

       
       

        <!-- price -->
        <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Price" name="price"
            aria-describedby="defaultRegisterFormPhoneHelpBlock">
        <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
           
        </small>

         <!-- pricesale -->
        <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Sale:..%" name="pricesale"
            aria-describedby="defaultRegisterFormPhoneHelpBlock">
        <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
           
        </small>
       
        
        <div class="form-group row">
            <label class="col-sm-5">
                <div class="ftitle">
                    <p> Image :</p>
                </div>
            </label>
            <div class="col-sm-7">
                <input type="file" class="form-control" name="image">
            </div>
        </div>

        <!-- add button -->
        <button class="btn btn-info my-4 btn-block" type="submit" name ="upload" class="fix-color" >ADD PRODUCT</button>
    </form>

    <!-- Default form add -->
</div>

<?php   include_once 'share/footer.php'; ?>