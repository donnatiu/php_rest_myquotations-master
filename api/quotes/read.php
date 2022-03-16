<?php 

  // Specific quote
  if (isset($_GET['id'])) {
    include_once 'read_single.php';
    exit();
  }

  // All quotes from specified authorId & categoryId
  if(isset($_GET['authorId']) && isset($_GET['cateogryId'])) {
    $quote->authorId = $_GET['authorId'];
    $quote->categoryId = $_GET['categoryId'];
    $result = $quote->read_given_both();
  }

  // All quotes from specified authorId
  elseif(isset($_GET['authorId'])) {
    $quote->authorId = $_GET['authorId'];
    $result = $quote->read_given_author();
  }

  // All quotes from specified categoryId
  elseif(isset($_GET['cateogryId'])) {
    $quote->categoryId = $_GET['categoryId'];
    $result = $quote->read_given_category();
  }

  // All quotes
  else {
    // Quote read query
    $result = $quote->read();
  }
  
  // Get row count
  $num = $result->rowCount();

  // Check if any quotes
  if($num > 0) {
    // Quote array
    $quote_arr = array();
    //$quote_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $quote_item = array(
        'id' => $id,
        'quote' => $quote,
        'author' => $author,
        'category' => $category
      );

      // Push to "data"
      array_push($quote_arr, $quote_item);
      // array_push($quote_arr['data'], $quote_item);
    }

    // Turn to JSON & output
    echo json_encode($quote_arr);

  } 
  
  else {
    // No Quotes
    echo json_encode(
      array('message' => 'No Quotes Found')
    );
  }

  exit();

?>