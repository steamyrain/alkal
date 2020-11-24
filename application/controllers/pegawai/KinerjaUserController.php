<?php

use Luthier\Debug;

class KinerjaUserController extends CI_Controller{

    private AlkalUser $currentUser; 
    private string $fullName;
    private int $uID;
    private int $jID;

    public function __construct() {
        parent::__construct();
        $this->currentUser = Auth::user();
        $this->fullName  = $this->currentUser->getFullName();
        $this->uId  = $this->currentUser->getUserId();
        $this->jId  = $this->currentUser->getUserJobId();
    }

    // index function acts as KinerjaUserController index.html
    // this function will show table of user's kinerja data
    // from database
	public function index()
	{
        $fullName = $this->fullName;
        $userId = $this->uId;
        $kinerja = $this->kinerja_model->data_user_spesifik($userId)->result();

        $data = [
            'title'=>"Data Kinerja",
            'fullName'=>$fullName,
            'kinerja'=> $kinerja
        ];

		$this->load->view('template_pegawai/header');
		$this->load->view('template_pegawai/sidebar');
		$this->load->view('pegawai/kinerja',$data);
		$this->load->view('template_pegawai/footer');
	}

    // input function will load input form for kinerja
	public function input()
	{
        // prepopulate with specific user's data
        $queryJob = $this->job_model->ambil_job_where($this->jId);
        $job = $queryJob->result()[0];
        $data = [
            'fullName'=>$this->fullName,
            'uId'=>$this->uId,
            'jId'=>$this->jId,
            'jJob'=>$job->job
        ];
		$this->load->view('template_pegawai/header');
		$this->load->view('template_pegawai/sidebar');
		$this->load->view('pegawai/kinerja_form',$data);
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
            // assign variables with form values 
			$kegiatan = $this->input->post('kegiatan');

            // codeigniter's upload config
            $config['upload_path'] = './assets/upload/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2000; 

            // initialize upload with predefined config
            $this->upload->initialize($config);

            // check if upload is successful
            if(!$this->upload->do_upload('dokumentasi')) {
                echo $this->upload->display_errors();
                $this->session->set_flashdata('pesan',
                    '<div 
                        class=" alert 
                                alert-danger
                                dismissible 
                                fade 
                                show
                                " 
                        role="alert">
                        Upload Gagal
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
                redirect(route('kinerja-user-form'));
            }
            else {
                $dokumentasi = $this->upload->data('file_name');
                $data = array(
                    'userId' => $this->uId,
                    'kegiatan' => $kegiatan,
                    'dokumentasi' => $dokumentasi,
                    'jobId'=> $this->jId
                );
                Debug::log($data,'info');
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
                    redirect(route('kinerja-user'));
            }
		}
    }

    // _rules function is a set of kinerja_form specific
    // validation rules
	public function _rules()
	{
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
