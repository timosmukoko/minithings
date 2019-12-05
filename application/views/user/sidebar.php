<?php 
	$this->load->helper('url'); 
	$cssbase = base_url()."assets/css/";
	$jsbase = base_url()."assets/js/";
	$img_base = base_url()."assets/images/";
?> 

<?php
$user_id=$this->session->userdata('customerNumber');
 
if(!$user_id){
 
  redirect('LoginController');
}
 
 ?>
 
 <section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
                        <div class="list-group">
					   <table>
						<td><a href=" <?= site_url('LoginController/user_home_view') ?> " class="list-group-item active">Back Home</a></td>
					   </table>                                     
                        </div>
						<h2>Dashboard</h2>				 
    	                   <div class="list-group">
						   
						   
	
						   
      <table >
        <tr>
          <th colspan="2"><h4 class="text-center">User Info</h3></th>
        </tr>
          <tr>
            <td>Name</td>
            <td><?php echo $this->session->userdata('customerName'); ?></td>
          </tr>
          <tr>
            <td>First Name</td>
            <td><?php echo $this->session->userdata('contactFirstName');  ?></td>
          </tr>
          <tr>
            <td>Last Name</td>
            <td><?php echo $this->session->userdata('contactLastName');  ?></td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><?php echo $this->session->userdata('phone');  ?></td>
          </tr>
		  <tr>
            <td>Email</td>
            <td><?php echo $this->session->userdata('email');  ?></td>
          </tr>
      </table>  
	  <div class="list-group">
	  <table>
	  <tr>
	  <td><?php echo anchor('AccountController/editCustomer/'.$this->session->userdata('customerNumber'), 'Manage Account'); ?> </td>
	  </tr>
	 
	  </table>                                     
      </div>
                     <div class="list-group">
					   <table>
						<td><a href=" <?= site_url('LoginController/logout') ?> " class="list-group-item active">Logout</a></td>
						</table>                                     
                     </div>
                        </div>
                        </div>
						</div>
						
	<style>
	td {
    border-bottom: 1px solid #ddd;
	padding: 15px;
    text-align: left
}
	tr:hover {background-color: #f5f5f5;}
	</style>
						