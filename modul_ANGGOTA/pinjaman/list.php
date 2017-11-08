    <center><div class="panel panel-danger">
      <div class="panel-heading">DATA PINJAMAN</div></div></center>
       <?php 
                    $id_anggota   = $_SESSION['namauser'];
                    $query =mysqli_query($koneksi,"SELECT * FROM pinjaman_header WHERE id_anggota = '$id_anggota' AND STATUS = 'terima'");
                    $cek =mysqli_num_rows($query); 
                    if ($cek<1) {?>
                           <a href='mediaanggota.php?modul=pinjaman&act=tambah' class='btn btn-success btn-sm'>
                            <span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Ajukan pinjaman</a>
                    <?php }else{ ?>
                        <fieldset disabled>
                        <a href='mediaanggota.php?modul=pinjaman&act=tambah' class='btn btn-success btn-sm'>
                        <span class='glyphicon glyphicon-plus' aria-hidden='true'></span> Ajukan pinjaman</a>
                        </fieldset>
                    <?php }
                    ?>
    </br>
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
                                        <th>TANGGAL</th>
                                        <th>JUMLAH</th>
                                        <th>LAMA</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                    $sql = mysqli_query($koneksi,"SELECT p.id_pinjam,a.namaanggota,p.tgl,p.jumlah,p.lama,p.status from anggota as a
                                                            INNER JOIN pinjaman_header as p 
                                                            on p.id_anggota=a.id_anggota where p.id_anggota = '$id_anggota' and status != 'terima' and status !='lunas'");
                                while($r = mysqli_fetch_array($sql)){
                                    echo "<tr>"
                                    . "<td>$no</td>"
                                    . "<td>$r[id_pinjam]</td>"
                                    . "<td>$r[tgl]</td>"
                                    . "<td>$r[jumlah]</td>"
                                    . "<td>$r[lama]</td>"
                                    ."<td>";

                                    if ($r['status']=='tolak') {
                                        echo "Ditolak";
                                    }elseif ($r['status']=='sementara') {
                                       echo "Belum disetujui";
                                    }?>
                                     
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
                <th>TANGGAL</th>
                <th>JUMLAH</th>
                <th>LAMA</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=1;
             $id_anggota   = $_SESSION['namauser'];
            $sql = mysqli_query($koneksi,"SELECT p.id_pinjam,a.namaanggota,p.tgl,p.jumlah,p.lama from anggota as a
                                    INNER JOIN pinjaman_header as p 
                                    on p.id_anggota=a.id_anggota where p.id_anggota = '$id_anggota' and status = 'terima'");
while($r = mysqli_fetch_array($sql)){
    echo "<tr>"
    . "<td>$no</td>"
    . "<td>$r[id_pinjam]</td>"
    . "<td>$r[tgl]</td>"
    . "<td>$r[jumlah]</td>"
    . "<td>$r[lama]</td>"
    ."<td><div class='btn-toolbar'><a href='mediaanggota.php?modul=pinjaman&act=detail&id_pinjam=$r[id_pinjam]' class='btn btn-info btn-sm'>
    <span class='glyphicon glyphicon-list-alt' aria-hidden='true'></span>Detail</a>
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

