<?php 
print_r($_POST);

require_once '../../../core/init.php';

if ( !empty($_POST) && !empty($_POST['name']) && !empty($_POST['species']) ) {
    // Add a new animal to the database.
    $p = new Post;
    $p->addAnimalToDB($_POST);

} else {
    $_SESSION['api_msg_errs'][] = '* All fields required';
}

//header("Location: /posts/");
exit();