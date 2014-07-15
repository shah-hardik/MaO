<?php

$_REQUEST['bSortable_4'] = 'false';
$_REQUEST['bSortable_5'] = 'false';
$_REQUEST['bSearchable_4'] = 'false';
$_REQUEST['bSearchable_5'] = 'false';

$aColumns = array('CP.cp_p_name', 'CP.cp_categoty_id', 'CP.cp_calculated_price', 'CP.cp_actual_price', 'CP.cp_id', 'CP.cp_price');

/* Indexed column (used for fast and accurate table cardinality) */
$sIndexColumn = "CP.cp_id";

/* DB table to use */
$sTable = " customers_products CP ";

/*
 * Paging
 */
$sLimit = "";
if (isset($_GET['iDisplayStart']) && $_GET['iDisplayLength'] != '-1') {
    $sLimit = "LIMIT " . mysql_real_escape_string($_GET['iDisplayStart']) . ", " .
            mysql_real_escape_string($_GET['iDisplayLength']);
}


/*
 * Ordering
 */
if (isset($_GET['iSortCol_0'])) {
    $sOrder = "ORDER BY  ";
    for ($i = 0; $i < intval($_GET['iSortingCols']); $i++) {
        if ($_GET['bSortable_' . intval($_GET['iSortCol_' . $i])] == "true") {
            $sOrder .= $aColumns[intval($_GET['iSortCol_' . $i])] . "
				 	" . mysql_real_escape_string($_GET['sSortDir_' . $i]) . ", ";
        }
    }

    $sOrder = substr_replace($sOrder, "", -2);
    if ($sOrder == "ORDER BY") {
        $sOrder = "";
    }
}


/*
 * Filtering
 * NOTE this does not match the built-in DataTables filtering which does it
 * word by word on any field. It's possible to do here, but concerned about efficiency
 * on very large tables, and MySQL's regex functionality is very limited
 */
$sWhere = "";
if ($_GET['sSearch'] != "") {
    $sWhere = "WHERE (";
    for ($i = 0; $i < count($aColumns); $i++) {
        $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch']) . "%' OR ";
    }
    $sWhere = substr_replace($sWhere, "", -3);
    $sWhere .= ')';
}

/* Individual column filtering */
for ($i = 0; $i < count($aColumns); $i++) {
    if ($_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
        if ($sWhere == "") {
            $sWhere = "WHERE ";
        } else {
            $sWhere .= " AND ";
        }
        $sWhere .= $aColumns[$i] . " LIKE '%" . mysql_real_escape_string($_GET['sSearch_' . $i]) . "%' ";
    }
}



/*
 * SQL queries
 * Get data to display
 */

if ($sWhere == '') {
    $sWhere.=" WHERE 1=1 AND CP.cp_c_id = " . $_SESSION['user']['c_id'];
} else {
    $sWhere.=" AND CP.cp_c_id = " . $_SESSION['user']['c_id'];
}

$sQuery_1 = "
		SELECT SQL_CALC_FOUND_ROWS " . str_replace(" , ", " ", implode(", ", $aColumns)) . ",cp_status 
		FROM   $sTable
		$sWhere
		$sOrder
		$sLimit
	";
$sQuery_1_res = q($sQuery_1);
/* Data set length after filtering */

//$sQuery_2 = " SELECT FOUND_ROWS() as tot_coun ";

$sQuery_2 = "SELECT COUNT(" . $sIndexColumn . ") as tot_count
		FROM   $sTable 
	        $sWhere
		$sOrder ";
$aResultFilterTotal = q($sQuery_2);
$iFilteredTotal = $aResultFilterTotal[0]['tot_count'];

/* Total data set length */
$sQuery_3 = "
		SELECT COUNT(" . $sIndexColumn . ") as tot_count
		FROM   $sTable 
	        WHERE 1=1 AND CP.cp_c_id = " . $_SESSION['user']['c_id'];
$aResultTotal = q($sQuery_3);
$iTotal = $aResultTotal[0]['tot_count'];
/*
 * Output
 */
$output = array(
    "sEcho" => intval($_GET['sEcho']),
    "iTotalRecords" => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData" => array()
);

foreach ($sQuery_1_res as $aRow) {
    $row = array();
    for ($i = 0; $i < count($aColumns); $i++) {
        if ($aColumns[$i] == "CP.id1") {
            /* Special output formatting for 'version' column */
            $row[] = $aRow['id'];
        } else if ($aColumns[$i] != '') {
            $aColumns[$i] = str_replace('CP.', '', $aColumns[$i]);
            if ($aColumns[$i] == 'cp_categoty_id') {
                $category_name = '';
                $cat_count = explode(',', $aRow[$aColumns[$i]]);
                for ($cat = 0; $cat < count($cat_count); $cat++) {
                    $cat_array = Category::CatgoryDetail($_SESSION['user']['c_id'], $cat_count[$cat]);
                    if (!empty($cat_array)) {

                        $category_name.= $cat_array['pc_name'] . ",";
                    }
                }
                if ($category_name != '') {
                    $category_name = substr($category_name, 0, -1);
                }
                $row[] = $category_name;
            } elseif ($aColumns[$i] == 'cp_calculated_price') {
                $row[] = '<div style="text-align:right;">' . _nf($aRow[$aColumns[$i]], 2) . '</div>';
            } elseif ($aColumns[$i] == 'cp_actual_price') {
                $cp_price_base = '';
                if ($aRow[$aColumns[$i]] != '') {
                    $cp_price_base = $aRow[$aColumns[$i]];
                } else {
                    $cp_price_base = "0.00";
                }
                $cp_price_base = _nf($cp_price_base, 2);
                $row[] = '<div id="recod_grid_val_' . $aRow['cp_id'] . '" style="text-align:right;">' . $cp_price_base . '</div>';
            } elseif ($aColumns[$i] == 'cp_id') {
                $enable_checked = '';
                if ($aRow['cp_status'] == 1) {
                    $enable_checked = 'checked';
                }
                $row[] = '<input id="enable_' . $aRow['cp_id'] . '" data-id="' . $aRow['cp_id'] . '" data-func="productToggle" data-no-uniform="true" onclick="return GetEnableval(' . $aRow['cp_id'] . ')" type="checkbox" class="enable_disable_chk" ' . $enable_checked . '/>';
            } elseif ($aColumns[$i] == 'cp_price') {
                $cp_price_edit = '';
                if ($aRow['cp_actual_price'] != '') {
                    $cp_price_edit = $aRow['cp_actual_price'];
                } else {
                    $cp_price_edit = "0.00";
                }
                $cp_price_edit = "'" . $cp_price_edit . "'";
                $row[] = '<i onclick="doInlineUpdate(' . $aRow['cp_id'] . ',' . $cp_price_edit . ')" data-rel="tooltip" title="Click to Edit" class="icon-edit pointer"></i>';
            } else {
                $row[] = $aRow[$aColumns[$i]];
            }
        }
    }
    $action = '';
    //$action = '<div id="remove_' . $aRow['id'] . '" style="text-align:center;"><i data-rel="tooltip" onclick="doDeleteBridgeDomain(' . $aRow['id'] . ',' . $main_id . ')" title="Click to Delete"  class="icon-trash pointer "></i></div>';

    $row[] = $action;
    $output['aaData'][] = $row;
}
echo json_encode($output);
exit;
die;
?>