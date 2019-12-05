
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
						$data = $this->MiniThingsModel->adminGetProductModel();
							foreach($data as $row)
								{?>
									<tr class="record">
									<td style="border-left: 1px solid #C1DAD7;"><?php echo $row->productCode; ?></td>
									<td><a href="<?= site_url('MiniThingsController/imgPop/'.$row->productCode) ?>" rel="facebox"><img src="<?php echo $img_base.'thumbs/'.$row->image;?>"></a></a></td>
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
<?php
	$this->load->view('admin/footer'); 
?>