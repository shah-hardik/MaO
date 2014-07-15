<?php

/**
 * Admin side Api Details file
 * 
 * 
 * @author Hardik Shah (hardik@hciteam.com)
 * @version 1.0
 * @package makeanofferapp
 * @since June 17, 2013
 * 
 */
require_once 'bigcommerce.php';

ini_set('memory_limit', '-1');

use Bigcommerce\Api\Client as Bigcommerce;

//_errors_on();


if (isset($_REQUEST['ImportProuct']) && $_REQUEST['ImportProuct'] == 1) {

    if ($_REQUEST['_count'] == '-1') {

        qd("customers_products", " cp_c_id = '{$_SESSION['user']['c_id']}'  ");

        $customer_API_detail = Signup::GetApiDetail($_SESSION['user']['c_id']);
        $c_store_url = $customer_API_detail['c_store_url'];
        $c_api_key = $customer_API_detail['c_api_key'];
        $c_api_username = $customer_API_detail['c_api_username'];

        Bigcommerce::configure(array(
            'store_url' => "https://" . $c_store_url,
            'username' => $c_api_username,
            'api_key' => $c_api_key
        ));

        Bigcommerce::verifyPeer(false);
        Bigcommerce::setCipher('RC4');
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            Bigcommerce::setCipher('RC4');
        }


        $categories = Bigcommerce::getCategories();
        d($categories);


        foreach ($categories as $category) {
            $check_category = Category::CheckCatgory($_SESSION['user']['c_id'], $category->id);
            $_REQUEST['fields']['pc_catgory_id'] = $category->id;
            $_REQUEST['fields']['pc_customer_id'] = $_SESSION['user']['c_id'];
            $_REQUEST['fields']['pc_name'] = $category->name;


            if ($check_category == 0) {
                $insert_id_cat = Category::add($_REQUEST['fields']);
                $data['msg_category'] = "Categories inserted successfully";
            } else {
                $insert_id_cat = Category::update($_REQUEST['fields'], $check_category['pc_id']);
                $data['msg_category'] = "Categories updated successfully";
            }
            $category->id;
            $category->name;
        }

        $total_product = Bigcommerce::getProductsCount();


        $count = $total_product / 200;
        $int_count = intval($count);

        $float_count = ($count - intval($count));
        if ($float_count > 0) {
            $count = $int_count + 1;
        }
        $i = 0;
        $_SESSION['customer'] = array();
        for ($k = 1; $k <= $count; $k++) {
            $filter = array('limit' => 200, 'page' => $k);
            $products = Bigcommerce::getProducts($filter);


            foreach ($products as $product) {
                
                $_SESSION['customer'][$i]['id'] = $product->id;
                $_SESSION['customer'][$i]['name'] = $product->name;
                $_SESSION['customer'][$i]['price'] = $product->price;
                $_SESSION['customer'][$i]['cost_price'] = $product->cost_price;
                $_SESSION['customer'][$i]['retail_price'] = $product->retail_price;
                $_SESSION['customer'][$i]['sale_price'] = $product->sale_price;
                $_SESSION['customer'][$i]['calculated_price'] = $product->calculated_price;
                $_SESSION['customer'][$i]['product_category'] = implode(',', $product->categories);

                $_REQUEST['_count'] = $i;
                $i_data = array();
                $i_data['cp_c_id'] = $_SESSION['user']['c_id'];
                $i_data['cp_p_id'] = $_SESSION['customer'][$_REQUEST['_count']]['id'];
                $i_data['cp_p_name'] = $_SESSION['customer'][$_REQUEST['_count']]['name'];
                $i_data['cp_price'] = $_SESSION['customer'][$_REQUEST['_count']]['price'];
                $i_data['cp_cost_price'] = $_SESSION['customer'][$_REQUEST['_count']]['cost_price'];
                $i_data['cp_retail_price'] = $_SESSION['customer'][$_REQUEST['_count']]['retail_price'];
                $i_data['cp_sale_price'] = $_SESSION['customer'][$_REQUEST['_count']]['sale_price'];
                $i_data['cp_calculated_price'] = $_SESSION['customer'][$_REQUEST['_count']]['calculated_price'];
                $i_data['cp_categoty_id'] = $_SESSION['customer'][$_REQUEST['_count']]['product_category'];
                $i_data['cp_actual_price'] = intval($i_data['cp_calculated_price']) ? $i_data['cp_calculated_price'] : $i_data['cp_price'];

                $insert_id = Product::add($i_data);

                $i = $i + 1;
            }
        }
        $_SESSION['customer']['count'] = $i;
        $data['counter'] = $i;
        $data['msg'] = "Total " . $i . " products available";
    } else {
        die;
        if ($_SESSION['customer']['count'] > $_REQUEST['_count']) {
            $name = $_SESSION['customer'][$_REQUEST['_count']]['name'];
            $data['counter'] = $_SESSION['customer']['count'];

            $_REQUEST['fields']['cp_c_id'] = $_SESSION['user']['c_id'];
            $_REQUEST['fields']['cp_p_id'] = $_SESSION['customer'][$_REQUEST['_count']]['id'];
            $_REQUEST['fields']['cp_p_name'] = $_SESSION['customer'][$_REQUEST['_count']]['name'];
            $_REQUEST['fields']['cp_price'] = $_SESSION['customer'][$_REQUEST['_count']]['price'];
            $_REQUEST['fields']['cp_cost_price'] = $_SESSION['customer'][$_REQUEST['_count']]['cost_price'];
            $_REQUEST['fields']['cp_retail_price'] = $_SESSION['customer'][$_REQUEST['_count']]['retail_price'];
            $_REQUEST['fields']['cp_sale_price'] = $_SESSION['customer'][$_REQUEST['_count']]['sale_price'];
            $_REQUEST['fields']['cp_calculated_price'] = $_SESSION['customer'][$_REQUEST['_count']]['calculated_price'];
            $_REQUEST['fields']['cp_categoty_id'] = $_SESSION['customer'][$_REQUEST['_count']]['product_category'];
            $_REQUEST['fields']['cp_actual_price'] = intval($_REQUEST['fields']['cp_calculated_price']) ? $_REQUEST['fields']['cp_calculated_price'] : $_REQUEST['fields']['cp_price'];


            $check_product = Product::CheckProduct($_SESSION['user']['c_id'], $_SESSION['customer'][$_REQUEST['_count']]['id']);
            if ($check_product == 0) {
                $insert_id = Product::add($_REQUEST['fields']);
                $data['msg'] = ($_REQUEST['_count'] + 1) . " - product " . $name . " inserted successfully";
            } else {
                $insert_id = Product::update($_REQUEST['fields'], $check_product['cp_id']);
                $data['msg'] = ($_REQUEST['_count'] + 1) . " - product " . $name . " updated successfully";
            }
            $data['msg_category'] = "null";
        } else {
            $_SESSION['customer'] = '';
            return false;
        }
    }
    print json_encode($data);
    exit;
}

$bc[] = array('text' => 'Import Product');
$jsInclude = "import_product.js.php";
_cg("page_title", "Import Product");
?>