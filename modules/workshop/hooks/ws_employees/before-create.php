<?php

$user = $db->insert('users', [
    'name' => $data['name'],
    'username' => $data['phone'],
    'password' => md5($data['phone']),
]);

if($data['record_type'] == 'SERVICE ADVISOR')
{
    $db->insert('user_roles', [
        'user_id' => $user->id,
        'role_id' => env('SERVICE_ADVISOR_ROLE_ID')
    ]);
}

$data['user_id'] = $user->id;
