<h3 class="text-center text-success">نمایش تمام برند ها</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>شماره</th>
            <th>نام برند</th>
            <th>ویرایش</th>
            <th>حذف</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $select_brands="select * from `brands`";
        $result=mysqli_query($con,$select_brands);
        $number=0;
        while($row=mysqli_fetch_assoc($result)){
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            $number++;
        ?>

        <tr class="text-center">
            <td><?php echo $number ?></td>
            <td><?php echo $brand_title ?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-light'><i class='fa-solid fa-pencil-square'></i></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id ?>' type="button" class="btn text-light" data-toggle="modal" data-target="#exampleModal"><i class='fa-solid fa-trash'></i></a></td>
        </tr>

        <?php
            }
        ?>
    </tbody>
</table>


<!-- سوال بپرسه ک مطمینیم حذف کنیم یا نه -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h4>آیا از حذف برند مطمئن هستید؟</h4>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="index.php?view_brands" class='text-light text-decoration-none'>خیر</a></button>
        <button type="button" class="btn btn-primary"><a href='index.php?delete_brand=<?php echo $brand_id ?>' class="text-light text-decoration-none">بله</a></button>
      </div>
    </div>
  </div>
</div>