<?php 
function koperasi($id){
	$koneksi=mysqli_connect('localhost','root','');
	mysqli_select_db($koneksi,'koperasi');
	$sql=mysqli_query($koneksi,"SELECT * FROM profile where id='$id'");
	$row=mysqli_num_rows($sql);
	if($row>0){
			$data=mysqli_fetch_array($sql);
			$hasil=$data['koperasi'];
		}else{
			$hasil=0;
		}
	return $hasil;
}
function alamatkoperasi($id){
	$koneksi=mysqli_connect('localhost','root','');
	mysqli_select_db($koneksi,'koperasi');
	$sql = mysqli_query($koneksi,"SELECT * FROM profile WHERE id='$id'");
	$r=mysqli_fetch_array($sql);
	$row = mysqli_num_rows($sql);
	if ($row>0){
		$hasil = $r['alamat'] . " " . $r['kota'] . "<br/>" .
				"Phone: " . $r['hp'] . "<br/>" .
				"Email: " . $r['email'] . "<br/>";
	} else {
		$hasil = "";
	}
	return $hasil;
}
function kotakoperasi($id){
	$koneksi=mysqli_connect('localhost','root','');
	mysqli_select_db($koneksi,'koperasi');
	$sql =mysqli_query($koneksi,"SELECT * FROM profile WHERE id='$id'");
	$data = mysqli_fetch_array($sql);
	$row = mysqli_num_rows($sql);
	if ($row>0){
		$hasil = $data['kota'];
	} else {
		$hasil = "";
	}
	return $hasil;
}
function simpanan($anggota){
	$koneksi=mysqli_connect('localhost','root','');
	mysqli_select_db($koneksi,'koperasi');
	$sql = mysqli_query($koneksi,"SELECT sum(jumlah) as total FROM simpanan WHERE id_anggota='$anggota'");
	$row = mysqli_num_rows($sql);
	if ($row > 0){
		$data = mysqli_fetch_array($sql);
		$hasil = $data['total'];
	} else {
		$hasil = 0;
	}

	return $hasil;
}
function pengambilan($anggota){
	$koneksi=mysqli_connect('localhost','root','');
	mysqli_select_db($koneksi,'koperasi');
	$sql = mysqli_query($koneksi,"SELECT sum(jumlah) as total FROM `pengambilan` WHERE id_anggota='$anggota'");
	$row = mysqli_num_rows($sql);
	if ($row > 0){
		$data = mysqli_fetch_array($sql);
		$hasil = $data['total'];
	} else {
		$hasil = 0;
	}
	return $hasil;
}
function saldo($anggota){
	$simpanan = simpanan($anggota);
	$pengambilan = pengambilan($anggota);
	$saldo = $simpanan - $pengambilan;
	return $saldo;
}
function sisaAngsuran($anggota){
	$koneksi=mysqli_connect('localhost','root','');
	mysqli_select_db($koneksi,'koperasi');
	$sql =mysqli_query ($koneksi,"SELECT b.id_anggota, sum(a.angsuran+a.bunga) as total FROM pinjaman_detail as a
    JOIN pinjaman_header as b
    ON a.id_pinjam=b.id_pinjam
    WHERE jumlah_bayar=0 AND id_anggota='$anggota'");
    $row = mysqli_num_rows($sql);
    if ($row>0){
    	$data = mysqli_fetch_array($sql);
    	$hasil = $data['total'];
    } else {
    	$hasil = 0;
    }
    return $hasil;
}
function jmlBayar($no){
	//cicilan yang harus dibayar
	$koneksi=mysqli_connect('localhost','root','');
	mysqli_select_db($koneksi,'koperasi');
	$sql = mysqli_query($koneksi,"SELECT sum(angsuran+bunga) as total FROM pinjaman_detail WHERE id_pinjam='$no'");
	$data = mysqli_fetch_array($sql);
	$row = mysqli_num_rows($sql);
	if ($row > 0){
		$hasil = $data['total'];
	} else {
		$hasil = 0;
	}
	return $hasil;
}
function cicilan($no){
	$koneksi=mysqli_connect('localhost','root','');
	mysqli_select_db($koneksi,'koperasi');
	//cicilan yang sudah dibayar
	$sql = mysqli_query($koneksi,"SELECT sum(jumlah_bayar) as total FROM pinjaman_detail WHERE id_pinjam='$no'");
	$data = mysqli_fetch_array($sql);
	$row = mysqli_num_rows($sql);
	if ($row > 0){
		$hasil = $data['total'];
	} else {
		$hasil = 0;
	}
	return $hasil;
}