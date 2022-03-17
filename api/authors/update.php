<?php

  include_once '../../function/isValid.php';

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // If missing any parameters
  if ((!isset($data->id)) or (!isset($data->author))) {
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
    exit();
  }

  // Check if author exists
  $authorExists = isValid($data->id, $author);
  
  // authorId does not exist
  if($authorExists == false) {
    echo json_encode(
      array('message' => 'authorId Not Found')
    );
    exit();
  }

  // Set ID to UPDATE
  $author->id = $data->id;

  // Set author to UPDATE
  $author->author = $data->author;

  // Update author
  if($author->update()) {
    echo json_encode(
      array(
        'id' => $data->id,
        'author' => $data->author
      )
    );
  } 
  
  exit();

?>