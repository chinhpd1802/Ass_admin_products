<?php if (!defined('IN_SITE')) die ('The request not found');
if (empty($_SESSION['email'])){
    redirect(base_url('admin/index.php'));
}
    include_once 'share/header.php';
   // echo '<h1> Chào mừng bạn đến với trang quản trị admin </h1>';
   include_once 'share/sidebar.php';?>
<div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Toggle Sidebar</span>
            </button>
        </div>

    </nav>
    <div>
        <h1>Chào Mừng đến với trang quản trị Shop VTCA</h1>
    </div>
</div>
</div>
<?php include_once 'share/footer.php'; ?>