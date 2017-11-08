<?php
include'koneksi/koneksi.php';
$cariKode=mysqli_query($koneksi,"SELECT max(id_simpanan)from simpanan");
$q=mysqli_fetch_array($cariKode);
if($q){
	$nilaiKode=substr($q[0],1);
	$kode=(int)$nilaiKode;
	$kode=$kode+1;
	$kodeOtomatis="S".str_pad($kode,4,"0",STR_PAD_LEFT);
}else{
	$kodeOtomatis="S0001";
}
?>
<center><div class="panel panel-danger">
  <div class="panel-heading">DAFTAR SIMPANAN</div></div></center>
	<form method="POST" action="cek_login.php?modul=simpanan&act=tambah">
	<table class="table table-bordered">
	<tr>
		<td>Id Simpanan</td>
		<td><input type="text" name="id_simpanan" required readonly="readonly"  class="form-control" value="<?php echo $kodeOtomatis;?>" /></td>
	</tr>
	
	<tr>
		<td>Tanggal</td>
		<td><input type="date" name="tanggal" required placeholder="" /></td>
	</tr>
	
	<tr>
		<td>Id Anggota</td>
		<td><select name="id_anggota" required id="id_anggota" >
			<?php
			include'koneksi/koneksi.php';
			$sql=mysqli_query($koneksi,"SELECT* FROM anggota");
			    while($r = mysqli_fetch_array($sql)){
			    	echo "<option value='$r[id_anggota]'>$r[id_anggota]</option>";
			    }
			?>
		</select></td>
	</tr>

	<tr>
		<td>Jenis Simpanan</td>
		<td><select name="jenis" required id="jenis" >
			<?php
			include'koneksi/koneksi.php';
			$sql=mysqli_query($koneksi,"SELECT* FROM jenis_simpan");
			    while($r = mysqli_fetch_array($sql)){
			    	echo "<option value='$r[id_jenis]'>$r[jenis_simpanan]</option>";
			    }
			?>
		</select></td>
	</tr>
	
	<tr>
		<td>Jumlah</td>
		<td><input type="text" 
		pattern="[0-9]+" autofocus required 
		oninvalid="this.setCustomValidity('Input Hanya boleh Angka')"
		 name="jumlah"   class="form-control" /></td>
	</tr>
	
	<tr>
		<td></td><td><button type="submit" class="btn btn-warning">
		 <span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span>Simpan</button>
		<a href="media.php?modul=simpanan&act=list" class="btn btn-danger">
		 <span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span>Batal</a></td></tr>
</tr>
	</table>

</form>