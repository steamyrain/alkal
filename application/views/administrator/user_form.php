<div class="container-fluid">
    <?php echo $this->session->flashdata('pesan') ?>
    <?php echo 
        form_open_multipart(
            route('adduser-admin-input')); 
    ?>
		<div class="form-group">
			<label>Nama Depan :</label>
			<input type="text" name="first_name" class="form-control">
		</div>
		<div class="form-group">
			<label>Nama Belakang :</label>
			<input type="text" name="last_name" class="form-control">
		</div>
		<div class="form-group">
			<label>Jenis Kelamin :</label>
            <input type="radio" id="l" name="gender" value="L"/>
            <label for="l">Laki-Laki</label>
            <input type="radio" id="p" name="gender" value="P"/>
            <label for="p">Perempuan</label>
		</div>
		<div class="form-group">
			<label>Username :</label>
			<input type="text" name="username" class="form-control">
		</div>
		<div class="form-group">
			<label>Password :</label>
			<input type="password" name="password" class="form-control">
		</div>
		<div class="form-group">
			<label>Role :</label>
            <input type="radio" id="user" name="role" value="user" checked="checked"/>
            <label for="user">User</label>
            <input type="radio" id="admin" name="role" value="admin"/>
            <label for="admin">Admin</label>
		</div>
		<div class="form-group">
			 <p>Bidang Kerja:</p>
            <?php foreach($job as $j) : ?>
                <input type="radio"
                    id=<?php echo $j->job ?>
                    name='jobId' 
                    value=<?php echo $j->id ?>
                />
                <label for=<?php echo $j->job ?>>
                    <?php echo $j->job ?>
                </label>
                <br>
            <?php endforeach; ?>
            <?php echo form_error('job', 
                '<div class="text-danger small" ml-3>') 
            ?>
		</div>
        <button type="submit" 
            name="submit" 
            value="upload" 
            class="btn btn-primary mb-5 mt-3"
        >Simpan</button>
	 <?php echo "</form>"; ?>
</div>
