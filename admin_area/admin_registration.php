<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت نام ادمین</title>
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
        .body{
            overflow: hidden;

        }
    </style>
</head>

<body>
    <div class="container-fluid m-3" >
        <h2 class="text-center mb-5">ثبت نام ادمین</h2>
        <div class="row d-flex justify-content">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.jpg" alt="dmin registraition" class="img-fuid" >
            </div>
            <div class="col-lg-6 col-xl-5">
                <form action="" method="post">
                    <div class="form-outline mb-4" dir="rtl">
                        <label for="username" class="form-label">نام</label>
                        <input type="text" id="username" name="username" placeholder="نام خود را وارد کنید" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4" dir="rtl">
                        <label for="email" class="form-label">ایمیل</label>
                        <input type="email" id="email" name="email" placeholder="ایمیل خود را وارد کنید" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4" dir="rtl">
                        <label for="password" class="form-label">رمز عبور</label>
                        <input type="password" id="password" name="password" placeholder="رمز عبور خود را وارد کنید" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4" dir="rtl">
                        <label for="confirm_password" class="form-label">تایید رمز عبور </label>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="رمز عبور خود را تایید کنید" required="required" class="form-control">
                    </div>
                    <div>
                        <input type="submit" class="bg-info py-2 px-3 border-0" name="admin_registration" value="ثبت نام">
                        <p class="small fw-bold mt-2 pt-1">آیا حساب ادمین دارید؟<a href="admin_login.php" class="link-danger">ورود</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>