<?php

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

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
  
  else {
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
  }

  exit();

?>
