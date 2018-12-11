<?php
require_once('bootstrap/bootstrap_init.html');
require_once('functions.php');
require_once('header.php');
?>

<body>
<div class="container">
<div class="row">
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
<script type="text/javascript">



</script>
<?php

if (isset($_POST['Delete_record']) && isset($_POST['id']) && is_int($_POST['id'])) {
    //delete_record($_POST['id']);
    //header("Refresh:0");
}

require_once('footer.php');
?>