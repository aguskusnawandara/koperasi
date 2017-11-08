<?php
$modul = $_GET['modul'];
$act    = $_GET['act'];
if (isset($modul) and isset($act)) {
    if ($modul === 'pengguna' and $act === 'delete') {
        $user_id  = $_GET['user_id'];
        mysqli_query($koneksi, "DELETE FROM users WHERE user_id = '$user_id'");
        header('location:media.php?modul=pengguna&act=list');
    } 
}
?>

