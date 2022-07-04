<?php  
	require_once "../../../config/connection.php";

	if(isset($_POST['add'])){
		$product_category = $_POST['input_category_name'];
		$product_name = $_POST['input_product_name'];
		$product_price = $_POST['input_product_price'];

		$product_image_name = $_FILES['input_product_image']['name'];
		$product_image_name_2 = $_FILES['input_product_image_2']['name'];
		$product_image_size = $_FILES['input_product_image']['size'];
		$product_image_2_size = $_FILES['input_product_image_2']['size'];
		$tmp_name = $_FILES['input_product_image']['tmp_name'];
		$tmp_name_2 = $_FILES['input_product_image_2']['tmp_name'];
		
		$product_stock = $_POST['input_product_stock'];
		if(!empty($product_category) && !empty($product_name) && !empty(is_numeric($product_price)) && !empty($product_image_name) && !empty($product_image_name_2) && !empty(is_numeric($product_stock))){
			if($product_stock > 0 && $product_price > 0){
				$extensi_gambar_valid = ['jpg', 'jpeg', 'png'];
				$extensi_gambar = explode('.', $product_image_name);
				$extensi_gambar = strtolower(end($extensi_gambar));
				$extensi_gambar_2 = explode('.', $product_image_name_2);
				$extensi_gambar_2 = strtolower(end($extensi_gambar_2));
				if(in_array($extensi_gambar, $extensi_gambar_valid) && in_array($extensi_gambar_2, $extensi_gambar_valid)){
					$max_size = 2 * (1024 * 1024);
					if($product_image_size < $max_size && $product_image_2_size < $max_size){
						$query_check_product_name = mysqli_query($connection, "SELECT * FROM tb_products WHERE product_name = '$product_name'");
						if(mysqli_num_rows($query_check_product_name) == 0){
							$nama_baru = uniqid(1) . "." . $extensi_gambar;
							$nama_baru_2 = uniqid(2) . "." . $extensi_gambar_2;
							$query_insert_product = mysqli_query($connection, "INSERT INTO tb_products VALUES (NULL, $product_category, '$product_name', $product_price, '$nama_baru', '$nama_baru_2', $product_stock)");
							if($query_insert_product && move_uploaded_file($tmp_name , '../../../images/product/' . $nama_baru) && move_uploaded_file($tmp_name_2 , '../../../images/product/' . $nama_baru_2)){
									echo "	<script>
												alert('Product sukses ditambahkan!');
												location.href = '../tampil-product.php';
											</script>";	
							}
							else{
								$pesan = "Error upload!";

							}
						}
						else{
							$pesan = "Product sudah ada! Silahkan masukkan product lain!";
						}
					}
					else{
						$pesan = "Size file terlalu besar!";
					}
				}
				else{
					$pesan = "Anda harus mengupload gambar!";
				}
			}
			else{
				$pesan = "Harga / stok tidak boleh kurang dari 1!";
			}
		}
		else{
			$pesan = "Tolong isi semua form!";
		}
		echo "	<script>
					alert('$pesan');
					location.href = '../tambah-product.php';
				</script>";
	}
	else{
		header('location: ../tambah-product.php');
	}
?>