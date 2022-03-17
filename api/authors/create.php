<?php

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // If missing any parameters
  if (!isset($data->author)) {
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
    exit();
  }

  // Set author to CREATE
  $author->author = $data->author;

  // Create Author
  if($author->create()) {
    $last_insert_id = $db->lastInsertId();
    echo json_encode(
      array(
        'id' => $last_insert_id,
        'author' => $data->author
      )
    );
  } 

  exit();

?>
