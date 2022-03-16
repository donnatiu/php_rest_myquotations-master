<?php

  // Category read query
  $result = $category->read_single();

  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
    // set properties
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $category->id = $row['id'];
    $category->category = $row['category'];

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
      array('message' => 'categoryId not found')
    );
  }

  exit();

?>