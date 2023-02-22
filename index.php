<?php
include 'connct.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <!--  col-md-12 text-center -->
    <a href="insert.php"><button type="button" class="btn btn-primary">Add New Item</button></a>
  <table class="table container">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">category</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
            include "pagination.php";
            $pagination = "SELECT `id`, `product`, `price`, `description`, `category` FROM `tabledb` LIMIT $start, $per_page;";
            if ($result = $conn->query($pagination)) {
              while ($row = $result->fetch_assoc()) {
                echo '
                <tr>
                  <td scope="row">'.$row["product"].'</td>
                  <td>'.$row["price"].'</td>
                  <td>'.$row["description"].'</td>
                  <td>'.$row["category"].'</td>
                  <td>
                  <a href="edit.php?id='.$row["id"].'"><button type="button" class="btn btn-primary">edit</button></a>
                  <a href="read.php?id='.$row["id"].'"><button type="button" class="btn btn-primary">read</button></a>
                  <a href="delete.php?id='.$row["id"].'"><button type="button" class="btn btn-primary">delete</button></a></td>
                </tr>';
              }
              $result->free();
          }
    ?>
  </tbody>
</table>
<div class="container">
         <ul class="pagination">
            <?php
            if ($page_counter == 0) {
               echo "<li class='page-item'><a class='page-link disabled' href='#'>0</a></li>";
               for ($j = 1; $j < $paginations; $j++) {
                  echo "<li class='page-item'><a class='page-link' href=?start=$j>" . $j . "</a></li>";
               }
            } else { 
               echo "<li class='page-item'><a class='page-link' href=?start=$previous>-1</a></li>";
               for ($j = 0; $j < $paginations; $j++) {
                  if ($j == $page_counter) {
                     echo "<li class='page-item'><a class='page-link active bg-primary' href=?start=$j>" . $j . "</a></li>";
                  } else {
                     echo "<li class='page-item'><a class='page-link' href=?start=$j>" . $j . "</a></li>";
                  }
               }
               if ($j != $page_counter + 1)
                  echo "<li class='page-item'><a class='page-link' href=?start=$next>Next<a></li>";
            }
            $conn->close();
            ?>
         </ul>
      </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>