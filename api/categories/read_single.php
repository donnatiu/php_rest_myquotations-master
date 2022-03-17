<?php

  // Get ID
  $category->id = $_GET['id'];

  // Category read query
  $result = $category->read_single();

  // Get row count
  $num = $result->rowCount();
  
  // Check if any categories
  if($num > 0) {
    // Create array
    $category_arr = array(
      'id' => $category->id,
      'category' => $category->category
    );

    // Turn to JSON & output
    echo json_encode($category_arr);
  } 
  
  else {
    // No Categories
    echo json_encode(
      array('message' => 'categoryId Not Found')
    );
  }

  exit();

?>