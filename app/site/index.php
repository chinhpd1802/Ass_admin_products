<?php include_once 'shares/headerS.php'; ?>


<div class="breadcrumb-wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li>
                <a href="">
                    Trang chủ
                </a>
            </li>
            <li>
                <a href="#">
                    Điện Thoại - Máy Tính Bảng
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="content">
    <div class="container">
        <div class="content__wrap">
            <aside>
                <div class="panel__wrap">
                    <div class="panel">
                        <div class="panel__heading">
                            <h4>Danh Mục Sản Phẩm</h4>
                        </div>
                        <div class="panel__category">
                            <div class="panel__category-list">
                                <div class="panel__category-item panel__category-title">
                                    <a href="">Điện Thoại - Máy Tính Bảng</a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Điện Thoại SmartPhone (500)

                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Máy Tính Bảng (100)

                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Máy Đọc Sách (82)

                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Điện Thoại Phổ Thông (300)

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel__heading">
                            <h4>Sản phẩm được giao từ</h4>
                        </div>
                        <div class="panel__category">
                            <div class="panel__category-list">
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Trong nước (82)
                                    </a>
                                </div>
                                <div class="panel__category-item panel__category-child">
                                    <a href="">
                                        Ngoài nước (100)

                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="products">
                <div class="products__filter">
                    <div class="products__filter-option-wrap">
                        <div class="products__filter-option-left">
                            <span>Ưu tiên xem: </span>
                            <ul class="products__filter-option">
                                <li>
                                    <a href="">HÀNG MỚI</a>
                                </li>
                                <li>
                                    <a href="">BÁN CHẠY</a>
                                </li>
                                <li>
                                    <a href="">GIẢM GIÁ NHIỀU</a>
                                </li>
                                <li>
                                    <a href="">GIÁ THẤP</a>
                                </li>
                                <li>
                                    <a href="">GIÁ CAO</a>
                                </li>
                                <li>
                                    <a href="">CHỌN LỌC</a>
                                </li>
                            </ul>
                        </div>
                        <div class="products__filter-option-right">
                            <form action="" method="get">
                                <input type="text" name="q" id="search-product"
                                    placeholder="Tìm kiếm điện thoại,máy tính...">
                                <button>Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                    <div class="products__filter-2h" style="height: 50px;">

                    </div>
                </div>
                <div class="products__wrap">
                    <?php
                      require 'config.php';
                    $page = 1;
                    $limit = 8;
                    $arrs_list = mysqli_query($mysql, "select * from products;");
                    $total_record = mysqli_num_rows($arrs_list);
                    $total_page = ceil($total_record / $limit);
                    if (isset($_GET["page"]))
                        $page = $_GET["page"];
                    if ($page < 1) $page = 1;
                    if ($page > $total_page) $page = $total_page;
                    $start = ($page - 1) * $limit;
                    $sql = "select * from products ORDER BY product_id DESC limit " . $start . "," . $limit . " ;";
                    $result = mysqli_query($mysql, $sql);
                    ?>
                    <?php if (mysqli_num_rows($result) > 0) { ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="product">
                        <a href="">
                            <div class="product__image">
                                <img src="<?php echo '../upload/'.$row['path_img'];?>" alt="img" height="500px">
                            </div>
                            <div class="product__option">
                                <ul>
                                    <li class="active">
                                        <img src="<?php echo '../upload/'.$row['path_img'];?>" alt="img">
                                    </li>
                                </ul>
                            </div>
                            <div class="product__title">
                                <i class="icon icon-tikinow"></i>
                                <?php echo $row["product_name"] ?>
                            </div>
                            <span class="product__sale">
                                <span class="product__sale-final">
                                    <?php $newprice=  round($row["price_shop"] - ($row["price_shop"] * $row['price_market']/ 100), 0, PHP_ROUND_HALF_DOWN);
                                    echo number_format($newprice,0 ,'.' ,'.'); ?>₫
                                    <span class="product__sale-percent">
                                        -<?php echo $row['price_market']?>%
                                    </span>
                                </span>
                                <span class="product__sale-regular"><?php echo number_format($row["price_shop"] ,0 ,'.' ,'.') ?>₫</span>
                            </span>
                            <div class="product__review">
                                <div class="product__review-start">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <span class="product__review-start-y">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="product__review-text">(252 nhận xét)</div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item"><a class="page-link"
                                        href="../../app/site/index.php?page=<?php echo $page - 1; ?>">Previous</a>
                                </li>
                                <?php for ($i = 1; $i <= $total_page; $i++) { ?>
                                <li class="page-item"><a
                                        <?php if ($page == $i) echo "class='page-link bg-info text-white'"; ?>
                                        class="page-link"
                                        href="../../app/site/index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                                <?php } ?>
                                <li class="page-item"><a class="page-link"
                                        href="../../app/site/index.php?page=<?php echo $page + 1; ?>">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'shares/footerS.php'; ?>