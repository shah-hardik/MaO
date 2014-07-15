<?php

/**
 * Admin side Category List file
 * 
 * @since July 19, 2013
 * 
 */
if (isset($_REQUEST['deleteCategory']) && $_REQUEST['deleteCategory'] > 0) {
    unset($fields);
    $fields['pc_delete_status'] = 1;
    $category_arr = Category::GetPrimaryDetail($_REQUEST['deleteCategory']);
    $bigcommerce_category_id = $category_arr['pc_catgory_id'];
    $res = Category::update_delete_status($fields, $_REQUEST['deleteCategory']);
    if ($res) {
        $res1 = Product::deleteProductUsingCategory($bigcommerce_category_id, $_SESSION['user']['c_id']);
        $product_list = Product::ProductUsingCategoryId($bigcommerce_category_id, $_SESSION['user']['c_id']);
        foreach ($product_list as $each_product):
            $product_pk = $each_product['cp_id'];
            $category_list_arr = $each_product['cp_categoty_id'];
            $category_list_arr = explode(",", $category_list_arr);
            $category_list_arr = array_diff($category_list_arr, array($bigcommerce_category_id));
            $category_list = implode(",", $category_list_arr);
            unset($fields_categoryids);
            $fields_categoryids['cp_categoty_id'] = $category_list;
            $res2 = Product::UpdateProductCategoryList($fields_categoryids, $product_pk);
        endforeach;
    }
    $data['res'] = $res;
    json_die(true, $data);
}

if ($_REQUEST['iphoneToggle']) {
    $_REQUEST['fields']['pc_status'] = $_REQUEST['checked'];
    $_REQUEST['fields_product']['cp_status'] = $_REQUEST['checked'];
    $edit_category_id = Category::update_status($_REQUEST['fields'], $_REQUEST['id']);
    $edit_product_id = Product::update_status_byCategory($_REQUEST['fields_product'], $_REQUEST['catgory_id'], $_SESSION['user']['c_id']);
    $data['id'] = $_REQUEST['id'];
    json_die(true, $data);
}

if ($_REQUEST['offerper']) {
    $_REQUEST['fields']['pc_min_price_offer'] = $_REQUEST['offer_per'];
    $offerPrice = $_REQUEST['offer_per'];
    $_REQUEST['fields_product']['cp_actual_price'] = $offerPrice;
    if ($_REQUEST['offer_per'] > 0) {
        $edit_category_id = Category::update_offer_price($_REQUEST['fields'], $_REQUEST['id']);
        $edit_product_actual_price = Product::update_offer_price_byCategory($_REQUEST['fields_product'], $_REQUEST['catgory_id'], $_SESSION['user']['c_id']);
    }
    $data['id'] = $_REQUEST['id'];
    json_die(true, $data);
}

$category = Category::CustomerNotDeletedCatgory($_SESSION['user']['c_id']);




$bc[] = array('text' => 'Category');
$jsInclude = "category.js.php";
_cg("page_title", "Category ");
?>
