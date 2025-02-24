<?php

use Core\Database;
use Core\Response;

$db = new Database;
$customer_id = $_GET['customer_id'];

$vehicles = $db->all('ws_customer_vehicles',['customer_id' => $customer_id]);

return Response::json($vehicles, 'data retrieved');