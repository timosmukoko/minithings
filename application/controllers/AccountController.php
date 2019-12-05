<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();
class AccountController extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('MiniThingsModel');
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{	
		$this->load->view('index');
	}
	
	public function viewAuthor($authorID)
    {	
		$data['view_data']= $this->AuthorModel->drilldown($authorID);
		$this->load->view('AuthorView', $data);
    }

	public function editCustomer($customerID)
    {	
		$data['edit_data']= $this->MiniThingsModel->customer_drilldown($customerID);
		$this->load->view('updateCustomerView', $data);
    }
     
	public function deleteCustomer($customerID)
    {	
		$deletedRows = $this->MiniThingsModel->deleteCustomerModel($customerID);
		if ($deletedRows > 0)
			$data['message'] = "$deletedRows your account has been deleted";
		else
			$data['message'] = "There was an error deleting your account with an ID of $customerID";
		$this->load->view('displayMessageView',$data);
    }
	
    public function updateCustomer($customerID)
    {	
		//$pathToFile = $this->uploadAndResizeFile();
		//$this->createThumbnail($pathToFile);

		//set validation rules
		$this->form_validation->set_rules('customerID', 'Customer Number', 'required');
		$this->form_validation->set_rules('customerName', 'Customer Name', 'required');
		$this->form_validation->set_rules('contactLastName', 'Contact Last Name', 'required');
		$this->form_validation->set_rules('contactFirstName', 'Contact First Name', 'required');	
		$this->form_validation->set_rules('phone', 'phone', 'required');
		$this->form_validation->set_rules('addressLine1', 'Address Line1', 'required');
		$this->form_validation->set_rules('addressLine2', 'AddressLine2');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State');
		$this->form_validation->set_rules('postalCode', 'PostalCode');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('creditLimit', 'Credit Limit');
		$this->form_validation->set_rules('email', 'email');
		$this->form_validation->set_rules('password', 'Password');
		
	
		//get values from post
		$customerID = $this->input->post('customerID');
		$aCustomer['customerName'] = $this->input->post('customerName');
		$aCustomer['contactLastName'] = $this->input->post('contactLastName');
		$aCustomer['contactFirstName'] = $this->input->post('contactFirstName');
		$aCustomer['phone'] = $this->input->post('phone');
		$aCustomer['addressLine1'] = $this->input->post('addressLine1');
		$aCustomer['addressLine2'] = $this->input->post('addressLine2');
		$aCustomer['city'] = $this->input->post('city');
		$aCustomer['state'] = $this->input->post('state');
		$aCustomer['postalCode'] = $this->input->post('postalCode');
		$aCustomer['country'] = $this->input->post('country');
		$aCustomer['creditLimit'] = $this->input->post('creditLimit');
		$aCustomer['email'] = $this->input->post('email');
		$aCustomer['password'] = $this->input->post('password');
		//$aCustomer['image'] = $_FILES['userfile']['name'];

		//check if the form has passed validation
		if (!$this->form_validation->run()){
			//validation has failed, load the form again
			$this->load->view('updateCustomerView', $aCustomer);
			return;
		}

		
		//check if update is successful
		if ($this->MiniThingsModel->updateCustomerModel($aCustomer, $customerID)) {
			redirect('AccountController/userProfile');
		}
		else {
			$data['message']="Uh oh ... problem on update";
		}
    }
	
	public function userProfile()
	{
		$this->load->view('user_profile');
	}
	
	public function adminProfile()
	{
		$this->load->view('admin');
	}
	
	public function adminCustomerListView()
	{
		$this->load->view('customerListView');
	}
	
	public function adminContactListView()
	{
		$this->load->view('contactListView');
	}
	
	public function adminDeleteCustomer($customerID)
    {	
		$deletedRows = $this->MiniThingsModel->deleteCustomerModel($customerID);
		if ($deletedRows > 0)
			$data['message'] = "$deletedRows Customer account has been deleted";
		else
			$data['message'] = "There was an error deleting customer account with an ID of $customerID";
		$this->load->view('adminDisplayMessageView',$data);
    }
	
	public function adminDeleteContact($conatctID)
    {	
		$deletedRows = $this->MiniThingsModel->deleteContactModel($conatctID);
		if ($deletedRows > 0)
			$data['message'] = "$deletedRows Customer account has been deleted";
		else
			$data['message'] = "There was an error deleting customer account with an ID of $conatctID";
		$this->load->view('adminDisplayMessageView',$data);
    }
	
	
	public function new_user_registration() {

		//$this->form_validation->set_rules('CustomerNumber', 'Customer Number', '');
		$this->form_validation->set_rules('CustomerName', 'Customer Name', 'required');
		$this->form_validation->set_rules('ContactLastName', 'Contact Last Name', 'required');	
		$this->form_validation->set_rules('ContactFirstName', 'Contact First Name', 'required');
		$this->form_validation->set_rules('Phone', 'Phone', 'required');
		$this->form_validation->set_rules('AddressLine1', 'Address Line1', 'required');
		$this->form_validation->set_rules('AddressLine2', 'Address Line2', '');
		$this->form_validation->set_rules('City', 'City', 'required');
		$this->form_validation->set_rules('State', 'State', '');
		$this->form_validation->set_rules('PostalCode', 'Postal Code', '');
		$this->form_validation->set_rules('Country', 'Country', 'required');
		$this->form_validation->set_rules('CreditLimit', 'City', '');
		$this->form_validation->set_rules('Email', 'Email', 'required');
		$this->form_validation->set_rules('Password', 'Password', 'required');
			
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('registration_form');
		} else {
		$data = array(
		//'customerNumber' => $this->input->post('CustomerNumber'),
		'customerName' => $this->input->post('CustomerName'),
		'contactLastName' => $this->input->post('ContactLastName'),
		'contactFirstName' => $this->input->post('ContactFirstName'),
		'phone' => $this->input->post('Phone'),
		'addressLine1' => $this->input->post('AddressLine1'),
		'addressLine2' => $this->input->post('AddressLine2'),
		'city' => $this->input->post('City'),
		'postalCode' => $this->input->post('PostalCode'),
		'country' => $this->input->post('Country'),
		'creditLimit' => $this->input->post('CreditLimit'),
		'email' => $this->input->post('Email'),
		'password' => md5($this->input->post('Password'))
		);
		$result = $this->MiniThingsModel->registration_insertModel($data);
		if ($result == TRUE) {
		$data['message'] = 'Registration Successfully !';
		//$this->load->view('displayMessageView', $data);
		$this->load->view('login_form', $data);
		} else {
		$data['message'] = 'Username/email already exist!';
		$this->load->view('registration_form', $data);
		}
		}
	}
	
	public function contact() {

		//$this->form_validation->set_rules('CustomerNumber', 'Customer Number', '');
		$this->form_validation->set_rules('Name', 'Name', 'required');
		$this->form_validation->set_rules('Email', 'Email', 'required');
		$this->form_validation->set_rules('Phone', 'Phone');
		$this->form_validation->set_rules('Website', 'Website');
		$this->form_validation->set_rules('Message', 'Message', 'required');
			
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('contact_form');
		} else {
		$data = array(
		'name' => $this->input->post('Name'),
		'email' => $this->input->post('Email'),
		'phone' => $this->input->post('Phone'),
		'website' => $this->input->post('Website'),
		'message' => $this->input->post('Message')
		);
		$result = $this->MiniThingsModel->contact_insertModel($data);
		if ($result == TRUE) {
		$data['message'] = 'Message Successfully sent!';
		$this->load->view('displayMessageView', $data);
		} else {
		$this->load->view('contact_form', $data);
		}
		}
	}
	
	function uploadAndResizeFile()
	{	//set config options for thumbnail creation
		$config['upload_path']='./assets/images/full/';
		$config['allowed_types']='gif|jpg|png';
		$config['max_size']='100';
		$config['max_width']='1024';
		$config['max_height']='768';
		
		$this->load->library('upload',$config);
		if (!$this->upload->do_upload())
			echo $this->upload->display_errors();
		else
			echo 'upload done<br>';	
	
		$upload_data = $this->upload->data();
		$path = $upload_data['full_path'];
		
		$config['source_image']=$path;
		$config['maintain_ratio']='FALSE';
		$config['width']='180';
		$config['height']='200';

		$this->load->library('image_lib',$config);
		if (!$this->image_lib->resize())
			echo $this->image_lib->display_errors();
		else
			echo 'image resized<br>';
			
		$this->image_lib->clear();
		return $path;
	}
	
	function createThumbnail($path)
	{	//set config options for thumbnail creation
		$config['source_image']=$path;
		$config['new_image']='./assets/images/thumbs/';
		$config['maintain_ratio']='FALSE';
		$config['width']='42';
		$config['height']='42';
		
		//load library to do the resizing and thumbnail creation
		$this->image_lib->initialize($config);
		
		//call function resize in the image library to physiclly create the thumbnail
		if (!$this->image_lib->resize())
			echo $this->image_lib->display_errors();
		else
			echo 'thumbnail created<br>';	
	}
}