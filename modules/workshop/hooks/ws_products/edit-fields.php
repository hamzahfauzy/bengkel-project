<?php

$record_type = $_GET['filter']['record_type'];

$fields['category_id']['type'] .= '|record_type,'.$record_type;

return $fields;