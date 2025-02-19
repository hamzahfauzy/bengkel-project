<?php

$btn = '';
$record_type = $_GET['filter']['record_type'];

if($record_type == 'SPARE PART')
{
    $btn .= '<a href="'.routeTo('crud/index', ['table' => 'ws_product_logs', 'filter' => ['product_id'=>$data->id]]).'" class="btn btn-sm btn-info"><i class="fas fa-history"></i> '.__('workshop.label.logs').'</a> ';
}

$btn .= '<a href="'.routeTo('crud/index', ['table' => 'ws_product_prices', 'filter' => ['product_id'=>$data->id]]).'" class="btn btn-sm btn-info"><i class="fas fa-dollar-sign"></i> '.__('workshop.label.price').'</a> ';

return $btn;