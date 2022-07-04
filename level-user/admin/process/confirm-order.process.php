<?php  
	
	session_start();
	require_once "../../../config/connection.php";

	if(isset($_POST['confirm'])){
		$id_cart = $_POST['hidden_id_cart'];
		if(!empty(is_numeric($id_cart))){
			$query_select = mysqli_query($connection, "SELECT * FROM tb_carts WHERE id_cart = $id_cart");
			if(mysqli_num_rows($query_select) == 1){
				$query_update = mysqli_query($connection, "UPDATE tb_carts SET status = 'success' WHERE id_cart = $id_cart");
				if($query_update){
					echo "	<script>
								alert('Product sukses dikonfirmasi!');
								location.href = '../history-order.php';
							</script>";
				}
				else{
					$pesan = "Product gagal dikonfirmasi!";
				}
			}
			else{
				$pesan = "Data tidak ada!";
			}

			echo "	<script>
						alert('$pesan');
					</script>";
		}
		else{
			header('location: ../daftar-order.php');
		}
	}
	else{
		header('location: ../daftar-order.php');
	}

?>