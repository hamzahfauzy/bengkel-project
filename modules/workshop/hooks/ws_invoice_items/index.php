<?php

$having = "";

if($filter)
{
    $filter_query = [];
    foreach($filter as $f_key => $f_value)
    {
        $filter_query[] = "$f_key = '$f_value'";
    }

    $filter_query = implode(' AND ', $filter_query);

    $having = (empty($having) ? 'HAVING ' : ' AND ') . $filter_query;
}

$where = $where ." ". $having;

$query = "SELECT $this->table.*, ws_invoices.code invoice_code, ws_products.name product_name, ws_products.record_type product_type FROM $this->table JOIN ws_invoices ON ws_invoices.id = $this->table.invoice_id LEFT JOIN ws_products ON ws_products.id = ws_invoice_items.product_id $where";
$this->db->query = $query . " ORDER BY ".$col_order." ".$order[0]['dir']." LIMIT $start,$length";
$data  = $this->db->exec('all');

$this->db->query = $query;
$total = $this->db->exec('exists');

return compact('data', 'total');