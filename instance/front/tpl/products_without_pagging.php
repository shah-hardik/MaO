<table class="table table-striped table-bordered bootstrap-datatable datatable <?php print $table_class; ?>" id="">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Category</th>
            <th>Selling Price <br />on your store</th>
            <th>MaO Base Price</th>
            <th>Enable</th>
            <th>Action</th> 
        </tr>
    </thead>   
    <tbody >
        <?php foreach ($products as $each_product): ?>
            <tr id="products_<?php print $each_product['cp_id'] ?>">
                <td>
                    <?php print $each_product['cp_p_name']; ?>
                </td>
                <td>
                    <?php
                    $category_name = '';
                    $cat_count = explode(',', $each_product['cp_categoty_id']);
                    for ($cat = 0; $cat < count($cat_count); $cat++) {
                        $cat_array = Category::CatgoryDetail($_SESSION['user']['c_id'], $cat_count[$cat]);
                        if ($cat == (count($cat_count) - 1)) {
                            $category_name.= $cat_array['pc_name'];
                        } else {
                            $category_name.= $cat_array['pc_name'] . ",";
                        }
                    }
                    echo $category_name;
                    ?>
                </td>
                <td style="text-align:right;">
                    <?php print _nf($each_product['cp_calculated_price'], 2); ?>
                </td>

                <td id="recod_grid_val_<?php print $each_product['cp_id']; ?>" style="text-align:right;">

                    <?php
                    if ($each_product['cp_actual_price'] != '') {
                        $cp_price_base = $each_product['cp_actual_price'];
                    } else {
                        $cp_price_base = "0.00";
                    }
                    print $cp_price_base = _nf($cp_price_base, 2);
                    ?> 
                </td>
                <td>
                    <input id="enable_<?php print $each_product['cp_id'] ?>" data-id="<?php print $each_product['cp_id'] ?>" data-func="productToggle" data-no-uniform="true" onclick="return GetEnableval(<?php print $each_product['cp_id'] ?>)" type="checkbox" <?php if ($each_product['cp_status'] == 1) { ?> checked <?php } ?> />
                </td>
                <td>
                    <i onclick="doInlineUpdate('<?php print $each_product['cp_id'] ?>','<?php print $cp_price_base; ?>')" data-rel="tooltip" title="Click to Edit" class="icon-edit pointer"></i>
                </td>
            </tr>

        <?php endforeach; ?>
    </tbody>
</table>