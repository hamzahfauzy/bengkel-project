<?php

use Core\Route;

Route::additional_allowed_routes([
    'route_path' => '!crud/create?table=ws_finance_journals',
]);

Route::additional_allowed_routes([
    'route_path' => '!crud/edit?table=ws_finance_journals',
]);

Route::additional_allowed_routes([
    'route_path' => '!crud/delete?table=ws_finance_journals',
]);