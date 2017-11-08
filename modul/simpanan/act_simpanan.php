<?php
$modul = $_GET['modul'];
$act    = $_GET['act'];
if(isset($modul) and isset($act)){
	if($modul==='simpanan' and $act==='tambah'){
		$id_simpanan =$_POST['id_simpanan'];
		$tanggal=$_POST['tanggal'];
		$id_anggota=$_POST['id_anggota'];
		$id_jenis=$_POST['jenis'];
		$jumlah=$_POST['jumlah'];
		mysqli_query($koneksi,"INSERT INTO simpanan SET id_simpanan='$id_simpanan',tgl='$tanggal',id_anggota='$id_anggota',
								id_jenis='$id_jenis',jumlah='$jumlah'");
				header('location:media.php?modul=simpanan&act=list');

	} elseif($modul==='simpanan' and $act==='add'){
		$id_ambil =$_POST['id_ambil'];
		$tanggal=$_POST['tanggal'];
		$id_anggota=$_POST['id_anggota'];
		$id_jenis=$_POST['jenis'];
		$jumlah=$_POST['jumlah'];
		mysqli_query($koneksi,"INSERT INTO pengambilan SET id_ambil='$id_ambil',tgl='$tanggal',id_anggota='$id_anggota',
								id_jenis='$id_jenis',jumlah='$jumlah'");
		echo "<script>window.alert('DATA SUDAH DISIMPAN')		
		window.location='media.php?modul=simpanan&act=list'</script>";

		
	}

}