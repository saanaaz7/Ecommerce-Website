<?php
include('../includes/connect.php');
// وارد کردن مشخصات محصول
if(isset($_POST['insert_product'])){

    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    // تصاویر
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //  برای انتقال عکس ها ب فایل جدا -  نام موقت تصاویر
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    // بررسی شرایط فیلد خالی 
    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brands=='' 
    or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3==''){
        echo "<script>alert('لطفا تمام گرینه ها را پر کنید')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        // insert query
        $insert_products="insert into `products`  (product_title,product_description,product_keywords,category_id,
        brand_id,product_image1,product_image2,product_image3,product_price,date,status) 
        values ('$product_title','$product_description','$product_keywords','$product_category','$product_brands',
        '$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script>alert('محصول با موفقیت ثبت شد')</script>";
        }
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> افزودن محصول </title>
        <!-- bootstrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- font awsome link (cdn = content delivery network) -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    
        <!-- css file -->
        <link rel="stylesheet" href="../style.css">
</head>


<body class="bg-light">
    <div class="container mt-3" >
        <h1 class="text-center"> اضافه کردن محصول </h1>
        <!-- forms -->
        <form action="" method="post" enctype="multipart/form-data">
        <!-- نام محصول -->
            <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <label for="product_title" class="form-label">نام محصول</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="نام محصول را وارد کنید" autocomplete="off" required="required">
            </div>

            <!-- توضیحات -->
            <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <label for="product_description" class="form-label">توضیحات محصول</label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="توضیحات محصول را وارد کنید" autocomplete="off" required="required">
            </div>

            <!-- کلمات کلیدی -->
            <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <label for="product_keywords" class="form-label">کلمات کلیدی</label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="کلمات کلیدی مربوط به محصول را وارد کنید" autocomplete="off" required="required">
            </div>

            <!-- دسته بندی -->
            <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <select name="product_category" id="" class="form-select">
                    <option value="">دسته بندی مرتبط با محصول را انتخاب کنید</option>
                    <?php
                        $select_query="select * from `categories`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $category_title=$row['category_title'];
                            $category_id=$row['category_id'];
                            echo "<option value='$category_id'>$category_title</option>";
                        }
                    ?>
                </select>
            </div>

             <!-- برند ها -->
             <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <select name="product_brands" id="" class="form-select">
                    <option value="">برند محصول را انتخاب کنید</option>
                    <?php
                        $select_query="select * from `brands`";
                        $result_query=mysqli_query($con,$select_query);
                        while($row=mysqli_fetch_assoc($result_query)){
                            $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                        }
                    ?>
                </select>
            </div>

            <!-- تصاویر -->
            <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <label for="product_image1" class="form-label">تصویر 1 </label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <label for="product_image2" class="form-label">تصویر 2 </label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div>
            <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <label for="product_image3" class="form-label">تصویر 3 </label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div>

            <!-- قیمت -->
            <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <label for="product_price" class="form-label">قیمت</label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="قیمت محصول را وارد کنید" autocomplete="off" required="required">
            </div>

            <!-- دکمه ثبت -->
            <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="ثبت محصول">
            </div>


        </form>
    </div>
    
</body>
</html>


