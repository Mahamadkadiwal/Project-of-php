<?php 
function getOrderDetail($id){
    global $con;
    $query = mysqli_query($con,"SELECT seller_price,p_image,product_name from addsinglecategory where p_id='$id'");
    $row = mysqli_fetch_assoc($query);
    return $row;
}
function getFullOrder(){
    $product = array();

}
?>