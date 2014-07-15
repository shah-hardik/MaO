
	<div class="row-fluid">
		<div class="span12">
		<div class="box-content nopadding">
			<div style="margin-top:20px;">
				<div class="clearfix">
					<table class="table table-striped table-bordered">
					<thead>
						<tr>
						<th>Statistics</th>
						<th>Total</th>
						</tr>
					</thead>
					<tr>
						<td width="150">Total Users Registered</td>
						<td><b><?php print count($customers); ?></b></td>
					</tr>
					<tr>
						<td width="150">Total Revenues</td>
						<td><b>$<?php print number_format($revenue['cst'],2,".",",") ?></b></td>
					</tr>
					<tr>
						<td width="150">Total Cut (20%)</td>
						<td><b>$<?php print number_format($revenue['cst']*(0.2),2,".",",") ?></b></td>
					</tr>
					
					</table>
				</div>
			</div>
		</div>
		</div>
	</div>


    <div class="row-fluid ">
        <div class="span12">
            <div class="box box-color box-bordered box-products">
                <div class="box-title" data-original-title >
                    <h2 ><i class="icon-list-alt"></i> Users from BigCommerce</h2>
                </div>

                <div class="box-content nopadding">
                    <fieldset>

                        <?php if (!empty($customers)): ?>

                            <table class="table table-striped table-bordered bootstrap-datatable datatable <?php print $table_class; ?>" id="">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>IP</th>
                                        <th>Plan</th>
                                    </tr>
                                </thead>   
                                <tbody >
                                    <?php foreach ($customers as $each_customer): ?>
                                        <tr ">
                                            <td>
                                                <?php print $each_customer['c_name']; ?>
                                            </td>
                                            <td>
                                                <?php print $each_customer['c_email']; ?>
                                            </td>
                                            <td style="text-align:right;">
                                                <?php print date("d-M-Y",strtotime($each_customer['created_at'])); ?>
                                            </td>
                                            
                                            <td >
											<?php print $each_customer['c_ip']; ?>
                                                
                                            </td>
                                            <td>
												$<?php print $each_customer['c_cost']; ?>
											</td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">
                                            <?php $error = "No Product exists!"; ?>
                                            <?php include "messages.php"; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        <?php endif; ?> 
                    </fieldset>
                </div>
            </div>
        </div>
    </div>



