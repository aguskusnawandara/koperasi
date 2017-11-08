<?php
$modul = $_GET['modul'];
$act    = $_GET['act'];
if(isset($modul) and isset($act)){
    if($modul==='jenis' and $act==='delete'){
        $id_jenis           = $_GET['id_jenis'];
        mysqli_query($koneksi, "DELETE FROM jenis_simpan WHERE id_jenis='$id_jenis'");
        header("location:media.php?modul=jenis&act=list");
        
    }elseif($modul==='jenis' and $act==='update'){
		$id      = $_POST['id'];
		$id_jenis =$_POST['id_jenis'];
		$jenis_simpanan=$_POST['jenis'];

		mysqli_query($koneksi,"UPDATE jenis_simpan SET jenis_simpanan='$jenis_simpanan' where id_jenis='$id'");
		header('location:media.php?modul=jenis&act=list');
	
	}elseif($modul==='jenis' and $act==='tambah'){
		$id_jenis =$_POST['id_jenis'];
		$jenis_simpanan=$_POST['jenis'];
		mysqli_query($koneksi,"INSERT INTO jenis_simpan SET id_jenis='$id_jenis',jenis_simpanan='$jenis_simpanan'");

		Echo "<script>window.alert('DATA SUDAH DISIMPAN')		
		window.location='media.php?modul=jenis&act=list'</script>";		
		
	}

}

?>

