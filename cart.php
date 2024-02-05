<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>

<!-- start -->
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مشاهده سبد خرید</title>
    <!-- using php and mysql  -->
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome link (cdn = content delivery network) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>
        .cart_img{
            width: 80px;
            height: 80px;
            object-fit:contain;
        }
    </style>
</head>



<body>

<style type="text/css">
body{
 direction:rtl;
}
</style>

    <!-- navbar -->
    <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
  <div class="container-fluid">
    <img src="./images/logo1.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./index.php">خانه</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display_all.php">محصولات</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./users_area/user_registration.php">ثبت نام</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ارتباط با ما</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i> <sup> <?php   cart_item();     ?> </sup> </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- calling cart function -->
<?php
cart();
?>


<!-- second child -->
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <ul class="navbar-nav me-auto">
    <?php
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'  dir='ltr' >مهمان عزیز! خوش آمدید</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='#'>سلام ".$_SESSION['username']."</a>
        </li>";
        }
        if(!isset($_SESSION['username'])){
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/user_login.php'>ورود</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='./users_area/logout.php'>خروج</a>
        </li>";
        }
        ?>
    </ul>
</nav>


<!-- متن فروشگاه -->
<div class="bg-light">
    <h3 class="text-center">فروشگاه ما</h3>
    <p class="text-center">انتخابی مناسب برای خرید بهترین لوازم آرایشی و بهداشتی</p>
</div>


<!-- جدول سبد خرید -->
<div class="container">
    <div class="row">
        <form action="" method="post">
        <table class="table table-bordered text-center">
            <tbody>
                <!-- php code برای داینامیک کردن سبد خرید و نمایش محصولات از دیتابیس -->
                <?php
                $get_ip_address = getIPAddress();
                $total_price=0;
                $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                  echo "<thead>
                  <tr>
                      <th>نام محصول</th>
                      <th> تصویر محصول</th>
                      <th>تعداد</th>
                      <th>قیمت کل</th>
                      <th>حذف</th>
                      <th colspan='2'>گرینه ها</th>
                  </tr>
              </thead>";
                while($row=mysqli_fetch_array($result)){
                    $product_id=$row['product_id'];
                    $select_products="select * from `products` where product_id='$product_id'";
                    $result_products=mysqli_query($con,$select_products);
                    while($row_product_price=mysqli_fetch_array($result_products)){
                        $product_price=array($row_product_price['product_price']);
                        $price_table=$row_product_price['product_price'];
                        $product_title=$row_product_price['product_title'];
                        $product_image1=$row_product_price['product_image1'];
                        $product_value=array_sum($product_price);
                        $total_price+=$product_value;
                ?>

                <tr>
                    <td><?php echo $product_title   ?></td>
                    <td><img src="./admin_area/product_images/<?php echo $product_image1   ?>" alt="" class="cart_img"></td>
                    <td><input type="text" name="qty" class="form-input w-50"></td>
                    <?php
                        $get_ip_address = getIPAddress();
                        if(isset($_POST['update_cart'])){
                            $quantities=$_POST['qty'];
                            $update_cart="Update `cart_details` set quantity=$quantities where ip_address='$get_ip_address'";
                            $result_products_quantity=mysqli_query($con,$update_cart);
                            $total_price=$total_price*$quantities;
                        }
                    ?>
                    <td><?php echo $price_table   ?></td>
                    <td><input type="checkbox" name="removeitem[]" value="<?php   echo $product_id     ?>" class="form-input w-50"></td>
                    <td>
                        <input type="submit" value="بروزرسانی" class="bg-info px-3  py-2 border-0 mx-3" name="update_cart">
                        <!-- <button class="bg-info px-3  py-2 border-0 mx-3">حذف محصول</button> -->
                        <input type="submit" value="حذف محصول" class="bg-info px-3  py-2 border-0 mx-3" name="remove_cart">
                    </td>
                </tr>
                <?php
                    }
                }
                } 
                else{
                  echo "<h2 class='text-center text-danger'>سبد خرید شما خالی است </h2>";
                }  
                ?>
            </tbody>
        </table>
        <div class="d-flex mb-5">
        <?php
                $get_ip_address = getIPAddress();
                $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
                $result=mysqli_query($con,$cart_query);
                $result_count=mysqli_num_rows($result);
                if($result_count>0){
                  echo "<h4 class='px-3'>جمع قیمت ها : <strong class='text-info'> $total_price </strong></h4>
                  <a href='./index.php' class='btn btn-info px-3 py-2 border-0 mx-3'>ادامه خرید</a>
                  <a href='./users_area/checkout.php' class='btn btn-secondary px-3 py-2 border-0 mx-3'>ثبت نهایی</a>";
                }else{
                  echo "<a href='index.php' class='btn btn-info px-3 py-2 border-0 mx-3'>ادامه خرید</a>";
                }
         ?>  
        </div>
    </div>
</div>
</form>



<!-- function to remove item -->
<?php
function remove_cart_item(){
  global $con;
  if(isset($_POST['remove_cart'])){
    foreach($_POST['removeitem'] as $remove_id){
      echo $remove_id;
      $delete_query="Delete from `cart_details` where product_id=$remove_id";
      $run_delete=mysqli_query($con,$delete_query);
      if($run_delete){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
  }
}

echo $remove_item=remove_cart_item();








?>













<!-- footer -->
<!-- include footer -->
<?php
include("./includes/footer.php")
?>


</div>






<!-- bootstrap js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

