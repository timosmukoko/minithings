<style>
	td {
    border-bottom: 1px solid #ddd;
	padding: 15px;
    text-align: left;
}
	tr:hover {background-color: #f5f5f5;}
	</style>
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>PRODUCT LINE</h2>
                        <div class="list-group">

	<table >
		
		<?php
		$data = $this->MiniThingsModel->getProductLineTitleModel();
		foreach($data as $row){?>
		<tr>		
		<td><a href="<?= site_url('MiniThingsController/listProductLine/'.$row->productLine)?>"><?php echo $row->productLine;?></a></td>
		</tr> 		
		<?php }?>		
	 
   </table>
   
                      </div> 
                        </div>
                        </div>
	