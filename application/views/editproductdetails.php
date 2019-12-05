<?php
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<br>
	<?php
	foreach ($edit_data as $row)
	{
		echo form_open_multipart('MiniThingsController/updateProduct/'.$row->productCode);
	?>
	<br><?php echo'<img src='. $img_base.'thumbs/'.$row->image.'>'; ?><br>
	Product Code:<br><?php echo form_input('productCode', $row->productCode, 'readonly');?><br>
	Product Name:<br><?php echo form_input('productName', $row->productName); ?><br>
	Product Line:<br><?php echo form_input('productLine', $row->productLine); ?><br>
	Product Scale:<br><?php echo form_input('productScale', $row->productScale); ?><br>
	Product Vendor:<br><?php echo form_input('productVendor', $row->productVendor); ?><br>
	Product Description:<br><?php echo form_input('productDescription', $row->productDescription); ?><br>
	Quantity In Stock:<br><?php echo form_input('quantityInStock', $row->quantityInStock); ?><br>
	Product Price:<br><?php echo form_input('buyPrice', $row->buyPrice); ?><br>
	MSRP:<br><?php echo form_input('MSRP', $row->MSRP); ?><br>
	
	Select File for Upload:<br><?php echo form_upload('userfile');?><br>       
    <br>
	<?php echo form_submit('submitUpdate', "Update");?>
	<?php }?>
