<?php

use Core\Page;
use Core\Route;

Route::additional_allowed_routes([
    'route_path' => '!crud/create?table=ws_invoice_items',
]);

Route::additional_allowed_routes([
    'route_path' => '!crud/edit?table=ws_invoice_items',
]);

Route::additional_allowed_routes([
    'route_path' => '!crud/delete?table=ws_invoice_items',
]);

$record_type = strtolower($_GET['filter']['product_type']);
Page::setActive("workshop.transactions.$record_type");
Page::setTitle(__("workshop.label.transaction $record_type"));