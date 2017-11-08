<?php
$modul = $_GET['modul'];
$act    = $_GET['act'];
if(isset($modul) and isset($act)){
     if($modul=='anggota' and $act=='update'){
		$id      = $_POST['id'];
		$id_anggota =$_POST['id_anggota'];
		$namaanggota=$_POST['namaanggota'];
		$jk=$_POST['gender'];
		$tempat_lahir=$_POST['tempat_lahir'];
		$tgl_lahir=$_POST['tgl_lahir'];	
		$alamat=$_POST['alamat'];
		$hp=$_POST['hp'];


		mysqli_query($koneksi,"UPDATE anggota SET namaanggota='$namaanggota',jk='$jk',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat',hp='$hp' where id_anggota='$id'");
		header('location:mediaanggota.php?modul=anggota&act=list');
	
	}
	elseif ($modul ==='anggota' and $act === 'updatepass') {
		$id       = $_POST['id'];
		$passbaru = $_POST['password1'];
		$passbaru2 = $_POST['password2'];
        if ($passbaru == $passbaru2 ){
        	mysqli_query($koneksi,"UPDATE users SET password = md5('$passbaru2') where user_id = '$id'");
			Echo "<script>window.alert('password berhasil di rubah')		
					window.location='logout.php'</script>";
        }else{
			Echo "<script>window.alert('Password baru berbeda dengan password lama')		
					window.location='mediaanggota.php?modul=anggota&act=list'</script>";
		}
		
		
	}

}

?>

