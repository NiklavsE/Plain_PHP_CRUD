<?php
require_once('bootstrap/bootstrap_init.html');
require_once('functions.php');
require_once('header.php');
session_start();
echo $_SESSION['username'];
?>

<body>
<div class="container">
<div class="row">
<a href='controller.php?controller=authorization&&action=logoff'><input type='submit' class='btn btn-danger topright' value='LOG OUT' name='logout'/></a>
  <div class="col-sm-10">  
    <h2>Product table</h2>     
    <p>list of products</p> 
  </div>
  <div class="col-sm-2"> 
    <a href='controller.php?action=add' title='Add product' data-toggle='tooltip'>
  <input type='submit' class='btn btn-success topright' value='Add Product'>
    </a> 
  </div>
</div>

  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th colspan='2'>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php populate_product_list(); ?>
    </tr>
    </tbody>
  </table>
</div>
<?php

if (isset($_POST['Delete_record']) && isset($_POST['id']) && intval($_POST['id']) != 0) {
    delete_record($_POST['id']);
    header("Refresh:0");
}

require_once('footer.php');
?>
