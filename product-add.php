<?php
require_once('bootstrap/bootstrap_init.html');
require_once('functions.php');
require_once('header.php');


if (isset($_POST['save'])) {

    $is_approved = true;
    $name = $_POST['name'];
    $desc = $_POST['desc'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];
    
    if (empty($name)) {
        $nameErr = "Name is required";
        $is_approved = false;
    } else {
        $name=test_input($name);
    }
    if (empty($desc)) {
        $descErr = "Description is required";
        $is_approved = false;
    } else {
        $desc=test_input($desc);
    }
    if (empty($category)) {
        $categoryErr = "Category is required";
        $is_approved = false;
    } else {
        $category=test_input($category);
    }
    if (empty($price)) {
        $priceErr = "Price is required";
        $is_approved = false;
    } else {
        $price=test_input($price);
    }
    if (empty($availability)) {
        $availabilityErr = "Information about availability is required";
        $is_approved = false;
    } else {
        $availability=test_input($availability);
    }
}

if ($is_approved ==  true) {
    save_add($name, $desc, $category, $price, $availability);
    $name = "";
    $desc = "";
    $category = "";
    $availability = "";
    $price = null;
}
?>

<body>
<div class="container">
<h2> Add a Product </h2>
<p> All fields are required  </p>
<form method='POST'>
    <table class='table align-left'>
        <tr><td>
        Product name
        </td><td>
        <textarea style='resize:none' rows='2' cols='20' name='name'><?php echo $name;?></textarea>
        <div class="text-danger"> <?php echo $nameErr;?></div>
        </td></tr>
        <tr><td>
        Category
        </td><td>
        <textarea style='resize:none' rows='2' cols='20' name='category'><?php echo $category;?></textarea>
        <div class="text-danger"> <?php echo $categoryErr;?></div>
        </td></tr>
        <tr><td>
        Availability
        </td><td>
        <textarea style='resize:none' rows='2' cols='20' name='availability'><?php echo $availability;?></textarea>
        <div class="text-danger"> <?php echo $availabilityErr;?></div>
        </td></tr>
        <tr><td>
        Price
        </td><td>
        <input type="number" style='resize:none' rows='2' cols='20' name='price' value=<?php echo $price;?> />
        <div class="text-danger"> <?php echo $priceErr;?></div>
        </td></tr>
        <tr><td>
        Description
        </td><td>
        <textarea style='resize:none' rows='7' cols='80' name='desc'><?php echo $desc;?></textarea>
        <div class="text-danger"> <?php echo $descErr;?></div>
        </td></tr>
        <tr><td>
        <input type= 'submit' class='btn btn-success' name='save' value='Save'> 
        <input type='submit' class='btn btn-secondary' name='cancel' value='Cancel'>
        </tr></td>
</form>
</table>
</div>

<?php
if (isset($_POST['cancel'])) {
    header('Location:/controller.php?controller=product&&action=list');
}

require_once('footer.php');
?>
