<?php

use Core\Page;
use Core\Route;

$record_type = strtolower($_GET['filter']['record_type']);

Route::additional_allowed_routes([
    'route_path' => '!crud/create?table=ws_invoices',
]);

Route::additional_allowed_routes([
    'route_path' => '!crud/edit?table=ws_invoices',
]);

Page::setTitle(__("workshop.label.$record_type"));
Page::setActive("workshop.invoices.$record_type");