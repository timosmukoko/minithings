<?php
	$this->load->view('home/header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>

<style>
table {
	background-color:#FFFFFF;
    border-collapse: collapse;
    width: 100%;
}
th {
    background-color: #FF8C00;
    color: white;
}

th, td {
    text-align: left;
    padding: 8px;
}
tr:hover {background-color:#f5f5f5;}

section{background-color: #FDF6F5;
}
</style>

    	<section>
		</br>
		<div class="container">
							
			<h2 class="title text-center">All Products</h2>
	
<!--php starts here-->
<table border="1">
		<tr>
			<th align="left" width="100">Product Code</th>
			<th align="left" width="100">Product Name</th>
			<th align="left" width="100">Product Line</th>
			<th align="left" width="100">Product Scale</th>
			<th align="left" width="100">Product Vendor</th>
			<th align="left" width="100">Product Description</th>
			<th align="left" width="100">Quantity In Stock</th>
			<th align="left" width="100">Buy Price</th>
			<th align="left" width="100">MSRP</th>
			<th align="left" width="100">Image</th>
		</tr>

		<?php foreach($view_all_product as $row){?>
		<tr>
			<td><?php echo $row->productCode;?></td>
			<td><?php echo $row->productName;?></td>
			<td><?php echo $row->productLine;?></td>
			<td><?php echo $row->productScale;?></td>
			<td><?php echo $row->productVendor;?></td>
			<td><?php echo $row->productDescription;?></td>
			<td><?php echo $row->quantityInStock;?></td>
			<td><?php echo $row->buyPrice;?></td>
			<td><?php echo $row->MSRP;?></td>
			<td><a href="<?= site_url('MiniThingsController/product_details/'.$row->productCode) ?>"><img src="<?php echo $img_base.'thumbs/'.$row->image;?>"></a></td>	
		</tr>     
		<?php }?>  
   </table>
</br></br>
<!--php ends here-->
		</div>
		
</section>

</br></br>

<?php
	$this->load->view('home/footer'); 
?>