<?php
include "connct.php";

    $start = 0;
    $per_page = 2;
    $page_counter = 0;
    $next = $page_counter + 1;
    $previous = $page_counter - 1;

    if(isset($_GET['start'])){
     $start = $_GET['start'];
     $page_counter =  $_GET['start'];
     $start = $start *  $per_page;
     $next = $page_counter + 1;
     $previous = $page_counter - 1;
    }
    // // count total number of rows in students table
    $sql = "SELECT `id` FROM `tabledb`";
if($result = mysqli_query($conn,$sql)){
    $rowcount=mysqli_num_rows($result);
//   printf("Result set has %d rows.\n",$rowcount);
  $paginations = ceil($rowcount / $per_page);
  // Free result set
  mysqli_free_result($result);
}
?>