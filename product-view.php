<?php
include_once('bootstrap/bootstrap_init.html');
require_once('functions.php');
require_once('header.php');
?>
<body>
<div class="container">
<h1> Product view </h2>

<?php view_product($_GET['id']) ; ?>
</div>
<?php require_once('footer.php'); ?>

