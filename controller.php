<?php

$debug = false;
session_start();



if ($debug) {
    var_dump($_GET);
    var_dump($_POST);
    var_dump($_SERVER);
}

$controller = (isset($_GET['controller'])) ? $_GET['controller'] : 'authorization';
$action = (isset($_GET['action'])) ? $_GET['action'] : 'logon';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

if ($debug) {
    echo $id;
    echo $action;
    echo $controller;
}



include('functions.php');

switch ($controller) {
    case 'product':
        switch ($action) {

            case 'view':
                $_GET['id'] = $id;
                include('product-view.php');
                exit();

            case 'edit':
                $_GET['id'] = $id;
                include('product-edit.php');
                exit();

            case 'add':
                include('product-add.php');
                exit();

            case 'save':
                include('product-edit.php');
                exit();
                
            default:
                include('product-list.php');
                exit();
        }
        // no break
    case 'authorization':
        switch ($action) {
            case 'logon':
            if (isset($_SESSION['username'])) {
                include('product-list.php');
                exit();
            }
            include('login.php');
            exit();

            case 'register':
            include('register.php');
            exit();

            case 'logoff':
                session_destroy();
                include('login.php');
                exit();
        }
        // no break
    default:
        
    }
?>
</div>
</body>
</html>

