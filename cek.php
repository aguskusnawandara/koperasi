<?php
session_start();
include 'koneksi/koneksi.php';
$modul = $_GET['modul'];

if($modul=='profil'){
    include 'modul/profil/act_profil.php';
}elseif($modul=='pengguna'){
	include'modul/pengguna/act_pengguna.php';
}elseif($modul=='jenis'){
	include'modul/jenis/act_jenis.php';
}elseif($modul=='anggota'){
	include'modul_ANGGOTA/anggota/act_anggota.php';
}elseif($modul=='simpanan'){
	include'modul/simpanan/act_simpanan.php';
}elseif($modul=='penarikan'){
	include'modul/penarikan/act_penarikan.php';
}elseif($modul=='pinjaman'){
	include'modul_ANGGOTA/pinjaman/act_pinjaman.php';
}
	

?>