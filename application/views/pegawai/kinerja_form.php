<div class="container-fluid">

	<div class="alert alert-success" role="alert">
  	<i class="fas fa-clipboard"></i> Form Input Kinerja
  	</div>

	<?php echo form_open_multipart(route('kinerja-user-input')); ?>
		<div class="form-group">
			<label> Nama Lengkap : </label>
            <label style="font-weight: bold"><?php echo $fullName; ?></label>
		</div>
		<div class="form-group">
			<label>Bidang Kerja : </label>
            <label style="font-weight: bold"><?php echo $jJob; ?></label>
		<div class="form-group">
			<label>Kegiatan</label>
			<input type="text" name="kegiatan"
			placeholder="Masukkan Kegiatan" class="form-control">
			<?php echo form_error('kegiatan', '<div class="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>Dokumentasi</label>
			<input type='file' name='dokumentasi' class="form-control">
			<?php echo form_error('dokumentasi', '<div class="text-danger small" ml-3>') ?>
		</div>
		
		<button type="submit" class="btn btn-primary mb-5 mt-3">Simpan</button>
	<?php echo form_close(); ?>
</div>
