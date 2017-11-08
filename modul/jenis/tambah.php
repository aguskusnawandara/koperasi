<?php
include'koneksi/koneksi.php';
$cariKode=mysqli_query($koneksi,"SELECT max(id_jenis)from jenis_simpan");
$q=mysqli_fetch_array($cariKode);
if($q){
	$nilaiKode=substr($q[0],1);
	$kode=(int)$nilaiKode;
	$kode=$kode+1;
	$kodeOtomatis="J".str_pad($kode,4,"0",STR_PAD_LEFT);
}else{
	$kodeOtomatis="J0001";
}
?>
<center><div class="panel panel-danger">
  <div class="panel-heading">DAFTAR JENIS SIMPANAN</div></div></center>

	<form method="POST" action="cek_login.php?modul=jenis&act=tambah">
	<table class="table table-bordered">
	<tr>
		<td>Id jenis</td>
		<td><input type="text" name="id_jenis" required readonly="readonly" value="<?php echo $kodeOtomatis;?>" class="form-control"></td>
	</tr>
	<tr>
		<td>jenis_simpanan</td>
		<td><input type="text" name="jenis" 
		pattern="[a-zA-Z ]+" autofocus required 
		oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')"  class="form-control"></td>
	<tr>
		<td></td><td><button type="submit" class="btn btn-warning">
		 <span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span>Simpan</button>
		<a href="media.php?modul=jenis&act=list" class="btn btn-danger">
		 <span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span>Batal</a></td></tr>
</tr>
	</table>
</form>
