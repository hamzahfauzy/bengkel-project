<?php

$fields['invoice_id']['type'] .= '|status,WAITING PAYMENT';
unset($fields['status']);
return $fields;