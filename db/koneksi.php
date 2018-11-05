<?php
$srvr="localhost"; //SESUAIKAN DENGAN WEBSERVER ANDA
$db="belajar_bengkel"; //SESUAIKAN DENGAN WEBSERVER ANDA
$usr="root"; //SESUAIKAN DENGAN WEBSERVER ANDA
$pwd="";//SESUAIKAN DENGAN WEBSERVER ANDA

$conn = mysqli_connect($srvr,$usr,$pwd,$db);
if(!$conn){
	echo "eroor";
}

?>