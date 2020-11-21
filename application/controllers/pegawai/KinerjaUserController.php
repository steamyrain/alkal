<?php

class KinerjaUserController extends CI_Controller{

    // index function acts as KinerjaUserController index.html
    // this function will show table of user's kinerja data
    // from database
	public function index()
	{
		$data['title'] = "data kinerja";
		$data['kinerja'] = $this->kinerja_model->tampil_data()->result();
		$this->load->view('template_pegawai/header');
		$this->load->view('template_pegawai/sidebar');
		$this->load->view('pegawai/kinerja',$data);
		$this->load->view('template_pegawai/footer');
	}

    // input function will load input form for kinerja
	public function input()
	{
		$this->load->view('template_pegawai/header');
		$this->load->view('template_pegawai/sidebar');
		$this->load->view('pegawai/kinerja_form');
		$this->load->view('template_pegawai/footer');
	}

    // input_aksi function will process the form post
    // and insert the post data to database using
    // model kinerja_model
	public function input_aksi()
	{
        // rules loaded
		$this->_rules();

        // check if form not valid / return FALSE
		if($this->form_validation->run() == FALSE) {
			$this->input();
        }

        // form is valid
        else 
        {
            // assign form input values to variables
			$nama 			= $this->input->post('nama');
			$bidang 		= $this->input->post('bidang');
			$kegiatan 		= $this->input->post('kegiatan');

            // codeigniter's upload config
            $config['upload_path'] = './assets/upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000; 

            // initialize upload with predefined config
            $this->upload->initialize($config);

            // check if upload is successful
            if(!$this->upload->do_upload('dokumentasi')) {
                $this->session->set_flashdata('pesan',
                    '<div 
                        class=" alert 
                                alert-danger
                                dismissible 
                                fade 
                                show
                                " 
                        role="alert">
                    <?php echo "error" ?>
                    <button 
                        type="button" 
                        class="close" 
                        data-dismiss="alert" 
                        aria-label="Close">
                    <span 
                        aria-hidden="true">
                    &times;
                    </span>
                    </button>
                    </div>');
                redirect(route('kinerja-user-form'),'refresh');
            }
            else {
                $dokumentasi = $this->upload->data('file_name');
                $data = array(
                    'nama' => $nama,
                    'bidang' => $bidang,
                    'kegiatan' => $kegiatan,
                    'dokumentasi' => $dokumentasi,
                );
                $this->kinerja_model->input_data($data);
                $this->session->set_flashdata('pesan',
                    '<div 
                        class=" alert 
                                alert-warning 
                                alert-danger 
                                dismissible 
                                fade 
                                show
                                " 
                        role="alert">
                    Data Berhasil Ditambahkan!
                    <button 
                        type="button" 
                        class="close" 
                        data-dismiss="alert" 
                        aria-label="Close">
                    <span 
                        aria-hidden="true">
                    &times;
                    </span>
                    </button>
                    </div>');
                    redirect('pegawai/kinerja');
            }
		}
    }

    // _rules function is a set of kinerja_form specific
    // validation rules
	public function _rules()
	{
		$this->form_validation->set_rules('nama','nama','required',['required' => 'Nama Wajib Diisi']);
		$this->form_validation->set_rules('bidang','bidang','required',['required' => 'Bidang Wajib Diisi']);
		$this->form_validation->set_rules('kegiatan','kegiatan','required',['required' => 'Kegiatan Wajib Diisi']);
        $this->form_validation->set_rules('dokumentasi','dokumentasi','callback_check_dokumentasi');
	}
    
    // check_dokumentasi is a custom callback function 
    // for field dokumentasi
    public function check_dokumentasi() {
        if($_FILES['dokumentasi']['size']==0) {
            $this->form_validation->set_message('check_dokumentasi','Dokumentasi wajib diunggah');
            return false;
        }
        else {
            return true;
        }
    }	

}
