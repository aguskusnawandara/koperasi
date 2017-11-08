<?php
$modul = $_GET['modul'];
$act    = $_GET['act'];
if(isset($modul) and isset($act)){
    if($modul=='anggota' and $act=='delete'){
        $id_anggota        = $_GET['id_anggota'];
        mysqli_query($koneksi, "delete from anggota where id_anggota='$id_anggota'");
        header("location:media.php?modul=anggota&act=list");
        
    }elseif($modul=='anggota' and $act=='acc'){
        $username =$_POST['username'];
		$nama=$_POST['nama'];
		$pass=(md5($_POST['pass']));
		$level=$_POST['level'];
        mysqli_query($koneksi, "INSERT INTO users SET user_id='$username',password='$pass',namalengkap='$nama',
								level='$level'");
        echo "<script>window.alert('DATA SUDAH DISIMPAN')	
        window.location='media.php?modul=anggota&act=list'</script>";
    }elseif($modul=='anggota' and $act=='update'){
		$id      = $_POST['id'];
		$id_anggota =$_POST['id_anggota'];
		$namaanggota=$_POST['namaanggota'];
		$jk=$_POST['gender'];
		$tempat_lahir=$_POST['tempat_lahir'];
		$tgl_lahir=$_POST['tgl_lahir'];	
		$alamat=$_POST['alamat'];
		$hp=$_POST['hp'];


		mysqli_query($koneksi,"UPDATE anggota SET namaanggota='$namaanggota',jk='$jk',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',
								alamat='$alamat',hp='$hp' where id_anggota='$id'");
		header('location:media.php?modul=anggota&act=list');
	
	}elseif($modul=='anggota' and $act='tambah'){
		$id_anggota =$_POST['id_anggota'];
		$namaanggota=$_POST['namaanggota'];
		$jk=$_POST['gender'];
		$tempat_lahir=$_POST['tempat_lahir'];
		$tgl_lahir=$_POST['tgl_lahir'];	
		$alamat=$_POST['alamat'];
		$hp=$_POST['hp'];

		mysqli_query($koneksi,"INSERT INTO anggota SET id_anggota='$id_anggota',namaanggota='$namaanggota',
								jk='$jk',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',
								alamat='$alamat',hp='$hp'");

   		 echo "<script>window.alert('DATA SUDAH DISIMPAN')		
		window.location='media.php?modul=anggota&act=list'</script>";		
	}

}

?>

