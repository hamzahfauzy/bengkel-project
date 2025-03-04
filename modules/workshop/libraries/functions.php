<?php

use Core\Scheduler;

function parseCampaignMessage($description, $customer)
{
    $replacer = [
        '{name}' => $customer->name,
        '{phone}' => $customer->phone,
        '{address}' => $customer->address,
    ];
    return strtr($description, $replacer);
}

Scheduler::register('workshop/process/campaigns/run');
Scheduler::register('workshop/process/campaigns/schedule');