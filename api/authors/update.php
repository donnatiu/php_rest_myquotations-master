<?php

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

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
  
  else {
    echo json_encode(
      array('message' => 'Missing Required Parameters')
    );
  }

  exit();

?>