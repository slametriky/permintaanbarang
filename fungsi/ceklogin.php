<?php  

	if (isset($_SESSION['login'])) {
		if ($_SESSION['level'] == "unit_pelayanan") {
			header("location:unit_pelayanan/index.php");
		} else if ($_SESSION['level'] == "admin_gudang"){
			header("location:admin_gudang/index.php");
		} else if ($_SESSION['level'] == "asisten_manajer"){
			header("location:asmen_gudang/index.php");
		} else {
			header("location:index.php");
		}
	}

?>