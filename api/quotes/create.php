<?php

  include_once '../../function/isValid.php';

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  if ((!(isset($_GET['authorId']))) or (!(isset($_GET['categoryId']))) or (!(isset($_GET['quote'])))) {
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
    exit();
  }

  // Set quote to CREATE
  $quote->quote = $data->quote;
  $quote->authorId = $data->authorId;
  $quote->categoryId = $data->categoryId;

  // Check if author exists
  $authorExists = isValid($data->authorId, $quote);
  // Check if category exists
  $categoryExists = isValid($data->categoryId, $quote);
  
  // authorId does not exist
  if(!authorExists()) {
    echo json_encode(
      array('message' => 'authorId Not Found')
    );
  }

  // categoryId does not exist
  elseif(!categoryExists()) {
    echo json_encode(
      array('message' => 'categoryId Not Found')
    );
  }

  // Create Quote
  elseif($quote->create()) {
    $last_insert_id = $db->lastInsertId();
    echo json_encode(
      array(
        'id' => $last_insert_id,
        'quote' = $data->quote,
        'authorId' => $data->authorId,
        'categoryId' => $data->categoryId
      )
    );
  } 

  exit();

?>
