<?php

$record_type = strtolower($_GET['filter']['record_type']);

return '<a href="'.routeTo('workshop/transactions/create-'.$record_type).'" class="btn btn-sm btn-success"><i class="fas fa-plus"></i> '.__('crud.label.create').'</a> ';