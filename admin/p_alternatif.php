<?php

if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}

$nav_link='hal=data_alternatif';
$edit_link='hal=update_alternatif';

$q="select * from alternatif order by nama";
$sql=mysql_query($q);
if(mysql_num_rows($sql) > 0){
	while($h=mysql_fetch_array($sql)){
		$no++;
		$daftar.='
		  <tr>
			<td valign="top" align="center">'.$no.'</td>
			<td valign="top" align="center">'.$h['nip'].'</td>
			<td valign="top" align="center">'.$h['nama'].'</td>
			<td valign="top" align="center">'.$h['jabatan'].'</td>
			
			<td align="center" valign="top"><a href="#" onclick="DeleteConfirm(\'?'.$edit_link.'&id='.$h['id_pegawai'].'&action=delete\');return(false);"><img src="images/delete.png"></a> </td>
		  </tr>
		';
	}
}


?>
<script language="javascript">
function DeleteConfirm(url){
	if (confirm("Apakah anda yakin ingin menghapus ?")){
		window.location.href=url;
	}
}
</script>

        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<div style="font-size:18px;padding:10px 0 10px 0 ">DATA PEGAWAI</div>
		<div align="right"><a href="?hal=update_alternatif&amp;action=new">Tambah Data</a></div><br>
		<table width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		  <tr>
			<td align="center" width="40">No</td>
			<td align="center" width="140">NIP</td>
			<td align="center">Nama Pegawai</td>
			<td align="center" width="200">Jabatan</td>
			<td align="center" width="40">Action</td>
		  </tr>
		  <?php echo $daftar;?>
		</table>

		

    	</div>
