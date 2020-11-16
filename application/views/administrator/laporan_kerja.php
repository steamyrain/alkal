<div class="container-fluid">
    <div class="alert alert-success" role="alert">
        <i class="fas fa-clipboard"></i> Laporan Kerja 
    </div>
    <?php 
        echo anchor(
            'administrator/laporan/input',
            '<button class="btn btn-sm btn-primary mb-3">
                <i class="fas fa-plus fa-sm"></i> 
                Tambah Data
            </button>'
        ) 
    ?> 
  <table class="table table-bordered table-striped">
  	<tr>
  		<th class="text-center">No</th>
  		<th class="text-center">Nama</th>
  		<th class="text-center">Lokasi Kerja</th>
  		<th class="text-center">Nomer Polisi</th>
  		<th class="text-center">KM Awal</th>
  		<th class="text-center">KM Akhir</th>
  		<th class="text-center">Jarak</th>
  		<th class="text-center">BBM</th>
    </tr>
    <?php $i=1;foreach($laporan as $l):?>
    <tr>
        <th class="text-center"><?php echo $i++; ?></th>
        <th class="text-center"><?php echo $l->nama; ?></th>
        <th class="text-center"><?php echo $l->lokasiKerja; ?></th>
        <th class="text-center"><?php echo $l->npol; ?></th>
        <th class="text-center"><?php echo $l->kmawal; ?></th>
        <th class="text-center"><?php echo $l->kmakhir; ?></th>
        <th class="text-center"><?php echo $l->jarak; ?></th>
        <th class="text-center"><?php echo $l->bbm; ?></th>
    </tr>
    <?php endforeach;?>
  </table>
</div>
