<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="avartar">
                 <img src="../public/icon/user.svg" alt="avatar" class="imgava">
            </div>
        </div>

        <ul class="list-unstyled components">
            
            <li>
                <a href="<?php echo create_link(base_url('admin'), array('m' => 'common', 'a' => 'dashboard')); ?>">DASHBOARD</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Products</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                        <a
                            href="<?php echo create_link(base_url('admin'), array('m' => 'admin_user', 'a' => 'add')); ?>">Add
                            New Product</a>
                    </li>
                    <li>
                        <a href="<?php echo create_link(base_url('admin'), array('m' => 'admin_user', 'a' => 'list')); ?>">List Product</a>
                    </li>
                    <li>
                        <a href="#">Page 3</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </nav>
    