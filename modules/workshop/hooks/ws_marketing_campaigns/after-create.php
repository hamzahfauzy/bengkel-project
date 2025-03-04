<?php

use Core\Database;

$db = new Database;
$customers = $db->all('ws_customers', [
    'id' => ['IN', '('.implode(',',$_POST['customers']).')']
]);
$template = $db->single('ws_marketing_templates', [
    'id' => $data->template_id
]);
foreach($customers as $customer)
{
    $db->insert('ws_marketing_campaign_items', [
        'campaign_id' => $data->id,
        'customer_id' => $customer->id,
        'message' => parseCampaignMessage($template->description, $customer),
        'status' => 'WAITING'
    ]);
}