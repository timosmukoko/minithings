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
                        
                        
                        
                        <div class="col-sm-12">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">ORDER INFORMATION</h3>
                                
                            </div>
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
									<?php foreach($cust_orders as $row) {?>
                                        <td class="text-right"><strong>Customer Number :</strong></td>
                                        <td class="text-info"><strong><?php echo $row->customerNumber;?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>CustomerName :</strong></td>
                                        <td class="text-info"><strong><?php echo $row->customerName;?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>contact Name :</strong></td>
                                        <td class="text-info"><strong><?php echo $row->contactLastName;?></strong></td>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Phone:</strong></td>
                                        <td class="text-info"><strong><?php echo $row->phone;?></strong></td>
                                    </tr>
                                    <tr>
									
									<?php $data = $this->MiniThingsModel->adminGetOrders();
											foreach($data as $my_row){ ?>
                                        <td class="text-right"><strong>Date Ordered :</strong></td>
                                        <td class="text-info"><strong><?php echo $my_row->orderDate;?></strong></td>
									<?php } ?>
                                    </tr>
                                    <tr>
                                        <td class="text-right"><strong>Amount :</strong></td>
                                        <td class="text-danger"><strong></strong></td>
                                    </tr>
                                    <tr>
									<?php
										$data = $this->MiniThingsModel->adminGetProductModel();
											foreach($data as $row_m)
									{?>
                                        <td class="text-right"><strong>Item(s) :</strong></td>
                                        <td class="text-primary"><strong><?php echo $row_m->productName;?></strong></td>
										<?php } ?>
										 <?php } ?>
                                    </tr>
                                    <tr>
                                    
                                   
                                        
                                    </tr>
                                </table>
                            </div>
                            </div>
              </section>


<?php
	$this->load->view('admin/footer'); 
?>