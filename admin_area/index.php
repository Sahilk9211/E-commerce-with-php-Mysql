<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Link of CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- Boostrap css Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <!-- <h1 id="hello">Hello</h1> -->
    <!-- Navbar -->
    <div class="container-fluid p-0 ">
        <!-- First Child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info ">
            <div class="container-fluid p-0">
                <img src="../images/logo.png" style="width: 100px; margin:10px" alt="" srcset="">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!-- Second Child -->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!-- Third Child -->
        <div class=" container-fluid p-0 ">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center px-5 py-3" ">
                <div>
                    <a href="./index.php">
                <img src="../images/Admin & User/user.png" alt="" id="admin_image">
                </a>
                <p class="text-light text-center">Admin Name</p>
            </div>
            <div class="button text-center">
                <button class="my-2"><a href="./insert_product.php" class="nav-link text-light bg-info my-1 py-2 px-5">Insert Products</a></button>
                <button class="my-2"><a href="#" class="nav-link text-light bg-info my-1 py-2 px-5">View Products</a></button>
                <button class="my-2"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 py-2 px-5">Insert Categories</a></button>
                <button class="my-2"><a href="#" class="nav-link text-light bg-info my-1 py-2 px-5">View Categories</a></button>
                <button class="my-2"><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1 py-2 px-5">Insert Brands</a></button>
                <button class="my-2"><a href="#" class="nav-link text-light bg-info my-1 py-2 px-5">View Brands</a></button>
                <button class="my-2"><a href="#" class="nav-link text-light bg-info my-1 py-2 px-5">All Orders</a></button>
                <button class="my-2"><a href="#" class="nav-link text-light bg-info my-1 py-2 px-5">All Payment</a></button>
                <button class="my-2"><a href="#" class="nav-link text-light bg-info my-1 py-2 px-5">List User</a></button>
                <button class="my-2"><a href="#" class="nav-link text-light bg-info my-1 py-2 px-5">Logout</a></button>
            </div>
        </div>
    </div>


    <!-- Fourth child -->
     <div class="container my-3">
        <?php
        if (isset($_GET['insert_category'])) {
            include('./insert-categories.php');
        } elseif (isset($_GET['insert_brand'])) {
            include('./insert_brand.php');
        } else {
            echo "<p>Welcome to the Admin Dashboard. Choose an option to proceed.</p>";
        }
        ?>
     </div>

    <!-- Last Child -->
    <div class="bg-info p-3 text-center footer">
        <p>All right reserved &copy; Designed by Sahil Khan-2024</p>
    </div>

    </div>

    <!-- Boostrap js Link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>