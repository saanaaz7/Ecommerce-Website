<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    $get_id="select * from `products` where product_id=$edit_id";   //getting specific product information from DB
    $result=mysqli_query($con,$get_id);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    // echo $product_title;
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];


    // fetching category name
    $select_Category="select * from `categories` where category_id=$category_id";
    $result_Category=mysqli_query($con,$select_Category);
    $row=mysqli_fetch_assoc($result_Category);
    $category_title=$row['category_title'];
    // echo $category_title;

    // fetching brand name
    $select_brand="select * from `brands` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row=mysqli_fetch_assoc($result_brand);
    $brand_title=$row['brand_title'];
    // echo $brand_title;
}

?>

<div class="contaner mt-5">
    <h1 class="text-center">ویرایش محصول</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form_label">نام محصول</label>
            <input type="text" id="product_title" value="<?php echo $product_title; ?>" name="product_title" class="form-control" required="required">
        </div> 
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form_label">توضیحات محصول</label>
            <input type="text" id="product_description" value="<?php echo $product_description; ?>" name="product_description" class="form-control" required="required">
        </div> 
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form_label">کلمات کلیدی</label>
            <input type="text" id="product_keywords" value="<?php echo $product_keywords; ?>" name="product_keywords" class="form-control" required="required">
        </div> 
        <div class="form-outline w-50 m-auto mb-4">
        <select name="product_category" class="form-select">
                    <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
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
        <div class="form-outline w-50 m-auto mb-4">
        <select name="product_brands" class="form-select">
                    <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
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
        <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <label for="product_image1" class="form-label">تصویر 1 </label>
                <div class="d-flex">
                <input type="file" name="product_image1" id="product_image1" class="form-control w-50 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image1; ?>" alt="" class="product_img">
                </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <label for="product_image2" class="form-label">تصویر 2 </label>
                <div class="d-flex">
                <input type="file" name="product_image2" id="product_image2" class="form-control w-50 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image2; ?>" alt="" class="product_img">
                </div>
        </div>
        <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <label for="product_image3" class="form-label">تصویر 3 </label>
                <div class="d-flex">
                <input type="file" name="product_image3" id="product_image3" class="form-control w-50 m-auto" required="required">
                <img src="./product_images/<?php echo $product_image3; ?>" alt="" class="product_img">
                </div>
        </div>

            <div class="form-outline mb-4 w-50 m-auto" dir="rtl">
                <label for="product_price" class="form-label">قیمت</label>
                <input type="text" name="product_price" value="<?php echo $product_price; ?>" id="product_price" class="form-control"  required="required">
            </div>

            <!-- دکمه ثبت -->
            <div class="form-outline mb-4 w-50 m-auto text-center" dir="rtl">
                <input type="submit" name="edit_product" class="btn btn-info mb-3 px-3" value="ویرایش محصول">
            </div>
    </form>
</div>

<!-- editing activate -->
<?php
if(isset($_POST['edit_product'])){  //getting new datas
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];

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

        // update query
        $update_products="update `products` set product_title='$product_title',product_description='$product_description',product_keywords='$product_keywords',category_id='$product_category',
        brand_id='$product_brands',product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',product_price='$product_price',date=NOW() where product_id=$edit_id";
        $result_update=mysqli_query($con,$update_products);
        if($result_update){
            echo "<script>alert('محصول با موفقیت ویرایش شد')</script>";
            echo "<script>window.open('./index.php','_self')</script>";
        }
    }

}






?>