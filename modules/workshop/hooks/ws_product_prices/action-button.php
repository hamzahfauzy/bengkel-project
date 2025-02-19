<?php

if($data->status == 'NON ACTIVE')
{
    return '<a href="'.routeTo('workshop/products/activate-price', ['id' => $data->id]).'" class="btn btn-sm btn-success" onclick="if(confirm(\'Are you sure to activated this price ?\')){return true}else{return false}"><i class="fas fa-check"></i> '.__('workshop.label.activate').'</a> ';
}

return '';