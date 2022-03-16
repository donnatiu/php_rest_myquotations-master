<?php

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to DELETE
  $category->id = $data->id;

  // Delete post
  if($category->delete()) {
    echo json_encode(
      array(
        'id' => $data->id
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