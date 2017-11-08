
<?php
include'koneksi/koneksi.php';
$cariKode=mysqli_query($koneksi,"SELECT max(id_pinjam)from pinjaman_header");
$q=mysqli_fetch_array($cariKode);
if($q){
	$nilaiKode=substr($q[0],1);
	$kode=(int)$nilaiKode;
	$kode=$kode+1;
	$kodeOtomatis="P".str_pad($kode,4,"0",STR_PAD_LEFT);
}else{
	$kodeOtomatis="P0001";
}

?>
	<center><div class="panel panel-danger">
		<div class="panel-heading">DAFTAR PENGAJUAN PINJAMAN</div></div></center>
		<form method="POST" action="cek.php?modul=pinjaman&act=tambah">
			<table class="table table-bordered">
				<tr>
					<td>Id Pinjam</td>
					<td><input type="text" name="id_pinjam"  readonly="readonly" value="<?php echo $kodeOtomatis;?>" class="form-control" /></td>
				</tr>
				<?php
						$id_anggota   = $_SESSION['namauser'];
						$sql=mysqli_query($koneksi,"SELECT* FROM anggota where id_anggota='$id_anggota'");
						$r = mysqli_fetch_array($sql);
						?>
				<tr>
					<td>Id Anggota</td>
					<td><input type="text" name="id_anggota"  readonly="readonly" value="<?php echo $id_anggota;?>" class="form-control"></td>
				</tr>
				<tr>
					<td>Tanggal</td>
					<td><input type="date" name="tanggal"  /></td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td><input type="text" name="jumlah"  
					pattern="[0-9]+" autofocus required 
					oninvalid="this.setCustomValidity('Input Hanya boleh Angka')"
					class="form-control"/></td>
				</tr>
				<tr>
					<td>lama Pinjaman</td>
					<td>
						<select name='lama' id='lama' class='input'>
							<option value=''>-Pilih-</option>
							<option value='6'>6 Bulan</option>
							<option value='12'>12 Bulan</option>
							<option value='24'>24 Bulan</option>
						</select>
					</td>				</tr>
					<input type="hidden" name="status" value="sementara">
					<tr>
						<td></td><td><button type="submit" class="btn btn-success">
						<span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span>Simpan</button>
						<a href="media.php?modul=pinjaman&act=list" class="btn btn-success">
							<span class='glyphicon glyphicon-arrow-left' aria-hidden='true'></span>Batal</a></td></tr>
						</tr>
					</table>

				</form>
	