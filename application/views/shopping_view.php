<?php
	$this->load->view('home/header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
	
?>
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
                    <table class="table table-bordered table-responsive">
                        <thead class="bg-primary">
                            <th>Item</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th></th>
                        </thead>
                        <tbody>
                        <?php $total = 0; ?>
							
                            <?php 
								
								if($this->cart->contents()){
								foreach($this->cart->contents() as $row){
								if($row['qty'] != 0){
								//foreach($products as $row){									
							?>                               
                                <tr>
                                    <td class="text-center"><strong><?php echo $row['productName'];?></strong></td>
                                    <td class="text-center"><?php echo $row['buyPrice'];?></td>
                                    <td class="text-center">
                                        <form action="cart/dataGuess.php?q=updatecart&id=<?php echo $row['productCode'];?>" method="POST">
                                        <input type="number" name="qty" value="<?php echo $row['qty'];?>" min="0" style="width:50px;"/>
                                        <button type="submit" class="btn btn-info">Update</button>
                                        </form>
                                    </td>
                                    <?php $itotal = $row['buyPrice'] * $row['qty']; ?>
                                    <td class="text-center"><font class="itotal"><?php echo $itotal; ?></font></td>
                                    <td class="text-center"><a href="cart/dataGuess.php?q=removefromcart&id=<?php echo $row['productCode'];?>"><i class="fa fa-times-circle fa-lg text-danger removeproduct"></i></a></td>
                                </tr>
                                
                                <?php $total = $total + $itotal;?>  
								<?php }?>
								<?php }?>
                            
                                <?php $_SESSION['totalprice'] = isset($_SESSION['totalprice']) ? $_SESSION['totalprice'] : $total; ?>
                                <?php $vat = $total * 0.12; ?>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Sub Total</strong></td>
                                    <td colspan="2" class="text-primary"><?php echo number_format($total - $vat,2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>VAT (12%)</strong></td>
                                    <td colspan="2" class="text-danger"><?php echo number_format($vat,2) ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3" class="text-right"><strong>TOTAL</strong></td>
                                    <td colspan="2" class="text-danger"><strong><?php echo number_format($total,2) ?></strong></td>
                                </tr>
                                                   
                        </tbody>
                    </table>
                    <div class="pull-right">
                        <a href="cart/dataGuess.php?q=emptycart" class="btn btn-danger btn-lg">Empty Cart!!!</a>
                        <a href="userLogin.php" class="btn btn-success btn-lg" data-toggle="modal" data-target="#checkout_modal">Check Out</a>
                    </div>
								<?php }?>
								<?php { ?>
					
                            <tr><td colspan="5" class="text-center alert alert-danger"><strong>*** Your Cart is Empty ***</strong></td></tr>
                            </tbody>
                        </table>
								<?php } ?>
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
   
    
<?php// include('include/home/modal.php'); ?>
<?php
	$this->load->view('home/footer'); 
?>
