<?php

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));

  // Set ID to DELETE
  $author->id = $data->id;

  // Delete author
  if($author->delete()) {
    echo json_encode(
      array(
        'id' => $data->id
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