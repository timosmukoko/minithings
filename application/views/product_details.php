<?php
$this->load->view('home/header'); 
//$this->load->helper('url');
//$base = base_url() . index_page();
$img_base = base_url()."assets/images/"; 

 ?>
	
	<section>
		<div class="container">
			<div class="row">
				<?php $this->load->view('home/sidebar'); ?>
				
                
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
                            
						<?php
						foreach ($view_product as $row) 
						{
							echo'<img src='. $img_base.'full/'.$row->image.'>';
                                
							echo'</div>';
						echo'</div>';
						echo'<div class="col-sm-7">';
						echo	'<div class="product-information">';//product-information
						echo	'<h2 class="product"> '.$row->productName.' </h2>';
						echo	'<p>Category: '.$row->productLine.'</p>';
				
						echo	'<p>Price: <span class="price">'.$row->buyPrice.'</span></p>';

                        echo   '<br>';
                                
                        echo   '<a class="btn btn-default add-to-cart" id="add-to-cart"><i class="fa fa-shopping-cart"></i>Add to Cart</a>';
                        echo   '<p class="info hidethis" style="color:red;"><strong>Product Added to Cart!</strong></p>';
						echo  '<p><b>Description: </b>'.$row->productDescription.'</p>';
						}	
							?>
								<p><b>Contact Info:</b> (061) 000 000</p>
								<p><b>Email:</b> k00203438@student.lit.ie</p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
				</div>
			</div>
		</div>
		</div>
	</section>
	
	
	<?php $this->load->view('home/footer'); ?>