 <table id='dataTables' class="table table-striped table-bordered data">
<center>
    <div class="panel panel-danger">
        <div class="panel-heading">PROFILE KOPERASI</div>
    </div>
</center>
</div>
    <thead>
        <tr>
            <th>ID</th>
            <th>NAMA KOPERASI</th>
            <th>ALAMAT</th>
            <th>KOTA</th>
            <th>PHONE</th>
            <th>EMAIL</th>
            <th>aksi</th>

        </tr>
    </thead>
<tbody>
<?php
$sql=mysqli_query($koneksi,"SELECT * FROM profile LIMIT 1");
$r=mysqli_fetch_array($sql);
        echo "<tr>"
        . "<td>$r[id]</td>"
        . "<td>$r[koperasi]</td>"
        . "<td>$r[alamat]</td>"
        . "<td>$r[kota]</td>"
        . "<td>$r[hp]</td>"
        . "<td>$r[email]</td>"
        ."<td><a href='media.php?modul=profil&act=edit' class='btn btn-primary btn-sm'>
        <span class='glyphicon glyphicon-edit' aria-hidden='true'></span>edit </a></td>";
        ?>
</tbody>
</table>
