<?php

use Core\Database;
use Modules\Workshop\Libraries\Whatsapp;

$db = new Database;

$db->query = "SELECT 
                ws_marketing_campaign_items.*,
                ws_customers.phone
            FROM ws_marketing_campaign_items 
            LEFT JOIN ws_marketing_campaigns ON ws_marketing_campaigns.id = ws_marketing_campaign_items.campaign_id
            LEFT JOIN ws_customers ON ws_customers.id = ws_marketing_campaign_items.customer_id
            WHERE ws_marketing_campaigns.status = 'WAITING' AND ws_marketing_campaigns.start_at IS NULL";
$campaigns = $db->exec('all');

if(empty($campaigns)) return;

$messageIds = [];
$campaignIds = [];
$start_at = date('Y-m-d H:i:s');
foreach($campaigns as $message)
{
    $messageIds[] = $message->id;
    $campaignIds[] = $message->campaign_id;
    Whatsapp::to($message->phone)->send($message->message);
}

$finish_at = date('Y-m-d H:i:s');
$db->update('ws_marketing_campaign_items',[
    'status' => 'COMPLETED'
], [
    'id' => ['IN', '('.implode(',',$messageIds).')']
]);

$db->update('ws_marketing_campaigns',[
    'status' => 'COMPLETED',
    'start_at' => $start_at,
    'finish_at' => $finish_at,
], [
    'id' => ['IN', '('.implode(',',$campaignIds).')']
]);