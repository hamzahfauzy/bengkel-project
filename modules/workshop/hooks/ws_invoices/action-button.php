<?php

$button = '<a href="'.routeTo('workshop/invoices/detail', ['code' => $data->code]).'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> '.__('workshop.label.detail').'</a> ';

if($data->status == 'DRAFT')
{
    $button .= '<a href="'.routeTo('workshop/invoices/approve', ['code' => $data->code]).'" onclick="return confirm(\'Are you sure to approve this data ?\')" class="btn btn-sm btn-success"><i class="fas fa-check"></i> '.__('workshop.label.approve').'</a> ';
}

if($data->status != 'DRAFT')
{
    $button .= '<a href="'.routeTo('workshop/invoices/print', ['code' => $data->code]).'" target="_blank" class="btn btn-sm btn-success"><i class="fas fa-print"></i> '.__('workshop.label.print').'</a> ';
}

return $button;