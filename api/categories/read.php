<?php 

  if (isset($_GET['id'])) {
    include_once 'read_single.php';
    exit();
  }


  // Category read query
  $result = $category->read();
  
  // Get row count
  $num = $result->rowCount();

  // Check if any categories
  if($num > 0) {
    // Cat array
    $cat_arr = array();
    $cat_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $cat_item = array(
        'id' => $row->id,
        'category' => $row->category
      );

      // Push to "data"
      array_push($cat_arr['data'], $cat_item);
    }

    // Turn to JSON & output
    echo json_encode($cat_arr);

  } 
  
  else {
    // No Categories
    echo json_encode(
      array('message' => 'categoryId not found')
    );
  }

  exit();

?>