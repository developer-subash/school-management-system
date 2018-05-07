<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modal extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		/*cache control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
    }
	
	/***default functin, redirects to login page if no admin logged in yet***/
	public function index()
	{
		
	}
	
	
	/*
	*	$page_name		=	The name of page
	*/
	function popup($page_name = '' , $param2 = '' , $param3 = '')
	{

		if($_SERVER['REQUEST_METHOD'] == "POST")
		{

			
		$page_data['class_id']		=	$_POST['class_id'];
		$page_data['section_id']	=	$_POST['section_id'];
		$page_data['std_id']		=	$_POST['std_id'];
		$page_data['exam_id']		=	$_POST['exam_id'];


		}

		

				
		$account_type		=	$this->session->userdata('login_type');
		
		$page_data['param2']		=	$param2;
		$page_data['param3']		=	$param3;

		
	$this->load->view( 'backend/'.$account_type.'/'.$page_name.'.php' ,$page_data);


		
		echo '<script src="assets/js/neon-custom-ajax.js"></script>';
	}

	// show sttudent_individually_during_asssign_section

	function show_student($page_name='', $param1='',$param2='')
	{

		$account_type		=	$this->session->userdata('login_type');

		echo $account_type;

	}

	// show leader 

	function marksheet($page_name = '', $param1 = '', $param2='', $param3='', $param4='' )
	{



					
		$account_type		=	$this->session->userdata('login_type');
			

		$page_data['class_id']		=	$param1;
		$page_data['section_id']	=	$param2;
		$page_data['exam_id']		=	$param3;
		$page_data['std_id']		=	$param4;
		


     	$this->load->view( 'backend/'.$account_type.'/'.$page_name.'.php' ,$page_data);

     	
		
	}
}

