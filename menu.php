
		<?php if(!empty($_SESSION['LOGIN_username'])){?>
		
		<div id="slider_menu"><h2 class="title" id="menu_utama"> Menu Admin </h2>
		<ul id="menu_utama_ul">
		<li><a href="./">Halaman Depan</a></li>
		<li><a href="?hal=data_kriteria">Data Kriteria</a></li>
        <li><a href="?hal=sub_kriteria">Sub Kriteria</a></li>
		
		<li><a href="?hal=data_alternatif">Data Pegawai</a></li>
		<li><a href="?hal=data_klasifikasi">Klasifikasi</a></li>
        
		<li><a href="logout.php">Logout</a></li>
		</ul>
        </div>
		<div id="slider_menu">
		<ul id="menu_pencarian_ul">
		<li>
        
        
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
		
		<form action="?hal=analisa" method="post">
		<table hidden="" width="100%" border="0" cellspacing="4" cellpadding="0" class="tabel_reg">
		<?php echo $daftar_kriteria;?>
		</table>
		
		<input name="cmd_submit" type="submit" value="Hitung SAW &raquo;" />
		</form>

		</ul>
        
		<?php }else{?>
		<div id="slider_menu"><h2 class="title" id="menu_utama"> Menu Utama </h2>
		<ul id="menu_utama_ul">
		<li><a href="./">Halaman Depan</a></li>
		<li><a href="?hal=login">Login Admin</a></li>
		</ul>
        </div>
		<?php }?>
		
        <div class="spacer_float"></div>
