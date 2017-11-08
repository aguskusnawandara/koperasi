<script type="text/javascript" language="JavaScript">
 function konfirmasi()
 {
 tanya = confirm("Anda Yakin Akan Menghapus Data ?");
 if (tanya == true) return true;
 else return false;
 }
 function konfirmasiacc()
 {
 tanya = confirm("Anda Yakin Akan meng accept peminjaman ?");
 if (tanya == true) return true;
 else return false;
 }
 function konfirmasitolak()
 {
 tanya = confirm("Anda Yakin Akan menolak peminjaman ?");
 if (tanya == true) return true;
 else return false;
 }
 </script>
    <center><div class="panel panel-danger">
      <div class="panel-heading">DATA PINJAMAN</div></div></center>
            
            <br>

        <div class="box box-solid bg-green-gradient">
            <div class="box-header">
                <h3 class="box-title">PINJAMAN YANG BELUM DI SETUJUI</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div id="pinjaman1" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
                <div class="row">
                    <div class="col-sm-12">
                    <table id='dataTables2' class="table table-striped table-bordered data">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID PINJAM</th>
                            <th>NAMA ANGGOTA</th>
                            <th>TANGGAL</th>
                            <th>JUMLAH</th>
                            <th>LAMA</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $sql = mysqli_query($koneksi,"SELECT p.id_pinjam,p.id_anggota,a.namaanggota,p.tgl,p.jumlah,p.lama from anggota as a
                                                INNER JOIN pinjaman_header as p 
                                                on p.id_anggota=a.id_anggota WHERE p.status ='sementara'");
                        while($r = mysqli_fetch_array($sql)){
                            echo "<tr>"
                                . "<td>$no</td>"
                                . "<td>$r[id_pinjam]</td>"
                                . "<td>$r[namaanggota]</td>"
                                . "<td>$r[tgl]</td>"
                                . "<td>$r[jumlah]</td>"
                                . "<td>$r[lama]</td>"
                                ."<td>"; ?>
                                <form method="POST" action="cek_login.php?modul=pinjaman&act=acc">
                                    <input type="hidden" name="id_anggota" value="<?php echo $r['id_anggota']?>">
                                    <input type="hidden" name="id_pinjam" value="<?php echo $r['id_pinjam']?>">
                                    <input type="hidden" name="tgl" value="<?php echo $r['tgl'] ?>">
                                    <input type="hidden" name="jumlah" value="<?php echo $r['jumlah'] ?>">
                                    <input type="hidden" name="lama" value="<?php echo $r['lama'] ?>">
                                <button type="submit" onclick='return konfirmasiacc()' class="btn btn-warning btn-sm">
                                <span class='glyphicon glyphicon-ok' aria-hidden='true'></span> Setujui</button>
                                </form>

                                <form method="POST" action="cek_login.php?modul=pinjaman&act=tolak">
                                    <input type="hidden" name="id_pinjam" value="<?php echo $r['id_pinjam']?>">
                                    <input type="hidden" name="status" value="tolak">
                                <button type="submit" onclick='return konfirmasitolak()' class="btn btn-danger btn-sm">
                                <span class='glyphicon glyphicon-remove' aria-hidden='true'></span> Tolak</button>
                                </td></tr>
                                </form>
                                <?php $no++; }
                                ?>
                
                    </tbody>
                    </table>
                    </div>    
                </div>
                <!-- /.row -->
            </div>
        </div>
          <!-- /.box -->


        <div class="box box-solid bg-green-gradient">
            <div class="box-header">
                <h3 class="box-title">PINJAMAN YANG TELAH DI SETUJUI</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div id="pinjaman1" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
                <div class="row">
                    <div class="col-sm-12">
                    <table id='dataTables' class="table table-striped table-bordered data">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID PINJAM</th>
                            <th>NAMA ANGGOTA</th>
                            <th>TANGGAL</th>
                            <th>JUMLAH</th>
                            <th>LAMA</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $sql = mysqli_query($koneksi,"SELECT p.id_pinjam,a.namaanggota,p.tgl,p.jumlah,p.lama from anggota as a
                                                INNER JOIN pinjaman_header as p 
                                                on p.id_anggota=a.id_anggota WHERE p.status ='terima'");
                        while($r = mysqli_fetch_array($sql)){
                            echo "<tr>"
                                . "<td>$no</td>"
                                . "<td>$r[id_pinjam]</td>"
                                . "<td>$r[namaanggota]</td>"
                                . "<td>$r[tgl]</td>"
                                . "<td>$r[jumlah]</td>"
                                . "<td>$r[lama]</td>"
                                ."<td><div class='btn-toolbar'><a href='media.php?modul=pinjaman&act=detail&id_pinjam=$r[id_pinjam]' class='btn btn-info btn-sm'>
                                <span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span>Detail</a>"
                                ."<a href='media.php?modul=pinjaman&act=bayar&id_pinjam=$r[id_pinjam]' class='btn btn-danger btn-sm'>
                                <span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span>Bayar</a>
                                </div></td></tr>"; 
                                 $no++; }
                                ?>
                
                    </tbody>
                    </table>
                    </div>    
                </div>
                <!-- /.row -->
            </div>
        </div>


        <div class="box box-solid bg-green-gradient">
            <div class="box-header">
                <h3 class="box-title">History Pinjaman</h3>
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <!-- button with a dropdown -->
                    <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div id="pinjaman1" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-black">
                <div class="row">
                    <div class="col-sm-12">
                    <table id='dataTables3' class="table table-striped table-bordered data">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID PINJAM</th>
                            <th>NAMA ANGGOTA</th>
                            <th>TANGGAL</th>
                            <th>JUMLAH</th>
                            <th>LAMA</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                        $sql = mysqli_query($koneksi,"SELECT p.id_pinjam,p.id_anggota,a.namaanggota,p.tgl,p.jumlah,p.lama from anggota as a
                                                INNER JOIN pinjaman_header as p 
                                                on p.id_anggota=a.id_anggota WHERE p.status ='lunas'");
                        while($r = mysqli_fetch_array($sql)){
                            echo "<tr>"
                                . "<td>$no</td>"
                                . "<td>$r[id_pinjam]</td>"
                                . "<td>$r[namaanggota]</td>"
                                . "<td>$r[tgl]</td>"
                                . "<td>$r[jumlah]</td>"
                                . "<td>$r[lama]</td>"
                                ."<td> Lunas"; ?>
                                
                                </td></tr>
                                <?php $no++; }
                                ?>
                
                    </tbody>
                    </table>
                    </div>    
                </div>
                <!-- /.row -->
            </div>
        </div>
          <!-- /.box -->


      </div>
      <!-- /.row (main row) -->

      


