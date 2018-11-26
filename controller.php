<?php
var_dump($_GET);
var_dump($_POST);

$controller = (isset($_GET['controller'])) ? $_GET['controller'] : null;
$action = (isset($_GET['action'])) ? $_GET['action'] : null;

switch ($controller) {
    case 'product':
        switch ($action) {
            case 'view':
            
            case 'edit':

            case 'delete':

            case 'add':

            case 'back':

            case 'save':

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

