<?php
$button = '';
if($data->status == 'DRAFT')
{
    $button .= '<a href="'.routeTo('workshop/inspections/approve', ['id' => $data->id]).'" onclick="return confirm(\'Are you sure to approve this data ?\')" class="btn btn-sm btn-success"><i class="fas fa-check"></i> '.__('workshop.label.approve').'</a> ';
}
else
{
    $button .= '<a href="'.routeTo('workshop/inspections/print', ['id' => $data->id]).'" class="btn btn-sm btn-primary"><i class="fas fa-print"></i> Cetak</a> ';
}

return $button;