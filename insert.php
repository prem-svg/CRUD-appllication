<?php
include "config.php";
$name=$_POST["name"];
$age=$_POST["age"];
$city=$_POST["city"];
$sql="insert into users (NAME,AGE,CITY) values ('{$name}',{$age},'{$city}')";
$con->query($sql);
$id=$con->insert_id;
echo "<td>{$name}</td>";
echo "<td>{$age}</td>";   
echo "<td>{$city}</td>";
echo "<td><button type='button' class='btn btn-primary edit'data-id='{$row["ID"]}'>EDIT</button></td>";
echo "<td><button type='button' class='btn btn-danger del' data-id='${$id}'>DELETE</button></td>";

?>