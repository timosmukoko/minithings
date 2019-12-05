<?php
	$this->load->view('admin/header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
	
	$adminUserName=$this->session->userdata('userName');
?>
    <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
					    <h2>Account</h2>
						<div class="list-group">						 
						Hello <?= $adminUserName; ?>
						</div>
						<h2>Dashboard</h2>				 
    	                   <div class="list-group">
                              <a href=" <?= site_url('AccountController/adminProfile') ?> " class="list-group-item active">Go to Your Profile</a>  
                            </div>
                              <div class="list-group">
					   <table>
						<td><a href=" <?= site_url('LoginController/logout') ?> " class="list-group-item active">Logout</a></td>
						</table>                                     
                            </div>
                        </div>
                        </div>

                    
    <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Message</h2> 
			
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							
						</thead>
						<tbody>
						<?php echo $message ?>
						</tbody>
					</table>
              </section>
			  <br>
			  <br>
<?php
	$this->load->view('admin/footer'); 
?>


