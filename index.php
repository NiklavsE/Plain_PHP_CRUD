<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <meta charset="utf-8" />
        <title>CRUD-page</title>
    </head>
<body>
<div class="container">

<?php
//die("asdasd");
var_dump($_GET);
var_dump($_POST);

$controller = (isset($_GET['controller'])) ? $_GET['controller'] : null;
$action = (isset($_GET['action'])) ? $_GET['action'] : null;

/*
if ($controller) {
    echo 'This is controller: ' . $controller;
    if ($controller = 'product') {
        if ($view = '') {

        }
    }
}
*/

switch ($controller) {
    case 'product':
        if ($action == 'view') {
            echo '<h1>View product</h1>';
        } elseif ($action == 'add') {
            echo '<h1>Add product</h1>';
        } elseif ($action == 'edit') {
            $id = (isset($_GET['id'])) ? $_GET['id'] : null;
            if ($id == null) {
                echo '<div class="alert alert-danger" role="alert">No ID defined!</div>';
            } else {
                echo '<h1>Edit product ID: ' . $id . '</h1>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">No action defined!</div>';
        }
        break;
    case 'login':
        echo '<h1>Login</h1>';
        break;
    default:
        echo '<div class="alert alert-danger" role="alert">No controller defined!</div>';
}
?>

</div>
</body>
</html>