
<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
                        <div class="list-group">
						<table border="1">
	<?php foreach($category_info as $row){?>
		<tr>			
			<td><?php echo $row->title;?></td>
		</tr>     
	<?php }?>  
		
   </table>  
                        </div> 
                        <!--/category-products-->
                        </div>
                        </div>
						