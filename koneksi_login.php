<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "db_echa";

$koneksi = mysqli_connect($host, $username, $password, $db_name);
if (!$koneksi){
echo "gagal terhubung";
} else {
    //echo "berhasil terhubung";
}
?>