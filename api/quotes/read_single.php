<?php

  // Get ID
  $quote->id = $_GET['id'];

  // Quote read query
  $result = $quote->read_single();

  // Get row count
  $num = $result->rowCount();

  // Check if any authors
  if($num > 0) {
    // Create array
    $quote_arr = array(
      'id' => $quote->id,
      'quote' => $quote->quote,
      'author' => $quote->author,
      'category' => $quote->category
    );

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