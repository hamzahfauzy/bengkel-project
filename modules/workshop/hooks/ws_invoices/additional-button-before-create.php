<?php

$record_type = strtolower($_GET['filter']['record_type']);

return '<a href="'.routeTo('workshop/invoices/create-'.$record_type).'" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> '.__('crud.label.create').'</a> ';