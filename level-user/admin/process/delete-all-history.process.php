<?php  

	require_once "../../../config/connection.php";

	if(isset($_POST['delete'])){
		$query_select = mysqli_query($connection, "SELECT * FROM tb_carts WHERE status = 'success' || status = '1'");
		if(mysqli_num_rows($query_select) > 0){
			$query_update = mysqli_query($connection, "UPDATE tb_carts SET status = '2' WHERE status = 'success' || status = '1'");
			if($query_update){
				echo "	<script>
							alert('Semua history sukses di delete!');
							location.href = '../history-order.php';
						</script>";
			}
			else{
				echo "	<script>
							alert('Semua history gagal di delete!');
							location.href = '../history-order.php';
						</script>";
			}
		}
		else{
			echo "	<script>
						alert('Data tidak ada!');
						location.href = '../history-order.php';
					</script>";
		}
	}
	else{
		header('location: ../history-order.php');
	}

?>