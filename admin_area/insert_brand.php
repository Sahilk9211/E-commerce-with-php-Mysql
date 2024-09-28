<?php
include '../includes/connect.php';

if (isset($_POST['insert_brand'])) {
    $brand_title = $_POST['brand_title'];

    // select data from database table
    $select_query = "select * from `brands` where brand_title = '$brand_title'";
    $result_select = mysqli_query($con, $select_query);
    $number = mysqli_num_rows($result_select);
    if ($number > 0) {
        echo "<script>alert('This category already exists')</script>";
    } else {
        // table name= categories,   column name in table = category_title, variable with insrert_cart name of input tag
        $insert_query = "INSERT INTO `brands` (brand_title) VALUES ('$brand_title')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo "<script >alert('Brand has been inserted susccessfully')</script>";
        } else {
            echo "<script>alert('Error: Could not insert category.');</script>";
        }
    }
}

?>

<h2 class="text-center mb-3">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"> <i class="fa-solid fa-receipt"></i> </span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert brands" aria-label="brands" aria-describedby="basic-addon1">
    </div>

    <div class="input-group w-10 mb-2 m-auto">

        <input type="submit" class=" bg-info px-3 py-2 rounded-2 my-3 border-0" name="insert_brand" value="Insert brand" placeholder="Insert categories">
        <!-- <button class=" bg-info px-3 py-2 rounded-2 my-3 border-0">Insert brands</button> -->
    </div>
</form>