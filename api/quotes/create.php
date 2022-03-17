<?php

  include_once '../../function/isValid.php';

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  /*
  if ((!isset($_POST['authorId'])) or (!isset($_POST['categoryId'])) or (!isset($_POST['quote']))) {
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
  if(!authorExists()) {
    echo json_encode(
      array('message' => 'authorId Not Found')
    );
    exit();
  }

  // categoryId does not exist
  if(!categoryExists()) {
    echo json_encode(
      array('message' => 'categoryId Not Found')
    );
    exit();
  }
*/

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
        'quote' = $data->quote,
        'authorId' => $data->authorId,
        'categoryId' => $data->categoryId
      )
    );
  } 

  exit();

?>
