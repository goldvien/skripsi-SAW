<?php

session_start();
require_once 'config.php';

if(!empty($_POST['cmd_login'])){
	if(empty($_POST['txt_username']) || empty($_POST['txt_password']))	{
		exit("<script>window.alert('Kolom Username atau Password harus diisi');window.history.back();</script>");
	}
	$username=$_POST['txt_username'];
	$password=$_POST['txt_password'];
	$link = mysqli_query($koneksi, "SELECT * FROM `admin` WHERE `username`='{$username}' AND `password`='{$password}'");
	if(mysqli_num_rows($link) > 0){
		$_SESSION['LOGIN_username']=$username;
		exit("<script>window.location='".$wwwexit."';</script>");
	} else {

		exit("<script>window.alert('Username dan password yang anda masukkan salah');window.history.back();</script>");
		/*simpan data login ke dalam session */
	}
}

?>