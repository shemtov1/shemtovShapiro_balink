<?php 
print_r($_POST);

require_once '../../../core/init.php';

if ( !empty($_POST) && !empty($_POST['animals_id']) && !empty($_POST['persons_id']) ) {
    // Add a new membership to the database.
    $p = new Post;
    $p->addMembership($_POST);

} else {
    $_SESSION['api_msg_errs'][] = '* All fields required';
}

//header("Location: /posts/");
exit();