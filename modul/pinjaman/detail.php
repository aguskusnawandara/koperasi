<?php
include'koneksi/koneksi.php';

echo "<table id='theTable' width='100%'>;
<tr>
	<th width='5%'>No</th>
	<th>Cicilan ke</th>
	<th>Tanggal <br> Jatuh Tempo</th>
	<th>Angsuran</th>
	<th>Bunga</th>
	<th>Total</th>
	<th>Tanggal Bayar</th>
	<th>Jumlah Bayar</th>
</tr>";

$id_pinjam=$_GET['id_pinjam'];

$sql = mysqli_query($koneksi,"SELECT * FROM pinjaman_detail WHERE cicilan and id_pinjam='$id_pinjam' order by cicilan asc");
$no = 1;
$gtotal = 0;
$gtotal_b = 0;
while ($rows=mysqli_fetch_array($sql)){
	$id_detail=$rows['id_detail'];
	// $id_pinjam  =$rows['id_pinjam'];
	$tanggal = $rows['tgl_bayar'];
	$jatuhtempo =$rows['tgl_jatuh_tempo'];
	$jumlah = $rows['angsuran'] + $rows['bunga'];
	$jml_bayar = $rows['jumlah_bayar'];
	echo "<tr>
	<input type='hidden' id='id_pinjam".$no."' value='$id_pinjam'>
	 <input type='hidden' id='id_pinjam".$no."' value='$id_pinjam'>
	<td align='center'>$no<input type='hidden' id='id_detail".$no."' value='$id_detail'></td>
		<td align='center'>" . $rows['cicilan'] ."</td>
	<td align='center'>$jatuhtempo</td>
	<td align='right'>" . number_format($rows['angsuran']) . "</td>
	<td align='right'>" . number_format($rows['bunga']) . "</td>
	<td align='right'>" . number_format($jumlah) . "</td>
	<td align='center'><input type='text' readonly='readonly' id='tgl_bayar".$no."' name='tgl_bayar' value='$tanggal' size='10' /></td>
	<td align='center'><input type='text' readonly='readonly' id='jumlah_bayar".$no."' name='jumlah_bayar' value='$jml_bayar'size='11' /></td>
</tr>";

$no++;
$gtotal += $jumlah;
$gtotal_b += $jml_bayar;
}
$sisa = $gtotal - $gtotal_b;
echo "<tr>
<td colspan='5' align='center'>Total</td>
<td align='right'><b>" . number_format($gtotal) . "</b></td>
<td align='center'></td>
<td align='center'><b>" . number_format($gtotal_b) . "</b></td>
</tr>
<tr>
	<td colspan='5' align='center'>Sisa Angsuran</td>
	<td align='right'><b>" . number_format($sisa) . "</b></td> 
</tr>"
;
echo "</table>";


echo "<br>";

?>
<script>
	function simpan(n){ 
		var a=document.getElementById('id_detail'+n).value;
		var b=document.getElementById('tgl_bayar'+n).value;
		var c=document.getElementById('jumlah_bayar'+n).value;
		var d=document.getElementById('id_pinjam'+n).value;
		$.ajax({
			type : 'POST',
			url : 'cek_login.php?modul=pinjaman&act=update',
			data : 'id_detail='+a+'&tgl_bayar='+b+'&jumlah_bayar='+c,
			success : function(data){
				//alert(data);
				window.location.replace('media.php?modul=pinjaman&act=detail&id_pinjam='+d+'');
			}
		})
	}
</script>