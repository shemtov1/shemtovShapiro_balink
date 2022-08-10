<?php
require_once '../../../core/init2.php';
$api_resp_data = array(
    'error' => true,
    'posts' => array()
);

// Get all animals from the database.
$p = new Post;
$api_resp_data = $p->getAnimals($api_resp_data);    

echo json_encode($api_resp_data);

exit();