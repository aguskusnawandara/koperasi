<?php
$modul = $_GET['modul'];
$act    = $_GET['act'];
if(isset($modul) and isset($act)){
	if($modul==='pinjaman' and $act==='tambah'){
		$id_pinjam =$_POST['id_pinjam'];
		$id_anggota=$_POST['id_anggota'];
		$tanggal=$_POST['tanggal'];
		$jumlah=$_POST['jumlah'];
		$lama=$_POST['lama'];
		$status=$_POST['status'];
		mysqli_query($koneksi,"INSERT INTO pinjaman_header SET id_pinjam='$id_pinjam',id_anggota='$id_anggota',tgl='$tanggal',
							jumlah='$jumlah',lama='$lama',status='$status'");
		Echo "<script>window.alert('DATA SUDAH DISIMPAN')		
		window.location='mediaanggota.php?modul=pinjaman&act=list'</script>";
	}
}

?>