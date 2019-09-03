<?php
$servername = "localhost";
$database = "tawebid_polution";
$username = "tawebid_user";
$password = "admin123tok";
$konek = mysqli_connect ($servername, $username, $password, $database);
if ($konek!=false){
 echo "berhasil";
} else {
echo "gagal";}
?>
