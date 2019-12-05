<?php 

class Home extends CI_Controller {

 function __construct() {
   parent::__construct();
   $this->load->model('MiniThingsModel');
   $this->load->library('session');
   $this->load->helper('url');
   $this->load->library('form_validation');
 }//end constructor

 function index() {
	
	//if the user is logged in
    if($this->session->userdata('logged_in')) {
   
     //get the session data
     $session_data = $this->session->userdata('logged_in');
	 
	 //get the username from the session and put it in $data
     $data['contactLastName'] = $session_data['contactLastName'];
	 
	 //load view with the username included in $data
     $this->load->view('user_home_view', $data);
   }
   else 
     //if no session, redirect to login page
     $this->load->view('index');
   }//end function index()
}//end class

?>