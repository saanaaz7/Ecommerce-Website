<?php   

// connection file 
// include('./includes/connect.php');

// getting products
function getproducts(){
    global $con;

    // condition to check set or not بدون انتخاب دسته بندی تمام محصولات را نشان دهد
    if(!isset($_GET['brand'])){
       if(!isset($_GET['category'])){
    $select_query="select * from `products` order by rand() limit 0,9";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price']; 
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>قیمت: $product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>افزودن به سبد خرید</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-light'>مشاهده کالا</a>
      </div>
  </div>
  </div> ";
}
}
}
}


// getting all products
function get_all_products(){
    global $con;

    // condition to check set or not بدون انتخاب دسته بندی تمام محصولات را نشان دهد
    if(!isset($_GET['brand'])){
       if(!isset($_GET['category'])){
    $select_query="select * from `products` order by rand()";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price']; 
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>قیمت: $product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>افزودن به سبد خرید</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-light'>مشاهده کالا</a>
      </div>
  </div>
  </div> ";
}
}
}
}
// وقتی دسته بندی خاصی میخواهیم نمایش داده شود
function get_unique_categories(){
    global $con;

    if(isset($_GET['category'])){
        $category_id=$_GET['category'];
    $select_query="select * from `products` where category_id=$category_id";
$result_query=mysqli_query($con,$select_query);
        //  بررسی خالی بودن صفحه برای نمایش پیام
$num_of_rows=mysqli_num_rows($result_query);     
if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>محصولی برای این دسته بندی ثبت نشده است</h2>";
}
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price']; 
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>قیمت: $product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>افزودن به سبد خرید</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-light'>مشاهده کالا</a>
      </div>
  </div>
  </div> ";
}
}
}

// وقتی برند خاصی میخواهیم نمایش داده شود
function get_unique_brands(){
    global $con;

    if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
    $select_query="select * from `products` where brand_id=$brand_id";
$result_query=mysqli_query($con,$select_query);
        //  بررسی خالی بودن صفحه برای نمایش پیام
$num_of_rows=mysqli_num_rows($result_query);     
if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>محصولی برای این برند ثبت نشده است</h2>";
}
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price']; 
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>قیمت: $product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>افزودن به سبد خرید</a>
      <a href='product_details.php?product_id=$product_id' class='btn btn-light'>مشاهده کالا</a>
      </div>
  </div>
  </div> ";
}
}
}

// نمایش دادن برند ها در نوار کنار صفحه

function getbrands(){
    global $con;
    $select_brands="select * from `brands`";
$result_brands=mysqli_query($con,$select_brands);
while($row_data=mysqli_fetch_assoc($result_brands)){
    $brand_title=$row_data['brand_title'];
    $brand_id=$row_data['brand_id'];
    echo " <li class='nav-item'>
    <a href='index.php?brand=$brand_id' class='nav-link text-light'> $brand_title </a>
</li>";
}
}

// نمایش دادن دستخ بندی ها در نوار کنار صفحه
function getcategories(){
    global $con;
    $select_categories="select * from `categories`";
$result_categories=mysqli_query($con,$select_categories);
while($row_data=mysqli_fetch_assoc($result_categories)){
    $category_title=$row_data['category_title'];
    $category_id=$row_data['category_id'];
    echo " <li class='nav-item'>
    <a href='index.php?category=$category_id' class='nav-link text-light'> $category_title </a>
</li>";
}
}


// searching products
function search_products(){
    global $con;
    if(isset($_GET['search_data_product'])){
        $search_data_value=$_GET['search_data'];
    $search_query="select * from `products` where product_keywords like '%$search_data_value%'";
$result_query=mysqli_query($con,$search_query);
$num_of_rows=mysqli_num_rows($result_query);     
if($num_of_rows==0){
    echo "<h2 class='text-center text-danger'>محصولی یافت نشد</h2>";
}
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  $product_image1=$row['product_image1'];
  $product_price=$row['product_price']; 
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>قیمت: $product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>افزودن به سبد خرید</a>
      <a href='index.php' class='btn btn-light'>بازگشت به صفحه اصلی</a>
      </div>
  </div>
  </div> ";
}
}
}
// view details function
function view_details(){
    global $con;

    // condition to check set or not بدون انتخاب دسته بندی تمام محصولات را نشان دهد
    if(isset($_GET['product_id'])){
    if(!isset($_GET['brand'])){
       if(!isset($_GET['category'])){
           $product_id=$_GET['product_id'];
    $select_query="select * from `products` where product_id=$product_id";
$result_query=mysqli_query($con,$select_query);
while($row=mysqli_fetch_assoc($result_query)){
  $product_id=$row['product_id'];
  $product_title=$row['product_title'];
  $product_description=$row['product_description'];
  $category_id=$row['category_id'];
  $brand_id=$row['brand_id'];
  $product_image1=$row['product_image1'];
  $product_image2=$row['product_image2'];
  $product_image3=$row['product_image3'];
  $product_price=$row['product_price']; 
  echo "<div class='col-md-4 mb-2'>
  <div class='card'>
      <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
      <div class='card-body'>
      <h5 class='card-title'>$product_title</h5>
      <p class='card-text'>$product_description</p>
      <p class='card-text'>قیمت: $product_price</p>
      <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>افزودن به سبد خرید</a>
      <a href='index.php' class='btn btn-light'>بازگشت به صفحه اصلی</a>
      </div>
  </div>
  </div> 
  <div class='col-md-8'>
            <!-- تصاویر بیشتر -->
            <div class='row'>
                <div class='col-md-12'>
                    <h4 class='text-center text-info mb-5'>تصاویر بیشتر</h4>
                </div>
                <div class='col-md-6'>
                <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
                </div>
                <div class='col-md-6'>
                <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
                </div>
            </div>
            
        </div>";
  
}
}
}
}
}

// get ip address function
function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


// cart function
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_address = getIPAddress();
        $get_product_id=$_GET['add_to_cart'];
        $select_query="select * from `cart_details` where ip_address='$get_ip_address' and product_id=$get_product_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);     
        if($num_of_rows>0){
            echo "<script>alert('این محصول در حال حاضر در سبد خرید شما هست')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }else{
            $insert_query="insert into `cart_details` (product_id,ip_address,quantity) values ($get_product_id,'$get_ip_address',0)";
            $result_query=mysqli_query($con,$insert_query);
            echo "<script>alert('این محصول به سبد خرید شما اضافه شد')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}


// نمایش تعداد محصولات درون سبد خرید کنار آیکون 
function cart_item(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_address = getIPAddress();
        $select_query="select * from `cart_details` where ip_address='$get_ip_address'";
        $result_query=mysqli_query($con,$select_query);
        $count_items=mysqli_num_rows($result_query);     
        }else{
            global $con;
            $get_ip_address = getIPAddress();
            $select_query="select * from `cart_details` where ip_address='$get_ip_address'";
            $result_query=mysqli_query($con,$select_query);
            $count_items=mysqli_num_rows($result_query);  
        }
    echo $count_items;
}


// مبلغ گل
function total_cart_price(){
    global $con;
    $get_ip_address = getIPAddress();
    $total_price=0;
    $cart_query="select * from `cart_details` where ip_address='$get_ip_address'";
    $result=mysqli_query($con,$cart_query);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
        $select_products="select * from `products` where product_id='$product_id'";
        $result_products=mysqli_query($con,$select_products);
        while($row_product_price=mysqli_fetch_array($result_products)){
            $product_price=array($row_product_price['product_price']);
            $product_value=array_sum($product_price);
            $total_price+=$product_value;
        }
    }
    echo $total_price;
}



// get user order details
function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $get_details="select * from `user_table` where username='$username'";
    $result_query=mysqli_query($con,$get_details);
    while($row_query=mysqli_fetch_array($result_query)){
        $user_id=$row_query['user_id'];
        if(!isset($_GET['edit_account'])){
            if(!isset($_GET['my_orders'])){
                if(!isset($_GET['delete_account'])){
                    $get_orders="select * from `user_orders` where user_id='$user_id' and order_status='pending' ";
                    $result_orders_query=mysqli_query($con,$get_orders);
                    $row_count=mysqli_num_rows($result_orders_query);
                    if($row_count>0){
                        echo "<h3 class='text-center text-success my-5'> شما <span class='text-danger'>$row_count</span> سفارش درحال پردازش دارید</h3>
                        <p class='text-center'><a href='profile.php?my_orders'>جزئیات سفارش</a></p>";
                    }else{
                        echo "<h3 class='text-center text-success my-5'> شما هیچ سفارش درحال پردازشی ندارید</h3>
                        <p class='text-center'><a href='../index.php' class='text-dark'>مشاهده محصولات</a></p>";
                    }

                }
            }
            
        }
    }
}
?>