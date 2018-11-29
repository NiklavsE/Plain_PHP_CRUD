
<?php

function populate_product_list()
{
    include('connection.php');
    $query = "SELECT * FROM Products";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['price'] . " $</td>";
        echo "<td align='center'>";
        echo "<a href='controller.php?action=view&&id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><input type='submit' class='btn btn-primary' value='View'></a>  ";
        echo "<a href='controller.php?action=delete&&id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><input type='submit' class='btn btn-danger' value='Delete'></a>  ";
        echo "<a href='controller.php?action=edit&&id=". $row['id'] ."' title='Edit Record' data-toggle='tooltip'><input type='submit' class='btn btn-info' value='Edit'></a>";
        echo '</td></tr>';
    }
    mysqli_close($con);
}
function view_product($id)
{
    include('connection.php');
    $query = 'SELECT * FROM Products WHERE id='.$id;
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    while ($row = mysqli_fetch_array($result)) {
        echo"
        <div class='row'> 
        <div class='col'>
        ".$row['name']."
        </div>
        <div class='col'>
        ".$row['category']."
        </div>
        <div class='col'>
        ".$row['availability']."
        </div>
        <div class='col'>
        ".$row['price']." $ 
        </div>
        </div> 
        <div class='row'>
        <div class='col'>
        ".$row['desc']." 
        </div>
        </div>
        <div class='row'>
        <div class='col'>
        <input type= 'submit' class='btn btn-success' value='Save'> 
        <input type='submit' class='btn btn-info' value='Edit'> 
        <input type='submit' class='btn btn-secondary' value='Cancel'>
        </div> 
        </div>
        ";
    }
    mysqli_close($con);
}

function delete_record($id)
{
    include('connection.php');
    $query = "DELETE FROM Products WHERE id=".$id;
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    mysqli_close($con);
}
function populate_edit_list($id)
{
    include('connection.php');
    $query = 'SELECT * FROM Products WHERE id='.$id;
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    while ($row = mysqli_fetch_array($result)) {
        echo
        "<form method='POST'><table class='table align-left'>
       <tr><td>
        <textarea style='resize:none' rows='2' cols='20' name='name'>".$row['name']."</textarea>
        </td></tr>
        <tr><td>
        <textarea style='resize:none' rows='2' cols='20' name='category'>".$row['category']."</textarea>
        </td></tr>
        <tr><td>
        <textarea style='resize:none' rows='2' cols='20' name='availability'>".$row['availability']."</textarea>
        </td></tr>
        <tr><td>
        <textarea style='resize:none' rows='2' cols='20' name='price'>".$row['price']."</textarea>
        </td></tr>
        <tr><td>
        <textarea style='resize:none' rows='7' cols='80' name='desc'>".$row['descr']."</textarea>
        </td></tr>
        <tr><td>
        <input type= 'submit' class='btn btn-success' name='save' value='Save'> 
        <a href='controller.php?action=list' title='Cancel' data-toggle='tooltip'><input type='submit' class='btn btn-secondary' name = 'cancel' value='Cancel'></a> 
        </td></tr>
        </form>
        </table>
        
        ";
    }
    mysqli_close($con);
}
function save_edit($id, $name, $desc, $category, $price, $availability)
{
    include('connection.php');
    $query = "UPDATE Products SET name='$name', descr='$desc', category='$category', price=$price, availability='$availability' WHERE id=".$id;
    $result = mysqli_query($con, $query);
    header("Refresh:0");
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    mysqli_close($con);
}

function save_add($name, $desc, $category, $price, $availability)
{
    include('connection.php');
    $query = "INSERT INTO Products(name,descr,category,price,availability) VALUES('$name', '$desc', '$category', $price, '$availability')";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
}

?>