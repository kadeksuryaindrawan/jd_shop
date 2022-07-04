<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['edit'])){
		$product_name = $_POST['input_product_name'];
		$product_category = $_POST['input_category_name'];
		$product_price = $_POST['input_product_price'];
		$product_stock = $_POST['input_product_stock'];

		$product_image = $_FILES['input_product_image']['name'];
		$product_image_2 = $_FILES['input_product_image_2']['name'];
		$product_image_size = $_FILES['input_product_image']['size'];
		$product_image_2_size = $_FILES['input_product_image_2']['size'];
		$tmp_name = $_FILES['input_product_image']['tmp_name'];
		$tmp_name_2 = $_FILES['input_product_image_2']['tmp_name'];

		$id_product = $_POST['input_id_product'];

		if( !empty($product_name) && !empty($product_category) && !empty(is_numeric($product_price)) && !empty(is_numeric($product_stock)) && is_numeric($id_product)){
			$query_product_lama = mysqli_query($connection, "SELECT * FROM tb_products WHERE id_product = $id_product");
			$data_product_lama = mysqli_fetch_assoc($query_product_lama);
			$product_name_lama = $data_product_lama['product_name'];
			$query_check_product = mysqli_query($connection, "SELECT * FROM tb_products WHERE product_name = '$product_name' AND product_name != '$product_name_lama'");
			if(mysqli_num_rows($query_check_product) == 0){

				$query_update_product = mysqli_query($connection, "UPDATE tb_products SET product_name = '$product_name',id_category = '$product_category', product_price = '$product_price', product_stock = '$product_stock' WHERE id_product = $id_product");
				$query_update_cart = mysqli_query($connection, "UPDATE tb_carts SET product_name = '$product_name', product_price = '$product_price'WHERE id_product = $id_product");

				$err = false;

				if(!empty($product_image) || !empty($product_image_2)){
					$extensi_gambar_valid = ['jpg', 'jpeg', 'png'];
					$max_image_size = 2 * (1024 * 1024); //2 MB

					$q = "UPDATE tb_products SET ";

					if(!empty($product_image)){
						$extensi_gambar = explode('.', $product_image);
						$extensi_gambar = strtolower(end($extensi_gambar));

						if(in_array($extensi_gambar, $extensi_gambar_valid)){
							if($product_image_size > $max_image_size){
								$err = true;
								$pesan = "Size File terlalu besar bos!";
							}
							else{
								$nama_baru = uniqid(1) . "." . $extensi_gambar;
							
								if(move_uploaded_file($tmp_name , '../../../images/product/' . $nama_baru)){
									$q .= " product_image = '$nama_baru' ";
								}

								else{
									$err = true;
									$pesan = "Terjadi kesalahan ketika mengunggah gambar!";
								}
							}
						}
						else{
							$pesan = "Gambar tidak valid!";
							$err = true;
						}
					}

					if(!empty($product_image) && !empty($product_image_2)){
						$q .= " , ";
					}

					if(!empty($product_image_2)){
						$extensi_gambar_2 = explode('.', $product_image_2);
						$extensi_gambar_2 = strtolower(end($extensi_gambar_2));

						if(in_array($extensi_gambar_2, $extensi_gambar_valid)){
							if($product_image_2_size > $max_image_size){
								$err = true;
								$pesan = "Size File terlalu besar bos!";
							}
							else{
								$nama_baru_2 = uniqid(2) . "." . $extensi_gambar_2;
							
								if(move_uploaded_file($tmp_name_2 , '../../../images/product/' . $nama_baru_2)){
									$q .= " product_image_2 = '$nama_baru_2' ";
								}

								else{
									$err = true;
									$pesan = "Terjadi kesalahan ketika mengunggah gambar!";
								}
							}

						}
						else{
							$pesan = "Gambar tidak valid!";
							$err = true;
						}
					}

					$q .= " WHERE id_product = $id_product";

					if($err == false){
						$query_update_image_product = mysqli_query($connection, $q);
					}
				}

				if($query_update_product && $query_update_cart && !$err){
					$pesan = "Product sukses di edit!";
				}
			}

			else{
				$pesan = "Product Duplikat!";
			}
		}	

		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
					alert('$pesan');
					location.href = '../tampil-product.php';
				</script>";
	}
	else{
		header('location: ../tampil-product.php');
	}
?>