<div class="container-fluid">
    <?php echo $this->session->flashdata('pesan') ?>
	<?php echo form_open_multipart(route('kinerja-admin-input')); ?>
		<div class="form-group">
			<label> Nama Lengkap :</label>
			<select name="nama" class="form-control">
			<option>Muhamad Andyka Bakry</option>
 		    <option></option>
  			</select>
		</div>
		<div class="form-group">
			 <p>Pilih Bidang :</p>
 		<input type="radio" id="Pengemudi Alat Berat" name="bidang" value="Pengemudi Alat Berat">
 		<label for="Pengemudi Alat Berat">Pengemudi Alat Berat</label><br>
 		<input type="radio" id="Pengemudi Kendaraan Operasional Lapangan" name="bidang" value="Pengemudi Kendaraan Operasional Lapangan">
  		<label for="Kendaraan Operasional Lapangan">Kendaraan Operasional Lapangan</label><br>
  		<input type="radio" id="Mekanikal, Elektrikal, Bengkel" name="bidang" value="Mekanikal, Elektrikal, Bengkel">
  		<label for="Mekanikal, Elektrikal, Bengkel">Mekanikal, Elektrikal, Bengkel</label><br>
  		<input type="radio" id="Petugas Pemeliharaan Jalan dan Jembatan" name="bidang" value="Petugas Pemeliharaan Jalan dan Jembatan">
  		<label for="Petugas Pemeliharaan Jalan dan Jembatan">Petugas Pemeliharaan Jalan dan Jembatan</label><br>
			<?php echo form_error('bidang', '<div class="text-danger small" ml-3>') ?>
		</div>
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
		
		<button type="submit" name="submit" value="upload" class="btn btn-primary mb-5 mt-3">Simpan</button>
	 <?php echo "</form>"; ?>
</div>
