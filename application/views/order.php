<?php
	$this->load->view('admin/header'); 
	$this->load->helper('url');
	$base = base_url() . index_page();
	$img_base = base_url()."assets/images/";
?>
<section>
		<div class="container">
			<div class="row">
                <?php $this->load->view('admin/sidebar'); ?>
                <div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Orders</h2>                                            					
<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#data1" role="tab" data-toggle="tab">Unpaid Orders</a></li>
  <li><a href="#data2" role="tab" data-toggle="tab">Delivered Orders</a></li>
  <li><a href="#data3" role="tab" data-toggle="tab">Paid Orders</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div class="tab-pane active" id="data1">
        <table class="table table-bordered">
            <thead class="bg-primary">
                <th>Date Ordered</th>
                <th>Customer</th>
                <th>Item</th>
                <th>Action</th>
            </thead>
            <?php $data = $this->MiniThingsModel->adminGetOrders();
                foreach($data as $row){ ?>
                <tr>
                    <td class="text-center"><?php echo $row->orderDate; ?></td>
                    <td><?php echo $row->customerNumber; ?></td>
                    <td class="text-center"><a href="<?= site_url('MiniThingsController/customerOrder/'.$row->customerNumber) ?>" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>
                    <td class="text-center"><a href="#" class="btn btn-warning">Deliver</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="tab-pane" id="data2">
        <table class="table table-bordered">
            <thead class="bg-primary">
                <th>Date Delivered</th>
                <th>Customer</th>
                <th>Item</th>
                <th>Action</th>
            </thead>
            <?php $data = $this->MiniThingsModel->adminGetOrders();
                foreach($data as $row){ ?>
                <tr>
                    <td class="text-center"><?php echo $row->orderDate; ?></td>
                    <td><?php echo $row->customerNumber; ?></td>
                    <td class="text-center"><a href="<?= site_url('MiniThingsController/customerOrder/'.$row->orderNumber) ?>&&p=delivered" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>
                    <td class="text-center"><a href="#" class="btn btn-warning">Paid</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
    <div class="tab-pane" id="data3">
        <table class="table table-bordered">
            <thead class="bg-primary">
                <th>Date Paid</th>
                <th>Customer</th>
                <th>Item</th>
            </thead>
            <?php $data = $this->MiniThingsModel->adminGetOrders();
                foreach($data as $row){ ?>
                <tr>
                    <td class="text-center"><?php echo $row->orderDate; ?></td>
                    <td><?php echo $row->customerNumber; ?></td>
                    <td class="text-center"><a href="#" target="_blank"><i class="fa fa-external-link"></i> View Item</a></td>                    
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
              </section>


<?php
	$this->load->view('admin/footer'); 
?>