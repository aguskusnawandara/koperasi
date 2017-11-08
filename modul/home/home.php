<?php
include "koneksi/koneksi.php";
$nama = koperasi(1);
		echo "<div align='center'>";
		echo "Hai, <b>$_SESSION[nama]</b>!!!   Selamat datang di Sistem Informasi  <b>$nama</b>";
		echo "</br>";
		echo "<img src='asset/bootstrap/images/logo_koperasi_85.png'>";		
		echo "<br>";
		echo "<center>";
		echo "<table> 
<tbody>
	<tr>
		<td width='120' align='center'><a href='media.php?modul=jenis&act=list'><img src='asset/bootstrap/images/jenis.png' border='none'><br><b>Jenis Simpanan</b></a></td>
		<td width='120' align='center'><a href='media.php?modul=anggota&act=list'><img src='asset/bootstrap/images/anggota.png' border='none'><br><b>Anggota</b></a></td>
		<td width='120' align='center'><a href='media.php?modul=pengguna&act=list'><img src='asset/bootstrap/images/users.png' border='none'><br><b>Pengguna</b></a></td>
	</tr>
	<tr>
		<td width='120' align='center'><a href='media.php?modul=profil&act=list'><img src='asset/bootstrap/images/profil.png' border='none'><br><b>Profil</b></a></td>
		<td width='120' align='center'><a href='media.php?modul=simpanan&act=list'><img src='asset/bootstrap/images/simpanan.png' border='none'><br><b>Simpanan</b></a></td>
		<td width='120' align='center'><a href='media.php?modul=pinjaman&act=list'><img src='asset/bootstrap/images/pinjaman.png' border='none'><br><b>Pinjaman</b></a></td>
	</tr>
</tbody>
</table>
</center>";

?>