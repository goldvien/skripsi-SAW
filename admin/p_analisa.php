<?php


if(empty($_SESSION['LOGIN_username'])){
	exit("<script>location.href='./';</script>");
}

if(!empty($_POST['cmd_submit'])){
	unset($_SESSION['ANALISA_KRITERIA']);
	$q=mysql_query("select * from kriteria");
	while($h=mysql_fetch_array($q)){
		$_SESSION['ANALISA_KRITERIA'][$h['id_kriteria']]=$_POST['txt_bobot_'.$h['id_kriteria']];
	}
	exit("<script>location.href='?hal=hasil';</script>");
}


$bobot[]=array(1,'Sangat Tinggi');


$q=mysql_query("select * from kriteria");
while($h=mysql_fetch_array($q)){
	$no++;
	$list_bobot='';
	for($i=0;$i<count($bobot);$i++){
		if($bobot[$i][0]==$_SESSION['ANALISA_KRITERIA'][$h['id_kriteria']]){$s=' selected';}else{$s='';}
		$list_bobot.='<option value="'.$bobot[$i][0].'"'.$s.'>'.$bobot[$i][1].'</option>';
	}
	
	$daftar_kriteria.='
	<tr hidden="">
		<td  width="160"><strong>C'.$no.'.</strong>&nbsp;&nbsp;&nbsp; '.$h['nama'].'</td>
		<td ><select name="txt_bobot_'.$h['id_kriteria'].'" style="width:150px">'.$list_bobot.'</select></td>
	</tr>
	';
}



?>

        <div style="font-family:Arial;font-size:12px;padding:3px ">
		<div style="font-size:18px;padding:10px 0 10px 0 ">SILAHKAN HITUNG SAW PADA TOMBOL HITUNG SAW </div>
		
		<form action="?hal=analisa" method="post">
		<table hidden="" width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		<?php echo $daftar_kriteria;?>
		</table>
		<br />
		<br /><input name="cmd_submit" type="submit" value="Hitung SAW &raquo;" />
		</form>
    	</div>
