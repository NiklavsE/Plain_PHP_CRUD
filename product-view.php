<?php
include_once('bootstrap/bootstrap_init.html');
include('functions.php');
?>
<body>

<div class="container">
<h1> Product view </h2>
<?php view_product($_GET['id']) ;?>
</body>
</html>