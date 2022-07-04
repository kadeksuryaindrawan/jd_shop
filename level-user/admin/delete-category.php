<?php  
	session_start();
	require_once "../../config/connection.php";

	if(!isset($_SESSION['user_login']['id_admin'])){
    header('location: ../../auth/login.php');
  	}

	if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
		$id_category = $_GET['id'];
		$query_check_category = mysqli_query($connection, "SELECT * FROM tb_categories WHERE id_category = $id_category");
		if(mysqli_num_rows($query_check_category) == 1){
			$query_delete_category = mysqli_query($connection, "DELETE FROM tb_categories WHERE id_category = $id_category");
			if($query_delete_category){
				$pesan = "Kategori sukses dihapus!";
			}
			else{
				$pesan = "Kategori gagal dihapus!";
			}
			echo "	<script>
		 				alert('$pesan');
		 				location.href = './tampil-kategori.php';
		 			</script>";
		}
		else{
			header('location: ./tampil-kategori.php');
		}
	}
	else{
		header('location: ./tampil-kategori.php');
	}
?>