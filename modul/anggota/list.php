<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true) return true;
 else return false;
 }
 function konfirmasiacc()
 {
 tanya = confirm("Anda Yakin Akan meng accept anggota ?");
 if (tanya == true) return true;
 else return false;
 }
 </script>
<center><div class="panel panel-danger">
  <div class="panel-heading">DATA ANGGOTA</div></div></center>
<div class="btn-toolbar">
           <a href='media.php?modul=anggota&act=tambah' class='btn btn-success btn-sm'>
            <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>TAMBAH</a>
        </div>
        </br>
 <table id='dataTables' class="table table-striped table-bordered data">
    <thead>
        <tr> 
            <th>ID ANGGOTA</th>
            <th>NAMA ANGGOTA</th>
            <th>JK</th>
            <th>TEMPAT LAHIR</th>
            <th>TGL LAHIR</th>
            <th>ALAMAT</th>
            <th>HP</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $sql = mysqli_query($koneksi,"SELECT * FROM anggota");

    while($r = mysqli_fetch_array($sql)){ ?>
        <tr>
            <td><?php echo $r['id_anggota']?></td>
            <td><?php echo $r['namaanggota']?></td>
            <td><?php echo $r['jk']?></td>
            <td><?php echo $r['tempat_lahir']?></td>
            <td><?php echo $r['tgl_lahir']?></td>
            <td><?php echo $r['alamat']?></td>
            <td><?php echo $r['hp']?></td>
            <td><div class='btn-toolbar'>
           <?php $query =mysqli_query($koneksi,"SELECT*FROM users WHERE user_id='$r[id_anggota]'");
            $cek    =mysqli_num_rows($query); ?>
            <form method="POST" action="cek_login.php?modul=anggota&act=acc">
                    <input type="hidden" name="username" value="<?php echo $r['id_anggota']?>">
                    <input type="hidden" name="nama" value="<?php echo $r['namaanggota']?>">
                    <input type="hidden" name="pass" value="<?php echo $r['namaanggota'] ?>">
                    <input type="hidden" name="level" value="anggota">
           <?php if ($cek>0){ ?>
                    <fieldset disabled><button type="submit" onclick='return konfirmasiacc()' class="btn btn-warning btn-sm">
                    <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Accept</button>
                    </fieldset>
            <?php }else{ ?>
                    <button type="submit"  onclick='return konfirmasiacc()' class="btn btn-warning btn-sm">
                    <span class='glyphicon glyphicon-ok' aria-hidden='true'></span>Accept</button>
            <?php } ?>
                </form>
         
        <a href="media.php?modul=anggota&act=edit&id_anggota=<?php echo $r['id_anggota'] ?>" class="btn btn-primary btn-sm">
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>edit</a>
        <a onclick="return konfirmasi()" href="cek_login.php?modul=anggota&act=delete&id_anggota=<?php echo $r['id_anggota'] ?>" 
        class="btn btn-danger btn-sm"> 
            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>hapus</a></div></td></tr>

   <?php } ?>
    </tbody>
  </table>
