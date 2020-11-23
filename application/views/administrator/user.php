<div class="container-fluid">

	 <div class="alert alert-success" role="alert">
  <i class="fas fa-clipboard"></i> User Silolabima  </div>

    <?php echo $this->session->flashdata('pesan') ?>
    <?php 
    echo anchor(
        route('adduser-admin-form'),
        '<button class="btn btn-sm btn-primary mb-3">
            <i class="fas fa-plus fa-sm"></i> 
            Tambah Data
        </button>'
    ) 
    ?>
  
  <table class="table table-bordered table-striped">
  	<tr>
  		<th class="text-center">ID</th>
  		<th class="text-center">Nama Depan</th>
  		<th class="text-center">Nama Belakang</th>
  		<th class="text-center">Username</th>
  		<th class="text-center">Role</th>
  		<th class="text-center">Active</th>

  	<?php foreach($user as $u) : ?>
  		<tr>
  			<td><?php echo $u->id ?></td>
  			<td><?php echo $u->first_name ?></td>
  			<td><?php echo $u->last_name ?></td>
  			<td><?php echo $u->username ?></td>
  			<td><?php echo $u->role ?></td>
  			<td><?php echo $u->active ?></td>
  		<tr>
  	<?php endforeach; ?>
  </table>
</div>
