
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
	    				<h2 class="title text-center">SIGN UP</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
						
						
				    	<form>	
						<?php
						echo "<div class='error_msg'>";
						echo validation_errors();
						echo "</div>";
						echo form_open_multipart('MiniThingsController/handle_customer_registration');
							echo '</br></br>';
							echo'<div class="form-group col-md-12">';
							echo form_label('Customer Name : '); echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
							echo form_input('CustomerName');
				            echo'</div>';
								
							echo'<div class="form-group col-md-6">';
							echo form_label('Contact Last Name : '); echo "&nbsp";
				            echo form_input('ContactLastName');
				            echo'</div>'; 
							
				            echo'<div class="form-group col-md-6">';
							echo form_label('Contact First Name : ');
				            echo form_input('ContactFirstName');
				            echo'</div>';
							
				            echo'<div class="form-group col-md-12">';
							echo form_label('Phone : ');
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
				            echo form_input('Phone');
				            echo'</div>';
							
							echo'<div class="form-group col-md-6">';
							echo form_label('Address Line1 : ');
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
							echo form_input('AddressLine1');
				            echo'</div>'; 

							echo'<div class="form-group col-md-6">';
							echo form_label('Address Line2 : '); 
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
				            echo form_input('AddressLine2');
				            echo'</div>'; 
							
							echo'<div class="form-group col-md-12">';
							echo form_label('City : '); echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
				            echo form_input('City');
				            echo'</div>'; 
							
							echo'<div class="form-group col-md-12">';
							echo form_label('State : ');
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
				            echo form_input('State');
				            echo'</div>'; 
							
							echo'<div class="form-group col-md-12">';
							echo form_label('Postal Code : '); 
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
				            echo form_input('PostalCode');
				            echo'</div>'; 
							
							echo'<div class="form-group col-md-12">';
							echo form_label('Country : '); 
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
				            echo form_input('Country');
				            echo'</div>'; 
							
							echo'<div class="form-group col-md-12">';
							echo form_label('Credit Limit : ');
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
				            echo form_input('CreditLimit');
				            echo'</div>'; 
							
							echo "<div class='error_msg'>";
							if (isset($message)) {
							echo $message;
							}
							echo "</div>";
							
							echo'<div class="form-group col-md-6">';
							echo form_label('Email : ');
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";							
							echo"<br/>";
							$data = array(
							'type' => 'email',
							'name' => 'Email'
							);
							echo form_input($data);
				            echo'</div>'; 
							
							echo'<div class="form-group col-md-6">';
							echo form_label('Password : ');
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
				            echo form_password('Password');
				            echo'</div>'; 
							
							echo'<div class="form-group col-md-12">';							
							echo form_submit('submit', 'Sign Up');
							echo'</div>'; 
							echo '</br>';
							
							echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
							
							echo '</br>';
							echo form_close();
							//echo validation_errors();												
						?>													
						</form>
						 <div class="containerForm" style="background-color:#f1f1f1">
						 <p>Already have an account ? <?= anchor('MiniThingsController/user_login', 'Login', 'title="Login"'); ?></p>
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
	</style>
	
<?php
echo '</br></br>';
	$this->load->view('home/footer'); 
?>
