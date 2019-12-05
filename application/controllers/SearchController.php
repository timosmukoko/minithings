<?php 

class SearchController extends CI_Controller {

 function __construct() {
   parent::__construct();
   $this->load->model('MiniThingsModel');
   $this->load->library('session');
   $this->load->helper('url');
   $this->load->library('form_validation');
 }//end constructor

  function search_keyword()
    {
        $keyword = $this->input->post('keyword');
		
        if($data['results'] = $this->MiniThingsModel->search($keyword))
		{
			$this->load->view('product_search',$data);
		}
		else if($data['resultLine'] = $this->MiniThingsModel->searchLine(urldecode($keyword)))
		{
			$this->load->view('productLine_search',$data);
		}
		else
		{
			$data['message'] = " The item that you are looking for does not exist !";
		$this->load->view('displayMessageView',$data);
        }
    }
}//end class

?>