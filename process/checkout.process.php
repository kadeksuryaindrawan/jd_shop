<?php  
	session_start();
	require_once "../config/connection.php";

	if(isset($_POST['checkout'])){
		$id_user = $_SESSION['user_login']['id_user'];
		$query_select_cart = mysqli_query($connection, "SELECT * FROM tb_carts WHERE id_user = $id_user && status = '0'");
		$data_cart = [];
		while($row = mysqli_fetch_assoc($query_select_cart)){
			array_push($data_cart, $row);
		}
		
		$isEmpty = true;

		for($i = 0; $i < count($data_cart); $i++){
			if(!empty(is_numeric($id_user)) && !empty(is_numeric($data_cart[$i]['id_cart'])) && !empty(is_numeric($data_cart[$i]['id_product'])) && !empty(is_numeric($data_cart[$i]['product_price'])) && !empty(is_numeric($data_cart[$i]['quantity'])) ){
				$isEmpty = false;
			}
			else{
				// ada yang kosong
				$isEmpty = true;
				break;
			}
		}

		if(!$isEmpty){
			//proses insert
			$isSuccess = false;
			for($i=0; $i < count($data_cart); $i++){
				$id_cart = $data_cart[$i]['id_cart'];
				$id_product = $data_cart[$i]['id_product'];
				$product_price = $data_cart[$i]['product_price'];
				$quantity = $data_cart[$i]['quantity'];

				$query_insert = mysqli_query($connection, "INSERT INTO tb_checkout VALUES (NULL, $id_user, $id_cart, $id_product, $product_price, $quantity, now() )");
				if($query_insert){
					$query_select_product = mysqli_query($connection, "SELECT * FROM tb_products WHERE id_product = $id_product");
					$data_product = mysqli_fetch_assoc($query_select_product);
					$product_stock = $data_product['product_stock'];
					$stock_update = $product_stock - $quantity;
					$query_update = mysqli_query($connection, "UPDATE tb_carts SET status='process' WHERE id_cart = $id_cart");
					$query_update_stock = mysqli_query($connection, "UPDATE tb_products SET product_stock = $stock_update WHERE id_product = $id_product");
					if($query_update && $query_update_stock){
						$isSuccess = true;
					}
					else{
						$isSuccess = false;
						break;
					}
				}
				else{
					$isSuccess = false;
					break;
				}
			}

			if($isSuccess){
				echo "	<script>
							alert('Product sukses di checkout! Silahkan menunggu konfirmasi dari admin!');
							location.href = '../checkout.php';
						</script>";
			}
			else{
				echo "	<script>
							alert('Product gagal di checkout!');
							location.href = '../cart.php';
						</script>";
			}
		}
		else{
			//jika kosong
			header('location: ../cart.php');
		}

	}
	else{
		header('location: ../cart.php');
	}
?>