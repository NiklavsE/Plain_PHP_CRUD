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
                header('Location:http://localhost:8000/product-view.php?id='.$id);
                exit();
            case 'edit':
                header("Location:http://localhost:8000/product-edit.php?id=".$id);
                exit();
            case 'delete':
                if (isset($_POST['action']) && $_POST['action'] == 'delete') {
                    if (isset($_POST['id']) && is_int($_POST['id'])) {
                        delete_record($id);
                    }
                }
                header("Location:http://localhost:8000/product-list.php");
                exit();
            case 'add':
                header("Location:http://localhost:8000/product-add.php");
                exit();
            case 'save':
                header("Location:http://localhost:8080/product-edit.php");
                exit();
            case 'list':
            default:
                header("Location:http://localhost:8000/product-list.php");
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

