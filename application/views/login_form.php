<?php
	$this->load->view('home/header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>	

	<?php if(isset($_SESSION)) {
        echo $this->session->flashdata('flash_data');
    } ?>
	
	<section id="form"><!--form-->
		<div class="container">
		    		   			   			
			<h2 class="title text-center"> <strong>Login</strong></h2>    			    				    				
							
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
					
					
					 <?php
              $success_msg= $this->session->flashdata('success_msg');
              $error_msg= $this->session->flashdata('error_msg');
 
                  if($success_msg){
                    ?>
                    <div class="alert alert-success">
                      <?php echo $success_msg; ?>
                    </div>
                  <?php
                  }
                  if($error_msg){
                    ?>
                    <div class="alert alert-danger">
                      <?php echo $error_msg; ?>
                    </div>
                    <?php
                  }
                  ?>
									
					<div id="main">
					<div id="login">
					<img src="<?php echo $img_base . "site/userAvatar.png"?>"/>	
					<h2 class="headerTitle">Login Form</h2>
					<hr/>
<?php 
   
		echo form_open('LoginController/login_user'); 
		
		echo "Username";
		echo form_input('email');
		

		
		echo "<br><br>";
		
		echo "Password";
		echo form_password('password');
		
		echo "<br><br>";
		
		echo form_submit("Login", "Login"); 
	?>

</div>
</div>

</div>						
   
						 <div class="containerForm" >
							<p>Don't have an account? <?= anchor('AccountController/new_user_registration', 'Sign up', 'title="Sign up"'); ?></p>
							<p>Do you want to purchase as a guest?<a href="#"> Yes </a> or <a href="#">No</a>
						</div>
                    
						<br>
						<br>
						<br>
						
					</div><!--/login form-->
				
			</div>
		</div>
	</section><!--/form-->
	
	<!-- Form css -->
	<style>
		form {
		
		border: 3px solid #f1f1f1;
		align: center;
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
width:800px;
margin:25px auto;
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

width:600px;
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
}

input[type=submit]{
width: 100px;
background-color:#FFBC00;
color: white;
border: 2px solid #FFCB00;
padding: 10px;
font-size:20px;
cursor:pointer;
border-radius: 5px;
margin-bottom: 15px;
margin-top: 15px;
margin-left:0px;
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