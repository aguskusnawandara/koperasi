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
text-align:center;
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
$kode1 = $_GET['kode1'];
$kode2 = $_GET['kode2'];
$pilih = $_GET['pilih']; 
$judul = "Laporan Pinjaman Anggota <br>";
if ($pilih=='pilih'){
	$where = " WHERE a.noanggota BETWEEN '$kode1' AND '$kode2'";
	$judul .= "Berdasarkan Nomor $kode1 s/d $kode2 <br>";
} elseif ($pilih=='tanggal'){
	$where = " WHERE a.tgl BETWEEN '$tgl1' AND '$tgl2'";
	$judul .= "Berdasarkan Tanggal $kode1 s/d $kode2 <br>";
} else {
	$where = "";
}
$profil = "<span class='koperasi'>" . koperasi(1) . "</span><br>";
$profil .= alamatkoperasi(1);
$sql =mysqli_query($koneksi,"SELECT a.*,b.namaanggota,b.jk FROM pinjaman_header as a
		JOIN anggota as b
		ON a.id_anggota=b.id_anggota
		$where
		ORDER BY a.id_pinjam DESC");
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
				<th>Tanggal</th>
				<th>No. Anggota</th>
				<th>Nama</th>
				<th>L/P</th>
				<th>Lama</th>
				<th>Jumlah</th> 
				<th>Jumlah Bayar</th>
				<th>Jumlah Cicilan</th>
				<th>Sisa</th> 
			</tr>";
}
//tampilkan data 
$no = 1;
$page = 1;
$t_jml = 0;
$t_jmlbayar = 0;
$t_jmlcicilan = 0;
$t_jmlsisa = 0;
while ($r_data=mysqli_fetch_array($sql)){
	$tgl = $r_data['tgl'];
	$jml_bayar = jmlBayar($r_data['id_pinjam']);
	$jml_cicilan = cicilan($r_data['id_pinjam']);
	$sisa = $jml_bayar - $jml_cicilan;
	$t_jml += $r_data['jumlah'];
	$t_jmlbayar += $jml_bayar;
	$t_jmlcicilan += $jml_cicilan;
	$t_jmlsisa += $sisa;
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
		<td align='center'>$tgl</td>
		<td align='center'>" . $r_data['id_anggota'] . "</td>
		<td align='left'>" . $r_data['namaanggota'] . "</td>
		<td align='center'>" . $r_data['jk'] . "</td>  
		<td align='center'>" . $r_data['lama'] . "</td>  
		<td align='right'>" . number_format($r_data['jumlah']) . "</td>
		<td align='right'>" . number_format($jml_bayar) . "</td>
		<td align='right'>" . number_format($jml_cicilan) . "</td>
		<td align='right'>" . number_format($sisa) . "</td>
	</tr>";
	$no++;
}
//total
echo "<tr>
	<td colspan='7' align='center'>Total</td>
	<td align='right'><b>" . number_format($t_jml) . "</b></td>
	<td align='right'><b>" . number_format($t_jmlbayar) . "</b></td>
	<td align='right'><b>" . number_format($t_jmlcicilan) . "</b></td>
	<td align='right'><b>" . number_format($t_jmlsisa) . "</b></td>
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