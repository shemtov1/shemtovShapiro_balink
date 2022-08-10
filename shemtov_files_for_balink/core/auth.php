<?php

// Restrict logged out access
if ( empty($_SESSION['user_id'])  ) { // if NOT logged in!!!

    $allowed = false;

    // Allowed logged out routes
    $allowed_urls = array(
        '/',
        '/index.php',
        '/api/users/login.php',
        '/api/users/add.php',
        '/api/posts/addanimal.php',
        '/api/posts/addperson.php',
        '/api/posts/addmembership.php',
        '/api/posts/deleteanimal.php',
        '/api/posts/deleteperson.php',
        '/api/posts/deletemembership.php',
    );

    
    foreach ( $allowed_urls as $allowed_url ) {

        if ( $_SERVER['REQUEST_URI'] == $allowed_url ) {
            //echo "Name of request is " . $_SERVER['REQUEST_URI'] . "\n";
            $allowed = true;
            break;
        }

    }

    if ( $allowed === false ) {
        echo "ERROR ERROR ERROR\n";
        header("Location: /");
        exit();
    }

} else { // if user IS logged in!!!

    // Set logged in user's timezone
    $u = new User;
    $user = $u->get_by_id($_SESSION['user_id']);

    date_default_timezone_set($user['timezone']);
}