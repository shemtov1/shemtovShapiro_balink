<?php 
echo "The value of the id parameter is " . $_POST['id'] . "\n";

require_once '../../../core/init.php';

if ( !empty($_POST) && !empty($_POST['id']) ) {
    // Delete an animal from the database.
    $p = new Post;
    $p->deleteAnimalById($_POST['id']);

} else {
    $_SESSION['api_msg_errs'][] = '* All fields required';
}

//header("Location: /posts/");
exit();