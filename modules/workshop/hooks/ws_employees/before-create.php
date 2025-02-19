<?php

$user = $db->insert('users', [
    'name' => $data['name'],
    'username' => $data['phone'],
    'password' => md5($data['phone']),
]);

$data['user_id'] = $user->id;
