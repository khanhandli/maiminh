<?php 
	//Xoa lop hoc
	require_once('../resoures/dbhelp.php');
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$sql = 'DELETE FROM SanPham WHERE id = ' . $id;
		execute($sql);

		echo "Xoá Thành Công!!";
	}
 ?>