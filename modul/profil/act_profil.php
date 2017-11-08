<?php
include '/koneksi/koneksi.php';
$modul = $_GET['modul'];
$act    = $_GET['act'];
if(isset($modul) and isset($act)){
    if($modul=='profil' and $act=='update'){
$id=$_POST['id'];
$koperasi=$_POST['koperasi'];
$alamat=$_POST['alamat'];
$kota=$_POST['kota'];
$hp=$_POST['hp'];
$email=$_POST['email'];

mysqli_query($koneksi,"UPDATE profile SET koperasi='$koperasi',alamat='$alamat',kota='$kota',hp='$hp',
						email='$email' where id='1'");
header('location:media.php?modul=profil&act=list');
}
}
?>
