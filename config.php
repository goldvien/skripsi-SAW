<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_saw2";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if(mysqli_connect_errno()) {
	echo "Database Patah Hati" . mysqli_connect_error($koneksi);
}


?>