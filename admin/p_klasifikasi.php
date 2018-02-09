<?php
if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}

if(!empty($_POST['cmd_simpan'])){
	
	mysql_query("delete from klasifikasi where id_pegawai='".$_POST['txt_pegawai']."'");
	$q=mysql_query("select * from kriteria");
	if(mysql_num_rows($q) > 0){
		while($h=mysql_fetch_array($q)){
			
			if(!empty($_POST['himpunan_'.$h['id_kriteria']])){
				mysql_query("insert into klasifikasi(id_pegawai,id_himpunan) values('".$_POST['txt_pegawai']."','".$_POST['himpunan_'.$h['id_kriteria']]."')");
			}
		}
	}	
	
	echo "<script>alert('Data berhasil tersimpan');location.href='?hal=data_klasifikasi';</script>";
}

$q=mysql_query("select * from alternatif order by nama");
if(mysql_num_rows($q) > 0){
	while($h=mysql_fetch_array($q)){
		$daftar_kriteria='';
		$n=0;
		
		$qq=mysql_query("select * from kriteria");
		if(mysql_num_rows($qq) > 0){
			while($hh=mysql_fetch_array($qq)){
				
				$list_kriteria='<option value=""></option>';
				$qqq=mysql_query("select * from himpunan where id_kriteria='".$hh['id_kriteria']."'");
				if(mysql_num_rows($qqq) > 0){
					while($hhh=mysql_fetch_array($qqq)){
						if(mysql_num_rows(mysql_query("select * from klasifikasi where id_pegawai='".$h['id_pegawai']."' and id_himpunan='".$hhh['id_himpunan']."'"))>0){
							
							$s='selected';
						}else{
							$s='';
						}
						$list_kriteria.='<option value="'.$hhh['id_himpunan'].'"'.$s.'>'.$hhh['nama'].'</option>';
					}
				}
				$n++;
				$input='<select name="himpunan_'.$hh['id_kriteria'].'">'.$list_kriteria.'</select>';

				$daftar_kriteria.='
				<tr>
					<td width="120">'.$hh['nama'].'</td>
					<td>'.$input.'</td>
				</tr>
				';
			}
		}
		
		$no++;
		$daftar.='
		  <tr>
			<td valign="top" align="center">'.$no.'</td>
			<td valign="top" align="center">'.$h['nip'].'</td>
			<td valign="top" align="center">'.$h['nama'].'</td>
			<td valign="top" align="center">'.$h['jabatan'].'</td>
			<td valign="top"><span id="cmd_'.$h['id_pegawai'].'"><strong>Edit Klasifikasi</strong></span></td>
		  </tr>
		  <tr >
			<td valign="top" colspan="5">
			<form action="" name="" method="post" id="kla_'.$h['id_pegawai'].'" style="display:none">
			<input name="txt_pegawai" type="hidden" value="'.$h['id_pegawai'].'" />
			<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
			  <!--<tr>
				<td colspan="2"><strong>'.$no.'. '.strtoupper($h['nama']).'</strong></td>
			  </tr>-->
			  '.$daftar_kriteria.'
			  <tr>
				<td width="140"></td>
				<td><input name="cmd_simpan" type="submit" value="Simpan"></td>
			  </tr>
			</table><br /><br />
			</form>
			</td>
		  </tr>
		';
		$js.="
			$('#cmd_".$h['id_pegawai']."').css( 'cursor', 'pointer' );
			$('#cmd_".$h['id_pegawai']."').click(function() {
			  $('#kla_".$h['id_pegawai']."').toggle('slow', function() {
			  });
			});
		";
	}
}

?>
 
        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<div style="font-size:18px;padding:10px 0 10px 0 ">DATA KRITERIA FORMASI JABATAN</div>
		<br />
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td align="center" width="40">No</td>
			<td align="center" width="120">NIP</td>
			<td align="center">Nama Pegawai</td>
			<td align="center" width="150">Jabatan</td>
			<td align="center" width="100">Action</td>
		  </tr>
		  <?php echo $daftar;?>
		</table>


    	</div>
<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
<script language="JavaScript" type="text/JavaScript">
<?php echo $js;?>
</script>
