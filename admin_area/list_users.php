<h3 class="text-center text-success">لیست تمام کابران</h3>
<table class="table table-bordered mt-5 bg-info">
    <thead>
        <?php
$get_users="select * from `user_table`";
$result=mysqli_query($con,$get_users);
$row_count=mysqli_num_rows($result);

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>هیچ کاربری ثبت نشده است</h2>";
}else{
    echo "<tr>
<th>شماره ردیف</th>
<th>نام کاربری</th>
<th>ایمیل کاربر</th>
<th>تصویر کاربر</th>
<th>آدرس کاربر</th>
<th>شماره موبایل</th>
<th>حذف</th>

</tr>
</thead>
<tbody class='bg-secondary text-light'>";

    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $user_id=$row_data['user_id'];
        $username=$row_data['username'];
        $user_email=$row_data['user_email'];
        $user_image=$row_data['user_image'];
        $user_address=$row_data['user_address'];
        $user_mobile=$row_data['user_mobile'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$username</td>
        <td>$user_email</td>
        <td><img src='../users_area/user_images/$user_image' alt='$username' class='product_img'></td>
        <td>$user_address</td>
        <td>$user_mobile</td>
        <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>"; 
    }
}


?>    

</tbody>
</table>
