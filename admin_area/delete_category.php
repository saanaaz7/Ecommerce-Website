<?php

if(isset($_GET['delete_category'])){
    $delete_id=$_GET['delete_category'];
    //delete query

    $delete_category="delete from `categories` where category_id=$delete_id";
    $result_category=mysqli_query($con,$delete_category);
    if($result_category){
        echo "<script>alert('دسته بندی با موفقیت حذف شد')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}


?>

