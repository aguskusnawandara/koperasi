    <center>
      <div class="panel panel-danger">
        <div class="panel-heading">DATA SIMPANAN</div>
      </div>
    </center>
<?php
    $id_anggota   = $_SESSION['namauser'];
    $sql = mysqli_query($koneksi,"SELECT * FROM anggota WHERE id_anggota='$id_anggota'");
    $r = mysqli_fetch_array($sql)
?>
     <div class="row">
                    <div class="col-lg-4 ">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <table>
                                    <tr>
                                        <td>NAMA</td>
                                        <td>:</td>
                                        <td><?PHP echo $r['namaanggota']?></td>
                                    </tr>
                                    <tr>
                                        <td>ID anggota</td>
                                        <td>:</td>
                                        <td><?PHP echo $r['id_anggota']?></td>
                                    </tr>
                                    <tr>
                                        <td>SALDO</td>
                                        <td>:</td>
                                        <td><?PHP echo $saldo= saldo($r['id_anggota']); ?></td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
    
    </div>
    <div class="row">
            <div class="col-md-12">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tabel simpan&ambil</h3>
                    </div>
                    <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                 Tabel Simpan Dana
                                </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in">
                                <div class="box-body">
                                    <table id='dataTables' class="table table-striped table-bordered data">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>TANGGAL</th>
                                                <th>JENIS SIMPANAN</th>
                                                <th>JUMLAH</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                    $id_anggota   = $_SESSION['namauser'];

                                                $no=1;
                                                $jmlh=0;
                                                $sql = mysqli_query($koneksi,"SELECT s.id_simpanan,s.tgl,s.jumlah,
                                                            a.namaanggota,j.jenis_simpanan from simpanan as s
                                                            INNER JOIN anggota as a on a.id_anggota=s.id_anggota
                                                            INNER JOIN jenis_simpan as j on j.id_jenis=s.id_jenis 
                                                            WHERE a.id_anggota='$id_anggota'");
                                                while($r = mysqli_fetch_array($sql)){
                                                    
                                                    echo "<tr>"
                                                    . "<td>$no</td>"
                                                    . "<td>$r[tgl]</td>"
                                                    . "<td>$r[jenis_simpanan]</td>"
                                                    . "<td>$r[jumlah]</td>"
                                                    ."</tr>";
                                                $no++;
                                                $jmlh =$jmlh+$r['jumlah']; };?>
                        
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td><td></td><td>TOTAL</td>
                                                <td><?php echo $jmlh ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel box box-success">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                Tabel Ambil Dana
                                </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                                <div class="box-body">
                                    <table id="dataTables" class="table table-striped ">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>TANGGAL</th>
                                                <th>JUMLAH</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $id_anggota   = $_SESSION['namauser'];
                                            $no=1;
                                            $jmlh2=0;
                                            $sql = mysqli_query($koneksi,"SELECT * from pengambilan WHERE id_anggota='$id_anggota'");
                                            while($r = mysqli_fetch_array($sql)){
                                                echo "<tr>"
                                                . "<td>$no</td>"
                                                . "<td>$r[tgl]</td>"
                                                . "<td>$r[jumlah]</td>"
                                                ."</tr>";
                                            $no++;
                                            $jmlh2=$jmlh2+$r['jumlah'];
                                             }
                                                ;?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">TOTAL</td>
                                                <td><?php echo $jmlh2 ?></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- /.box-body -->
            </div>
          <!-- /.box -->
        </div>
    
