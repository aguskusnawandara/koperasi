<?php
$modul = $_GET['modul'];
$act    = $_GET['act'];
if(isset($modul) and isset($act)){
	if($modul==='pinjaman' and $act==='update') {
		
	
		$id_detail	 = $_POST['id_detail'];
		$jumlah_bayar= $_POST['jumlah_bayar'];
		$tgl_bayar	 = $_POST['tgl_bayar'];
		$id_pinjam = $_POST['id_pinjam'];


		mysqli_query($koneksi,"UPDATE pinjaman_detail set jumlah_bayar='$jumlah_bayar',tgl_bayar='$tgl_bayar' 
							WHERE id_detail='$id_detail'");
		
		$sql =mysqli_query($koneksi,"SELECT SUM(angsuran) AS angsuran_j, SUM(bunga) AS bunga_j, SUM(jumlah_bayar) AS bayar FROM pinjaman_detail WHERE id_pinjam = '$id_pinjam'");
		$r = mysqli_fetch_array($sql);
		$jmlh_angs = $r['angsuran_j'];
		$jmlh_bunga = $r['bunga_j'];
		$jmlh_byr = $r['bayar'];

		$total_byr= $jmlh_angs + $jmlh_bunga;
		if ($jmlh_byr == $total_byr) {
			mysqli_query($koneksi,"UPDATE pinjaman_header SET status='lunas' where id_pinjam='$id_pinjam'");
			Echo "<script>window.alert('Pinjaman sudah lunas')		
			window.location='media.php?modul=pinjaman&act=list'</script>";
		}else {
			# code...
			Echo "<script>window.alert('DATA SUDAH DISIMPAN')		
			window.location='media.php?modul=pinjaman&act=list'</script>";
		}
	}elseif($modul==='pinjaman' and $act==='tambah'){
			$id_pinjam =$_POST['id_pinjam'];
			$id_anggota=$_POST['id_anggota'];
			$tanggal=$_POST['tanggal'];
			$jumlah=$_POST['jumlah'];
			$lama=$_POST['lama'];
			$status=$_POST['status'];
			mysqli_query($koneksi,"INSERT INTO pinjaman_header SET id_pinjam='$id_pinjam',id_anggota='$id_anggota',tgl='$tanggal',
								jumlah='$jumlah',lama='$lama',status='$status'");
			$bng = 2/100;
			for ($i= 1; $i <= $lama  ; $i++) { 
				$result[$i] = $jumlah / $lama;
				// $bunga = $result[$i] * $bng;
				$bunga	= $jumlah*$bng;
				$angsuran = $result[$i];
				$cicilan = $i;
				date_default_timezone_get('Asia/Jakarta');
				// Todo Convert Date $tanggal
				$tanggal === date('Y-m-d');
				$tgl_jatuh_tempo =date('Y-m-d', strtotime('+' . $cicilan .' month', strtotime($tanggal)));
			    mysqli_query($koneksi,"INSERT INTO pinjaman_detail SET id_pinjam='$id_pinjam', cicilan='$cicilan',tgl_jatuh_tempo='$tgl_jatuh_tempo', angsuran='$angsuran',
							bunga ='$bunga'");
			Echo "<script>window.alert('DATA SUDAH DISIMPAN')		
			window.location='media.php?modul=pinjaman&act=list'</script>";}
	}elseif($modul==='pinjaman' and $act==='acc'){
		

		$id_pinjam =$_POST['id_pinjam'];
		$id_anggota=$_POST['id_anggota'];
		$tanggal=$_POST['tgl'];
		$jumlah=$_POST['jumlah'];
		$lama=$_POST['lama'];
		mysqli_query($koneksi,"UPDATE pinjaman_header SET status='terima' where id_pinjam='$id_pinjam'");
		$bng = 2/100;
		for ($i= 1; $i <= $lama  ; $i++) { 
			$result[$i] = $jumlah / $lama;
			// $bunga = $result[$i] * $bng;
			$bunga	= $jumlah*$bng;
			$angsuran = $result[$i];
			$cicilan = $i;
			date_default_timezone_get('Asia/Jakarta');
			// Todo Convert Date $tanggal
			$tanggal === date('Y-m-d');
			$tgl_jatuh_tempo =date('Y-m-d', strtotime('+' . $cicilan .' month', strtotime($tanggal)));
		    mysqli_query($koneksi,"INSERT INTO pinjaman_detail SET id_pinjam='$id_pinjam', cicilan='$cicilan',tgl_jatuh_tempo='$tgl_jatuh_tempo', angsuran='$angsuran',
						bunga ='$bunga'");
		Echo "<script>window.alert('DATA SUDAH DISIMPAN')		
		window.location='media.php?modul=pinjaman&act=list'</script>";
		}
	}elseif($modul==='pinjaman' and $act==='tolak'){
		

		$id_pinjam =$_POST['id_pinjam'];
		$status=$_POST['status'];

		mysqli_query($koneksi,"UPDATE pinjaman_header SET status='tolak' where id_pinjam='$id_pinjam'");
		Echo "<script>window.alert('DATA SUDAH DISIMPAN')		
		window.location='media.php?modul=pinjaman&act=list'</script>";
	}


}
?>