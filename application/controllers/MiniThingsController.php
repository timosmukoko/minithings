<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start();
class MiniThingsController extends CI_Controller {
	
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
		//end function index()
		//$this->load->view('index');
	}
	
	public function listProductLine($product)
	{
		$data['productLine_info']=$this->MiniThingsModel->productLine_drilldown(urldecode($product));
		$this->load->view('productByLineListView',$data);
	}
	
	public function adminListProductLine($product)
	{
		$data['admin_product_line_info']=$this->MiniThingsModel->productLine_drilldown(urldecode($product));
		$this->load->view('adminProductByLine',$data);
	}
	
	public function listProduct()
	{
		$data['view_all_product']= $this->MiniThingsModel->get_all_productModel();
		$this->load->view('productListView', $data);
	}
	
	public function adminProductLineView()
	{
		$this->load->view('adminProductLineView');
	}
	
	public function adminOrderView()
	{
		$this->load->view('order');
	}

	public function editProduct($productCode)
    {	
		$data['edit_data']= $this->MiniThingsModel->product_details_drilldown($productCode);
		$this->load->view('editproductdetails', $data);
    }
	
	
	public function customerOrder($customerID)
    {	
		$data['cust_orders']= $this->MiniThingsModel->customer_drilldown($customerID);
		$this->load->view('cust_order', $data);
    }
	
	
	//Search ===============================
	
	public function search() {
    $postlist['searchProduct'] = $this->MiniThingsModel->get_search($this->input->post('search'));
    $this->load->view('product_search', $postlist);
}
     
	public function imgPop($productCode)
	{
		$pathToFile = $this->uploadAndResizeFile();
		$this->createThumbnail($pathToFile);
		
		$aProduct['image'] = $_FILES['userfile']['name'];
		
		if (!$this->form_validation->run()){
			//validation has failed, load the form again
			$this->load->view('admin', $aProduct);
			return;
		}

		//check if update is successful
		if ($this->MiniThingsModel->updateProductModel($aProduct, $productCode)) {
			redirect('AccountController/adminProfile');
		}
		else {
			$data['message']="Uh oh ... problem on update";
		}
		
		$this->load->view('imgPop', $aProduct);
	}
	
	public function deleteProduct($productCode)
    {	
		$deletedRows = $this->MiniThingsModel->deleteProductModel($productCode);
		if ($deletedRows > 0)
			$data['message'] = "$deletedRows Product has been deleted";
		else
			$data['message'] = "There was an error deleting the author with an ID of $productCode";
		$this->load->view('displayMessageView',$data);
    }
	
	
    public function updateProduct($productCode)
    {
		$pathToFile = $this->uploadAndResizeFile();
		$this->createThumbnail($pathToFile);

		//set validation rules
		$this->form_validation->set_rules('productCode', 'Product Code', 'required');
		$this->form_validation->set_rules('productName', 'Product Name', 'required');
		$this->form_validation->set_rules('productLine', 'Product Line', 'required');
        $this->form_validation->set_rules('productScale', 'Product Scale', 'required');
        $this->form_validation->set_rules('productVendor', 'Product Vendor', 'required');
        $this->form_validation->set_rules('productDescription', 'Product Description', 'required');
        $this->form_validation->set_rules('quantityInStock', 'Quantity In Stock', 'required');
        $this->form_validation->set_rules('buyPrice', 'Buy Price', 'required');
        $this->form_validation->set_rules('MSRP', 'MSRP', 'required');		
	
		//get values from post
		$productCode = $this->input->post('productCode');
		$aProduct['productName'] = $this->input->post('productName');
		$aProduct['productLine'] = $this->input->post('productLine');
		$aProduct['productScale'] = $this->input->post('productScale');
		$aProduct['productVendor'] = $this->input->post('productVendor');
		$aProduct['productDescription'] = $this->input->post('productDescription');
		$aProduct['quantityInStock'] = $this->input->post('quantityInStock');
		$aProduct['buyPrice'] = $this->input->post('buyPrice');
		$aProduct['MSRP'] = $this->input->post('MSRP');
		//$aProduct['image'] = $_FILES['userfile']['name'];


		//check if the form has passed validation
		if (!$this->form_validation->run()){
			//validation has failed, load the form again
			$this->load->view('admin', $aProduct);
			return;
		}

		
		//check if update is successful
		if ($this->MiniThingsModel->updateProductModel($aProduct, $productCode)) {
			redirect('AccountController/adminProfile');
		}
		else {
			$data['message']="Uh oh ... problem on update";
		}
    }
	
	public function product_details($product){
		
	$data['view_product']= $this->MiniThingsModel->product_details_drilldown($product);
	$this->load->view('product_details', $data);
	}
	

	public function handleAdd(){
		if ($this->input->post('submitInsert')){
		
			$pathToFile = $this->uploadAndResizeFile();
			$this->createThumbnail($pathToFile);
		
			//set validation rules
		$this->form_validation->set_rules('productCode', 'Product Code', 'required');
		$this->form_validation->set_rules('productName', 'Product Name', 'required');
		$this->form_validation->set_rules('productLine', 'Product Line', 'required');
        $this->form_validation->set_rules('productScale', 'Product Scale', 'required');
        $this->form_validation->set_rules('productVendor', 'Product Vendor', 'required');
        $this->form_validation->set_rules('productDescription', 'Product Description', 'required');
        $this->form_validation->set_rules('quantityInStock', 'Quantity In Stock', 'required');
        $this->form_validation->set_rules('buyPrice', 'Buy Price', 'required');
        $this->form_validation->set_rules('MSRP', 'MSRP', 'required');		
	
		//get values from post
		$productCode = $this->input->post('productCode');
		$aProduct['productName'] = $this->input->post('productName');
		$aProduct['productLine'] = $this->input->post('productLine');
		$aProduct['productScale'] = $this->input->post('productScale');
		$aProduct['productVendor'] = $this->input->post('productVendor');
		$aProduct['productDescription'] = $this->input->post('productDescription');
		$aProduct['quantityInStock'] = $this->input->post('quantityInStock');
		$aProduct['buyPrice'] = $this->input->post('buyPrice');
		$aProduct['MSRP'] = $this->input->post('MSRP');
		$aProduct['image'] = $_FILES['userfile']['name'];
					
		//print_r($aProduct);
		//die();
			//check if the form has passed validation
			if (!$this->form_validation->run()){
				//validation has failed, load the form again
				$this->load->view('addProductView_form', $aProduct);
				return;
			}

			//check if insert is successful
			if ($this->MiniThingsModel->addProductModel($aProduct)) {
				$data['message']="The insert has been successful";
			}
			else {
				$data['message']="Uh oh ... problem on insert";
			}
			
			//load the view to display the message
			$this->load->view('displayMessageView', $data);
			
			return;
		}
		$aProduct['productCode'] = "";
		$aProduct['productName'] = "";
		$aProduct['productLine'] = "";
		$aProduct['productScale'] = "";
		$aProduct['productVendor'] = "";
		$aProduct['productDescription'] = "";
		$aProduct['quantityInStock'] = "";
		$aProduct['buyPrice'] = "";
		$aProduct['MSRP'] = "";
		$aProduct['image'] = "";

		//load the form
		$this->load->view('addProductView_form', $aProduct);
	}
	
	function uploadAndResizeFile()
	{	//set config options for thumbnail creation
		$config['upload_path']='./assets/images/full/';
		$config['allowed_types']='gif|jpg|png|jpeg';
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