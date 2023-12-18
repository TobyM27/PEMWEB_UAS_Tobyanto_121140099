<?php
// menginisialisasikan variabel-variabel config 
$servername = "localhost";
$username = "root";
$password = "";
$database = "nakamaDB";

 // bagian ini berguna untuk memeriksa koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
