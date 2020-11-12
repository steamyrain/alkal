<?php

class Kinerja extends CI_Controller{

	public function index()
	{
		$data['title'] = "data kinerja";
		$data['kinerja']	= $this->kinerja_model->tampil_data()->result();
		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar');
		$this->load->view('administrator/kinerja',$data);
		$this->load->view('template_administrator/footer');
	}

	public function input()
	{
		$data = array(
			'no'  => set_value('no'),
			'nama'   => set_value('nama'),
			'bidang'   => set_value('bidang'),
			'kegiatan'   => set_value('kegiatan'),
			'dokumentasi'   => set_value('dokumentasi'),
		);
		$this->load->view('template_administrator/header');
		$this->load->view('template_administrator/sidebar');
		$this->load->view('administrator/kinerja_form',$data);
		$this->load->view('template_administrator/footer');
	}
	public function input_aksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE)  {
			$this->input();
		}else {
			$nama 			= $this->input->post('nama');
			$bidang 		= $this->input->post('bidang');
			$kegiatan 		= $this->input->post('kegiatan');
			$dokumentasi 	= $_FILES['dokumentasi'];   
 			if($dokumentasi='') {} else {
 			$config['upload_path']  = './assets/upload';
  			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload', $config);    
   			if(!$this->upload->do_upload('dokumentasi')){
    		echo "Upload Gagal"; die();
   			} else {
   			$dokumentasi = $this->upload->data('file_name');
   			}
 			}
			$data = array(
				'nama'			=> $nama,
			    'bidang'		=> $bidang,
				'kegiatan'		=> $kegiatan,
				'dokumentasi'	=> $dokumentasi
		);
		
		$this->kinerja_model->input_data($data);
		$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-danger dismissible fade show" role="alert">
  				Data Berhasil Ditambahkan!
 				 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   				 <span aria-hidden="true">&times;</span>
 				 </button>
				</div>');
		redirect('administrator/kinerja');
		}

}
	
	public function _rules()
	{
		$this->form_validation->set_rules('nama','nama','required',['required' => 'Nama Wajib Diisi']);
		$this->form_validation->set_rules('bidang','bidang','required',['required' => 'Bidang Wajib Diisi']);
		$this->form_validation->set_rules('kegiatan','kegiatan','required',['required' => 'Kegiatan Wajib Diisi']);
		$this->form_validation->set_rules('dokumentasi','dokumentasi','required',['required' => 'Dokumentasi Wajib Diisi']);
	}
}