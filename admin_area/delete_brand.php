<?php

if(isset($_GET['delete_brand'])){
    $delete_id=$_GET['delete_brand'];
    //delete query

    $delete_brand="delete from `brands` where brand_id=$delete_id";
    $result_brand=mysqli_query($con,$delete_brand);
    if($result_brand){
        echo "<script>alert('برند با موفقیت حذف شد')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}


?>

