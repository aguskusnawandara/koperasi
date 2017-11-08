    <center>
        <div class="panel panel-danger">
            <div class="panel-heading">DETAIL SIMPANAN</div>
        </div>
    </center>
<table id='dataTables' class="table table-striped table-bordered data">
    <thead>
        <tr>
            <th>NO</th>
            <th>ID SIMPANAN</th>
            <th>TANGGAL</th>
            <th>NAMA ANGGOTA</th>
            <th>JENIS SIMPANAN</th>
            <th>JUMLAH</th>
        </tr>
    </thead>
<tbody>
<?php
$id_anggota   = $_GET['id_anggota'];
$no=1;
$sql = mysqli_query($koneksi,"SELECT s.id_simpanan,s.tgl,s.jumlah,
                a.namaanggota,j.jenis_simpanan from simpanan as s
                INNER JOIN anggota as a on a.id_anggota=s.id_anggota
                INNER JOIN jenis_simpan as j on j.id_jenis=s.id_jenis 
                WHERE a.id_anggota='$id_anggota'");
while($r = mysqli_fetch_array($sql)){
        echo "<tr>"
        . "<td>$no</td>"
        . "<td>$r[id_simpanan]</td>"
        . "<td>$r[tgl]</td>"
        . "<td>$r[namaanggota]</td>"
        . "<td>$r[jenis_simpanan]</td>"
        . "<td>$r[jumlah]</td>"
        ."</td></tr>";
    $no++; }
;?>
</tbody>
</div>
</table>
    
