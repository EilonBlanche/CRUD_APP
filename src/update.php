<?php
require_once('api.php');
$json = file_get_contents('php://input');
if(empty($json))
{
    echo "No Post Submitted";
}
else
{
    $db_api->update_book(json_decode($json));
}
?>