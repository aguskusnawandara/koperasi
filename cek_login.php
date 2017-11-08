<?php
session_start();
include 'koneksi/koneksi.php';
$modul = $_GET['modul'];
if($modul=='profil'){
    include 'modul/profil/act_profil.php';
}elseif($modul=='pengguna'){
	include'modul/pengguna/act_pengguna.php';
}elseif($modul=='jenis'){
	include'modul/jenis/act_jenis.php';
}elseif($modul=='anggota'){
	include'modul/anggota/act_anggota.php';
}elseif($modul=='simpanan'){
	include'modul/simpanan/act_simpanan.php';
}elseif($modul=='penarikan'){
	include'modul/penarikan/act_penarikan.php';
}elseif($modul=='pinjaman'){
	include'modul/pinjaman/act_pinjaman.php';
}elseif($modul=='login'){
	$username	=$_POST['username'];
	$password	=(md5($_POST['password']));
if (!ctype_alnum($username) OR !ctype_alnum($password)){
	//gagal login
	header('Location:index.php');
}else{
	$login	=mysqli_query($koneksi,"SELECT*FROM users WHERE user_id='$username' AND password='$password'" );
	$cek	=mysqli_num_rows($login);
if ($cek>0){
	session_start();
	$r=mysqli_fetch_array($login);
	$_SESSION['namauser']	=$r['user_id'];
	$_SESSION['passuser']	=$r['password'];
	$_SESSION['nama']	=$r['namalengkap'];
	$_SESSION['level']	=$r['level'];
	if ($_SESSION['level']=='super admin') {
		header("Location:media.php?modul=home&act=home");
	}elseif ($_SESSION['level']=='anggota')
	{
	header("Location:mediaanggota.php?modul=home&act=home");}
}else{
	?>
	<script type="text/javascript">
		alert("maaf,username atau password anda salah");
		//arahrahn kehomepage
		window.location.href='index.php';
	</script>
	<?php
}
}
}

?>