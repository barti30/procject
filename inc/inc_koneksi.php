<?php
$host             ="localhost";
$user             ="root";
$pass             ="";
$db               ="profile"; 

$koneksi          =mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("Could not connect to");
}  