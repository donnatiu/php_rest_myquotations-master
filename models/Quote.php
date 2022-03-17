<?php 
  class Quote {
    // DB stuff
    private $conn;
    private $table = 'quotes';

    // Post Properties
    public $id;
    public $quote;
    public $authorId;
    public $categoryId;

    public $author;
    public $category;

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Quotes
    public function read() {
      // Create query
      $query = 'SELECT 
                  p.id, 
                  p.quote, 
                  a.author, 
                  c.category
                FROM ' . 
                  $this->table . ' AS p
                LEFT JOIN
                  authors a ON p.authorId = a.id
                LEFT JOIN
                  categories c ON p.categoryId = c.id
                ORDER BY
                  p.id';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Quote (id)
    public function read_single() {
      // Create query
      $query = 'SELECT 
                  p.id, 
                  p.quote, 
                  a.author, 
                  c.category
                FROM ' . 
                  $this->table . ' AS p
                LEFT JOIN
                  authors a ON p.authorId = a.id
                LEFT JOIN
                  categories c ON p.categoryId = c.id
                WHERE
                  p.id = ?
                LIMIT 0,1';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set properties
      $this->id = $row['id'];
      $this->quote = $row['quote'];
      $this->author = $row['author'];
      $this->category = $row['category'];

      return $stmt;
    }

    // Get Quotes (authorId and categoryId)
    public function read_given_both() {
      // Create query
      $query = 'SELECT 
                  p.id, 
                  p.quote, 
                  a.author, 
                  c.category
                FROM ' . 
                  $this->table . ' AS p
                LEFT JOIN
                  authors a ON p.authorId = a.id
                LEFT JOIN
                  categories c ON p.categoryId = c.id
                WHERE
                  (p.authorId = ? AND p.categoryId = ?)';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindValue(1, $this->authorId);
      $stmt->bindValue(2, $this->categoryId);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Quotes (authorId)
    public function read_given_author() {
      // Create query
      $query = 'SELECT 
                  p.id, 
                  p.quote, 
                  a.author, 
                  c.category
                FROM ' . 
                  $this->table . ' AS p
                LEFT JOIN
                  authors a ON p.authorId = a.id
                LEFT JOIN
                  categories c ON p.categoryId = c.id
                WHERE
                  p.authorId = ?';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind author
      $stmt->bindParam(1, $this->authorId);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Quotes (categoryId)
    public function read_given_category() {
      // Create query
      $query = 'SELECT 
                  p.id, 
                  p.quote, 
                  a.author, 
                  c.category
                FROM ' . 
                  $this->table . ' AS p
                LEFT JOIN
                  authors a ON p.authorId = a.id
                LEFT JOIN
                  categories c ON p.categoryId = c.id
                WHERE
                  p.categoryId = ?';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind category
      $stmt->bindParam(1, $this->categoryId);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Create Quote
    public function create() {
      // Create query
      $query = 'INSERT INTO ' . 
                  $this->table . ' 
                SET 
                  quote = :quote, 
                  authorId = :authorId, 
                  categoryId = :categoryId';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->quote = htmlspecialchars(strip_tags($this->quote));
      $this->authorId = htmlspecialchars(strip_tags($this->authorId));
      $this->categoryId = htmlspecialchars(strip_tags($this->categoryId));

      // Bind data
      $stmt->bindParam(':quote', $this->quote);
      $stmt->bindParam(':authorId', $this->authorId);
      $stmt->bindParam(':categoryId', $this->categoryId);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Quote
    public function update() {
      // Create query
      $query = 'UPDATE ' . 
                  $this->table . '
                SET 
                  id = :id, 
                  quote = :quote, 
                  authorId = :authorId, 
                  categoryId = :categoryId
                WHERE 
                  id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->quote = htmlspecialchars(strip_tags($this->quote));
      $this->authorId = htmlspecialchars(strip_tags($this->authorId));
      $this->categoryId = htmlspecialchars(strip_tags($this->categoryId));

      // Bind data
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':quote', $this->quote);
      $stmt->bindParam(':authorId', $this->authorId);
      $stmt->bindParam(':categoryId', $this->categoryId);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Quote
    public function delete() {
      // Create query
      $query = 'DELETE FROM ' . 
                  $this->table . ' 
                WHERE 
                  id = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }
    
  }