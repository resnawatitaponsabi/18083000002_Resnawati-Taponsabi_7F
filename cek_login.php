<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cek_daftar</title>
</head>
<body>
    
</body>
</html>
<?php
include 'koneksi_login.php';

$username = mysqli_real_escape_string($koneksi, $_POST["username"]);
$password = mysqli_real_escape_string($koneksi, $_POST["password"]);

 $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

// $query = $pdo->prepare('SELECT * FROM admin WHERE username='$username' AND password='$password');

$cek = mysqli_num_rows($query);

echo $cek;

if ($cek > 0){
 //   header("location:index.php");
//} else {
    //header("location:gagal_login.php");
//}
$data = mysqli_fetch_assoc($query);
 
	// cek jika user login sebagai admin
	if($data['level']=="admin"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:read.php");
 
	// cek jika user login sebagai user
	}else if($data['level']=="pengunjung"){
		// buat session login dan username
		$_SESSION['username'] = $username;
        
		$_SESSION['level'] = "pengunjung";
		// alihkan ke halaman dashboard pegawai
		header("location:read_user.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:gagal_login.php");
	}	
}else{
	header("location:gagal_login.php");
}	
?>