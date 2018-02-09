<script>


var dayarray=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu")
var montharray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember")

function getthedate(){
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
daym="0"+daym
var hours=mydate.getHours()
var minutes=mydate.getMinutes()
var seconds=mydate.getSeconds()
var dn="AM"
if (hours>=12)
dn="PM"
//if (hours>12){
//hours=hours-12
//}
//if (hours==0)
//hours=12
if (minutes<=9)
minutes="0"+minutes
if (seconds<=9)
seconds="0"+seconds
//change font size here
var cdate=""+dayarray[day]+", " +daym+ " " +montharray[month]+" "+year+" "+hours+":"+minutes+":"+seconds
if (document.all)
document.all.clock.innerHTML=cdate
else if (document.getElementById)
document.getElementById("clock").innerHTML=cdate
else
document.write(cdate)
}
if (!document.all&&!document.getElementById)
getthedate()
function goforit(){
if (document.all||document.getElementById)
setInterval("getthedate()",1000)
}
goforit();
</script>
<?php

$str->menu[]=array('Halaman Depan', './');
$str->menu[]=array('Administrator', '?hal=login_admin');
for($i=0;$i<count($str->menu);$i++){
	if($i==0){
		$str->separator='';
	}else{
		$str->separator=' <span class="divider">&nbsp;</span> ';
	}
	$str->menu_atas.=$str->separator.'<a href="'.$str->menu[$i][1].'">'.$str->menu[$i][0].'</a>';
}


?>
<div id="top_header">
		<div id="logo" style="height:50px ">
            &nbsp;
		</div>
		<!--
		<div id="quicknav">
		  	<div style="position:absolute "><span id="clock" style="font-family:Arial;font-size:12px;padding-left:10px "></span></div><?php echo $str->menu_atas;?>
			
		</div>
		<div id="search">
		
			
		</div>
		-->
	</div>
