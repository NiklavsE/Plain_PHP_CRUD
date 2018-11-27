<?php
var_dump($_GET);
var_dump($_POST);

$controller = (isset($_GET['controller'])) ? $_GET['controller'] : 'product';
$action = (isset($_GET['action'])) ? $_GET['action'] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

echo $id;
echo $action;
echo $controller;
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
                delete_record($id);
                header("Location:http://localhost:8000/product-list.php");
                exit();
            case 'list':
                header("Location:http://localhost:8000/product-list.php");
                exit();
            case 'add':
            
            
            case 'back':

            case 'save':

                header("Location:http://localhost:8080/product-edit.php");
                exit();
            case 'cancel':
        }
        // no break
    case 'login':

    default:
    }
?>
</div>
</body>
</html>

