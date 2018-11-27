<?php
include_once('bootstrap/bootstrap_init.html');
include('functions.php');
?>
<body>
<div class="container">
<h2> Product Edit </h2>
<?php
populate_edit_list($_GET['id']);

if (isset($_POST['save'])) {
    echo $_POST['name'];
}
?>
</div>
</body>
</html>