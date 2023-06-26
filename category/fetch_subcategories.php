<?php
     
    require_once '../admin/database/dbcon.php';
    $category_id = $_POST['category_id'];

// Make a database query to fetch subcategories
$sql = mysqli_query($con, "SELECT * FROM sub_categories WHERE category_id = '$category_id'");

$subcategories = array();
while ($row = mysqli_fetch_assoc($sql)) {
  $subcategories[] = array(
    'id' => $row['id'],
    'name' => $row['name']
  );
}

// Convert the subcategories array to JSON format
echo json_encode($subcategories);
?>