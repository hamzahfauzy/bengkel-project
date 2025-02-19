<?php

use Core\Database;
use Core\Page;

if(isset($_GET['filter']) && isset($_GET['filter']['product_id']))
{
    $db = new Database;
    $product_id = $_GET['filter']['product_id'];
    $product = $db->single('ws_products', ['id' => $product_id]);
    $record_type = strtolower($product->record_type);
    Page::setActive("workshop.product.$record_type");
}