<?php 
	$this->load->helper('url'); 
	$cssbase = base_url()."assets/css/";
	$jsbase = base_url()."assets/js/";
	$img_base = base_url()."assets/images/";
	
	$adminUserName=$this->session->userdata('userName');
 
?> 
 
<div class="col-sm-3">
					<div class="left-sidebar">
					    <h2>Account</h2>
						<div class="list-group">						 
						Hello <?= $adminUserName; ?>
						</div>
						<h2>Dashboard</h2>				 
    	                   <div class="list-group">
                               <a href="<?= site_url('AccountController/adminProfile')?> " class="list-group-item">Products 
							   <span class="products-admin-badge pull-right text-info"><?php echo $this->db->count_all('products');?></span></a>   
                               <a href="<?= site_url('MinithingsController/adminOrderView')?>" class="list-group-item">Orders <span class="order-admin-badge pull-right text-danger"><?php echo $this->db->count_all('orders');?></span></a> 
                               <a href="<?= site_url('MinithingsController/adminProductLineView')?>" class="list-group-item">Product Line <span class="category-admin-badge pull-right text-warning">0</span></a> 
                               <a href="<?= site_url('AccountController/adminCustomerListView')?> " class="list-group-item">Customers List 
							   <span class="products-admin-badge pull-right text-info"><?php echo $this->db->count_all('customers');?></span></a> 
							   <a href="<?= site_url('AccountController/adminContactListView')?> " class="list-group-item">Messages
							   <span class="products-admin-badge pull-right text-info"><?php echo $this->db->count_all('contacts');?></span></a> 
                            </div>
                              <div class="list-group">
					   <table>
						<td><a href=" <?= site_url('LoginController/logout') ?> " class="list-group-item active">Logout</a></td>
						</table>                                     
                            </div>
                        </div>
                        </div>
						