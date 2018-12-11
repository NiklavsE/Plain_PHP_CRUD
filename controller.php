<?php

$debug = false;

if ($debug) {
    var_dump($_GET);
    var_dump($_POST);
    var_dump($_SERVER);
}

$controller = (isset($_GET['controller'])) ? $_GET['controller'] : 'product';
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
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
                $_GET['id']
                = $id;
                include('product-view.php');
                exit();

            case 'edit':
                $_GET['id'] = $id;
                include('product-edit.php');
                exit();
                
            case 'delete':
                //delete_record($_POST['id']);
                header("Refresh:0");
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
    case 'login':

    default:
    }
?>
</div>
</body>
</html>

