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
	<form method="POST" action="cek_login.php?modul=anggota&act=update">
		<input type="hidden" name="id" value="<?php echo $r['id_anggota'];?>">
		<table class="table table-bordered">
			<tr>
				<td>Id anggota</td>
				<td><input type="text" name="id"
					class="form-control"  class="input" readonly="readyonly" value="<?php echo $r['id_anggota']; ?>">
				</td>
			</tr>
			<tr>
				<td>nama anggota</td>
				<td><input type="text" name="namaanggota" 
					pattern="[a-zA-Z ]+" autofocus required 
					oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')"
					class="form-control" value="<?php echo $r['namaanggota']; ?>"/>
				</td>
			</tr>
			<tr>
				<td>JENIS KELAMIN</td>
				<td><input type="radio" pattern="[a-zA-Z ]+" autofocus required 
					oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')" 
					name="gender"  value="L" <?php if($r['jk']=='L') echo "checked='checked'" ?>> L
					<input type="radio" 
					pattern="[a-zA-Z ]+" autofocus required 
					oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')"
					value="P"  name="gender" <?php if($r['jk']=='P') echo "checked='checked'" ?>> P
				</td>
			</tr>
			<tr>
				<td>Tempat lahir</td>
				<td><input type="text" name="tempat_lahir" 
					pattern="[a-zA-Z ]+" autofocus required 
					oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')"
					class="form-control" value="<?php echo $r['tempat_lahir']; ?>"/>
				</td>
			</tr>
			<tr>
				<td>Tgl lahir</td>
				<td><input type="text" name="tgl_lahir"
				  	class="form-control" required value="<?php echo $r['tgl_lahir']; ?>"/>
				</td>
			</tr>
			<tr>
				<td>alamat</td>
				<td><input type="text" name="alamat" 
					pattern="[a-zA-Z ]+" autofocus required 
					oninvalid="this.setCustomValidity('Input Hanya boleh Huruf A-Z')"
					class="form-control" value="<?php echo $r['alamat']; ?>"/>
				</td>
			</tr>
			<tr>
				<td>hp</td>
				<td><input type="text" name="hp" 
					pattern="[0-9]+" autofocus required 
					oninvalid="this.setCustomValidity('Input Hanya boleh Angka')"maxlength="12"   
					class="form-control" value="<?php echo $r['hp']; ?>"/>
				</td>
			</tr>
			<tr>
				<td></td><td><button type="submit" onclick="return konfirmasi()" class="btn btn-warning">
									<span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span>simpan</button>
							<button type='submit' class="btn btn-danger" a href='media.php?modul=anggota&act=list'>
									<span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span>batal</button>   
			</tr>
	</table>
</form>
