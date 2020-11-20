<div class="container-fluid">

  <div class="alert alert-success" role="alert">
  <i class="fas fa-tachometer-alt"></i> Dashboard
  </div>

  <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Selamat Datang!</h4>
  <p>Selamat Datang <strong><?php echo $username ?></strong> di Sistem Pengelolaan Peralatan Bina Marga, Anda Login sebagai <strong><?php echo $role; ?></strong></p>
  <hr>
  <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-cogs"></i> Control Panel
</button>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cogs"></i> Control Panel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url('pegawai/kinerja') ?>"><p class="nav-link small text-info">Kinerja Operator peralatan</p></a>
            <i class="fas fa-3x fa-users"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url('pegawai/atpm') ?>"><p class="nav-link small text-info">ATPM</p></a>
            <i class="fas fa-3x fa-tools"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url('pegawai/laporan') ?>"><p class="nav-link small text-info">Laporan Kerja</p></a>
            <i class="fas fa-3x fa-truck"></i>
          </div>
          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url('pegawai/BBM') ?>"><p class="nav-link small text-info">BBM</p></a>
            <i class="fas fa-3x fa-gas-pump"></i>
          </div>
      </div>
         <div class="row">
          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url('pegawai/tire') ?>"><p class="nav-link small text-info">Tire</p></a>
            <i class="far fa-3x fa-circle"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url('pegawai/oil') ?>"><p class="nav-link small text-info">Oil</p></a>
            <i class="fas fa-3x fa-oil-can"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url('pegawai/accu') ?>"><p class="nav-link small text-info">Accu</p></a>
            <i class="fas fa-3x fa-battery-three-quarters"></i>
          </div>
          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url('pegawai/filter') ?>"><p class="nav-link small text-info">Filter</p></a>
            <i class="fas fa-3x fa-filter"></i>
          </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
