<?php

  include_once '../../function/isValid.php';

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // If missing any parameters
  if ((!isset($data->id)) or (!isset($data->category))) {
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
    exit();
  }

  // Check if category exists
  $categoryExists = isValid($data->id, $category);

  // categoryId does not exist
  if($categoryExists == false) {
    echo json_encode(
      array('message' => 'categoryId Not Found')
    );
    exit();
  }

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
  
  exit();

?>