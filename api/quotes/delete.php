<?php

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to DELETE
  $quote->id = $data->id;

  // Delete quote
  if($quote->delete()) {
    echo json_encode(
      array(
        'id' => $data->id
      )
    );
  } 
  
  else {
    echo json_encode(
      array('message' => 'No Quotes Found')
    );
  }

  exit();

  ?>