<?php

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // If missing any parameters
  if (!isset($data->category)) {
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
    exit();
  }

  // Set category to CREATE
  $category->category = $data->category;

  // Create Category
  if($category->create()) {
    $last_insert_id = $db->lastInsertId();
    echo json_encode(
      array(
        'id' => $last_insert_id,
        'category' => $data->category
      )
    );
  } 

  exit();

?>
