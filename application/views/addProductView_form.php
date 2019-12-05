<?php
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<br>
<?php
echo "<div class='error_msg'>";
echo validation_errors();
echo "</div>";
echo form_open('MiniThingsController/handleAdd');
echo"<br/>";
echo form_label('Product Code : ');
echo form_input('productCode', $productCode);
echo"<br/>";
echo form_label('Product Name : ');
echo"<br/>";
echo form_input('productName', $productName);
echo"<br/>";
echo form_label('Product Line : ');
echo"<br/>";
echo form_input('productLine', $productLine);
echo"<br/>";
echo form_label('Product Scale : ');
echo"<br/>";
echo form_input('productScale', $productScale);
echo"<br/>";
echo form_label('Product Vendor : ');
echo"<br/>";
echo form_input('productVendor', $productVendor);
echo"<br/>";
echo form_label('Product Description : ');
echo"<br/>";
echo form_input('productDescription', $productDescription);
echo"<br/>";
echo form_label('Quantity In Stock : ');
echo"<br/>";
echo form_input('quantityInStock', $quantityInStock);
echo"<br/>";
echo form_label('Buy Price : ');
echo"<br/>";
echo form_input('buyPrice', $buyPrice);
echo"<br/>";
echo form_label('MSRP : ');
echo"<br/>";
echo form_input('MSRP', $MSRP);
echo"<br/>";
echo "</div>";
echo '</br></br>Select File for Upload :';
echo"<br/>";
echo form_upload('userfile');
echo"<br/>";
echo form_submit('submitInsert', "Add");
echo form_close();
?>

