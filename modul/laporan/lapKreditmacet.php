<?php 
	session_start();
?>
<style type="text/css">
*{
font-family: Arial;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
table.grid{
width:29.7cm ;
font-size: 9pt;
border-collapse:collapse;
}
table.grid th{
padding-top:1mm;
padding-bottom:1mm;
}
table.grid th{
background: #F0F0F0;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:center
padding-left:0.2cm;
border:1px solid #000;
}
table.grid tr td{
padding-top:0.5mm;
padding-bottom:0.5mm;
padding-left:2mm;
border-bottom:0.2mm solid #000;
border:1px solid #000;
}
h1{
font-size: 18pt;
}
h2{
font-size: 14pt;
}
.profil{
display: block;
width:20.4cm ;
font-size:10px;
margin:0px;
padding:0px;
}
.profil .koperasi{
font-size:14px;
font-weight:bold;
}
.header{
display: block;
width:29.7cm ;
margin-bottom: 0.3cm;
text-align: center;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
width:29.7cm ;
page-break-after: always;
margin-bottom:10px;
}
.akhir {
width:29.7cm ;
font-size:13px;
}
.page {
width:29.7cm ;
font-size:12px;
}

</style>


<?php 
include "../../koneksi/koneksi.php";
include "../../koneksi/fungsikoperasi.php";	

$tgl1 = $_GET['tgl1'];
$pilih = $_GET['pilih'];

$judul = "Laporan Hutang Anggota <br>";

if ($pilih=='tanggal'){
	$where = " WHERE a.tgl_jatuh_tempo BETWEEN '$tgl1' AND '$tgl2' AND a.jumlah_bayar=0";
	$judul .= "Berdasarkan Tanggal Jatuh Tempo $tgl1 s/d $tgl2 <br>";
} else {
	$where = " WHERE a.jumlah_bayar=0";
}

$profil = "<span class='koperasi'>" . koperasi(1) . "</span><br>";
$profil .= alamatkoperasi(1);

$query =mysqli_query($koneksi,"SELECT a.*,b.*,c.*,(a.angsuran+a.bunga) as total
					 FROM pinjaman_detail as a
						JOIN pinjaman_header as b
						JOIN anggota as c
						ON a.id_pinjam=b.id_pinjam
						AND b.id_anggota=c.id_anggota 
						$where ORDER BY a.id_pinjam,b.id_anggota,a.cicilan");
function myHeader($profil, $judul){
	echo "<div class='profil'>" . $profil .
		"</div> <br>
		<div class='header'>
			<h2>" . $judul . "</h2>
		</div>
		<table class='grid'>
			<tr>
				<th width='5%'>No</th>
				<th>Nomor</th>
				<th>Jatuh Tempo</th>
				<th>No Anggota</th>
				<th>Nama</th>
				<th>L/P</th>
				<th>Cicilan Ke</th>
				<th>Jumlah</th> 
			</tr>";
}

//tampilkan data 
$no = 1;
$page = 1;
$t_jml = 0;

while ($r_data=mysqli_fetch_array($query)){
	$tgl =$r_data['tgl_jatuh_tempo'];
	$jumlah = $r_data['total'];
	$t_jml += $jumlah;

	if (($no%40) == 1){
		if ($no > 1){
			echo "<div class='pagebreak' align='right'>
			<div class='page' align='center'>Hal - $page </div>
			</div>
			";
			$page++;
		}
		//header
		myHeader($profil,$judul);
	}
	//no>=1
	echo "<tr>
		<td align='center'>$no</td>
		<td align='center'>" . $r_data['id_pinjam'] . "</td>
		<td align='center'>" . $tgl . "</td>
		<td align='center'>" . $r_data['id_anggota'] . "</td>
		<td align='left'>" . $r_data['namaanggota'] . "</td>
		<td align='center'>" . $r_data['jk'] . "</td>  
		<td align='left'>" . $r_data['cicilan'] . "</td>
		<td align='right'>" . number_format($jumlah) . "</td> 
	</tr>";
	$no++;
}

//total
echo "<tr>
	<td colspan='7' align='center'>Total</td>
	<td align='right'><b>" . number_format($t_jml) . "</b></td>
</tr>";

echo "</table>";
echo "<br>";

echo "<div class='akhir' align='right'>";
$kota = kotakoperasi(1);
echo $kota . ", " . date('d F Y');
echo "<br>Staf Koperasi";
echo "<br><br><br>";
echo "</div>";
echo "<div class='page' align='center'>Hal - " . $page . "</div>";
?>