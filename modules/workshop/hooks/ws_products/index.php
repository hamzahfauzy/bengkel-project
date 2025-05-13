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

$query = "SELECT $this->table.*, ws_product_prices.amount price FROM $this->table INNER JOIN ws_product_prices ON ws_product_prices.product_id = $this->table.id AND ws_product_prices.status = 'ACTIVE' $where";
$this->db->query = $query . " ORDER BY ".$col_order." ".$order[0]['dir']." LIMIT $start,$length";
$data  = $this->db->exec('all');

$this->db->query = $query;
$total = $this->db->exec('exists');

return compact('data', 'total');