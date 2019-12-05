<?php
	$this->load->view('home/header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Customer <strong>Registration</strong></h2>    			    				    									
				</div>			 		
			</div>   				
    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				
	    				<div class="status alert alert-success" style="display: none"></div>

<div id="main">
<div id="login">
<h2 class="headerTitle">Registration Form</h2>
<hr/>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('AccountController/new_user_registration');

echo"<br/>";
echo form_label('Customer Name : ');
echo form_input('CustomerName');

echo"<br/>";
echo form_label('Contact Last Name : ');
echo"<br/>";
echo form_input('ContactLastName');
echo"<br/>";
echo"<br/>";
echo form_label('Contact First Name : ');
echo"<br/>";
echo form_input('ContactFirstName');
echo"<br/>";

echo form_label('Phone : ');
echo"<br/>";
echo form_input('Phone');
echo"<br/>";

echo form_label('Address Line1 : ');
echo"<br/>";
echo form_input('AddressLine1');
echo"<br/>";

echo form_label('Address Line2 : ');
echo"<br/>";
echo form_input('AddressLine2');
echo"<br/>";

echo form_label('City : ');
echo"<br/>";
echo form_input('City');
echo"<br/>";

echo form_label('State : ');
echo"<br/>";
echo form_input('State');
echo"<br/>";

echo form_label('Postal Code : ');
echo"<br/>";
echo form_input('PostalCode');
echo"<br/>";

echo form_label('Country : ');
echo"<br/>";
echo form_input('Country');
echo"<br/>";

echo form_label('Credit Limit : ');
echo"<br/>";
echo form_input('CreditLimit');
echo"<br/>";

echo "<div class='error_msg'>";
if (isset($message)) {
echo $message;
}
echo "</div>";
echo"<br/>";
echo form_label('Email : ');
echo"<br/>";
$data = array(
'type' => 'email',
'name' => 'Email'
);
echo form_input($data);
echo"<br/>";
echo"<br/>";
echo form_label('Password : ');
echo"<br/>";
echo form_password('Password');
echo"<br/>";
echo"<br/>";
echo form_submit('submit', 'Sign Up');
echo form_close();
?>

</div>
</div>

<div class="containerForm" style="background-color:#f1f1f1">
						 <p>Already have an account ? <?= anchor('LoginController/login_user', 'Login', 'title="Login"'); ?></p>
						 </div>
						</div>
	    			</div>
	    		</div>
				
				
				
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Contact Info</h2>
	    				<address>
	    					<p>Mini Things</p>
							<p>Moylish Park. Co. Limerick.</p>
							<p>TEL:(061) 000 000 </p>
							<p>Mobile:(089) 000 000 </p>
							<p>Fax:(061) 000 001</p>
							<p>Email: k00203438@student.lit.ie</p>
	    				</address>
						
						<div>
						<h2 class="title text-center">We are here</h2>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2419.1747168329703!2d-8.649743184464722!3d52.6748826798438!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x485b5cf73465e15d%3A0xb24aac384d416b8c!2sLimerick+Institute+of+Technology!5e0!3m2!1sen!2sie!4v1492773378756" width="330" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						</br>
						</br>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Social Networking</h2>
							<ul>
								<li>
									<a href="https://www.facebook.com/TMS-Online-Shop-121109778436650" target="_blank"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="https://www.youtube.com/channel/UCMreoo5Ry7WoUw1ikBotguA" target="_blank"><i class="fa fa-youtube"></i></a>
								</li>
							</ul>	    				
					  </div>
					  
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
	<!-- Form css -->
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
  margin-left: 15px;
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
echo '</br></br>';
	$this->load->view('home/footer'); 
?>

