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
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Kinerja Operator peralatan</p></a>
            <i class="fas fa-3x fa-users"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Pemeliharaan Pada Peralatan</p></a>
            <i class="fas fa-3x fa-tools"></i>
          </div>

          <div class="col-md-3 text-info text-center">
            <a href="<?php echo base_url() ?>"><p class="nav-link small text-info">Penggunaan Bahan Bakar Minyak(BBM)</p></a>
            <i class="fas fa-3x fa-truck"></i>
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
