<?php
if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}

if(!empty($_POST['cmd_simpan'])){
	$nama=$_POST['txt_nama'];
	$atribut=$_POST['txt_atribut'];
	
	if(empty($_POST['txt_nama']) or empty($_POST['txt_atribut'])){
		echo "<script>window.alert('Kolom bertanda \'harus diisi\' tidak boleh kosong.');</script>";
	}else{
		if($_POST['txt_action']=='new'){
			$q="insert into kriteria(nama,atribut) values('".$_POST['txt_nama']."','".$_POST['txt_atribut']."')";
			mysqli_query($koneksi, $q);
		}
		if($_POST['txt_action']=='edit'){
			$q="update kriteria set nama='".$_POST['txt_nama']."',atribut='".$_POST['txt_atribut']."' where id_kriteria='".$_POST['txt_id']."'";
			mysqli_query($koneksi, $q);
		}
		exit("<script>location.href='?hal=data_kriteria';</script>");
	}
}

$action=empty($_GET['action']) ? null : $_GET['action'];
$id=empty($_GET['id']) ? null : $_GET['id'];

if($action=='edit' and !empty($_GET['id'])){
	$id=$_GET['id'];
	$q=mysqli_query($koneksi, "select * from kriteria where id_kriteria='".$id."'");
	if(mysqli_num_rows($q)>0){
		$h=mysqli_fetch_array($q);
		$nama=$h['nama'];
		$atribut=$h['nilai'];
	}
}
$nama=empty($nama) ? null : $nama;
$atribut=empty($atribut) ? null : $atribut;
if($action=='delete' and !empty($_GET['id'])){
	$id=$_GET['id'];
	mysqli_query($koneksi, "delete from kriteria where id_kriteria='".$id."'");
	exit("<script>location.href='?hal=data_kriteria';</script>");
}

?>
 
        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<div style="font-size:18px;padding:10px 0 10px 0 ">SIMPAN DATA KRITERIA</div>
		<form action="" name="" method="post">
		<input name="txt_action" type="hidden" value="<?php echo $action;?>">
		<input name="txt_id" type="hidden" value="<?php echo $id;?>">
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td width="120">Nama Kriteria</td>
			<td><input name="txt_nama" type="text" size="40" value="<?php echo $nama;?>"> <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td>Atribut</td>
			<td><select name="txt_atribut"><option value="benefit"<?php if($atribut=='benefit'){echo 'selected';};?>>Benefit
            </option><option value="cost"<?php if($atribut=='cost'){echo ' selected';};?>>Cost</option></select> 
            <em>harus diisi</em></td>
		  </tr>
		  <tr>
			<td></td>
			<td>
			
			
			<input name="cmd_simpan" type="submit" value="Simpan"> 
			
			 <input name="cmd_batal" type="button" onClick="location.href='?hal=data_kriteria';" value="Batal"></td>
		  </tr>
		</table>
		</form>


    	</div>