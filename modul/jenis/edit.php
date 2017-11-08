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
$id_jenis=$_GET['id_jenis'];
$sql=mysqli_query($koneksi,"SELECT * FROM jenis_simpan where id_jenis='$id_jenis'");
$r=mysqli_fetch_array($sql);
?>
<center><div class="panel panel-danger">
  <div class="panel-heading">EDIT JENIS SIMPANAN</div></div></center>
	<form method="POST" action="cek_login.php?modul=jenis&act=update">
	    <input type="hidden" name="id" value="<?php echo $r['id_jenis'];?>">

	<table class="table table-bordered">
	<tr>
		<td>Id jenis</td>
		<td><input type="text" name="id" required class="form-control"  class="input" readonly="readonly"  value="<?php echo $r['id_jenis']; ?>"></td>
	</tr>
	
	<tr>
		<td>jenis simpanan</td>
		<td><input type="text" name="jenis"  
		pattern="[a-zA-Z ]+" autofocus required 
		oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')"
		 class="form-control" value="<?php echo $r['jenis_simpanan']; ?>"/></td>
	</tr>
	<tr>
		<td></td><td><button type="submit" onclick="return konfirmasi()" class="btn btn-warning">
		 <span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span>simpan</button>
		<button type='submit' class="btn btn-danger" a href='media.php?modul=pengguna&act=list'>
	  <span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span>kembali</button>   
</tr>
	</table>
</form>