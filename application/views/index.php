<?php
	$this->load->view('home/header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
	
?>

<section>


		<div class="container">
			<div class="row">
				<?php $this->load->view('home/sidebar'); ?>

                    
    <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Welcome to Mini Things</h2>
						

							
<!--php starts here-->

<?php	
$data = $this->MiniThingsModel->get_all_productModel();
foreach($data as $row){?>			
					<ul class="col-sm-4">
					<div class="product-image-wrapper">
						  <div class="single-products">
						  <div class="productinfo text-center">
					
					<a href="<?= site_url('MiniThingsController/product_details/'.$row->productCode) ?>"><img src="<?php echo $img_base.'thumbs/'.$row->image;?>"></a>
                    </a>
					
					<h4><a href="<?= site_url('MiniThingsController/product_details/'.$row->productName) ?>"><?php echo $row->productName;?></a></h4>
					<h3><?php echo $row->buyPrice;?></h3>
					<p>Category: <?php echo $row->productLine;?></p>
					
					
					<a href="<?= site_url('MiniThingsController/product_details/'.$row->productCode) ?> " class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Details</a><br>

					</div>		
					</ul>			
			<?php }	?>


<!--php ends here-->
		
		</div>
        </div>
</div>
</div>
</div>
</section>

	
<?php
	$this->load->view('home/footer'); 
?>