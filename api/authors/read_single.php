<?php

  // Author read query
  $result = $category->read_single();

  // Get row count
  $num = $result->rowCount();

  // Check if any authors
  if($num > 0) {
    // set properties
    $row = $result->fetch(PDO::FETCH_ASSOC);
    $author->id = $row['id'];
    $author->author = $row['category'];

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
      array('message' => 'authorId not found')
    );
  }

  exit();

?>