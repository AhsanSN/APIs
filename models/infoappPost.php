<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'infoServer';

    // Post Properties
    public $id;
    public $data;
    
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT 
        id,
        data
      FROM
        ' . $this->table . '
      ORDER BY
        id ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Create Post
    public function create() {
        
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' SET data = :data';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->data = htmlspecialchars(strip_tags($this->data));

          // Bind data
          $stmt->bindParam(':data', $this->data);

          // Execute query
          if($stmt->execute()) {
            return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
      
    }
    
  }