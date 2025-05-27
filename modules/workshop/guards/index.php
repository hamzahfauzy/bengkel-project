<?php
$auth = auth();

if(empty($auth))
{
    header('location:'.routeTo('auth/login'));
    die;
}