<?php

use Core\Page;

$record_type = strtolower($_GET['filter']['record_type']);
Page::setActive("workshop.performance.$record_type");
Page::setTitle(__("workshop.label.$record_type"));