<?php include_once('bootstrap/bootstrap_init.html');
include('functions.php');
?>
<body>
<div class="container">
  <h2>Product table</h2>     
  <p>list of products</p> 
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product ID</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <?php populate_product_list(); ?>
    </tr>
    </tbody>
  </table>
</div>
</body>
</html>
