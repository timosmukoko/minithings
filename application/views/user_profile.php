<?php
//$user_id=$this->session->userdata('userID');
$this->load->view('user/header_profile'); 
$this->load->helper('url');
$base = base_url() . index_page();
$img_base = base_url()."assets/images/"; 

//if(!$user_id){
 
 // redirect('LoginConroller');
//}
 
 ?>
    <section>
		<div class="container">
			<div class="row">
				<?php $this->load->view('user/sidebar'); ?>
				  <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
					<br>
						<h2 class="title text-center">History</h2>

                    
					</div>
				</div>
			</div>
		</div>
</div>
    </section>
<?php
	$this->load->view('user/footer'); 
?>
 