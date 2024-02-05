<!-- connect file -->
<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <!-- font awsome link (cdn = content delivery network) -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <!-- bootstrap js link -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">

    <style>
        .footer{
            position: absolute;
            bottom: 0;
        }
        .body{
            overflow-x: hidden:
        }
        .product_img{
            width:100px;
            object-fit: contain;
        }

    </style>
</head>
<body>
    <!-- navbar -->
    <div class="container-fluid" dir="rtl">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid" dir="rtl">
                <img src="../images/logo.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link"> سلام ساناز</a>
                        </li>
                    </ul>

                </nav>
            </div>
        </nav>

        <!-- second child -->
        <div class="bg-light">
            <h3 class="text-center p-2">مدیریت اطلاعات</h3>
        </div>

        <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary  p-1 d-flex align-items-center">
                <div dir="rtl" class="p-3">
                    <a href="#"><img src="../images/admin.png" alt="" class="admin-image"></a>
                    <p class="text-light text-center">ساناز احمدی</p>
                </div>
                <div class="button text-center" dir="rtl">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">اضافه کردن محصول</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">نمایش محصولات</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">اضافه کردن دسته بندی</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">نمایش دسته بندی</a></button>
                    <button><a href="index.php?insert_brands" class="nav-link text-light bg-info my-1">اضافه کردن برندها</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">نمایش برندها</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">تمام سفارشات</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">تمام پرداخت ها</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">لیست کابران</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">خروج</a></button>
                </div>
            </div>
        </div>


        <!-- fourth child -->
        <!-- add other files to open in same page shape -->
        <div class="container my-3">
            <?php   
            if(isset($_GET{'insert_category'})){
                include('insert_categories.php');
            }
            if(isset($_GET{'insert_brands'})){
                include('insert_brands.php');
            }
            if(isset($_GET{'view_products'})){
                include('view_products.php');
            }
            if(isset($_GET{'edit_products'})){
                include('edit_products.php');
            }
            if(isset($_GET{'delete_product'})){
                include('delete_product.php');
            }
            if(isset($_GET{'view_categories'})){
                include('view_categories.php');
            }
            if(isset($_GET{'view_brands'})){
                include('view_brands.php');
            }
            if(isset($_GET{'edit_category'})){
                include('edit_category.php');
            }
            if(isset($_GET{'edit_brand'})){
                include('edit_brand.php');
            }
            if(isset($_GET{'delete_category'})){
                include('delete_category.php');
            }
            if(isset($_GET{'delete_brand'})){
                include('delete_brand.php');
            }
            if(isset($_GET{'list_orders'})){
                include('list_orders.php');
            }
            if(isset($_GET{'list_payments'})){
                include('list_payments.php');
            }
            if(isset($_GET{'list_users'})){
                include('list_users.php');
            }
            ?>
        </div>
        
<!-- footer -->
<!-- include footer -->
<?php
include("../includes/footer.php")
?>

    </div>


<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
</body>
</html>