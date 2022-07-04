<?php  
	require_once "../config/connection.php";
	session_start();

	if(isset($_POST['add_to_cart'])){
		$product_image = $_POST['hidden_image'];
		$product_name = $_POST['hidden_name'];
		$product_price = $_POST['hidden_price'];
		$product_quantity = $_POST['input_jumlah_beli'];

		$id_product = $_GET['id'];
		$id_user = $_SESSION['user_login']['id_user'];
		if(!empty($product_image) && !empty($product_name) && !empty($product_price) && !empty($product_quantity) && is_numeric($id_product)){
			$query_select = mysqli_query($connection, "SELECT * FROM tb_carts WHERE id_product = $id_product && id_user = $id_user && status = '0'");
			if(mysqli_num_rows($query_select) == 0){
				$query_product_stock = mysqli_query($connection, "SELECT * FROM tb_products WHERE id_product = $id_product");
				$data_product = mysqli_fetch_assoc($query_product_stock);
				$product_stock = $data_product['product_stock'];
				if($product_quantity > 0 && $product_quantity <= $product_stock){
					$query_insert = mysqli_query($connection, "INSERT INTO tb_carts VALUES (NULL, $id_user, $id_product, '$product_image' , '$product_name', $product_price, $product_quantity, '0')");
					if($query_insert){
						echo "	<script>
									alert('Product sukses ditambahkan ke cart!');
									location.href = '../cart.php';
								</script>";	
					}
					else{
						$pesan = "Gagal menambahkan ke cart!";
					}
				}	
				else{
					$pesan = "Dilarang memesan melebihi / kurang dari stok yang tersedia!";
				}
			}
			else{
				$query_update = mysqli_query($connection, "UPDATE tb_carts SET quantity = quantity + $product_quantity WHERE id_product = $id_product && id_user = $id_user && status = '0'");
				if($query_update){
					echo "	<script>
									alert('Product sukses ditambahkan ke cart!');
									location.href = '../cart.php';
								</script>";
				}
				else{
					$pesan = "gagal";
				}
			}

			echo "	<script>
						alert('$pesan');
						location.href = '../level-user/user/index.php';
					</script>";
		}
		else{
			header('location: ../level-user/user/index.php');
		}

	}	
	else{
		header('location: ../level-user/user/index.php');
	}
?>