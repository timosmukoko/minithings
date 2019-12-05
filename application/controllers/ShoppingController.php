<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ShoppingController extends CI_Controller {

public function __construct()
{
parent::__construct();
//Load Library and model.
$this->load->library('cart');
$this->load->model('MiniThingsModel');
}

public function shopping_view()
{
	$data['products'] = $this->MiniThingsModel->get_all();
	//send all product data to "shopping_view", which fetch from database.
	$this->load->view('shopping_view', $data);
}

function add()
{
// Set array for send data.
$insert_data = array(
'productCode' => $this->input->post('productCode'),
'productName' => $this->input->post('productName'),
'buyPrice' => $this->input->post('buyPrice'),
'qty' => 1
);

// This function add items into cart.
$this->cart->insert($insert_data);

// This will show insert data in cart.
//redirect('shopping');
$this->load->view('shopping_view');
}

function remove($rowid) {
// Check rowid value.
if ($rowid==="all"){
// Destroy data which store in session.
$this->cart->destroy();
}else{
// Destroy selected rowid in session.
$data = array(
'rowid' => $rowid,
'qty' => 0
);
// Update cart data, after cancel.
$this->cart->update($data);
}

// This will show cancel data in cart.
redirect('shopping');
}

function update_cart(){

// Recieve post values,calcute them and update
$cart_info = $_POST['cart'] ;
foreach( $cart_info as $id => $cart)
{
$rowid = $cart['rowid'];
$price = $cart['price'];
$amount = $price * $cart['qty'];
$qty = $cart['qty'];

$data = array(
'rowid' => $rowid,
'price' => $price,
'amount' => $amount,
'qty' => $qty
);

$this->cart->update($data);
}
redirect('shopping');
}

function billing_view(){
// Load "billing_view".
$this->load->view('billing_view');
}

public function save_order()
{
// This will store all values which inserted from user.
$customer = array(
'name' => $this->input->post('name'),
'email' => $this->input->post('email'),
'address' => $this->input->post('address'),
'phone' => $this->input->post('phone')
);
// And store user information in database.
$cust_id = $this->MiniThingsModel->insert_customer($customer);

$order = array(
'date' => date('Y-m-d'),
'customerid' => $cust_id
);

$ord_id = $this->MiniThingsModel->insert_order($order);

if ($cart = $this->cart->contents()):
foreach ($cart as $item):
$order_detail = array(
'orderid' => $ord_id,
'productid' => $item['id'],
'quantity' => $item['qty'],
'price' => $item['price']
);

// Insert product imformation with order detail, store in cart also store in database.

$cust_id = $this->MiniThingsModel->insert_order_detail($order_detail);
endforeach;
endif;

// After storing all imformation in database load "billing_success".
$this->load->view('billing_success');
}


public function cart()
{
	 $action = $this->input->post('action');
        if($action == 'add'){
            $pid    = $this->input->post('p_id');
            $qty    = $this->input->post('quantity');
            
            $product = $this->MiniThingsModel->product_details_drilldown($pid);
            $pdata = array(
                'id'      => $product['productCode'],
                'qty'     => $qty,
                'price'   => $product['buyPrice'],
                'name'    => $product['productName'],
                //"image"   =>$product['product_image'],
            );
        
            $this->cart->insert($pdata);
			$this->load->view('shopping_view');
        }
        
        if($action == 'delete' ){
            $rowid = $this->input->post('rowid');
            $pdata = array(
            'rowid' => $rowid,
            'qty'   => 0,
            );
            $this->cart->update($pdata);
        }
        
        if($action == 'empty' ){
            $this->cart->destroy();
        }
		
		
}
}
?>
