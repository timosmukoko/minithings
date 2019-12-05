<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller {

	 function __construct() {
		parent::__construct();
		//preferable to load these in the auto load file
		$this->load->model('MiniThingsModel');
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->load->library('session');
	 }

	 function index() {
	 
		//check if the user is already logged in
		if($this->session->userdata('logged_in'))
   
			//the user is already logged in -> display the secret content
			$this->load->view('user_home_view');
   
		else
			//user isn't logged in -> display login form
			$this->load->view('login_form');
			//redirect('LoginController','refresh');
	}
	
	
	//------------------
	
	function login_user(){
		
	$user_login=array(
	'email'=>$this->input->post('email'),
	'password'=>md5($this->input->post('password'))
    );

    $adminData=$this->MiniThingsModel->login_adminModel($user_login['email'],$user_login['password']);
	$userData=$this->MiniThingsModel->login_userModel($user_login['email'],$user_login['password']);
	
      if($adminData)
      {
        $this->session->set_userdata('userID',$adminData['userID']);
		$this->session->set_userdata('userName',$adminData['userName']);
        $this->session->set_userdata('email',$adminData['email']);
       
        $this->load->view('admin');
      }
	  else if($userData)
	  {		
		$this->session->set_userdata('customerNumber',$userData['customerNumber']);
		$this->session->set_userdata('customerName',$userData['customerName']);
		$this->session->set_userdata('contactLastName',$userData['contactLastName']);
		$this->session->set_userdata('contactFirstName',$userData['contactFirstName']);
		$this->session->set_userdata('phone',$userData['phone']);
        $this->session->set_userdata('email',$userData['email']);
       
        $this->load->view('user_home_view'); 
	  }
      else{
        $this->session->set_flashdata('error_msg', 'Error occured,Try again.');
		
        $this->load->view("login_form");
      }
}

	//-------------------
 
	
	function user_profile()
	{
		$this->load->view('user_profile');
	}
	
	function user_home_view()
	{
		$this->load->view('user_home_view');
	}
	
	function logout() {
	
		//unset the session data
		$this->session->unset_userdata('logged_in');
		
		//destroy the session
		$this->session->sess_destroy();
		
		//redirect the user to the login page
		redirect('LoginController','refresh');
	}

}

?>