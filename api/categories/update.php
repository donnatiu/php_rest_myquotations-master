<?php

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to UPDATE
  $category->id = $data->id;

  // Set category to UPDATE
  $category->category = $data->category;

  // Update category
  if($category->update()) {
    echo json_encode(
      array(
        'id' => $data->id,
        'category' => $data->category
      )
    );
  } 
  
  else {
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
  }

  exit();

?>