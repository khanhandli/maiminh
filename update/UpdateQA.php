<?php 
    require_once('../resoures/header.php');
    require_once('../resoures/dbhelp.php');
    $id ='';
    $gioithieu2  = $giagoc2 =$giagiam2 = $daban2 = $tennguoiban2  = $quocgia2 =$giamgia2 = "";
       if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $sql = 'SELECT * FROM SanPham WHERE id = '. $id;
        $roomList = executeResult($sql);
        if ($roomList != null && count($roomList) > 0) {
            $room = $roomList[0];
            $gioithieu2 = $room['Gioithieu'];
            $giagoc2 = $room['GiaGoc'];
            $giagiam2 = $room['GiaGiam'];
            $daban2 = $room['DaBan'];
            $tennguoiban2 = $room['TenNguoiBan'];
            $quocgia2 = $room['QuocGia'];
            $giamgia2 = $room['GiamGia'];
        } else {

        }
    }
 ?>
        <div class="body">
        	<div class="grid wide">
        		<div class="row">
                    <div class="c-12">
                        <div class="container-title">
                            <i class="fa fa-bolt" style="color: #9966FF;font-size: 4rem;margin-right: 7px;"></i>
                            <h1 style="color: #9966FF;">Cập nhập sản phẩm</h1>
                        </div>
                        <form class="form" action="../php/QA.php" method="post" enctype="multipart/form-data">
                            <div class="row form-flex">
                                <div class="c-6">
                                        <input type="number" name="id" value="<?=$id?>" hidden>
                                    <div class="form__input">
                                        <label for="gioithieu">Giới thiệu sản phẩm:</label>
                                        <input class="input" type="text" id="gioithieu" name="gioithieu" value="<?=$gioithieu2?>">
                                    </div>
                                    <div class="form__input">
                                        <label id="label" for="anh">Trang bìa:</label>
                                        <input type="hidden" name="size" value="1000000"> 
                                        <input class="" type="file" id="anh" name="anh">
                                        <label for="anh">Tải Ảnh Lên</label>
                                        
                                    </div>
                                    <div class="form__input">
                                        <label for="giagoc">Giá gốc:</label>
                                        <input class="input" type="text" id="giagoc" name="giagoc" value="<?=$giagoc2?>">
                                    </div>
                                    <div class="form__input">
                                        <label for="giagiam">Giá giảm:</label>
                                        <input class="input" type="text" id="giagiam" name="giagiam" value="<?=$giagiam2?>">
                                    </div>
                                </div>
                                <div class="c-6">
                                    <div class="form__input">
                                        <label for="daban">Đã bán:</label>
                                        <input class="input" type="text" id="daban" name="daban" value="<?=$daban2?>">
                                    </div>
                                    <div class="form__input">
                                        <label for="tennguoiban">Tên người bán:</label>
                                         <input class="input" type="text" id="tennguoiban" name="tennguoiban" value="<?=$tennguoiban2?>">
                                    </div>
                                    <div class="form__input">
                                        <label for="quocgia">Quốc gia:</label>
                                        <input class="input" type="text" id="quocgia" name="quocgia" value="<?=$quocgia2?>">
                                    </div>
                                    <div class="form__input">
                                        <label for="giamgia">% Giảm giá:</label>
                                         <input class="input" type="text" id="giamgia" name="giamgia" value="<?=$giamgia2?>">
                                    </div>
                                </div>
                            </div>
                            <button class="save-btn">Lưu</button>
                        </form>
                    </div>
        		</div>
            </div>
    	</div>
   
    </div>
    <script type="text/javascript" src="../main.js"></script>
</body>

</html>