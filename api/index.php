<?php 
    $quote_num = filter_input(INPUT_GET, "quote_num", FILTER_SANITIZE_NUMBER_INT);

    include_once '../config/Database.php';

    if ($quote) {
        $query = 'SELECT * FROM quotes WHERE id = :quote_num';

        $database = new Database();
        $db = $database->connect();

        $statement = $db->prepare($query);
        $statement->bindValue(':quote_num', $quote_num, PDO::PARAM_INT);
        $statement->execute();
        //$statement->debugDumpParams();
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REST API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Search Quotes</h1>
    </header>
    <section>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
            <h2 id="enter-a-quote_num">Enter a Quote Number (1 - 30):</h2>
            <input type="number" id="quote_num" name="quote_num" aria-labelledby="enter-a-quote_num" required>
            <button>Submit</button>
        </form>
    </section>
    <section>
    <?php if (!empty($results)) { ?>
        <h2><?php echo count($results) ?> Results</h2>
        <?php foreach ($results as $result) {
            echo "<p>{$result['id']} - Quote: '{$result['quote']}'</p>";
        } ?>
    <?php } else {
        echo "<p>No Results.</p>";
    } ?>
    </section>
</body>
</html>