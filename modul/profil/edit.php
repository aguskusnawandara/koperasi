<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Memperbarui Data ?");
 if (tanya == true)
  return true;
 else return false;
 }
 </script>
 <?php
include'koneksi/koneksi.php';
$sql=mysqli_query($koneksi,"SELECT * FROM profile LIMIT 1");
$r=mysqli_fetch_array($sql);
?>
<form method="POST" action="cek_login.php?modul=profil&act=update">
	<table class="table table-bordered">
	<center>
		<div class="panel panel-danger">
  			<div class="panel-heading">PROFILE KOPERASI</div>
  		</div>
  	</center>
		<tr>
			<td width="140">ID</td>
			<td><input type="text" name="id" class="form-control" id="id" class="input" disabled value="<?php echo  $r['id']?>"/></td>
		</tr>
		<tr>
			<td>Nama Koperasi</td>
			<td><input type="text" name="koperasi" 
			pattern="[a-zA-Z ]+" autofocus required 
			oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')"
			class="form-control" value="<?php echo  $r['koperasi']?>"/></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="text" name="alamat" required
			class="form-control" id="Alamat" value="<?php echo $r['alamat']?>"/></td>
		</tr>
		<tr>
			<td>Kota</td>
			<td><input type="text" name="kota"
			pattern="[a-zA-Z ]+" autofocus required 
			oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')"
			class="form-control" id="Kota" value="<?php echo  $r['kota']?>"/></td>
		</tr>
		<tr>
			<td>Phone</td>
			<td><input type="text" name="hp"
			pattern="[0-9]+" autofocus required 
			oninvalid="this.setCustomValidity('Input Hanya boleh Angka')"maxlength="12"   
			class="form-control" id="Phone" value="<?php echo  $r['hp']?>"/></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" required
			class="form-control" id="Email" value="<?php echo  $r['email']?>"/></td>
		</tr>
		
			<td></td><td>
			<button type="submit" onclick="return konfirmasi()" class="btn btn-warning" >
			<span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span>Simpan</a></button>
			<button type='submit' class="btn btn-danger" a href='media.php?modul=profil&act=list'>
	  <span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span>Batal</button>      
			</td>
		</tr>
	</table>
	      

	</form>
	</div>