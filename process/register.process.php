<?php  

	require_once "../config/connection.php";
	session_start();

	if(isset($_POST['input_register'])){
		$fullname = $_POST['input_fullname'];
		$email_address = $_POST['input_email'];
		$password = $_POST['input_password'];
		$repassword = $_POST['input_repassword'];

		if(!empty($fullname) && !empty($email_address) && !empty($password) && !empty($repassword)){
			if($password == $repassword){
				if(strlen($password) >= 7 ){
					$query_check = mysqli_query($connection, "SELECT * FROM tb_users WHERE email = '$email_address'");
					if(mysqli_num_rows($query_check) == 0){
						$encrypted_password = password_hash($password,PASSWORD_BCRYPT, ['cost' => 12]);
						$query_insert = mysqli_query($connection, "INSERT INTO tb_users VALUES (NULL, '$fullname', '$email_address', '$encrypted_password', 'user')");
						if($query_insert){
							$_SESSION['user_login']['nama_lengkap'] = $fullname;
							echo 	"
										<script>
										alert('Sukses daftar!');
										location.href='../auth/login.php';
										</script>
									";
						}
						else{
							$pesan = "Gagal daftar!";
						}
					}
					else{
						$pesan = "Email sudah terdaftar sebelumnya! Silahkan ulangi mendaftar";
					}
				}
				else{
					$pesan = "Password setidaknya harus terdiri dari 7 karakter / lebih!";
				}
			}
			else{
				$pesan = "Password tidak boleh berbeda!";
			}
		}
		else{
			$pesan = "Tolong Isikan Sesuatu!";
		}

		echo "
				<script>
					alert('$pesan');
					location.href = '../auth/register.php'
				</script>
			";
	}
	else{
		header('location: ../auth/register.php');
	}

?>