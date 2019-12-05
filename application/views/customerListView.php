
<?php
	$this->load->view('admin/header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
    <section>
		<div class="container">
			<div class="row">
				<?php $this->load->view('admin/sidebar'); ?>

                    
    <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">All Customers</h2>
                                
          					
			
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							<tr>
								<th  style="border-left: 1px solid #C1DAD7"> Cust Num </th>
								<th> Cust Name </th>
								<th> Last Name </th>
								<th> FirstName </th>
								<th> Phone </th>
								<th> Email </th>
                                <th> Action </th>
							</tr>
						</thead>
						<tbody>
						<?php
						$data = $this->MiniThingsModel->adminGetCustomerModel();
							foreach($data as $row)
								{?>
									<tr class="record">
									<td style="border-left: 1px solid #C1DAD7;"><?php echo $row->customerNumber; ?></td>
									<td><div align="right"><?php echo $row->customerName; ?></div></td>
									<td><div align="right"><?php echo $row->contactLastName; ?></div></td>
									<td><div align="right"><?php echo $row->contactFirstName; ?></div></td>
									<td><div align="right"><?php echo $row->phone; ?></div></td>
									<td><div align="right"><?php echo $row->email; ?></div></td>
									<td><div align="center"><a href="<?= site_url('AccountController/adminDeleteCustomer/'.$row->customerNumber) ?> " class="delbutton" title="Click To Delete"><i class="fa fa-times-circle fa-lg text-danger"></i></a></div></td>								
									</tr>
								<?php }?> 

						</tbody>
					</table>
              </section>
			  <br>
			  <br>
<?php
	$this->load->view('admin/footer'); 
?>