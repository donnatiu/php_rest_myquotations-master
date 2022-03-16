<?php

/*
In that file, I defined a function named isValid that has two parameters: $id and $model
From the last Discord discussion, I suggested instantiating each model in the index.php files of each api endpoint. 
This way, you already have the $model ready to pass in to the isValid function.
There are only 3 lines inside my isValid function:
1. Use the $id passed in to set the id of the $model
2. Get the result of $model read_single method
3. Return the result

And that's it.
You will want to use the function to determine if you are sending a message like 'authorId Not Found'
For example, in the /api/authors/ endpoint, you may check to see if the $method === 'GET' && $id which means an $id parameter exists. If that is true, you may set 
$authorExists = isValid($id, $author) where $id is the id of the author and $author is the author model.
Now you could use conditional logic with if (!authorExists) - which means if it does NOT exist - then you would send the JSON response with 'authorId Not Found'
You could do the same for a category.
$categoryExists = isValid($id, $category)
*/

function isValid($id, $model) {

    // Use the $id passed in to set the id of the $model
    $model->id = $id;

    // Get the result of $model read_single method
    $result = $model->read_single();

    // Return the result
    return $result;

}

?>