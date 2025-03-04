<?php

use Core\Page;
use Core\Route;

Route::additional_allowed_routes([
    'route_path' => '!crud/create?table=ws_marketing_campaign_items',
]);

Route::additional_allowed_routes([
    'route_path' => '!crud/edit?table=ws_marketing_campaign_items',
]);

Route::additional_allowed_routes([
    'route_path' => '!crud/delete?table=ws_marketing_campaign_items',
]);

Page::setActive("workshop.ws_marketing_campaigns");