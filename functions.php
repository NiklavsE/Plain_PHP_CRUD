
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
    $query = "SELECT * FROM Products WHERE id=".$id;
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
    /*
<input type='submit' class='btn btn-primary' value='Back'>
".$row['desc']."
    */
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
    $query = "SELECT * FROM Products WHERE id=".$id;
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    while ($row = mysqli_fetch_array($result)) {
        echo "
        <tr>
        <td>Product name: </td><td><input type='text' name='name' value=".$row['name']."></td>
        </tr> 
        <tr> 
        <td>Description: </td><td><input type='text' name='desc' value=".$row['desc']."></td>  
        </tr>
        <tr>
        <td>Category: </td><td><input type='text' name='category' value=".$row['category']."></td>
        </tr>
        <tr>
        <td>Price: </td><td><input type='text' name='category' value=".$row['price']."></td>
        </tr>
        <tr>
        <td>Availability: </td><td><input type='text' name='category' value=".$row['availability']."></td>
        </tr>
        <tr>
        <td colspan= '2' align='right'>
        <a href='controller.php?action=list' title='Back to list' data-toggle='tooltip'><input type='submit' class='btn btn-primary' value='Back'></a>
        <a href='controller.php?action=save' title='Back to list' data-toggle='tooltip'><input type='submit' class='btn btn-success' value='Save'></a>
        </td>
        </tr>";
    }
    mysqli_close($con);
}
?>