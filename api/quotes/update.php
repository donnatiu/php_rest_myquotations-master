<?php

  include_once '../../function/isValid.php';

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // If missing any parameters
  if ((!isset($data->id)) or (!isset($data->authorId)) or (!isset($data->categoryId)) or (!isset($data->quote))) {
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
    exit();
  }

  // Check if author exists
  $authorExists = isValid($data->authorId, $author);
  // Check if category exists
  $categoryExists = isValid($data->categoryId, $category);
  // Check if quote exists
  $quoteExists = isValid($data->id, $quote);
  
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

  // quote does not exist
  if($quoteExists == false) {
    echo json_encode(
      array('message' => 'No Quotes Found')
    );
    exit();
  }

  // Set quote to UPDATE
  $quote->id = $data->id;
  $quote->quote = $data->quote;
  $quote->authorId = $data->authorId;
  $quote->categoryId = $data->categoryId;

  // Update author
  if($quote->update()) {
    echo json_encode(
      array(
        'id' => $data->id,
        'quote' = $data->quote,
        'authorId' => $data->authorId,
        'categoryId' => $data->categoryId
      )
    );
  } 

  exit();

?>