<h3 class="text-danger text-center mb-4">حذف حساب کاربری</h3>
    <form action="" method="post" class="mt-5">
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete" value="حذف حساب کاربری">
        </div>
        <div class="form-outline mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete" value="حذف نکردن حساب کاربری">
        </div>
    </form>



<!-- getting data and deleting them -->
    <?php
$username_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="delete from `user_table` where username='$username_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('حساب کاربری شما با موفقیت حذف شد')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

if(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
}


 

?>
