<?php
include_once('bootstrap/bootstrap_init.html');
include('functions.php');
?>
<body>
<div class="container">
<h2> Product Add </h2>

<form method='POST'>
    <table class='table align-left'>
       <tr><td>
        Product name
        </td><td>
        <textarea style='resize:none' rows='2' cols='20' name='name'></textarea>
        </td></tr>
        <tr><td>
        Category
        </td><td>
        <textarea style='resize:none' rows='2' cols='20' name='category'></textarea>
        </td></tr>
        <tr><td>
        Availability
        </td><td>
        <textarea style='resize:none' rows='2' cols='20' name='availability'></textarea>
        </td></tr>
        <tr><td>
        <tr><td>
        Price
        </td><td>
        <textarea style='resize:none' rows='2' cols='20' name='price'></textarea>
        </td></tr>
        <tr><td>
        <tr><td>
        Description
        </td><td>
        <textarea style='resize:none' rows='7' cols='80' name='desc'></textarea>
        </td></tr>
        <tr><td>
        <input type= 'submit' class='btn btn-success' name='save' value='Save'> 
        
        <input type='submit' class='btn btn-secondary' name='cancel' value='Cancel'>
        </tr></td>
</form>
</table>
<?php
if (isset($_POST['cancel'])) {
    header('Location:/controller.php?action=list');
}


if (isset($_POST['save']) && $_POST['name'] && $_POST['desc'] && $_POST['category'] && $_POST['price'] && $_POST['availability']) {
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];
    save_add($name, $desc, $category, $price, $availability);
}

?>
</body>
</html>