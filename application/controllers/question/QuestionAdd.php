<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionAdd extends CI_Controller {

	function __construct(){ //perintah untuk memanggil model 
		parent::__construct();
		$this->load->model('question/Question_model','questAdd'); 
	    
    }
    public function index()
	{
        $this->load->view('public/header');
        $this->load->view('question/AddQuestion');
        $this->load->view('public/footer');

    }
    
    public function add()
	{
		$data = $this->input->post();

		$create = $this->questAdd->create($data); //pemilihan nama tabel sesuai dengan alias yang ada di model yg sudah di load diatas

		if($create){
			echo "Sukses!";
		} else{
			echo "Gagal!";
		}
		

    }
    public function getJson(){
        $data = $this->questAdd->get();
        echo json_encode($data);
    }
}