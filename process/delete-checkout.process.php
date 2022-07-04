<?php  
	session_start();
	require_once "../config/connection.php";

	if(isset($_POST['clear'])){
		$id_user = $_SESSION['user_login']['id_user'];
		$query_select = mysqli_query($connection, "SELECT * FROM tb_carts WHERE id_user = $id_user && status = 'success'");
		if(mysqli_num_rows($query_select) > 0){
			$query_delete = mysqli_query($connection, "UPDATE tb_carts SET status = '1' WHERE id_user = $id_user && status = 'success'");
			if($query_delete){
				echo "	<script>
							alert('Daftar checkout sukses dihapus!');
							location.href = '../checkout.php';
						</script>";
			}
			else{
				echo "	<script>
							alert('Daftar checkout gagal dihapus!');
							location.href = '../checkout.php';
						</script>";
			}
		}
		else{
			echo "	<script>
						alert('Proses belum disetujui oleh ADMIN ! Silahkan menunggu konfirmasi dari ADMIN !');
						location.href = '../checkout.php';
					</script>";
		}
	}
	else{
		header('location: ../checkout.php');
	}
?>