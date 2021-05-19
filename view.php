<?php
include "config.php";
?>
<table class="table table-responsive">
<tr>
<th>NAME</th>
<th>AGE</th>
<th>CITY</th>
<th>EDIT</th>
<th>DELETE</th>
</tr>
<?php
$sql="select * from users";
$res=$con->query($sql);
if($res->num_rows>0)
{
    while($row=$res->fetch_assoc())
    {
        echo"<tr>";
        echo "<td>{$row["NAME"]}</td>";
        echo "<td>{$row["AGE"]}</td>";
        echo "<td>{$row["CITY"]}</td>";
        echo "<td><button type='button' class='btn btn-primary edit' data-id='{$row["ID"]}' >EDIT</button></td>";
        echo "<td><button type='button' class='btn btn-danger del' data-id='{$row["ID"]}'>DELETE</button></td>";
        echo"</tr>";
    }
}


?>
</table>
