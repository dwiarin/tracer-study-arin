<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class form extends CI_Controller {

	function __construct(){ //perintah untuk memanggil model 
		parent::__construct();
		$this->load->model('user/User_model','userM'); //userM sebagai alias untuk pemanggilan parameter pertama
		$this->load->model('question/Question_model','questM');
		$this->load->model('answer/Answer_model','answerM');
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function show()
	{
		$this->load->view('public/header');
		
		$database = $this->questM->get();

		if($database){
			$questionArray = array();
			foreach ($database as $row){
				
				$questionInside = $row;

				if($row['type']=="select"){
					$optionsArray = explode(PHP_EOL, $row['options']); //EOL = End of Line (Enter)
					$questionInside['options_array'] = $optionsArray;
				}
				$questionArray[] = $questionInside;
			}
		}
		//pengemasan data terakhir untuk digunakan oleh view
		//$data['questions'] penamaannya bebas, asal nanti sesuaikan dengan di view
		$data['questions'] = $questionArray;
		$this->load->view('public/form',$data);
		$this->load->view('public/footer');
		//echo "<pre>";
		//var_dump($questionArray);
		//$this->load->view('public/Quest_list',$data);
	}

	public function proses()
	{
		$data = $this->input->post();

		$questions = $data['questions'];
		unset($data['questions']);

		$create = $this->userM->create($data); //pemilihan nama tabel sesuai dengan alias yang ada di model yg sudah di load diatas
		$lastID = $this->db->insert_id();

		//Reformating questions
		$newQuestions = array();
		foreach($questions as $index=>$row){
			$newQuestions[] = array(
				'question_id' => $index,
				'the_answer' => $row,
				'id_user' => $lastID,
			);
		}

		$insertBanyak = $this->answerM->create($newQuestions,TRUE);

		if($insertBanyak){
			echo "Sukses!";
		} else{
			echo "Gagal!";
		}
		

	}
	public function tampil()
	{
		$this->load->view('public/header');
		$database = $this->userM->get();
		$data ['list'] = $database;
		$this->load->view('public/User_list',$data);
		$this->load->view('public/footer');
	}

	public function detail($id)
	{
		//get data user
		$database = $this->userM->get($id)[0];
		$data['detail'] = $database;

		//get answer
		$answer = $this->answerM->get(
			$database['id_user'], 'id_user'
		);
		$data['answer'] = $answer;

		//get question Ids
		$questionIds = array();
		foreach ($answer as $row){
			$questionIds[] = $row['question_id'];
		}
		
		//get question detail
		$question = $this->questM->get($questionIds);
		
		//Modify question index
		$questionNew=array();
		foreach($question as $row){
			$questionNew[$row['question_id']] = $row;
		}
		$data['question'] = $questionNew;
	
		$data['answer'] = $answer;
		$this->load->view('public/header');
		$this->load->view('public/form_detail',$data);
		$this->load->view('public/footer');
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