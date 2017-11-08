<?php
include'koneksi/koneksi.php';
$modul = $_GET['modul'];
$act    = $_GET['act'];
if(isset($modul) and isset($act)){
    if ($modul == 'home' and $act=='home'){
        include'modul/home/home.php';

    } elseif($modul=='profil' and $act=='list'){
        include 'modul/profil/list.php';
    }
    elseif($modul=='profil' and $act=='edit'){
        include 'modul/profil/edit.php';
    
    }elseif($modul=='pengguna' and $act=='list'){
        include 'modul/pengguna/list.php';
    }elseif($modul=='pengguna' and $act=='edit'){
        include 'modul/pengguna/edit.php';
    }elseif($modul=='pengguna' and $act=='tambah'){
        include 'modul/pengguna/tambah.php';
    
     }elseif($modul=='jenis' and $act=='list'){
        include 'modul/jenis/list.php';
    }elseif($modul=='jenis' and $act=='edit'){
        include 'modul/jenis/edit.php';
    }elseif($modul=='jenis' and $act=='tambah'){
        include 'modul/jenis/tambah.php';
     
     }elseif($modul=='anggota' and $act=='list'){
        include 'modul/anggota/list.php';
    }elseif($modul=='anggota' and $act=='edit'){
        include 'modul/anggota/edit.php';
    }elseif($modul=='anggota' and $act=='tambah'){
        include 'modul/anggota/tambah.php';

    }elseif($modul=='simpanan' and $act=='list'){
        include 'modul/simpanan/list.php';
     }elseif($modul=='simpanan' and $act=='tambah'){
        include 'modul/simpanan/tambah.php';
    }elseif($modul=='simpanan' and $act=='detail'){
        include 'modul/simpanan/detail.php';
    }elseif($modul=='simpanan' and $act=='ambil'){
        include 'modul/simpanan/ambil.php';
             
    }elseif($modul=='pinjaman' and $act=='list'){
        include 'modul/pinjaman/list.php';
    }elseif($modul=='pinjaman' and $act=='tambah'){
        include 'modul/pinjaman/tambah.php';
    }elseif($modul=='pinjaman' and $act=='bayar'){
        include 'modul/pinjaman/bayar.php';
    }elseif($modul=='pinjaman' and $act=='detail'){
        include 'modul/pinjaman/detail.php';

     }elseif($modul=='lapAnggota' and $act='cetak'){
        include 'modul/lapAnggota/lapAnggota.php';

    }elseif($modul=='lapSimpanan' and $act='cetak'){
        include 'modul/lapSimpanan/lapSimpanan.php';

    }elseif($modul=='lapPinjaman' and $act='cetak'){
        include 'modul/lapPinjaman/lapPinjaman.php';

     }elseif($modul=='lapKreditmacet' and $act='cetak'){
        include 'modul/lapKreditmacet/lapKreditmacet.php';
   
    }elseif($modul=='login'){
        include 'login.php';
    }
    
}

