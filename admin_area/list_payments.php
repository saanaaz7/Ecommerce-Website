<h3 class="text-center text-success">تمام پرداخت ها</h3>
<table class="table table-bordered mt-5 bg-info">
    <thead>
        <?php
$get_payments="select * from `user_payments`";
$result=mysqli_query($con,$get_payments);
$row_count=mysqli_num_rows($result);

if($row_count==0){
    echo "<h2 class='text-danger text-center mt-5'>هیچ پرداختی ثبت نشده است</h2>";
}else{
    echo "<tr>
<th>شماره سفارش</th>
<th>شماره صورتحساب</th>
<th>تعداد </th>
<th>روش پرداخت</th>
<th>تاریخ سفارش</th>
<th>حذف</th>

</tr>
</thead>
<tbody class='bg-secondary text-light'>";

    $number=0;
    while($row_data=mysqli_fetch_assoc($result)){
        $order_id=$row_data['order_id'];
        $payment_id=$row_data['payment_id'];
        $invoice_number=$row_data['invoice_number'];
        $amount=$row_data['amount'];
        $payment_mode=$row_data['payment_mode'];
        $date=$row_data['date'];
        $number++;
        echo "<tr>
        <td>$number</td>
        <td>$invoice_number</td>
        <td>$amount</td>
        <td>$payment_mode</td>
        <td>$date</td>
        <td><a href='' class='text-light'><i class='fa-solid fa-trash'></i></a></td>
        </tr>"; 
    }
}


?>    

</tbody>
</table>
