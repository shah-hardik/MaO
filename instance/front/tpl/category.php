
<div class="row-fluid ">
    <?php include 'messages.php'; ?>
</div>


<div class="row-fluid ">
    <div class="span12">
        <div class="box box-color box-bordered box-products">
            <div class="box-title" data-original-title >
                <h2><i class="icon-list-alt"></i> List of Category</h2>
            </div>

            <div class="box-content nopadding">
                <fieldset>
                    <?php if (!empty($category)): ?>
                        <!--                        table-striped table-bordered bootstrap-datatable datatable -->
                        <table class="table table-striped table-bordered bootstrap-datatable datatable <?php print $table_class; ?>" id="">
                            <thead>
                                <tr>
                                    <th style="width:70%;">Category</th>
                                    <th style="width:10%;">Offer Price</th>
                                    <th style="width:10%;">Enable</th>
                                    <th style="width:10%;">Delete</th>
                                </tr>
                            </thead>   
                            <tbody >
                                <?php foreach ($category as $each_category): ?>
                                    <tr id="category_<?php print $each_category['pc_id'] ?>">
                                        <td>
                                            <?php print $each_category['pc_name']; ?>
                                        </td>
                                        <td style="text-align:right;"><input type="text" name="category_per_<?php print $each_category['pc_id'] ?>" id="category_per_<?php print $each_category['pc_id'] ?>" value="<?php print $each_category['pc_min_price_offer'] ?>" onblur="return SetMinPrice(<?php print $each_category['pc_id'] ?>,<?php print $each_category['pc_catgory_id'] ?>)" style="text-align:right;width:50%;"/>&nbsp;&nbsp;%</td>
                                        <td>
                                            <input id="enable_<?php print $each_category['pc_id'] ?>" data-id="<?php print $each_category['pc_id'] ?>" data-func="categoryToggle" data-no-uniform="true" onclick="return GetEnableval(<?php print $each_category['pc_id'] ?>,<?php print $each_category['pc_catgory_id'] ?>)" type="checkbox" <?php if ($each_category['pc_status'] == 1) { ?> checked <?php } ?> />
                                        </td>
                                        <td style="text-align:center;"><i data-rel="tooltip" onclick="DeleteCategory('<?php print $each_category['pc_id'] ?>')" title="Click to Delete"  class="icon-trash pointer "></i></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7">
                                        <?php $error = "No Category exists!"; ?>
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
