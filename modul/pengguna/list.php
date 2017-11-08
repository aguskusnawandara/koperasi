<script type="text/javascript" language="JavaScript">
function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true) return true;
 else return false;
 }
</script>
<center>
    <div class="panel panel-danger">
        <div class="panel-heading">DATA PENGGUNA</div>
    </div>
</center>  
</br>
<table id='dataTables' class="table table-striped table-bordered data">
    <thead>
        <tr>
            <th>NO</th>
            <th>USER ID</th>
            <th>PASSWORD</th>
            <th>NAMA LENGKAP</th>
            <th>LEVEL</th>
            <th>AKSI</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        $sql = mysqli_query($koneksi,"SELECT * FROM users");
        while($r = mysqli_fetch_array($sql))
        {
            echo "<tr>"
            . "<td>$no</td>"
            . "<td>$r[user_id]</td>"
            . "<td>$r[password]</td>"
            . "<td>$r[namalengkap]</td>"
            . "<td>$r[level]</td>"
            ."<td><div class='btn-toolbar'>
            <a onclick='return konfirmasi()' href='cek_login.php?modul=pengguna&act=delete&user_id=$r[user_id]' class='btn btn-danger btn-sm'>
            <span class='glyphicon glyphicon-trash' aria-hidden='true'></span>hapus</a>
            </div>
            </td>";
            $no++;
        };
        ?>
    </tbody>
</table>
