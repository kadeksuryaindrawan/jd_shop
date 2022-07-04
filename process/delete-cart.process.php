<?php  
	
	session_start();
	require_once "../config/connection.php";

	if(isset($_POST['clear'])){
		$id_user = $_SESSION['user_login']['id_user'];
		$query_select = mysqli_query($connection, "SELECT * FROM tb_carts WHERE id_user = $id_user && status = '0'");
		if(mysqli_num_rows($query_select) > 0){
			$query_delete = mysqli_query($connection, "DELETE FROM tb_carts WHERE id_user = $id_user && status = '0'");
			if($query_delete){
				echo "	<script>
							alert('Semua cart telah dihapus!');
							location.href = '../cart.php';
						</script>";
			}
			else{
				echo "	<script>
							alert('Semua cart gagal dihapus');
							location.href = '../cart.php';
						</script>";
			}
		}
		else{
			header('location: ../cart.php');
		}
	}
	else{
		header('location: ../cart.php');
	}

?>