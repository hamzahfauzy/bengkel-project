<?php

use Core\Storage;

$file = $_FILES['attachment_url'];
$name = $file['name'];

if(!empty($name))
{
    $data['attachment_url'] = Storage::upload($file);
}

$data['record_type'] = $_GET['filter']['record_type'];