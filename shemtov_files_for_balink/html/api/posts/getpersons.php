<?php
require_once '../../../core/init2.php';
$api_resp_data = array(
    'error' => true,
    'posts' => array()
);

// Get all persons from the database.
$p = new Post;
$api_resp_data = $p->getPersons($api_resp_data);    

echo json_encode($api_resp_data);

exit();