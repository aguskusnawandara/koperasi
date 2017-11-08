<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true)
  return true;
 else return false;
 }
 </script>
    <div class="btn-toolbar">
    <center><div class="panel panel-danger">
  <div class="panel-heading">DATA JENIS SIMPANAN</div></div></center>
           <a href='media.php?modul=jenis&act=tambah' class='btn btn-success btn-sm'>
            <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>TAMBAH</a>
        </div>
        </br>
 <table id='dataTables' class="table table-striped table-bordered data">
    <thead>
        <tr>
            <th>NO</th>
            <th>ID SIMPANAN</th>
            <th>JENIS SIMPANAN</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
$sql = mysqli_query($koneksi,"SELECT * FROM jenis_simpan");
    while($r = mysqli_fetch_array($sql))
    {
        echo "<tr>"
        . "<td>$no</td>"
        . "<td>$r[id_jenis]</td>"
        . "<td>$r[jenis_simpanan]"
        ."<td><div class='btn-toolbar'><a href='media.php?modul=jenis&act=edit&id_jenis=$r[id_jenis]' class='btn btn-primary btn-sm'>
            <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>edit</a>"
        ."<a onclick='return konfirmasi()'href='cek_login.php?modul=jenis&act=delete&id_jenis=$r[id_jenis]' class='btn btn-danger btn-sm'>
            <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>hapus</a></div></td></tr>";
    $no++;
    }
?>
    </table>
    </tbody>
