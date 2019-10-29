<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrator ShopVCTA </title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../public/css/admin_fr.css">
    
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
     <script language="javascript" type = "text/javascript"> 
    function CheckUpdate() {
        return confirm('Are you sure to UPDATE this Product ? ');
    }
    function checkDelete() {
        return confirm('Are you sure to DELETE this Product ? ');
    }
   
   </script>
</head>


<body>
    <div class="head-dashboard">
        <div class="item title">
            VTCA SHOP
        </div>
        <div class="item setting">
            <div class="set">
                <a href="../../app/site/index.php">Visit Site</a>
            </div>
        </div>
        <div class="item search">

            <img src="../public/icon/search.svg" alt="" width="18px" height="18px" class="icon-search">

            <input type="text" class="input" name="email" placeholder="Search...">
        
        </div>
        <div class="item link-profile">
            Xin chào <?php echo $_SESSION['email']; ?> |
            <a href="<?php echo base_url('admin/?m=common&a=logout'); ?>">Logout</a>
        </div>
    </div>




 
