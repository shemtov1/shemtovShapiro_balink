<?php 
require_once '../../../core/init.php';

print_r($_POST);

if ( !empty($_POST) && !empty($_POST['animals_id']) && !empty($_POST['persons_id']) ) {
    // Delete a membership from the database.
    echo "About to call deleteMembership\n";
    $p = new Post;
    $p->deleteMembership($_POST['animals_id'], $_POST['persons_id']);

} else {
    $_SESSION['api_msg_errs'][] = '* All fields required';
}

//header("Location: /posts/");
exit();