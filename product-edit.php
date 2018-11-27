<?php
include_once('bootstrap/bootstrap_init.html');
include('functions.php');
?>
<body>
<div class="container">
<table class="table box"> 
<h2> Product Edit </h2>
<?php
if ($_GET['id'] = null) {
    header("Location:http://localhost:8080/controller.php?action=list");
}
populate_edit_list($_GET['id']); ?>
</table>
</div>
</body>
</html>