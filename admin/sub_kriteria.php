
<?php

if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}


if(!empty($_POST['cmd_simpan'])){
	
	$pendidikan_formasi=$_POST['txt_pf'];
	$pendidikan_teknis=$_POST['txt_pt'];
	$pengalaman_kerja=$_POST['txt_pek'];
	$disiplin=$_POST['txt_disiplin'];
	$motivasi=$_POST['txt_motivasi'];
	$etika=$_POST['txt_etika'];
	$kejujuran=$_POST['txt_kejujuran'];
	$sistematis=$_POST['txt_sistematis'];
	$analisis=$_POST['txt_analisis'];
	$kecermatan=$_POST['txt_kecermatan'];
	$tanggap=$_POST['txt_tanggap'];
	$kerjasama=$_POST['txt_kerjasama'];
	$tanggungjawab=$_POST['txt_tanggungjawab'];
	$km_kerjasama=$_POST['txt_km_kerjasama'];
	$km_manajerial=$_POST['txt_km_manajerial'];
	$pikiran=$_POST['txt_pikiran'];
	$keteladanan=$_POST['txt_keteladanan'];
	
	
	
	
	if(empty($_POST['txt_pf'])or empty($_POST['txt_pt'])or empty($_POST['txt_pek'])or empty($_POST['txt_disiplin'])or empty($_POST['txt_motivasi'])or empty($_POST['txt_etika'])or empty($_POST['txt_kejujuran'])or empty($_POST['txt_sistematis'])or empty($_POST['txt_analisis'])or empty($_POST['txt_kecermatan'])or empty($_POST['txt_tanggap'])or empty($_POST['txt_kerjasama'])or empty($_POST['txt_tanggungjawab'])or empty($_POST['txt_km_kerjasama'])or empty($_POST['txt_km_manajerial'])or empty($_POST['txt_pikiran'])or empty($_POST['txt_keteladanan'])){
		echo "<script>window.alert('Kolom bertanda \'harus diisi\' tidak boleh kosong.');</script>";
	}else{
		if($_POST['txt_action']=='new'){
			if(mysql_num_rows(mysql_query("select * from alternatif where nip='".$_POST['txt_nip']."'"))>0){
				echo "<script>window.alert('NIP yang anda masukan sudah terdaftar sebelumnya. Silahkan gunakan NIP yang lain.');</script>";
			}else{
				$q="insert into alternatif(pendidikan_formasi,pendidikan_teknis,pengalaman_kerja,disiplin,motivasi,etika,kejujuran,sistematis,analisis,kecermatan,tanggap,kerjasama,tanggungjawab,km_kerjasama,km_manajerial,pikiran,keteladanan) values('".$_POST['txt_pf']."','".$_POST['txt_pt']."','".$_POST['txt_pek']."','".$_POST['txt_disiplin']."','".$_POST['txt_motivasi']."','".$_POST['txt_etika']."','".$_POST['txt_kejujuran']."','".$_POST['txt_sistematis']."','".$_POST['txt_analisis']."','".$_POST['txt_kecermatan']."','".$_POST['txt_tanggap']."','".$_POST['txt_kerjasama']."','".$_POST['txt_tanggungjawab']."','".$_POST['txt_km_kerjasama']."','".$_POST['txt_km_manajerial']."','".$_POST['txt_pikiran']."','".$_POST['txt_keteladanan']."')";
				mysql_query($q);
				exit("<script>location.href='?hal=sub_kriteria';</script>");
			}
		}
		if($_POST['txt_action']=='edit'){
			$q=mysql_query("select nip from alternatif where id_pegawai='".$_POST['txt_id']."'");
			$h=mysql_fetch_array($q);
			$nip_tmp=$h['nip'];
			if(mysql_num_rows(mysql_query("select * from alternatif where nip='".$_POST['txt_nip']."' and nip<>'".$nip_tmp."'"))>0){
				echo "<script>window.alert('NIP yang anda masukan sudah terdaftar sebelumnya. Silahkan gunakan NIP yang lain.');</script>";
			}else{
				$q="update alternatif set pendidikan_formasi='".$_POST['txt_pf']."','".$_POST['txt_pt']."','".$_POST['txt_pek']."','".$_POST['txt_disiplin']."','".$_POST['txt_motivasi']."','".$_POST['txt_etika']."','".$_POST['txt_kejujuran']."','".$_POST['txt_sistematis']."','".$_POST['txt_analisis']."','".$_POST['txt_kecermatan']."','".$_POST['txt_tanggap']."','".$_POST['txt_kerjasama']."','".$_POST['txt_tanggungjawab']."','".$_POST['txt_km_kerjasama']."','".$_POST['txt_km_manajerial']."','".$_POST['txt_pikiran']."','".$_POST['txt_keteladanan']."'";
				mysql_query($q);
				exit("<script>location.href='?hal=sub_kriteria';</script>");
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
		
		$pendidikan_formasi=$h['pendidikan_formasi'];
		$pendidikan_teknis=$h['pendidikan_teknis'];
	$pengalaman_kerja=$h['pengalaman_kerja'];
	$disiplin=$h['disiplin'];
	$motivasi=$h['motivasi'];
	$etika=$h['etika'];
	$kejujuran=$h['kejujuran'];
	$sistematis=$h['sistematis'];
	$analisis=$h['analisis'];
	$kecermatan=$h['kecermatan'];
	$tanggap=$h['tanggap'];
	$kerjasama=$h['kerjasama'];
	$tanggungjawab=$h['tanggungjawab'];
	$km_kerjasama=$h['km_kerjasama'];
	$km_manajerial=$h['km_manajerial'];
	$pikiran=$h['pikiran'];
	$keteladanan=$h['keteladanan'];
	$hasil_ki=$h['hasil_ki'];
	$hasil_kk=$h['hasil_kk'];
	$hasil_pk=$h['hasil_pk'];
	$hasil_kp=$h['hasil_kp'];
	}
}

if($_GET['action']=='delete' and !empty($_GET['id'])){
	$id=$_GET['id'];
	mysql_query("delete from alternatif where id_pegawai='".$id."'");
	exit("<script>location.href='?hal=sub_kriteria';</script>");
}

?>


        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<div style="font-size:18px;padding:10px 0 10px 0 ">PENILAIAN DATA PEGAWAI</div>
		<form action="?hal=sub_kriteria" name="" method="post">



		<input name="txt_action" type="hidden" value="<?php echo $action;?>">
		<input name="txt_id" type="hidden" value="<?php echo $id;?>">
        
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  
           
          <tr>
			<td width="160">Nilai Pendidikan Formasi</td>
			<td><input name="txt_pf" id="pf" type="number" size="40" value="<?php echo $pendidikan_formasi;?>"> <em>harus diisi</em></td>
		  
			<td width="160">Nilai Pendidikan Teknis</td>
			<td><input name="txt_pt" id="pt" type="number" size="40" value="<?php echo $pendidikan_teknis;?>"> <em>harus diisi</em></td>
		  </tr>
          <tr>
			<td width="160">Nilai Pengalaman Kerja</td>
			<td><input name="txt_pek" type="number" size="40" value="<?php echo $pengalaman_kerja;?>"> <em>harus diisi</em></td>
		 
			<td width="120">Nilai Disiplin</td>
			<td><input name="txt_disiplin" type="number" size="40" value="<?php echo $disiplin;?>"> <em>harus diisi</em></td>
		  </tr>
          <tr>
			<td width="120">Nilai Motivasi</td>
			<td><input name="txt_motivasi" type="number" size="40" value="<?php echo $motivasi;?>"> <em>harus diisi</em></td>
		 
			<td width="120">Nilai Etika</td>
			<td><input name="txt_etika" type="number" size="40" value="<?php echo $etika;?>"> <em>harus diisi</em></td>
		  </tr>
          <tr>
			<td width="120">Nilai Kejujuran</td>
			<td><input name="txt_kejujuran" type="number" size="40" value="<?php echo $kejujuran;?>"> <em>harus diisi</em></td>
		  
			<td width="120">Nilai Sistematis</td>
			<td><input name="txt_sistematis" type="number" size="40" value="<?php echo $sistematis;?>"> <em>harus diisi</em></td>
		  </tr>
          <tr>
			<td width="120">Nilai Analisis</td>
			<td><input name="txt_analisis" type="number" size="40" value="<?php echo $analisis;?>"> <em>harus diisi</em></td>
		  
			<td width="120">Nilai Kecermatan</td>
			<td><input name="txt_kecermatan" type="number" size="40" value="<?php echo $kecermatan;?>"> <em>harus diisi</em></td>
		  </tr>
          <tr>
			<td width="120">Nilai Tanggap</td>
			<td><input name="txt_tanggap" type="number" size="40" value="<?php echo $tanggap;?>"> <em>harus diisi</em></td>
		 
			<td width="120">Nilai Kerjasama</td>
			<td><input name="txt_kerjasama" type="number" size="40" value="<?php echo $kerjasama;?>"> <em>harus diisi</em></td>
		  </tr>
          <tr>
			<td width="120">Nilai Tanggungjawab</td>
			<td><input name="txt_tanggungjawab" type="number" size="40" value="<?php echo $tanggungjawab;?>"> <em>harus diisi</em></td>
		  
			<td width="120">Nilai KM Kerjasama</td>
			<td><input name="txt_km_kerjasama" type="number" size="40" value="<?php echo $km_kerjasama;?>"> <em>harus diisi</em></td>
		  </tr>
          <tr>
			<td width="120">Nilai KM Manajerial</td>
			<td><input name="txt_km_manajerial" type="number" size="40" value="<?php echo $km_manajerial;?>"> <em>harus diisi</em></td>
		  
			<td width="120">Nilai Pikiran</td>
			<td><input name="txt_pikiran" type="number" size="40" value="<?php echo $pikiran;?>"> <em>harus diisi</em></td>
		  </tr>
          <tr>
			<td width="120">Nilai Keteladanan</td>
			<td><input name="txt_keteladanan" type="number" size="40" value="<?php echo $keteladanan;?>"> <em>harus diisi</em></td>
		  
			
			<td>
            
			
			
			
			<input name="cmd_simpan" type="submit" value="Simpan"> 
			
			<input name="cmd_batal" type="button" onClick="location.href='<?php echo $_SERVER['HTTP_REFERER'];?>';" value="Batal"></td>
		  </tr> 
		</table>
        
    	</div>
        