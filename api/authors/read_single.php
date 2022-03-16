<?php

  // Get ID
  $author->id = $_GET['id'];

  // Author read query
  $result = $author->read_single();

  // Get row count
  $num = $result->rowCount();

  // Check if any authors
  if($num > 0) {
    // Create array
    $author_arr = array(
      'id' => $author->id,
      'author' => $author->author
    );

    // Turn to JSON & output
    echo json_encode($author_arr);
  } 
  
  else {
    // No Authors
    echo json_encode(
      array('message' => 'authorId Not Found')
    );
  }

  exit();

?>