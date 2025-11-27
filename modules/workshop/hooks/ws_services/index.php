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

if(isset($_GET['_filter']))
{
    $filterRequest = $_GET['_filter'];
    $_filter = [];
    if(isset($filterRequest['customer']))
    {
        $customer = $filterRequest['customer'];
        $_filter[] = "ws_customers.name LIKE '%$customer%'";
    }
    
    if(isset($filterRequest['customer_address']))
    {
        $customer_address = $filterRequest['customer_address'];
        $_filter[] = "ws_customers.address LIKE '%$customer_address%'";
    }
    
    if(isset($filterRequest['vehicle_merk']))
    {
        $merk = $filterRequest['vehicle_merk'];
        $_filter[] = "ws_customer_vehicles.merk LIKE '%$merk%'";
    }
    
    if(isset($filterRequest['vehicle_type']))
    {
        $type = $filterRequest['vehicle_type'];
        $_filter[] = "ws_customer_vehicles.type LIKE '%$type%'";
    }
    
    if(isset($filterRequest['police_number']))
    {
        $type = $filterRequest['police_number'];
        $_filter[] = "ws_customer_vehicles.police_number LIKE '%$type%'";
    }

    if(!empty($_filter))
    {
        $where = (!empty($where) ? ' AND ' : 'WHERE ') . "(".implode(' AND ', $_filter).")";
    }

}

$where = $where ." ". $having;

$query = "SELECT $this->table.* FROM $this->table LEFT JOIN ws_customer_vehicles ON ws_customer_vehicles.id = ws_services.vehicle_id LEFT JOIN ws_customers ON ws_customers.id = ws_customer_vehicles.customer_id $where";
$this->db->query = $query . " ORDER BY id DESC LIMIT $start,$length";
$data  = $this->db->exec('all');

$this->db->query = $query;
$total = $this->db->exec('exists');

return compact('data', 'total');