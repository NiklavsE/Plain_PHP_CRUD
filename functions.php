
<?php

function populate_product_list()
{
    include('connection.php');
    $query = "SELECT * FROM Products";
    $result = mysqli_query($con, $query);
    if (!$result) {
        die('Invalid query: ' . mysqli_error());
    }
    while ($row = mysqli_fetch_assoc($result)) {
        //iterate over all the fields
        foreach ($row as $key => $val) {
            //generate output
            echo "<td>" . $val . "</td>";
        }
        echo '<td>
        <input type="submit" value="View" class="btn btn-primary">
        <input type="submit" value="Delete" class="btn btn-danger"> 
        <input type="submit" value="Delete" class="btn btn-info"> 
      </td> </tr><tr>';
    }
    echo "</tr>";
}

?>