<?php

  include_once '../../function/isValid.php';

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // If missing any parameters
  if (!isset($data->id)) {
    echo json_encode(
      array('message' => 'No Quotes Found')
    );
    exit();
  }

  // Check if quote exists
  $quoteExists = isValid($data->id, $quote);

  // quote does not exist
  if($quoteExists == false) {
    echo json_encode(
      array('message' => 'No Quotes Found')
    );
    exit();
  }

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

  exit();

  ?>