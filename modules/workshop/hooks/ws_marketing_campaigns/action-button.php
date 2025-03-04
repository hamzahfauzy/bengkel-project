<?php

$button = '<a href="'.routeTo('crud/index', ['table' => 'ws_marketing_campaign_items', 'filter' => ['campaign_id' => $data->id]]).'" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> '.__('workshop.label.detail').'</a> ';

return $button;