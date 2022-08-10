<?php 
print_r($_POST);

require_once '../../../core/init.php';

if ( !empty($_POST) && !empty($_POST['firstName']) && !empty($_POST['lastName'])  && !empty($_POST['phoneNumber'])  && !empty($_POST['city'])  && !empty($_POST['country']) ) {
    // Add a new person to the database.
    $p = new Post;
    $p->addPersonToDB($_POST);

} else {
    $_SESSION['api_msg_errs'][] = '* All fields required';
}

//header("Location: /posts/");
exit();