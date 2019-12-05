
<?php
	$this->load->view('admin/header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
    <section>
		<div class="container">
			<div class="row">
			<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>PRODUCT LINE</h2>
                        <div class="list-group">

	<table class="line">
				<?php
		$data = $this->MiniThingsModel->getProductLineTitleModel();
		foreach($data as $row){?>
		<tr>		
		<td><a href="<?= site_url('MiniThingsController/adminListProductLine/'.$row->productLine)?>"><?php echo $row->productLine;?></a></td>
		</tr> 		
		<?php }?>	
		</table> 		
                      </div> 
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
						<h2 class="title text-center">All Products</h2>
                                
          					<label for="filter">Filter</label> <input type="text" name="filter" value="" id="filter" />
					<a href="<?= site_url('MiniThingsController/handleAdd/') ?>" rel="facebox">Add Product</a>
			
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							<tr>
								<th  style="border-left: 1px solid #C1DAD7"> Code </th>
								<th> Image </th>
								<th> Product </th>
								<th> Desciption </th>
								<th> Price </th>
								<th> Line </th>
                                <th> Action </th>
							</tr>
						</thead>
						<tbody>
						<?php
						//$data = $this->MiniThingsModel->adminGetProductModel();
							foreach($admin_product_line_info as $row)
								{?>
									<tr class="record">
									<td style="border-left: 1px solid #C1DAD7;"><?php echo $row->productCode; ?></td>
									<td><div align="right"><img src="<?php echo $img_base.'thumbs/'.$row->image;?>"></div></td>
									<td><div align="right"><?php echo $row->productName; ?></div></td>
									<td><div align="right"><?php echo $row->productDescription; ?></div></td>
									<td><div align="right"><?php echo $row->buyPrice; ?></div></td>
									<td><div align="right"><?php echo $row->productLine; ?></div></td>
									<td><div align="center"><a href="<?= site_url('MiniThingsController/editProduct/'.$row->productCode) ?> " rel="facebox"><i class="fa fa-edit fa-lg text-success"></i></a> 
									<a href="<?= site_url('MiniThingsController/deleteProduct/'.$row->productCode) ?> " class="delbutton" title="Click To Delete"><i class="fa fa-times-circle fa-lg text-danger"></i></a></div></td>
									
									</tr>
								<?php }?> 

						</tbody>
					</table>
              </section>
			  <br>
			  <br>
			  
			  <style>
	.line td {
    border-bottom: 1px solid #ddd;
	padding: 15px;
    text-align: left;
}
	tr:hover {background-color: #f5f5f5;}
	</style>
<?php
	$this->load->view('admin/footer'); 
?>