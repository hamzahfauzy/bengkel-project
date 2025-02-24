<?php
use Core\Route;

Route::additional_allowed_routes([
    'route_path' => '!crud/create?table=ws_services'
]);

Route::additional_allowed_routes([
    'route_path' => '!crud/edit?table=ws_services'
]);

Route::additional_allowed_routes([
    'route_path' => '!crud/delete?table=ws_services'
]);