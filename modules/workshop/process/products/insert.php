<?php

use Core\Database;
use Core\Response;

$db = new Database;
$product = $db->insert('ws_products', [
    'category_id' => $_POST['category'],
    'name' => $_POST['name'],
    'unit' => $_POST['unit'],
    'record_type' => $_POST['type'],
]);

$db->insert('ws_product_prices', [
    'product_id' => $product->id,
    'amount' => $_POST['price'],
    'status' => 'ACTIVE'
]);

return Response::json($product, 'success');