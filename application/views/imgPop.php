<?php
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<br>
	<?php
	foreach ($edit_data as $row)
	{
		echo form_open_multipart('MiniThingsController/imgPop/'.$row->productCode);
	?>
	<br><?php echo'<img src='. $img_base.'full/'.$row->image.'>'; ?><br>
	
	Select File for Upload:<br><?php echo form_upload('userfile');?><br>       
    <br>
	<?php echo form_submit('submitUpdate', "Update");?>
	<?php }?>
