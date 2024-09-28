<?php
include('../includes/connect.php');
if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_categories = $_POST['product_categories'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    // $product_image1=$_POST['product_image1'];
    // $product_image2=$_POST['product_image2'];
    // $product_image3=$_POST['product_image3'];

    // accesseing images 
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    // accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if ($product_title == '' || $description == '' || $product_keywords == '' || $product_categories == '' || $product_brands == '' || $product_price == '' || $product_image1 == '' || $product_image2 == '' || $product_image3 == '') {
        echo "<script> alert('Please fill the data.') </script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./products_images/$product_image1");
        move_uploaded_file($temp_image2, "./products_images/$product_image2");
        move_uploaded_file($temp_image3, "./products_images/$product_image3");

        //    insert Query
        // $insert_query = "INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id, product_price, product_image1, product_image2, product_image3,product_price,date,status) VALUES ('$product_title', '$description', '$product_keywords', '$product_categories', '$product_brands', '$product_image1', '$product_image2', '$product_image3','$product_price',NOW(),'$product_status')";

        $insert_query = "INSERT INTO `products` (product_title, product_description, product_keywords, category_id, brand_id, product_image1, product_image2, product_image3, product_price, date, status) 
                         VALUES ('$product_title', '$description', '$product_keywords', '$product_categories', '$product_brands', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(), '$product_status')";

        $result_query = mysqli_query($con, $insert_query);
        if ($result_query) {
            echo "<script> alert('Product has been inserted successfully.') </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products-Admin Dashboard</title>
    <!-- Link of CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- Boostrap css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body class="bg-light">
    <div class="container-fluid p-0 ">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info ">
            <div class="container-fluid p-0">
                <a href="./index.php"> <img src="../images/logo.png" style="width: 100px; margin:10px" alt="" srcset=""></a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="./index.php" class="nav-link d-flex align-items-center"><i class="fa-sharp fa-solid fa-arrow-left mt-1 p-1"></i>Back</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>



        <divkeywords class="container mt-3">
            <h1 class="text-center mb-4">Insert Product</h1>
            <!-- form -->
            <form action="" method="post" enctype="multipart/form-data">
                <!-- title -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_title" class="formlabel">Product title</label>
                    <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product title" autocomplete="off" required>
                </div>
                <!-- description -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="description" class="formlabel">Product description</label>
                    <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product description" autocomplete="off" required>
                </div>
                <!-- keywords -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_keywords" class="formlabel">Product keywords</label>
                    <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product keywords" autocomplete="off" required>
                </div>
                <!-- categories -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_categories" id="" class="form-select px-2 py-1 rounded-lg">
                        <option value="" class="mx-2 my-1 rounded-lg">Select a Category</option>

                        <!-- Php code for Category -->
                        <?php
                        $select_query = "Select * from `categories` ";
                        $result_query = mysqli_query($con, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $category_title = $row["category_title"];
                            $category_id = $row["category_id"];
                            echo "<option value='$category_id'>$category_title </option>";
                        }

                        ?>
                    </select>
                </div>
                <!-- brands -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <select name="product_brands" id="" class="form-select px-2 py-1 rounded-lg">
                        <option value="" class="mx-2 my-1 rounded-lg">Select a brand</option>

                        <!-- Php code for Brand -->
                        <?php
                        $select_query = "Select * from `brands` ";
                        $result_query = mysqli_query($con, $select_query);
                        while ($row = mysqli_fetch_assoc($result_query)) {
                            $brand_title = $row["brand_title"];
                            $brand_id = $row["brand_id"];
                            echo "<option value='$brand_id'>$brand_title </option>";
                        }

                        ?>


                        <!-- <option value="">Brand 1</option>
                    <option value="">Brand 2</option>
                    <option value="">Brand 3</option>
                    <option value="">Brand 4</option> -->
                    </select>
                </div>
                <!-- Image1 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image1" class="formlabel">Product Image 1</label>
                    <input type="file" name="product_image1" id="product_image1" class="form-control" placeholder="" autocomplete="off" required>
                </div>
                <!-- Image2 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image2" class="formlabel">Product Image 2</label>
                    <input type="file" name="product_image2" id="product_image2" class="form-control" placeholder="" autocomplete="off" required>
                </div>
                <!-- Image3 -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_image3" class="formlabel">Product Image 3</label>
                    <input type="file" name="product_image3" id="product_image3" class="form-control" placeholder="" autocomplete="off" required>
                </div>
                <!-- Price -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <label for="product_price" class="formlabel">Product Price</label>
                    <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product price" autocomplete="off" required>
                </div>
                <!-- Price -->
                <div class="form-outline mb-4 w-50 m-auto">
                    <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
                </div>

            </form>
        </divkeywords>
    </div>

</body>

</html>