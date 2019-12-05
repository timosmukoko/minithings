<?php
class MiniThingsModel extends CI_Model
{
    function __construct()
    {	parent::__construct();
		//$this->load->database();
    }
	
	function get_all_productModel()
	{
		$this->db->select("*");
		$this->db->from('products');
		$this->db->order_by('buyPrice','asc');
		$query = $this->db->get();
		return $query->result();
	}

	function productLine_drilldown($product)
	{
		$this->db->select("*"); 
		$this->db->from('products');
		$this->db->where('productLine',$product);
		$this->db->order_by('buyPrice','asc');		
		$query = $this->db->get();
		return $query->result();
	}
	
	public function getProductLineTitleModel()
	{
		$this->db->select("*"); 
		$this->db->from('products');
		$this->db->order_by('productLine','asc');
		$this->db->group_by('productLine');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function adminGetProductModel()
	{
		$this->db->select("*"); 
		$this->db->from('products');
		$this->db->order_by('productCode','asc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function adminGetOrders()
	{
		$this->db->select("*"); 
		$this->db->from('orders');
		$this->db->order_by('orderDate','desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function adminGetCustomerModel()
	{
		$this->db->select("*"); 
		$this->db->from('customers');
		$this->db->order_by('customerNumber','asc');
		$query = $this->db->get();
		return $query->result();
	}
	
	public function adminGetContactModel()
	{
		$this->db->select("*"); 
		$this->db->from('contacts');
		$this->db->order_by('contactID','asc');
		$query = $this->db->get();
		return $query->result();
	}
	
	// Insert registration data in database
	public function registration_insertModel($data) {

	// Query to check whether username/email already exist or not
	$condition = "email =" . "'" . $data['email'] . "'";
	$this->db->select('*');
	$this->db->from('customers');
	$this->db->where($condition);
	$this->db->limit(1);
	$query = $this->db->get();
	if ($query->num_rows() == 0) {

	// Query to insert data in database
	$this->db->insert('customers', $data);
	if ($this->db->affected_rows() > 0) {
	return true;
	}
	} else {
		return false;
	}
	}
	
	
	//Contact 
	public function contact_insertModel($data) {
	//$this->db->select('*');
	//$this->db->from('contacts');
	//$this->db->limit(1);
	//$query = $this->db->get();
	//if ($query->num_rows() == 0) {

	// Query to insert data in database
	$this->db->insert('contacts', $data);
	//if ($this->db->affected_rows() > 0) {
	//return true;
	//}
	//} else {
		//return false;
	//}
	}

//function to retrieve a record based on an ID
	function getAuthorByID() {
        
        $id = $this->input->post('authorID');
        
        $resultSet = $this->db->get_where('authors', array('authorID' => $id));
        
        if ($resultSet->num_rows() > 0 ) {
            
            $row = $resultSet->row_array();
            return $row;
        }
        
        else {
            return null;
            
        }
    
    }
	
	
	
	//------------ Admin login Model -------------------
	
	public function login_adminModel($email,$pass){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('password',$pass);

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }
}

	//------------ Others users login Model -------------------
	public function login_userModel($email,$pass){

  $this->db->select('*');
  $this->db->from('customers');
  $this->db->where('email',$email);
  $this->db->where('password',$pass);

  if($query=$this->db->get())
  {
      return $query->row_array();
  }
  else{
    return false;
  }
}
	
	//--------------------
	
	//function to check if we have a valid user
	function login_Model($username, $password) {
		$this -> db -> select('userID, email, password');
		$this -> db -> from('users');
		$this -> db -> where('email', $username);
		$this -> db -> where('password', md5($password));
		$this -> db -> limit(1);
 
		$query = $this -> db -> get();
 
		if($query -> num_rows() == 1) 
			return $query->result_array();
	   else
			return false;
  
	}	

	// Products ------------------
	function addProductModel($product)
	{	
		$this->db->insert('products',$product);
		if ($this->db->affected_rows() ==1) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function updateProductModel($product,$id)
	{	
		$this->db->where('productCode', $id);
		return $this->db->update('products', $product);
	}
	
	public function deleteProductModel($id)
	{	$this->db->where('productCode', $id);
		return $this->db->delete('products');
    }
	
	
	function get_search($searchProduct) 
	{
		$select_query = "Select * from products where productName like '%$searchProduct%' ";
		$query = $this->db->query($select_query);
		return $query->result();
	}

	// -----------------------------------------
	
	
	// Search product ---------------------------
	
	function search($keyword)
    {
        $this->db->like('productName',$keyword);
        $query = $this->db->get('products');
        return $query->result();
    }
	
	function searchLine($keyword)
	{
		$this->db->like('productLine',$keyword);
        $query = $this->db->get('products');
        return $query->result();
	}
	
	// Customer --------------------------------
	function updateCustomerModel($customer,$id)
	{	
		$this->db->where('customerNumber', $id);
		return $this->db->update('customers', $customer);
	}

	public function deleteCustomerModel($id)
	{	
		$this->db->where('customerNumber', $id);
		return $this->db->delete('customers');
    }
	
	public function deleteContactModel($id)
	{	
		$this->db->where('contactID', $id);
		return $this->db->delete('contacts');
    }

	public function customer_drilldown($customer)
	{	
		$this->db->select("*"); 
		$this->db->from('customers');
		$this->db->where('customerNumber',$customer);
		$query = $this->db->get();
		return $query->result();
    }	
	
	
	//----------------------------------
	
	public function product_details_drilldown($product)
	{	$this->db->select("*"); 
		$this->db->from('products');
		$this->db->where('productCode',$product);
		$query = $this->db->get();
		return $query->result();
    }
	
	
	// Shopping---------------------------------------------------------------------------------
	
	// Get all details ehich store in "products" table in database.
public function get_all()
{
$query = $this->db->get('products');
return $query->result_array();
}

// Insert customer details in "customer" table in database.
public function insert_customer($data)
{
$this->db->insert('customers', $data);
$id = $this->db->insert_id();
return (isset($id)) ? $id : FALSE;
}

// Insert order date with customer id in "orders" table in database.
public function insert_order($data)
{
$this->db->insert('orders', $data);
$id = $this->db->insert_id();
return (isset($id)) ? $id : FALSE;
}

// Insert ordered product detail in "order_detail" table in database.
public function insert_order_detail($data)
{
$this->db->insert('orderdetails', $data);
}

//-----------------------------------------------------------------
	//function __destruct() {
       // $this->db->close();
   // }
}
?>
