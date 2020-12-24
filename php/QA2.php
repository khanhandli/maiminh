<?php 
    require_once('../resoures/dbhelp.php');
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website Quản Lý Truyện Tranh</title>
    <link rel="stylesheet" href="../assets/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet"
        href="../assets/fonts/fontawesome-pro-5.13.0/fontawesome-pro-5.13.0-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap&subset=vietnamese"
        rel="stylesheet">
        <script type="text/javascript" src="../assets/js/jquery.js"></script>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid wide">
                    <div class="header__flex">
                        <div class="header__img">
                            <a href="#">
                                <i class="fal fa-shopping-cart"></i>
                                <span class="header--title">QUẢN LÝ SẢN PHẨM</span>                  
                            </a>
                        </div>
                        <div class="header__info">
                            <i class="far fa-user-circle"></i>
                            <span>Mai Minh DH8C4</span>
                            <ul>
                                <li class="header__info--text">Hồ Sơ</li>
                                <li class="header__info--text"><a href="../index.php">Thoát</a></li>
                            </ul>
                        </div>
                    </div>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <a href="../php/QA.php" class="header-nav__item--text">Danh sách sản phẩm</a>
                        </li>
                        <li class="header-nav__item">
                            <a href="../update/UpdateQA.php" class="header-nav__item--text">Cập nhập sản phẩm</a>
                        </li>A
                        <li class="header-nav__item">
                            <a href="../php/QA2.php" class="header-nav__item--text">Tìm kiếm sản phẩm</a>
                        </li>
                    </ul>
                </div>
        </header>
        <div class="body">

            <div class="grid wide">
                <div class="row">
                    <div class="c-12" style="position: relative;">
                        <div class="container-title">
                            <img src="../assets/img/icon.png" alt="">
                            <h1>Danh sách sản phẩm</h1>
                            <div class="title__function">
                            <form action="" method="GET" class="form-timkiem">
                                <input type="checkbox" hidden id="search"> 
                                <input type="text" class="form-control1" name="timkiem" placeholder="Tìm kiếm tên người bán">            
                                <button class="btn-timkiem">Tìm</button>
                            </form>
                            <label for="search" class="fas fa-search function--icon"></label>
                        </div>

                        </div>
                        <div class="row scroll">
                             <?php
                             //Lay danh muc tu db
                            $limit = 8;
                            $page = 1;
                            if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }

                            if ($page <= 0) {
                                $page = 1;
                            }
                            $firstIndex = ($page - 1) * $limit;
                                    if (isset($_GET['timkiem']) && $_GET['timkiem'] != '') {
                                        $sql = "SELECT * FROM SanPham WHERE TenNguoiBan LIKE '%".$_GET['timkiem']."%'";    
                                    }
                                     else {
                                        $sql = 'SELECT * FROM SanPham WHERE 1 LIMIT '.$firstIndex.','.$limit;
                                    }
                                        $classList1 = executeResult($sql);
                                        $sql = 'SELECT count(id) as total FROM SanPham';
                                        $countResult = executeSingleResult($sql);
                                        $count = $countResult['total'];
                                        $number = ceil($count/$limit);
                                        foreach ($classList1 as $class1) {
                          echo '  <div class="col c-3"> ';
                             echo    '<a class="home-product-item" href="#">';
                              echo          '<img class ="photo" src="photo/'.$class1["TrangBia"].'" >';
                              echo          '<h4 class="home-product-item__name">'.$class1["Gioithieu"].'</h4>';
                               echo        '<div class="home-product-item__price">';
                                echo            '<span class="home-product-item__price-old">'.$class1["GiaGoc"].'đ</span>';
                                 echo           '<span class="home-product-item__price-curent">'.$class1["GiaGiam"].'đ</span>';
                                     echo   '</div>';
                                    echo    '<div class="home-product-item__action">';
                                    echo        '<span class="home-product-item__like home-product-item__like--liked">';
                               echo               '<i class="home-product-item__like-icon-empty far fa-heart"></i>';
                              echo                '<i class="home-product-item__like-icon-fill fas fa-heart"></i>';
                              echo              '</span>';
                               echo             '<div class="home-product-item__rating">';
                                echo                '<i class="home-product-item__star--gold fas fa-star"></i>';
                                echo                '<i class="home-product-item__star--gold fas fa-star"></i>';
                                echo                '<i class="home-product-item__star--gold fas fa-star"></i>';
                                echo                '<i class="home-product-item__star--gold fas fa-star"></i>';
                                echo                '<i class="fas fa-star"></i>';
                                echo            '</div>';
                                echo            '<span class="home-product-item__sold">'.$class1["DaBan"].' đã bán</span>';
                                echo        '</div>';
                                echo        '<div class="home-product-item__origin">';
                                echo            '<span class="home-product-item__brand">'.$class1["TenNguoiBan"].'</span>';
                                echo            '<span class="home-product-item__origin-name">'.$class1['QuocGia'].'</span>';
                                echo        '</div>';
                                echo        '<div class="home-product-item__favourite">';
                                echo            '<i class="fas fa-check"></i>';
                                echo            '<span>Yêu thích</span>';
                                echo        '</div>';
                                echo        '<div class="home-product-item__sale-off">';
                                echo            '<span class="home-product-item__sale-off-percent">'.$class1["GiamGia"].'%</span>';
                                echo            '<span class="home-product-item__sale-off-label">GIẢM</span>';
                                echo        '</div>';
                                 echo   '</a>';

                                echo '</div>';
                                                   
                                        }
                                ?>
                           

                        </div>
                        <nav aria-label="Page navigation example" class ="pagination--absolute" style="
    top: 25px;
">
                              <ul class="pagination">
                                <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                </li>
                                <?php 
                                    for ($i=0; $i < $number; $i++) { 
                                        if ($page == ($i +1)) {
                                        echo '<li class="page-item active1"><a class="page-link" href="#">'.($i+1).'</a></li>';
                                            
                                        }else {

                                        echo '<li class="page-item"><a class="page-link" href="?page= '.($i+1).'">'.($i+1).'</a></li>';
                                        }
                                    }
                                 ?>
                                <li class="page-item">
                                  <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </li>
                              </ul>
                            </nav>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
</body>

</html>