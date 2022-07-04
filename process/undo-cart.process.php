<?php  
	session_start();
	require_once "../config/connection.php";

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id_product = $_GET['id'];
		$id_user = $_SESSION['user_login']['id_user'];
		$query_update_product = mysqli_query($connection, "DELETE FROM tb_carts WHERE id_product = $id_product && id_user = $id_user && status = '0'");
		if($query_update_product){
			header('location: ../cart.php');
		}
		else{
			echo "
					<script>
						alert('Ada kesalahan saat menghapus product dari cart!');
						location.href = '../cart.php';
					</script>";
		}
	}
	else{
		header('location: ../cart.php');
	}
?>