<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class form extends CI_Controller {

	function __construct(){ //perintah untuk memanggil model 
		parent::__construct();
		$this->load->model('user/User_model','userM'); //userM sebagai alias untuk pemanggilan parameter pertama
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function show()
	{
		$this->load->view('public/header');
		$this->load->view('public/form');
		$this->load->view('public/footer');
	}

	public function proses()
	{
		$data = $this->input->post();
		$create = $this->userM->create($data);
		if($create){
			echo "Sukses";
		}

	}
	public function tampil()
	{
		//$id = array(1,2,3);
		$this->load->view('public/header');
		$database = $this->userM->get();
		//echo "<pre>";
		//ar_dump($database);
		$data ['list'] = $database;
		$this->load->view('public/User_list',$data);
		$this->load->view('public/footer');
	}

	public function detail($id)
	{
		$database = $this->userM->get($id)[0];
		$data['detail'] = $database;
		//echo "<pre>";
		//var_dump($data);
		$this->load->view('public/form_detail',$data);
	}


}

/*
1. Membuat controller
2. Membuat view
3. panggil view d controller
3. Setting Autoload (library)
4. Buat Database
5. Buat Modelnya
6. Panggil Model dalam Controllers

struktur url : localhost/nama_projek/nama_folder_di_controller/nama_class_controller/nama_fungsi_dalam_class

*/