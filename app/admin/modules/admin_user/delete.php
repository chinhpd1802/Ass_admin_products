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
 $msg=array();
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
if(isset($_POST['delete'])){
$d_stmt=$mysql->stmt_init();
$d_query = "delete from products where product_id=? limit 1";
$d_stmt->prepare($d_query);
$d_stmt->bind_param('s',$id);
$d_stmt->execute();
if ($_stmt->affected_rows==1) {
    # code...
   $msg['delete']= "The Product has been Deleted!";
  
}
$d_stmt ->close();
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
    <!-- Default form delete -->
    <form
        action="<?php echo create_link(base_url('admin/index.php'), array('m' => 'admin_user', 'a' => 'delete', 'productid' => $id)); ?>"
        method="POST" class="positionss text-center border border-light p-5" enctype="multipart/form-data"
        onsubmit="return checkDelete()">
        <p class="h4 mb-4">Infomation Product : ID <?php echo $product['product_id'] ?> </p>

        <div class="form-row mb-4">

            <div class="col">
                <!-- name -->
                <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Name Product"
                    name="dname" value="<?php if (isset($product['product_name'])) {
                        # code...
                        echo htmlspecialchars($product['product_name'],ENT_QUOTES) ;
                    }  ?>" disabled>
            </div>
        </div>

        <!-- Title -->
        <input type="text" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="Title" name="title"
            value="<?php if (isset($product['id_catagory'])) {
                        # code...
                        echo htmlspecialchars($product['id_catagory'],ENT_QUOTES) ;
                    }  ?>" disabled>




        <!-- price -->
        <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Price" name="price"
            aria-describedby="defaultRegisterFormPhoneHelpBlock" value="<?php if (isset($product['price_shop'])) {
                        # code...
                        echo htmlspecialchars($product['price_shop'],ENT_QUOTES) ;
                    }  ?>" disabled>
        <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">

        </small>
         <!-- price sale -->
        <input type="text" id="defaultRegisterPhonePassword" class="form-control" placeholder="Sale" name="pricesale"
            aria-describedby="defaultRegisterFormPhoneHelpBlock" value="<?php if (isset($product['price_market'])) {
                        # code...
                        echo htmlspecialchars($product['price_market'],ENT_QUOTES) ;
                    }  ?>" disabled>
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
                    ?>" disabled>
            </div>
        </div>

        <!-- delete button -->
        <button class="btn btn-info my-4 btn-block" type="submit" name="delete">Delete PRODUCT</button>
    </form>
    <span> <?php echo $msg['delete']; ?></span>

    <!-- Default form delete -->
</div>

<?php  include_once 'share/footer.php'?>