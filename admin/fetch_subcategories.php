<?php
include_once 'database/dbcon.php';
// Fetch subcategories based on the provided category ID
$category_id = $_POST['category_id'];

// Make a database query to fetch subcategories
$sql = mysqli_query($con, "SELECT * FROM sub_categories WHERE category_id = '$category_id'");

$subcategories = array();
while ($row = mysqli_fetch_assoc($sql)) {
  $subcategories[] = array(
    'id' => $row['id'],
    'name' => $row['subcategory_name']
  );
}

// Convert the subcategories array to JSON format
echo json_encode($subcategories);
