<?php

if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}


if(!empty($_POST['cmd_simpan'])){
	$nip=$_POST['txt_nip'];
	$nama=$_POST['txt_nama'];
	$jabatan=$_POST['txt_jabatan'];
	$pendidikan_formasi=$_POST['txt_pf'];
	
	
	
	
	if(empty($_POST['txt_nip']) or empty($_POST['txt_nama']) or empty($_POST['txt_jabatan'])){
		echo "<script>window.alert('Kolom bertanda \'harus diisi\' tidak boleh kosong.');</script>";
	}else{
		if($_POST['txt_action']=='new'){
			if(mysql_num_rows(mysql_query("select * from alternatif where nip='".$_POST['txt_nip']."'"))>0){
				echo "<script>window.alert('NIP yang anda masukan sudah terdaftar sebelumnya. Silahkan gunakan NIP yang lain.');</script>";
			}else{
				$q="insert into alternatif(nip,nama,jabatan,pendidikan_formasi) values('".$_POST['txt_nip']."','".$_POST['txt_nama']."','".$_POST['txt_jabatan']."')";
				mysql_query($q);
				exit("<script>location.href='?hal=data_alternatif';</script>");
			}
		}
		if($_POST['txt_action']=='edit'){
			$q=mysql_query("select nip from alternatif where id_pegawai='".$_POST['txt_id']."'");
			$h=mysql_fetch_array($q);
			$nip_tmp=$h['nip'];
			if(mysql_num_rows(mysql_query("select * from alternatif where nip='".$_POST['txt_nip']."' and nip<>'".$nip_tmp."'"))>0){
				echo "<script>window.alert('NIP yang anda masukan sudah terdaftar sebelumnya. Silahkan gunakan NIP yang lain.');</script>";
			}else{
				$q="update alternatif set nip='".$_POST['txt_nip']."', nama='".$_POST['txt_nama']."',jabatan='".$_POST['txt_jabatan']."' where id_pegawai='".$_POST['txt_id']."'";
				mysql_query($q);
				exit("<script>location.href='?hal=data_alternatif';</script>");
			}
		}
		
	}
}

$action=$_GET['action'];

if($_GET['action']=='edit' and !empty($_GET['id'])){
	$id=$_GET['id'];
	$q=mysql_query("select * from alternatif where id_pegawai='".$id."'");
	if(mysql_num_rows($q)>0){
		$h=mysql_fetch_array($q);
		$nip=$h['nip'];
		$nama=$h['nama'];
		$jabatan=$h['jabatan'];
		
	}
}

if($_GET['action']=='delete' and !empty($_GET['id'])){
	$id=$_GET['id'];
	mysql_query("delete from alternatif where id_pegawai='".$id."'");
	exit("<script>location.href='?hal=data_alternatif';</script>");
}

?>


        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<div style="font-size:18px;padding:10px 0 10px 0 ">SIMPAN DATA PEGAWAI</div>
		<form action="?hal=update_alternatif" name="" method="post">



		<input name="txt_action" type="hidden" value="<?php echo $action;?>">
		<input name="txt_id" type="hidden" value="<?php echo $id;?>">
        
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td width="120">NIP</td>
			<td><input name="txt_nip" type="number" size="40" value="<?php echo $nip;?>"> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Nama Pegawai</td>
			<td><input name="txt_nama" type="text" size="40" value="<?php echo $nama;?>"> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Jabatan</td>
			<td><input name="txt_jabatan" type="text" size="40" value="<?php echo $jabatan;?>"> <em>harus diisi</em></td>
		  </tr>
           
          
         
		  <tr>
			<td></td>
			<td>
            
			
			
			
			<input name="cmd_simpan" type="submit" value="Simpan"> 
			
			<input name="cmd_batal" type="button" onClick="location.href='<?php echo $_SERVER['HTTP_REFERER'];?>';" value="Batal"></td>
		  </tr> 
		</table>
        
    	</div>
        