<?php
require_once '../../../core/init2.php';
$api_resp_data = array(
    'error' => true,
    'posts' => array()
);

if ( !empty($_GET) && !empty($_GET['id']) ) {
    // Get animal from the database.
    $p = new Post;
    $api_resp_data = $p->getAnimalById($_GET['id'], $api_resp_data);    
} else {
    $_SESSION['api_msg_errs'][] = '* All fields required';
}


echo json_encode($api_resp_data);

exit();