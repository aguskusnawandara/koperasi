<?php
include'koneksi/koneksi.php';
$modul = $_GET['modul'];
$act    = $_GET['act'];
if(isset($modul) and isset($act)){
	if ($modul == 'home' and $act=='home'){
        include'modul_ANGGOTA/home/home.php';

    }elseif($modul=='anggota' and $act=='list'){
        include 'modul_ANGGOTA/anggota/list.php';
    }elseif($modul=='anggota' and $act=='edit'){
        include 'modul_ANGGOTA/anggota/edit.php';
    }elseif($modul=='anggota' and $act=='edit_pass'){
        include 'modul_ANGGOTA/anggota/edit_pass.php';
    

     }elseif($modul=='simpanan' and $act=='list'){
        include 'modul_ANGGOTA/simpanan/list.php';
     
             
    }elseif($modul=='pinjaman' and $act=='list'){
        include 'modul_ANGGOTA/pinjaman/list.php';
    }elseif($modul=='pinjaman' and $act=='tambah'){
        include 'modul_ANGGOTA/pinjaman/tambah.php';
    }elseif($modul=='pinjaman' and $act=='detail'){
        include 'modul_ANGGOTA/pinjaman/detail.php';
   
    }elseif($modul=='login'){
        include 'login.php';
    }
    
}

