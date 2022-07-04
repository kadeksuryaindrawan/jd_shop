<?php
	require_once "../config/connection.php";
	session_start();

	if(isset($_POST['input_login'])){
		$email_address = $_POST['input_email'];
		$password = $_POST['input_password'];

		if(!empty($email_address) && !empty($password)){
			$query_check = mysqli_query($connection, "SELECT * FROM tb_users WHERE email = '$email_address'");

			if(mysqli_num_rows($query_check) == 1){
				$data_user = mysqli_fetch_assoc($query_check);
				$encrypted_password = $data_user['password'];

				if(password_verify($password,$encrypted_password)){
					$level_user = $data_user['level_user'];

					if($level_user == 'admin'){
						$_SESSION['user_login']['nama_lengkap'] = $data_user['fullname'];
						$_SESSION['user_login']['id_admin'] = $data_user['id_user'];

						echo"
								<script>
									alert('Login Successfully');
									location.href = '../level-user/admin/dashboard.php';
								</script>
							";
					}
					if($level_user == 'user'){
						$_SESSION['user_login']['nama_lengkap'] = $data_user['fullname'];
						$_SESSION['user_login']['id_user'] = $data_user['id_user'];

						echo"

								<script>
									alert('Login Successfully');
									location.href = '../level-user/user/index.php';
								</script>
							";
					}
					else{
						$pesan = "Gagal login!";
					}
				}
				else{
					$pesan = "Email / Password Salah!";
				}
			}
			else{
				$pesan = "Email / Password tidak terdaftar!";
			}
		}
		else{
			$pesan = "Isikan sesuatu!";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../auth/login.php'
				</script>
			";

	}
	else{
		header("location: ../auth/login.php");
	}

?>