<div class="container-fluid">

	<?php echo form_open_multipart('administrator/laporan/input_aksi'); ?>
		<div class="form-group">
			<label> Nama Lengkap :</label>
			<select name="nama" class="form-control">
                <option>Reinhard Aditya Petradi</option>
  			</select>
			<?php echo form_error('nama', '<div class="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>Lokasi Kerja :</label>
			<input type="text" name="lokasi"
			placeholder="Masukkan Lokasi Kerja" class="form-control">
			<?php echo form_error('lokasi', '<div class="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>Nomer Polisi :</label>
			<input type="text" name="nopol"
			placeholder="Masukkan Nomer Polisi Kendaraan" class="form-control">
			<?php echo form_error('nopol', '<div class="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>km awal :</label>
            <input 
                type="text" 
                name="kmawal"
                placeholder="Masukkan KM Awal"
                class="form-control"
            >
			<?php echo form_error('kmawal', '<div class="text-danger small" ml-3>') ?>
        </div>
        <div>
            <label>km akhir :</label>
            <input 
                type="text" 
                name="kmakhir"
                placeholder="Masukkan KM Akhir" 
                class="form-control"
            >
			<?php echo form_error('kmakhir', '<div class="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>Jarak :</label>
			<input type="text" name="jarak"
			placeholder="Masukkan Jarak" class="form-control">
			<?php echo form_error('jarak', '<div class="text-danger small" ml-3>') ?>
		</div>
		<div class="form-group">
			<label>BBM :</label>
			<input type="text" name="bbm"
			placeholder="Masukkan BBM" class="form-control">
			<?php echo form_error('bbm', '<div class="text-danger small" ml-3>') ?>
		</div>
        <button 
            type="submit" 
            name="submit"
            class="btn btn-primary mb-5 mt-3"
        >
            Simpan
        </button>
	 <?php echo "</form>"; ?>
</div>
