<?php
include'koneksi/koneksi.php';
	$id_pinjam=$_GET['id_pinjam'];
	$id_anggota   = $_SESSION['namauser'];
    $sql = mysqli_query($koneksi,"SELECT * FROM pinjaman_header WHERE id_pinjam='$id_pinjam'");
    $r = mysqli_fetch_array($sql)
?>
<section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Pinjaman</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table responsive">
                <tr>
                  <td>ID ANGGOTA</td>
                  <td style="width: 10px">:</td>
                  <td><?php echo $r['id_anggota']; ?></td>
                </tr>
                <tr>
                  <td>JUMLAH PINJAMAN</td>
                  <td style="width: 10px">:</td>
                  <td><?php echo "Rp. ".number_format($r['jumlah']); ?></td>
                </tr>
                <tr>
                  <td>LAMA PINJAMAN</td>
                  <td style="width: 10px">:</td>
                  <td><?php echo $r['lama']; ?></td>
                </tr>
    
                
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          </div>

<?php
echo "<table id='theTable' width='100%'>
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



$sql = mysqli_query($koneksi,"SELECT * FROM pinjaman_detail WHERE id_pinjam='$id_pinjam' order by cicilan asc");
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
<td colspan='5' align='center'>Total yang Harus Dibayar</td>
<td align='right'><b> Rp." . number_format($gtotal) . "</b></td>
<td align='center'></td>
<td align='center'><b> Rp." . number_format($gtotal_b) . "</b></td>
</tr>
<tr>
	<td colspan='5' align='center'>Sisa Angsuran</td>
	<td align='right'><b> Rp." . number_format($sisa) . "</b></td> 
</tr>"
;
echo "</table>";


echo "<br>";

?>
</div>
</section>