<?php
require_once 'admin/database/dbcon.php';
require_once 'inc/header.php';
$sql = mysqli_query($con, "SELECT * from addsinglecategory where status='1'");
if (mysqli_num_rows($sql) > 0){}
?>
<div class="container text-center d-flex justify-content-center">
  <div class="row g-5">
    <div class="col-4">
      <div class="p-3">Custom column padding</div>
    </div>
    <div class="col-4">
      <div class="p-3">Custom column padding</div>
    </div>
    <div class="col-4">
      <div class="p-3">Custom column padding</div>
    </div>
    <div class="col-4">
      <div class="p-3">Custom column padding</div>
    </div>
  </div>
</div>
