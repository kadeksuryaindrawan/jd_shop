<?php  
	require_once "../../../config/connection.php";
	if(isset($_POST['edit'])){
		$category_name = $_POST['input_category_name'];
		$category_description = $_POST['input_category_description'];
		$id_category = $_POST['input_id_category'];
		if(!empty($category_name) && !empty($category_description) && is_numeric($id_category)){
 			$query_category_lama = mysqli_query($connection, "SELECT * FROM tb_categories WHERE id_category = $id_category");
 			$data_category_lama = mysqli_fetch_assoc($query_category_lama);
 			$category_name_lama = $data_category_lama['category_name'];
 			$query_check_category = mysqli_query($connection, "SELECT * FROM tb_categories WHERE category_name = '$category_name' AND category_name != '$category_name_lama'");
 			if(mysqli_num_rows($query_check_category) == 0){
 				$query_update_category = mysqli_query($connection, "UPDATE tb_categories SET category_name = '$category_name', category_description = '$category_description' WHERE id_category = $id_category");
 				if($query_update_category){
 					$pesan = "Kategory sukses di update!";
 				}
 				else{
 					$pesan = "Kategori gagal di edit!";
 				}
 			}
 			else{
 				$pesan = "Kategori Duplikat!";
 			}
		}
		else{
			$pesan = "Tolong isikan sesuatu!";
		}
		echo "	<script>
			 		alert('$pesan');
			 		location.href = '../tampil-kategori.php';
			 	</script>";
	}
	else{
		header('location: ../tampil-kategori.php');
	}
?>