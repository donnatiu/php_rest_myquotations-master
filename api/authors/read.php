<?php 

  if (isset($_GET['id'])) {
    include_once 'read_single.php';
    exit();
  }

  // Author read query
  $result = $author->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any authors
  if($num > 0) {
    // Author array
    $author_arr = array();
    $author_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $author_item = array(
        'id' => $row->id,
        'author' => $row->author
      );

      // Push to "data"
      array_push($author_arr['data'], $author_item);
    }

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