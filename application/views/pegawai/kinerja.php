<div class="container-fluid">

	 <div class="alert alert-success" role="alert">
         <i class="fas fa-clipboard"></i> Laporan Kinerja <?php echo $fullName; ?> 
    </div>

  <?php 
    echo anchor(
        route('kinerja-user-form'),
        '<button class="btn btn-sm btn-primary mb-3">
            <i class="fas fa-plus fa-sm"></i> 
            Tambah Data
        </button>'
    ) 
    ?>

  <table class="table table-bordered table-striped">
  	<tr>
  		<th class="text-center">No</th>
  		<th class="text-center">Bidang</th>
  		<th class="text-center">Kegiatan</th>
  		<th class="text-center">Tanggal</th>
  		<th class="text-center">Dokumentasi</th>
    </tr>
  	<?php $no=1; foreach($kinerja as $k) : ?>
  		<tr>
  			<td width="20px"><?php echo $no++ ?></td>
  			<td><?php echo $k->job ?></td>
  			<td><?php echo $k->kegiatan ?></td>
  			<td><?php echo $k->created_at ?></td>
            <td>
            <a href="<?php echo base_url('assets/upload/').$k->dokumentasi ?>">dokumentasi</a>
            </td>
  		<tr>
  	<?php endforeach; ?>
  </table>
</div>
