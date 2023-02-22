<?php
include "connct.php";
if (isset($_POST["submit"])) {
    if (
        isset(
            $_POST["name"],
            $_POST["category"],
            $_POST["price"],
            $_POST["Description"],
        ) &&
        !empty($_POST["name"]) &&
        !empty($_POST["category"]) &&
        !empty($_POST["price"]) &&
        !empty($_POST["Description"])
    ) {
        $val1 = $_POST['name'];
        $val2 =  $_POST['price'];
        $val3 = $_POST['Description'];
        $val4 = $_POST['category'];
        $where = $_POST['id'];

        $sql = 'UPDATE `tabledb` SET `product`="'.$val1.'",`price`="'.$val2.'",`description`="'.$val3.'",`category`="'.$val4.'" WHERE `id` = "'.$where.'";';

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
        } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        if (isset($_POST["name"]) && !empty($_POST["name"])) {
            $name = $_POST["name"];
            $namelbl = "name is";
        } else {
            $namelbl = "name is required......";
        if (isset($_POST["price"]) && !empty($_POST["price"])) {
            $price = $_POST["price"];
            $pricelbl = "price is";
        } else {
            $pricelbl = "price is required......";
        }
        if (isset($_POST["category"]) && !empty($_POST["category"])) {
            $category = $_POST["category"];
            $categorylbl = "category is";
        } else {
            $categorylbl = "category is required......";
        }
        if (isset($_POST["Description"]) && !empty($_POST["Description"])) {
            $Description = $_POST["Description"];
            $Descriptionlbl = "Description is";
        } else {
            $Descriptionlbl = "Description is required......";
        }
    }}
} else {
    // $name = $_POST['name'];Description
    $sql = 'SELECT `id`, `product`, `price`, `description`, `category` FROM `tabledb` WHERE `id` = '.$_GET['id'].';';
    $prequery = mysqli_query($conn, $sql);
    while($item = mysqli_fetch_array($prequery))
    {
        $name = $item['product'];
        $price = $item['price'];
        $Description = $item['description'];
        $category = $item['category'];
    };
    $namelbl = "name";
    $pricelbl = "price";
    $categorylbl = "category";
}
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
<div class="container px-5 my-5">
<form class="form-valide" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="name"><?php if (
                                                                        isset($namelbl)
                                                                    ) {
                                                                        echo $namelbl;
                                                                    } else {
                                                                        echo "Name";
                                                                    } ?><span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="name" placeholder="Enter a username.." value="<?php if (
                                                                                                                    isset($name)
                                                                                                                ) {
                                                                                                                    echo $name;
                                                                                                                } else {
                                                                                                                    echo "";
                                                                                                                } ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" hidden for="id"><?php echo $_GET['id']; ?><span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" hidden name="id" placeholder="Enter a username.." value="<?php echo $_GET['id']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="price"><?php if (
                                                                        isset($pricelbl)
                                                                    ) {
                                                                        echo $pricelbl;
                                                                    } else {
                                                                        echo "price";
                                                                    } ?> <span class="text-danger">*</span></label>
                <div class="col-lg-8">
                <input type="text" class="form-control" name="price" placeholder="price" value="<?php if (
                                                                                                        isset($price)
                                                                                                    ) {
                                                                                                        echo $price;
                                                                                                    } else {
                                                                                                        echo "";
                                                                                                    } ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="Description"><?php if (
                                                                        isset($Descriptionlbl)
                                                                    ) {
                                                                        echo $Descriptionlbl;
                                                                    } else {
                                                                        echo "Description";
                                                                    } ?><span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="Description" placeholder="Description" value="<?php if (
                                                                                                        isset($Description)
                                                                                                    ) {
                                                                                                        echo $Description;
                                                                                                    } else {
                                                                                                        echo "";
                                                                                                    } ?>">
                </div>
            </div>            <div class="form-group row">
                <label class="col-lg-4 col-form-label" for="category"><?php if (
                                                                        isset($categorylbl)
                                                                    ) {
                                                                        echo $categorylbl;
                                                                    } else {
                                                                        echo "category";
                                                                    } ?><span class="text-danger">*</span></label>
                <div class="col-lg-8">
                    <input type="text" class="form-control" name="category" placeholder="category" value="<?php if (
                                                                                                        isset($category)
                                                                                                    ) {
                                                                                                        echo $category;
                                                                                                    } else {
                                                                                                        echo "";
                                                                                                    } ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-8 ml-auto">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
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