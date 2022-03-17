<?php

  include_once '../../function/isValid.php';

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  if ((!isset($data->authorId)) or (!isset($data->categoryId)) or (!isset($data->quote))) {
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
    exit();
  }

  // Check if author exists
  $authorExists = isValid($data->authorId, $author);
  // Check if category exists
  $categoryExists = isValid($data->categoryId, $category);
  
  // authorId does not exist
  if($authorExists == false) {
    echo json_encode(
      array('message' => 'authorId Not Found')
    );
    exit();
  }

  // categoryId does not exist
  if($categoryExists == false) {
    echo json_encode(
      array('message' => 'categoryId Not Found')
    );
    exit();
  }

  // Set quote to CREATE
  $quote->quote = $data->quote;
  $quote->authorId = $data->authorId;
  $quote->categoryId = $data->categoryId;

  // Create Quote
  if($quote->create()) {
    $last_insert_id = $db->lastInsertId();
    echo json_encode(
      array(
        'id' => $last_insert_id,
        'quote' => $data->quote,
        'authorId' => $data->authorId,
        'categoryId' => $data->categoryId
      )
    );
  } 

  exit();

?>
