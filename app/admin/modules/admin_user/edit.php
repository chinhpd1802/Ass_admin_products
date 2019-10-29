<?php if (!defined('IN_SITE')) die ('The request not found');
if (empty($_SESSION['email'])){
    redirect(base_url('admin/?m=common&a=login'));
}
?>
<?php 
 include_once 'share/header.php';
 include_once 'share/sidebar.php';
 require_once 'config.php';?>
<?php 

if (isset($_GET['productid'])) {
    # code...
    $id=htmlspecialchars($_GET['productid'],ENT_QUOTES);
    
}elseif (isset($_POST['productid'])) {
    # code...
    $id=htmlspecialchars($_POST['productid'],ENT_QUOTES);
}
else {
    
    echo "<p> This page has been accessed in error ! </p>";
}
if (isset($_POST["update"])) {
    
    
       
   $image = $_FILES['image']['name'];
  
       $name=$_POST['dname'];
       $title=$_POST['title'];
       $price=$_POST['price'];
       $pricesale=$_POST['pricesale'];

          $target = "../upload/".basename($image);
       $p_query = 'update products set product_name=?, id_catagory=?, price_shop=? ,price_market=?,path_img=?  where product_id=? limit 1';
       $p_stmt=$mysql->stmt_init();
       $p_stmt->prepare($p_query);
       $p_stmt->bind_param('ssddss',$name,$title,$price,$pricesale,$image,$id);
       $p_stmt->execute();
       
       if ($p_stmt->affected_rows==1){
           
           echo '<p class= "check" > Compelete </p>';
          
           
       }
       else {
           # code...
           echo '<h3> The Product could not edited </h3>';
       }
       if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
           
           echo '<p class= "check" > Compelete </p>';
          
           
       }
       else {
           # code...
           echo '<h3> The Product could not edited </h3>';
       }
       
      
}
$sql="select * from products where product_id='{$id}'";
$product= db_get_row($sql);

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
    <!-- Default form edit -->
    <form
        action="<?php echo create_link(base_url('admin/index.php'), array('m' => 'admin_user', 'a' => 'edit', 'productid' => $id)); ?>"
        method="POST" class="positionss text-center border border-light p-5" enctype="multipart/form-data"
        onsubmit="return CheckUpdate()">
        <p class="h4 mb-4">Edit Product : ID <?php echo $id ?> </p>

        <div class="form-row mb-4">

            <div class="col">
                <!-- name -->
                <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Name Product"
                    name="dname" value="<?php if (isset($product['product_name'])) {
                        # code...
                        echo htmlspecialchars($product['product_name'],ENT_QUOTES) ;
                    }  ?>">
            </div>
        </div>

        <!-- Title -->
        <input type="text" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="Title" name="title"
            value="<?php if (isset($product['id_catagory'])) {
                        # code...
                        echo htmlspecialchars($product['id_catagory'],ENT_QUOTES) ;
                    }  ?>">




        <!-- price -->
        <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Price" name="price"
            aria-describedby="defaultRegisterFormPhoneHelpBlock" value="<?php if (isset($product['price_shop'])) {
                        # code...
                        echo htmlspecialchars($product['price_shop'],ENT_QUOTES) ;
                    }  ?>">
        <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">

        </small>
         <!-- price sale -->
        <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Sale" name="pricesale"
            aria-describedby="defaultRegisterFormPhoneHelpBlock" value="<?php if (isset($product['price_market'])) {
                        # code...
                        echo htmlspecialchars($product['price_market'],ENT_QUOTES) ;
                    }  ?>">
        <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">

        </small>
        <input type="hidden" name="productid" value="<?php echo $id; ?>" />
       


        <div class="form-group row">
            <label class="col-sm-5">
                <div class="ftitle">
                    <p> Image :</p>
                </div>
            </label>
            <div class="col-sm-7">
                <input type="file" class="form-control" name="image" value="<?php 
                        # code...
                        echo htmlspecialchars($product['path_img'],ENT_QUOTES) ;
                    ?>">
            </div>
        </div>

        <!-- update button -->
        <button class="btn btn-info my-4 btn-block" type="submit" name="update">UPDATE PRODUCT</button>
    </form>

    <!-- Default form update -->
</div>
<?php 

     include_once 'share/footer.php';
?>