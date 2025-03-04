<?php

$_POST['customers'] = $data['customers'];
$data['status'] = 'WAITING';
unset($data['customers']);

if(empty($data['start_at']))
{
    unset($data['start_at']);
}