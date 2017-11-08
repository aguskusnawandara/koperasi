<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true) return true;
 else return false;
 }
 </script>
<center><div class="panel panel-danger">
  <div class="panel-heading">DATA ANGGOTA</div></div></center>
<?php
    $id_anggota   = $_SESSION['namauser'];
    $sql = mysqli_query($koneksi,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'");
    $r = mysqli_fetch_array($sql)

?>
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Profil ANGGOTA</h3>
              <div class="box-tools">
                <a href="mediaanggota.php?modul=anggota&act=edit&id_anggota=<?php echo $r['id_anggota']; ?>" class='btn btn-primary btn-sm'>
            <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>edit</a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table responsive">
                <tr>
                  <td>NAMA ANGGOTA</td>
                  <td style="width: 10px">:</td>
                  <td><?php echo $r['namaanggota']; ?></td>
                </tr>
                <tr>
                  <td>ID ANGGOTA</td>
                  <td style="width: 10px">:</td>
                  <td><?php echo $r['id_anggota']; ?></td>
                </tr>
                <tr>
                  <td>JENIS KELAMIN</td>
                  <td style="width: 10px">:</td>
                  <td><?php echo $r['jk']; ?></td>
                </tr>
                <tr>
                  <td>TEMPAT, TANGGAL LAHIR</td>
                  <td style="width: 10px">:</td>
                  <td><?php echo"$r[tempat_lahir], $r[tgl_lahir]"; ?></td>
                </tr>
                <tr>
                  <td>ALAMAT</td>
                  <td style="width: 10px">:</td>
                  <td><?php echo $r['alamat']; ?></td>
                </tr>
                <tr>
                  <td>No. HP</td>
                  <td style="width: 10px">:</td>
                  <td><?php echo $r['hp']; ?></td>
                </tr>
    
                
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          </div>
          <?php $query =mysqli_query($koneksi,"SELECT*FROM users WHERE user_id='$r[id_anggota]'");
            $cek    =mysqli_num_rows($query);
            if ($cek>0){?>
          <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Akun <?php echo $_SESSION['nama']  ?></h3>
              <div class="box-tools">
                <a href="mediaanggota.php?modul=anggota&act=edit_pass&id_anggota=<?php echo $r['id_anggota']; ?>" class='btn btn-primary btn-sm'>
            <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>edit</a>
              </div>
            </div>
            <?php
                $data = mysqli_fetch_array($query);
            ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table responsive">
                <tr>
                  <td>Username</td>
                  <td style="width: 10px">:</td>
                  <td><?php echo $data['user_id']; ?></td>
                </tr>
                <tr>
                  <td>Password</td>
                  <td style="width: 10px">:</td>
                  <td><?php echo $data['password']; ?></td>
                </tr> 
                
              </table>
            </div>
            <!-- /.box-body -->
            
          </div>
          </div>
          <?php } ?>
          </div>
          </section>
