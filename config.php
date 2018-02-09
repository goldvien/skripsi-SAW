<?php

$db->host='localhost';
$db->user='root';
$db->password='';
$db->name='db_saw';

$wwwexit='./';

$link=mysql_connect($db->host,$db->user,$db->password);
mysql_select_db($db->name);

?>