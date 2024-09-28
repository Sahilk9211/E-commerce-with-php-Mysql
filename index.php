<!-- Connect file -->
<?php
include './includes/connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-commerce Website</title>
  <!-- Link of CSS -->
  <link rel="stylesheet" href="style.css">
  <!-- Boostrap css Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Font awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <style>
    .card {
      /* height: 450px;  */
    }

    .truncate {
      width: 100%;
      height: ;
      /* Fixed width */
      white-space: nowrap;
      /* Prevents text from wrapping */
      overflow: hidden;
      /* Hides overflowed text */
      text-overflow: ellipsis;
      /* Shows '...' at the end */
    }
  </style>
</head>


<body>
  <!-- Navbar -->
  <div class="container-fluid p-0 m-0 oveflow_hidden">
    <!-- First child -->
    <nav class="navbar navbar-expand-lg  bg-info">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./images/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">total Price:100/-</a>
            </li>

          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>

    <!-- Second Child -->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="#">Welcome Guest</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Login</a>
        </li>

      </ul>
    </nav>

    <!-- Third Child -->
    <div class="bg-light">
      <h3 class="text-center">My Store</h3>
      <p class="text-center">Communication is at the heart of E-commerce and comunity</p>
    </div>

    <!-- Fourth Child -->
    <div class="row">
      <div class="col-md-10 ">
        <!-- Product -->
        <div class="row mx-2">

          <!-- Php code for card -->
          <?php
          $select_query = "Select * from `products`";
          $result_query = mysqli_query($con, $select_query);
          // $row = mysqli_fetch_assoc($result_query);
          //  echo $row['product_title'];
          while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keywords = $row['product_keywords'];
            $product_image1 = $row['product_image1'];
            // $product_image2=$row['product_image2'];
            // $product_image3=$row['product_image3'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "
            <div class='col-md-4 mb-2'>
            <div class='card '>
              <img src='./admin_area/products_images/$product_image1' height='' class='card-img-top object-contain' alt='$product_title'>
              <div class='card-body'>
                <h5 class='card-title '>$product_title</h5>
                <p class='card-text truncate'>$product_description</p>
                <a href='#' class='btn btn-info'>Add to cart</a>
                <a href='#' class='btn btn-secondary'>View more</a>
              </div>
            </div>
          </div>";
          }
          ?>

          <!-- <div class="col-md-4 mb-2">
            <div class="card">
              <img src="./images/clothes-1.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-info">Add to cart</a>
                <a href="#" class="btn btn-secondary">View more</a>
              </div>
            </div>
          </div> -->
          <!-- Row ending -->
        </div>
        <!-- Column ending -->
      </div>

      <!-- Side Nav -->
      <div class="col-md-2 bg-secondary p-0">
        <!-- Brands to be display -->
        <ul class="navbar-nav me-auto text-center">
          <li class="navbar-item bg-info">
            <a href="#" class="nav-link text-light ">
              <h4> Delivery Brands</h4>
            </a>
          </li>

          <?php
          $select_brands = "Select * from `brands` ";
          $result_brands = mysqli_query($con, $select_brands);
          // $row_data=mysqli_fetch_assoc($result_brands);
          // echo $row_data['brand_title'];

          while ($row_data = mysqli_fetch_assoc($result_brands)) {
            $brand_title = $row_data['brand_title'];
            $brand_id = $row_data['brand_id'];
            echo "<li class='navbar-item border-bottom'>
            <a href='index.php?brand=$brand_id' class='nav-link text-light '> $brand_title
            </a>
          </li>";
          }
          ?>



        </ul>
        <!-- Categories to be display -->
        <ul class="navbar-nav me-auto text-center">
          <li class="navbar-item bg-info">
            <a href="#" class="nav-link text-light ">
              <h4> Categories</h4>
            </a>
          </li>
          <!-- <li class="navbar-item border-bottom">
            <a href="#" class="nav-link text-light ">Category 1 </a>
          </li> -->
          <?php
          $select_categories = "Select * from `categories` ";
          $result_categories = mysqli_query($con, $select_categories);
          // $row_data=mysqli_fetch_assoc($result_brands);
          // echo $row_data['brand_title'];

          while ($row_data = mysqli_fetch_assoc($result_categories)) {
            $category_title = $row_data['category_title'];
            $category_id = $row_data['category_id'];
            echo "<li class='navbar-item border-bottom'>
            <a href='index.php?category=$category_id' class='nav-link text-light '> $category_title</a>
            
          </li>";
          }
          ?>
        </ul>
      </div>
    </div>




    <!-- Last Child -->
    <div class="bg-info p-3 text-center">
      <p>All right reserved &copy; Designed by Sahil Khan-2024</p>
    </div>
  </div>

  <!-- Boostrap js Link -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>