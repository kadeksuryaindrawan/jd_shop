<?php  
	
	require_once "../config/connection.php";

	if(isset($_POST['update'])){
		$quantity_new = $_POST['quantity_new'];
		$id_cart = $_POST['hidden_id_cart'];
		$id_product = $_POST['hidden_id_product'];
		if(!empty($quantity_new) && is_numeric($id_cart)){
			$query_select = mysqli_query($connection, "SELECT * FROM tb_carts WHERE id_cart = $id_cart");
			if(mysqli_num_rows($query_select) == 1){
				$query_select_product = mysqli_query($connection, "SELECT * FROM tb_products WHERE id_product = $id_product");
				$data_product = mysqli_fetch_assoc($query_select_product);
				$product_stock = $data_product['product_stock'];
				if($quantity_new > 0 && $quantity_new <= $product_stock){
					$query_update = mysqli_query($connection, "UPDATE tb_carts SET quantity = $quantity_new WHERE id_cart = $id_cart");
					if($query_update){
						header('location: ../cart.php');
					}
					else{
						$pesan = "Update gagal!";
					}
				}
				else{
					$pesan = "Dilarang memesan melebihi / kurang dari stok yang tersedia!";
				}
			}
			else{
				$pesan = "Data tidak ada!";
			}

			echo "	<script>
						alert('$pesan');
						location.href = '../cart.php';
					</script>";
		}
		else{
			header('location: ../cart.php');
		}
	}
	else{
		header('location: ../cart.php');
	}

?>