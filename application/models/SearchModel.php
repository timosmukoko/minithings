<?php
class SearchModel extends CI_Model
{
    function __construct()
    {	parent::__construct();
		//$this->load->database();
    }
	
	function search($keyword)
    {
        $this->db->like('productName',$keyword);
        $query = $this->db->get('products');
        return $query->result();
    }
}
?>
