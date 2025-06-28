<?php

use Core\Database;
use Core\Response;

$db = new Database;
$params = [
    'record_type' => $_GET['record_type'],
];
if(isset($_GET['term']) && !empty($_GET['term']))
{
    $params['name'] = ['LIKE',"%$_GET[term]%"];
}
$data = $db->all('ws_categories', $params);

return Response::json($data, 'data retrieved');