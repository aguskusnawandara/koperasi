    <center><div class="panel panel-danger">
      <div class="panel-heading">DATA SIMPANAN</div></div></center>
      <div class="btn-toolbar">
         <a href='media.php?modul=simpanan&act=tambah' class='btn btn-success btn-sm'>
            <span class='glyphicon glyphicon-plus' aria-hidden='true'></span>TAMBAH</a>
        </div>
    </br>
    <table id='dataTables' class="table table-striped table-bordered data">
        <thead>
            <tr>
                <th>NO</th>
                <th>ID ANGGOTA</th>
                <th>NAMA ANGGOTA</th>
                <th>JENIS KELAMIN</th>
                <th>TOTAL</th>
                <th>saldo</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
            $sql = mysqli_query($koneksi,"SELECT a.id_anggota,a.namaanggota,a.jk,
                (SELECT sum(jumlah) FROM simpanan as s WHERE id_anggota=a.id_anggota) as total
                FROM anggota as a");
            while($r = mysqli_fetch_array($sql)){
            $saldo= saldo($r['id_anggota']);
                    
                echo "<tr>"
                . "<td>$no</td>"
                . "<td>$r[id_anggota]</td>"
                . "<td>$r[namaanggota]</td>"
                . "<td>$r[jk]</td>"
                . "<td>$r[total]</td>"
                ."<td>$saldo</td>"
                ."<td><div class='btn-toolbar'><a href='media.php?modul=simpanan&act=detail&id_anggota=$r[id_anggota]' class='btn btn-danger btn-sm'>
                <span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span>Detail</a>"
                ."<a href='media.php?modul=simpanan&act=ambil&id_anggota=$r[id_anggota]' class='btn btn-danger btn-sm'>
                <span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span>Ambil</a>
                </div></td></tr>";
                $no++; }
                ?>
            </tbody>
        </table>

    
