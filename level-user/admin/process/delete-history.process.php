<?php  

	require_once "../../../config/connection.php";

	if(isset($_GET['id'])){
		$id_cart = $_GET['id'];
		if(!empty($id_cart) && is_numeric($id_cart)){
			$query_select = mysqli_query($connection, "SELECT * FROM tb_carts WHERE id_cart = $id_cart");
			if(mysqli_num_rows($query_select) == 1){
				$query_update = mysqli_query($connection, "UPDATE tb_carts SET status = '2' WHERE id_cart = $id_cart");
				if($query_update){
					echo "	<script>
								alert('History sukses di delete!');
								location.href = '../history-order.php';
							</script>";
				}
				else{
					echo "	<script>
								alert('History gagal di delete!');
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
	}
	else{
		header('location: ../history-order.php');
	}

?>