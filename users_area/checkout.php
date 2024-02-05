<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();
?>

<!-- start -->
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت سفارش</title>
    <!-- using php and mysql  -->
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- font awsome link (cdn = content delivery network) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    
    <style>
      .logo{
        width:7%;
        height:7%;
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
    <img src="../images/logo1.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">خانه</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./display_all.php">محصولات</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user_registration.php">ثبت نام</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">ارتباط با ما</a>
        </li>
      </ul>
      <form class="d-flex" action="search_product.php" method="get">
        <input class="form-control me-2" type="search" placeholder="جستوجو" aria-label="Search" name="search_data">
        <!-- <button class="btn btn-outline-info" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button> -->
        <input type="submit" value="search" class="btn btn-outline-info" name="search_data_product">
      </form>
    </div>
  </div>
</nav>




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
          <a class='nav-link' href='user_login.php'>ورود</a>
        </li>";
        }else{
          echo "<li class='nav-item'>
          <a class='nav-link' href='logout.php'>خروج</a>
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


<!-- fourth child -->
<div class="row">

        

    </div>

  <div class="col-md-12">
        <!-- محصولات -->
    <div class="row px-1">
        <?php
        if(!isset($_SESSION['username'])){
            include('user_login.php');
        }else{
            include('payment.php');
        }
        ?>

    <!-- انتهای row -->
    </div>
    <!--col end  -->
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

