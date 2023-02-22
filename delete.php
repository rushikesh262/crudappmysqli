<?php
include "connct.php";
if(isset($_GET['id'])){
    // sql to delete a record
$sql = "DELETE FROM `tabledb` WHERE id =  '".$_GET['id']."';";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
}