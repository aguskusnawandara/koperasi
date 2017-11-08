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
$id_anggota=$_GET['id_anggota'];
$sql=mysqli_query($koneksi,"SELECT * FROM anggota where id_anggota='$id_anggota'");
$r=mysqli_fetch_array($sql);
?>
<center><div class="panel panel-danger">
	<div class="panel-heading">EDIT ANGGOTA</div></div></center>
<form method="POST" id="ubahpass" action="cek.php?modul=anggota&act=updatepass">
		<input type="hidden" name="id" value="<?php echo $r['id_anggota'];?>">
<table class="table table-bordered">
			<tr>
				<td>User ID</td>
				<td><input type="text" name="id"
				class="form-control" readonly="readyonly" value="<?php echo $r['id_anggota']; ?>"></td>
			</tr>
			<tr>
				<td>password baru</td>
				<td><input type="password" id="password1" name="password1" class="form-control" required></td>
			</tr>
			<tr>
				<td>Konfirmasi password</td>
				<td><input type="password" id="password2" name="password2" class="form-control" required /></td>
			</tr>
			<tr>
				<td></td><td><button type="submit" class="btn btn-warning">
						<span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span>Simpan</button>
						<button type='cancel' class="btn btn-danger">
						<span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span>batal</button>   
			</tr>
</table>

</form>

