<?php
//$user_id=$this->session->userdata('userID');
$this->load->view('user/header_profile'); 
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/"; 

//if(!$user_id){
 
 // redirect('LoginConroller');
//}
 
 ?>
    <section>
		<div class="container">
			<div class="row">
				<?php $this->load->view('user/sidebar'); ?>
				  <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
					<br>
						<h2 class="title text-center">History</h2>
							
												   
						   <?php 
	foreach ($edit_data as $row) 
	{ 
		echo form_open_multipart('AccountController/updateCustomer/'.$row->customerNumber);
		echo '</br></br>';
		
		echo form_label('Customer Number : ');
		echo form_input('customerID', $row->customerNumber, 'readonly');
		
		echo form_label('Customer Name : ');
		echo form_input('customerName', $row->customerName);

		echo form_label('Contact Last Name : ');
		echo form_input('contactLastName', $row->contactLastName);

		echo form_label('Contact First Name : ');
		echo form_input('contactFirstName', $row->contactFirstName);

		echo form_label('Phone : ');
		echo form_input('phone', $row->phone);
		
		echo form_label('Address Line1 : ');
		echo form_input('addressLine1', $row->addressLine1);
		
		echo form_label('Address Line2 : ');
		echo form_input('addressLine2', $row->addressLine2);
		
		echo form_label('City : ');
		echo form_input('city', $row->city);
		
		echo form_label('State : ');
		echo form_input('state', $row->state);
		
		echo form_label('Postal Code : ');
		echo form_input('postalCode', $row->postalCode);
		
		echo form_label('Country : ');
		echo form_input('country', $row->country);
		
		echo form_label('Credit Limit : ');
		echo form_input('creditLimit', $row->creditLimit);
		
		echo form_label('Email : ');
		echo form_input('email', $row->email);
		
		echo form_label('Password : ');
		echo form_password('password', $row->password);
		
	
		//echo '</br></br>Select File for Upload :';
		//echo form_upload('userfile');

		echo '</br></br>';
		echo form_submit('submitUpdate', "Update");
		
		echo form_close();
		echo validation_errors();
	}
?>
	<table>					   
	 <tr>
	  <td><?php echo anchor('AccountController/deleteCustomer/'.$this->session->userdata('customerNumber'), 
				'Delete my Account', 'onclick = "return checkDelete()"'); ?> </td>
		</tr>					   
     </table>   
    <br><br>	 
					</div>
				</div>
			</div>
		</div>
</div>
    </section>
	
	<style>
		form {
		border: 3px solid #f1f1f1;
		align: "center";
		
		-webkit-box-shadow: 0px 0px 15px;
		box-shadow: 0px 0px 15px;
		margin-left: auto;
		margin-right: auto;
	}
		.containerForm {
		padding: 16px;
	}
		.imgcontainer {
		text-align: center;
		margin: 24px 0 12px 0;
	}
	
	
	#main{
width:960px;
margin:50px auto;
font-family:raleway;
}

span{
color:red;
}

.headerTitle{
background-color: #FEFFED;
text-align:center;
border-radius: 10px 10px 0 0;
margin: -10px -40px;
padding: 30px;
}

#login{

width:730px;
float: left;
border-radius: 10px;
font-family:raleway;
border: 2px solid #ccc;
padding: 10px 40px 25px;
margin-top: 70px;
}

input[type=text],input[type=password], input[type=email]{
width:70%;
padding: 10px;
margin-top: 8px;
border: 1px solid #ccc;
padding-left: 5px;
font-size: 14px;
font-family:raleway;
float: left;
}

label{
  float: left;
  width: 25%;
  margin-top: 20px;
  margin-left: 20px;
}

input[type=submit]{
width: 200px;
background-color:#FFBC00;
color: white;
border: 2px solid #FFCB00;
padding: 10px;
font-size:20px;
cursor:pointer;
border-radius: 5px;
margin-bottom: 15px;
margin-top: 15px;
margin-left:410px;
}

#profile{
padding:50px;
border:1px dashed grey;
font-size:20px;
background-color:#DCE6F7;
}

#logout{
float:right;
padding:5px;
border:dashed 1px gray;
margin-top: -168px;
}

a{
text-decoration:none;
color: cornflowerblue;
}

i{
color: cornflowerblue;
}

.error_msg{
color:red;
font-size: 16px;
}

.message{
position: absolute;
font-weight: bold;
font-size: 28px;
color: #6495ED;
left: 262px;
width: 500px;
text-align: center;
}

	
	</style>
	
	
<?php
	$this->load->view('user/footer'); 
?>


 