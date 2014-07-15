
    <div class="row-fluid ">
        <div class="span12">
            <div class="box box-color box-bordered box-products">
                <div class="box-title" data-original-title >
                    <h2 style="color:black"><i class="icon-list-alt"></i> Users from BigCommerce</h2>
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
												<?php
													switch($each_customer['c_plan']){
														case "0":
															print "$20.00";
														break;
														case "1":
															print "$30.00";
														break;
														case "2":
															print "$50.00";
														break;
													}
												?>
											
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



