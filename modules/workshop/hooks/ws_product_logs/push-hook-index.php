<?php

use Core\Page;
use Core\Route;

Route::additional_allowed_routes([
    'route_path' => '!crud/create?table=ws_product_logs',
]);

Route::additional_allowed_routes([
    'route_path' => '!crud/edit?table=ws_product_logs',
]);

Route::additional_allowed_routes([
    'route_path' => '!crud/delete?table=ws_product_logs',
]);

Page::setActive("workshop.product.spare part");