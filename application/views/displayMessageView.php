<?php
	$this->load->view('home/header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
</br></br></br>
<?php echo $message?>
</br></br></br>

<?php
	$this->load->view('home/footer'); 
?>
