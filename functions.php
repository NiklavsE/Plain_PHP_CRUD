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
        echo "<a href='controller.php?controller=product&&action=view&&id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><input type='submit' class='btn btn-primary' value='View'></a>  ";
        echo "<a href='controller.php?controller=product&&action=edit&&id=". $row['id'] ."' title='Edit Record' data-toggle='tooltip'><input type='submit' class='btn btn-info' value='Edit'></a>";
        echo "</td><td align='center'>";
        echo "<form method='POST'  onsubmit='return confirm('Do you really want to submit the form?');'>
        <input type='hidden' name='id' value=".$row['id']."></input><input type='submit' class='btn btn-danger' name='Delete_record' value='Delete' ></form>";
        echo '</td></tr>';
    }
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
        <table class='table'>
        <tr><td>
        ".$row['name']."
        </tr></td>
        <tr><td>
        ".$row['category']."
        </tr></td>
        <tr><td>
        ".$row['availability']."
        </tr></td>
        <tr><td>
        ".$row['price']." $ 
        </tr></td>
        <tr><td>
        ".$row['descr']." 
        </tr></td>
        <tr><td>
        <a href='controller.php?controller=product&&action=edit&&id=".$row['id']."' title='Cancel' data-toggle='tooltip'><input type='submit' class='btn btn-info' value='Edit'></a> 
        <a href='controller.php?controller=product&&action=list' title='Canc' data-toggle='tooltip'><input type='submit' class='btn btn-secondary' value='Cancel'></a> 
        </table>
        ";
    }
}

function delete_record($id)
{
    include('connection.php');
    $query = "DELETE FROM Products WHERE id=".$id;
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
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
        <input type='number' name='price' value =".$row['price'].">
        </td></tr>
        <tr><td>
        <textarea style='resize:none' rows='7' cols='80' name='desc'>".$row['descr']."</textarea>
        </td></tr>
        <tr><td>
        <input type= 'submit' class='btn btn-success' name='save' value='Save'> 
        <input type='submit' name='cancel' class='btn btn-secondary' value='Cancel'>
        </td></tr>
        </form>
        </table>
        ";
    }
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
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function log_in($username, $password)
{
    include('connection.php');
    $query ="SELECT hash FROM Users WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }

    if (mysqli_num_rows($result)==1 && password_verify($password, mysqli_fetch_array($result)['hash']) == 1) {
        return true;
    } else {
        return false;
    }
}
function is_super_user($username)
{
    include('connection.php');
    $query = "SELECT SU FROM Users WHERE username = '$username'";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    if (mysqli_fetch_array($result)['SU'] == 1) {
        return true;
    } else {
        return false;
    }
}
function register_user($username, $password)
{
    include('connection.php');
    $hash = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO Users VALUES('$username','$hash','NU')";
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    return true;
}
