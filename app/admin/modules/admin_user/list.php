<?php if (!defined('IN_SITE')) die ('The request not found');
 
    // Kiểm tra quyền, nếu không có quyền thì chuyển nó về trang logout
    if (empty($_SESSION['email'])){
       redirect(base_url('admin'), array('m' => 'common', 'a' => 'logout'));

    
      
    }
   
?>



<?php include_once('share/header.php'); 
    include_once('share/sidebar.php'); 
    require_once 'config.php';?>

<?php 
    // VỊ TRÍ 01: CODE XỬ LÝ PHÂN TRANG 
   
    // Tìm tổng số records
    $sql = db_create_sql('SELECT count(product_id) as counter from products {where}');
$result = db_get_row($sql);
$total_records = $result['counter'];
    
    // Lấy trang hiện tại
    $current_page = isset($_GET['page']) ? $_GET['page'] : '';

    // Lấy limit
    $limit = 5;
 
    // Lấy link
    $link = create_link(base_url('admin'), array(
        'm' => 'admin_user',
        'a' => 'list',
        'page' => '{page}'
    ));
  
    //echo $link;
    // Thực hiện phân trang
   $paging = paging($link, $total_records, $current_page, $limit);
   
 
    // Lấy danh sách User
    $sql = db_create_sql("SELECT * FROM products {where} LIMIT {$paging['start']}, {$paging['limit']}");
    $products = db_get_list($sql);
?>
<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>

            </button>
        </div>
   
    </nav>
    <h1>Danh sách sản phẩm</h1>
    <div class="controls">
        <a class="button"
            href="<?php echo create_link(base_url('admin'), array('m' => 'admin_user', 'a' => 'add')); ?>">Thêm</a>
    </div>
    <table id="dt-material-checkbox" class="table table-striped" cellspacing="0" width="100%" style="margin:auto">
        <thead>
            <tr>
                <th class="th-sm">Product ID
                </th>
                <th class="th-sm">Name
                </th>
                <th class="th-sm">Title
                </th>
                <th class="th-sm">Price
                </th>
                
                <th class="th-sm">Image
                </th>
                <th class="th-sm" style="color:blue;">Action
                </th>
            </tr>
        </thead>
        <?php // VỊ TRÍ 02: CODE HIỂN THỊ NGƯỜI DÙNG ?>
        <?php foreach ($products as $item){ ?>
        <tr>
            <td><?php echo $item['product_id']; ?></td>
            <td><?php echo $item['product_name']; ?></td>
            <td><?php echo $item['id_catagory']; ?></td>
            <td><?php echo $item['price_shop']; ?></td>
            <td><img src="<?php echo '../upload/'.$item['path_img'];?>"alt="product" width =50px height=50px></td>
            <td>
               
                    <a style="color:blue;"
                        href="<?php echo create_link(base_url('admin'), array('m' => 'admin_user', 'a' => 'edit', 'productid' => $item['product_id'])); ?>">Edit</a>
                    
                    <a style="color:red;"
                        href="<?php echo create_link(base_url('admin'), array('m' => 'admin_user', 'a' => 'delete', 'productid' => $item['product_id'])); ?>" >Delete</a>
                    
               
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="sdpagination">
        <?php 
    // VỊ TRÍ 03: CODE HIỂN THỊ CÁC NÚT PHÂN TRANG
    echo $paging['html']; 
    ?>
    </div>
</div>



<?php include_once('share/footer.php'); ?>