<?php
$conn = mysqli_connect("localhost", "root", "", "dbcv");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

session_start();
?>