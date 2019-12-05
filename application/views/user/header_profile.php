<?php 
	$this->load->helper('url'); 
	$cssbase = base_url()."assets/css/";
	$jsbase = base_url()."assets/js/";
	$img_base = base_url()."assets/images/";
	$base = base_url() . index_page();
	
	$userLastName=$this->session->userdata('contactLastName');
?>

<!DOCTYPE>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
<title>Mini Things</title>
<link href="<?php echo $cssbase . "style.css"?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $cssbase . "style1.css"?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $cssbase . "bootstrap.min.css"?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $cssbase . "font-awesome.min.css"?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $cssbase . "main.css"?>" rel="stylesheet" type="text/css" media="all" />
<link href="<?php echo $cssbase . "responsive.css"?>" rel="stylesheet" type="text/css" media="all" />
<script src="<?php echo $jsbase."common.js"?>"></script>
<script src="<?php echo $jsbase."jquery.js"?>"></script>
<script src="<?php echo $jsbase."bootstrap.min.js"?>"></script>	
<script src="<?php echo $jsbase."main.js"?>"></script>	
<script src="<?php echo $jsbase."script.js"?>"></script>
</head>

<body>
<header id="header"><!--header-->
		<div class="header_top" style="background-color: black; color:white;"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i>(061) 000 000</a></li>
								<li><a href="#"></i> k00203438@Student.lit.ie</a></li>
							</ul>
						</div>
					</div>
					<div class ="col-sm-6">	
						
                           <ul class="nav navbar-nav collapse navbar-collapse">
								<li class="dropdown"><a href="#">Hello <?= $userLastName; ?><i class="fa fa-angle-down"></i></a>
								 <ul role="menu" class="sub-menu">
								 <table>
								 <tr>
								 <td><?= anchor('LoginController/user_profile', 'Profile', 'title="Profile"'); ?></td>
								 </tr>
								 <tr>
								 <td><a href=" <?= site_url('LoginController/logout') ?> ">Logout</a></td>
								 </tr>
								 </table>
								 </ul>
						   </ul>						
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">							
								<li><a href="https://www.facebook.com/Mini-Things-121109778436650/ " target="_blank"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						
					</div>
				</div>
			</div>
		</div><!--/header_top-->

	</header><!--/header-->
    
	<style>
	table {
	background-color:#FFFFFF;
    border-collapse: collapse;
    width: 100%;
}
th {
    background-color: #FF8C00;
    color: white;
}

th, td {
    text-align: left;
    padding: 8px;
}
	td {
    border-bottom: 1px solid #ddd;
	padding: 15px;
    text-align: left
}
	tr:hover {background-color: #f5f5f5;}
	</style>
