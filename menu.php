<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src='asset/bootstrap/images/logo_koperasi_85.png' >
      </div>
      <div class="pull-left info">
        
        <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Menu Navigation</li>
      <li class="treeview">
        <a href="media.php?modul=home&act=home"><i class="glyphicon glyphicon-home"></i><span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-user"></i><span>Master</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?modul=profil&act=list"><i class="glyphicon glyphicon-list active"></i>Profil</a></li>
          <li><a href="?modul=pengguna&act=list"><i class="glyphicon glyphicon-list active"></i>Pengguna</a></li>
          <li><a href="?modul=jenis&act=list"><i class="glyphicon glyphicon-list active"></i>Jenis Simpanan</a></li>
          <li><a href="?modul=anggota&act=list"><i class="glyphicon glyphicon-list active"></i>Anggota</a></li>
        </ul>
      </li> 
      <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-camera"></i><span>Transaksi</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?modul=simpanan&act=list"><i class="glyphicon glyphicon-list active"></i>Simpanan</a></li>
          <li><a href="?modul=pinjaman&act=list"><i class="glyphicon glyphicon-list active"></i>Pinjaman</a></li>
        </ul>
      </li>
     <li class="treeview">
        <a href="#">
          <i class="glyphicon glyphicon-user"></i><span>Laporan</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="?modul=lapAnggota&act=cetak"><i class="glyphicon glyphicon-list active"></i>Laporan Anggota</a></li>
          <li><a href="?modul=lapSimpanan&act=cetak"><i class="glyphicon glyphicon-list active"></i>Laporan Simpanan</a></li>
          <li><a href="?modul=lapPinjaman&act=cetak"><i class="glyphicon glyphicon-list active"></i>Laporan Pinjaman</a></li>
          <li><a href="?modul=lapKreditmacet&act=cetak"><i class="glyphicon glyphicon-list active"></i>Hutang Anggota</a></li>
        </ul>
      </li> 
      <li class="treeview">
        <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> <span>Logout</span></a>
      </a>
    </li>  
  </section>
  <!-- /.sidebar -->
</aside>