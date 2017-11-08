<?php
include'koneksi/koneksi.php';
$cariKode=mysqli_query($koneksi,"SELECT max(id_anggota)from anggota");
$q=mysqli_fetch_array($cariKode);
if($q){
	$nilaiKode=substr($q[0],1);
	$kode=(int)$nilaiKode;
	$kode=$kode+1;
	$kodeOtomatis="A".str_pad($kode,4,"0",STR_PAD_LEFT);
}else{
	$kodeOtomatis="A0001";
}
?>
<center><div class="panel panel-danger">
  <div class="panel-heading">DAFTAR ANGGOTA</div></div></center>
	<form method="POST" action="cek_login.php?modul=anggota&act=tambah" onsubmit="return validasiInput(this)">
	<table class="table table-bordered">
	<tr>
		<td>Id anggota</td>
		<td><input type="text" name="id_anggota"   readonly="readonly"  class="form-control" value="<?php echo $kodeOtomatis;?>" /></td>
	</tr>
	<tr>
		<td>nama anggota</td>
		<td><input type="text" name="namaanggota" id="nama" 
		pattern="[a-zA-Z ]+" autofocus required 
		oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')" class="form-control" /></td>
	</tr>
	
	 <tr>
	 <td>JENIS KELAMIN</td>
	 <td> <input type="radio"  autofocus required name="gender" value="L">L 
           <input type="radio" autofocus required value="P" name="gender">P</td></tr>
	<tr>
		<td>Tempat lahir</td>
		<td><input type="text" name="tempat_lahir" id="tempatLahir" 
		pattern="[a-zA-Z ]+" autofocus required 
		oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')" class="form-control"/></td>
	</tr>
	<tr>
		<td>Tgl lahir</td>
		<td><input type="date" name="tgl_lahir"  /></td>
	</tr>
	<tr>
		<td>alamat</td>
		<td><input type="text" name="alamat"  
		pattern="[a-zA-Z ]+"   required 
		oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')" class="form-control" /></td>
	</tr>
	<tr>
		<td>hp</td>
		<td><input type="tel"  name="hp" 
		pattern="[0-9]+"   required 
		oninvalid="this.setCustomValidity('Input Hanya boleh angka 0-9')" maxlength="12"  class="form-control" /></td>
	</tr>
	<tr>
		<td></td><td><button type="submit"  class="btn btn-warning">
		 <span class='glyphicon glyphicon-floppy-save' aria-hidden='true' > </span>Simpan</button>
		<a href="media.php?modul=anggota&act=list" class="btn btn-danger">
		 <span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span>Batal</a></td></tr>
</tr>
	</table>
</form>