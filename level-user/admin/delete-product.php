<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['id_admin'])){
    header('location: ../../auth/login.php');
  	}

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id_product = $_GET['id'];
		$query_check = mysqli_query($connection, "SELECT tb_products.*,tb_carts.* FROM tb_products INNER JOIN tb_carts ON tb_products.id_product = tb_carts.id_product WHERE tb_products.id_product = $id_product");
		if(mysqli_num_rows($query_check) >= 0){
			$query_delete_cart = mysqli_query($connection, "DELETE FROM tb_carts WHERE id_product = $id_product");
			$query_delete = mysqli_query($connection, "DELETE FROM tb_products WHERE id_product = $id_product");
			if($query_delete_cart && $query_delete){
				$pesan = "Product sukses dihapus!";
			}
			else{
				$pesan = "Product gagal dihapus!";
			}
		}
		else{
			$pesan = "Ada kesalahan saat menghapus product!";
		}
		echo 	"
					<script>
						alert('$pesan');
						location.href = './tampil-product.php';
					</script>
				";
	}
	else{
		header('location: ./tampil-product.php');
	}

?>