<?php  
	require_once "../../../config/connection.php";

	if(isset($_POST['add'])){
		$category_name = $_POST['input_category_name'];
		$category_description = $_POST['input_category_description'];
		if(!empty($category_name) && !empty($category_description)){
			$query_check_category = mysqli_query($connection, "SELECT * FROM tb_categories WHERE category_name = '$category_name'");
			if(mysqli_num_rows($query_check_category) == 0){
				$query_insert_category = mysqli_query($connection, "INSERT INTO tb_categories VALUES (NULL, '$category_name', '$category_description')");
				if($query_insert_category){
					echo "	<script>
			 					alert('Kategori sukses dibuat');
			 					location.href = '../tampil-kategori.php';
			 				</script>";
				}
				else{
					$pesan = "Kategori gagal dibuat!";
				}
			}
			else{
				$pesan = "Category sudah ada! Silahkan coba lagi!";
			}
		}
		else{
			$pesan = "Tolong isi semua form!";
		}

		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../tambah-kategori.php';
			 	</script>";
	}	
	else{
		header('location: ../tambah-kategori.php');
	}
?>