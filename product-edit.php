<?php
include_once('bootstrap/bootstrap_init.html');
require_once('functions.php');
require_once('header.php');
?>
<body>
<div class="container">
<h2> Product Edit </h2>
<?php
populate_edit_list($_GET['id']);

if (isset($_POST['save']) && $_POST['name'] && $_GET['id'] && $_POST['desc'] && $_POST['category'] && $_POST['price'] && $_POST['availability']) {
    $name = $_POST['name'];
    $id = $_GET['id'];
    $desc = $_POST['desc'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];
    save_edit($id, $name, $desc, $category, $price, $availability);
}
if (isset($_POST['cancel'])) {
    header('Location:/controller.php?action=list');
}

?> 
</div>
<?php require_once('footer.php'); ?>