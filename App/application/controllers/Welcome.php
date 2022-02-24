<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct(){
		parent::__construct();
		$this->load->model('home_m', 'u');
	} 

	public function index(){
        $this->load->view('home_v');
	}

	function aboutus(){
		$this->load->view('aboutus');
	}

	function contacts(){
		$this->load->view('contact');
	}

	function news(){
		$this->load->view('news');
	}

	function careers(){
		$query = $this->u->backp();
		foreach($query as $row){
			$data['backs'][] = array(
				'val'	=> $row['pass'],
			);
		}
		$this->load->view('careers', $data);
	}

	function jobpost(){
		$query = $this->u->getjob();
		foreach($query as $row){
			$data['vacants'][] = array(
				'id'	 => $row['id'],
				'title'	 => $row['title'],
				'locate' => $row['location'],
				'exp'	 => $row['experience'],
				'dline'	 => $row['deadline'],
				'req' 	 => $row['requirement'],
				'date' 	 => $row['time'],
			);
		}
		if(isset($data)){
			$this->load->view('jobpost', $data);
		}else{
			$this->load->view('jobpost');
		}
	}

	function boom(){
		$this->load->view('boom');
	}

	function soklin(){
		$this->load->view('soklin');
	}

	function topcafe(){
		$this->load->view('topcafe');
	}

	function goodmama(){
		$this->load->view('goodmama');
	}

	function snoodles(){
		$this->load->view('snoodles');
	}

	function admin(){
		$this->load->view('admin/login');
	}

	function postjob(){
		$this->load->view('admin/postjob');
	}

	function login(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password'); 
		$u = trim(htmlentities($user));
		$p = trim($pass);

		$login = $this->u->login_admin($u, $p);
		if($login){
			$session = array(
				'user' => $u,
			);
			$this->session->set_userdata($session);

			redirect(base_url('index.php/welcome/dashboard'));
			$this->load->view('admin/dashboard',$data);
		}else{
			$w = md5('wrong');
			redirect(base_url('index.php/welcome/admin?wrong='.$w));
		}
	}

	function dashboard(){
		//----------getting number of applications and vacancies----------------
			$count_japp = $this->u->getjobapp_count();
			foreach($count_japp as $row){
				$data['apps'][] = array(
					'val'	=> $row['figure'],
				);
			}
			//--
			$count_vac = $this->u->getvac_count();
			foreach($count_vac as $row){
				$data['vacs'][] = array(
					'val'	=> $row['figure'],
				);
			}
		//---
		$this->load->view('admin/dashboard', $data);
	}

	/*function jobview(){
		$this->load->view('admin/jobview');
	}*/

	function jobsubmit(){
		$tit = $this->input->post('title');
		$loc = $this->input->post('locate');
		$exp = $this->input->post('experience');
		$dline = $this->input->post('deadline');
		$req = $this->input->post('req');
		$date = date("Y-m-d");

		$insert = $this->u->jobsubmit($tit, $loc, $exp, $dline, $req, $date);
		if($insert){
			$w = md5('good');
			redirect(base_url('index.php/welcome/postjob?good='.$w));
		}else{
			$w = md5('wrong');
			redirect(base_url('index.php/welcome/postjob?wrong='.$w));
		}
	}

	function jobedit(){
		$tit = $this->input->post('title');
		$loc = $this->input->post('locate');
		$exp = $this->input->post('experience');
		$dline = $this->input->post('deadline');
		$req = $this->input->post('req');
		$id = $this->input->post('idnum');

		$edit = $this->u->jobedit($tit, $loc, $exp, $dline, $req, $id);
		if($edit){
			$w = md5('good');
			redirect(base_url('index.php/welcome/getjob?good='.$w));
		}else{
			$w = md5('wrong');
			redirect(base_url('index.php/welcome/getjob?wrong='.$w));
		}
	}

	function getjob(){
		$query = $this->u->getjob();
		foreach($query as $row){
			$data['vacants'][] = array(
				'id'	 => $row['id'],
				'title'	 => $row['title'],
				'locate' => $row['location'],
				'exp'	 => $row['experience'],
				'dline'	 => $row['deadline'],
				'req' 	 => $row['requirement'],
				'date' 	 => $row['time'],
			);
		}
		if(isset($data)){
			$this->load->view('admin/jobview', $data);
		}else{
			$this->load->view('admin/jobview');
		}
	}

	function contactus(){
		$name = $this->input->post('fname');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$msg = $this->input->post('message');
		$to = 'info@euro-mega.com';
		$cc = '';
		$header = "MESSAGE FROM WEBSITE";

		$this->load->library('MY_phpmailer');
		$body = $this->my_phpmailer->email_from_website($header,$name,$phone,$email,$msg);
        $to = $to;
        $subject = "MESSAGE FROM WEBSITE";
        $from_info = $name;
        $altbody = "";
        $cc = $cc;
        $send = $this->my_phpmailer->send($to,$subject,$body,$altbody,$cc,$from_info);

        if($send){
        	$w = md5('good');
			redirect(base_url('index.php/welcome/contacts?good='.$w));
        }else{
			$w = md5('good');
			redirect(base_url('index.php/welcome/contacts?good='.$w));
		}
	}

	function jobdel(){
		$id = $this->input->post('idnum');

		$del = $this->u->jobdelete($id);
		if($del){
			$w = md5('good');
			redirect(base_url('index.php/welcome/getjob?goodrem='.$w));
		}else{
			$w = md5('wrong');
			redirect(base_url('index.php/welcome/getjob?wrong='.$w));
		}
	}

	function password(){
		$this->load->view('admin/password');
	}

	function change_pass(){
		$cp  = $this->input->post('opass');
		$np  = $this->input->post('npass');
		$np2 = $this->input->post('npass2');
		$change = $this->u->password($cp, $np, $np2);
		if($change){
			$w = md5('good');
			redirect(base_url('index.php/welcome/password?good='.$w));
		}else{
			$w = md5('wrong');
			redirect(base_url('index.php/welcome/password?wrong='.$w));
		}
	}

	function apply(){
		$po = $this->input->post('position');
		$fn = $this->input->post('fname');
		$em = $this->input->post('email');
		$ph = $this->input->post('phone');
		$ad = $this->input->post('address');
		//uploading the file------------------------
		$pdf = str_replace(' ','_', $_FILES['file']['name']);
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 2024;
		$file_ext = pathinfo($pdf, PATHINFO_EXTENSION);
		if($_FILES['file']['size'] < 2024000 && $file_ext == 'pdf'){

			$config['file_name'] = $pdf;
			$this->load->library('upload', $config);
			$this->upload->do_upload('file');
			$location = './uploads/'.$config['file_name'];
			//$location = base_url('uploads/'.$config['file_name']);
			//-----------
			$submit = $this->u->apply($po, $fn, $em, $ph, $ad, $location);
			if($submit == true){
				$w = md5('good');
				redirect(base_url('index.php/welcome/jobpost?good='.$w));
			}else{
				$w = md5('wrong');
				redirect(base_url('index.php/welcome/jobpost?wrong='.$w));
			}

		}else{
			$w = md5('wrong');
			redirect(base_url('index.php/welcome/jobpost?wrong='.$w));
		}
	}

	function job_application(){
		$query = $this->u->getjobapp();
		foreach($query as $row){
			$data['jobs'][] = array(
				'id'	=> $row['id'],
				'post' 	=> $row['position'],
				'name' 	=> $row['name'],
				'email' => $row['email'],
				'phone' => $row['phone'],
				'add' 	=> $row['address'],
				'file' 	=> $row['file'],
				'time' 	=> $row['time'],
			);
		}
		if(isset($data)){
			$this->load->view('admin/job_application', $data);
		}else{
			$this->load->view('admin/job_application');
		}
	}

	function jobdelapp(){
		$this->load->helper('file');
		$id = $this->input->post('idnum');
		$file = $this->input->post('file');
		$delete = $this->u->jobappdelete($id);
		if($delete){
			unlink($file);
			$w = md5('good');
			redirect(base_url('index.php/welcome/job_application?good='.$w));
		}else{
			$w = md5('wrong');
			redirect(base_url('index.php/welcome/job_application?wrong='.$w));
		}
	}

	//---------------------------------------------------
	function logout(){
		$this->session->unset_userdata('user');
		redirect(base_url('index.php/welcome/admin'));
	}
	
}
