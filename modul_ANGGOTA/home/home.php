<?php
include'koneksi/koneksi.php';
$nama   = $_SESSION['nama'];
$query =mysqli_query($koneksi,"SELECT * FROM users WHERE password=MD5('$nama')");
$cek =mysqli_num_rows($query);
if ($cek==1) { ?>
	<center><div class="panel panel-danger">
      <div class="panel-heading">lakukan ubah password untuk keamanan akun anda</div></div></center>
<?php }
$koperasi = koperasi(1);
echo "<div align='center'>";
		echo "Hai, <b>$_SESSION[nama]</b>!!!   Selamat datang di Sistem Informasi  <b>$koperasi</b>";
		echo "</br>";
		echo "<img src='asset/bootstrap/images/logo_koperasi_85.png'>";		

		echo "<br>";
echo '<center>';
echo "<table> 
<tbody>
	<tr>
		<td width='120' align='center'><a href='mediaanggota.php?modul=anggota&act=list'><img src='asset/bootstrap/images/anggota.png' border='none'><br><b>Profil</b></a></td>
		<td width='120' align='center'><a href='mediaanggota.php?modul=simpanan&act=list'><img src='asset/bootstrap/images/simpanan.png' border='none'><br><b>Simpanan</b></a></td>
		<td width='120' align='center'><a href='mediaanggota.php?modul=pinjaman&act=list'><img src='asset/bootstrap/images/pinjaman.png' border='none'><br><b>Pinjaman</b></a></td>
	</tr>
</tbody>
</table>
<center>";
?>