<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'appUsers';

    // Post Properties
    public $id;
    public $no;
    public $name;
    public $phoneNumber;
    public $level;
    public $points;
    public $prod_apple;
    public $prod_mango;
    public $prod_banana;
    public $prod_peach;
    public $token;
    public $isUsed;
    
    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT 
        id,
        name,
        phoneNumber,
        level,
        points,
        prod_apple,
        prod_mango,
        prod_banana,
        prod_peach
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
          $query = 'INSERT INTO ' . $this->table . ' SET name = :name, phoneNumber = :phoneNumber, level = :level, points = :points, prod_apple= :prod_apple, prod_mango = :prod_mango, prod_banana = :prod_banana, prod_peach = :prod_peach';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->phoneNumber = htmlspecialchars(strip_tags($this->phoneNumber));
          $this->level = htmlspecialchars(strip_tags($this->level));
          $this->points = htmlspecialchars(strip_tags($this->points));
          $this->prod_apple = htmlspecialchars(strip_tags($this->prod_apple));
          $this->prod_mango = htmlspecialchars(strip_tags($this->prod_mango));
          $this->prod_banana = htmlspecialchars(strip_tags($this->prod_banana));
          $this->prod_peach = htmlspecialchars(strip_tags($this->prod_peach));

          // Bind data
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':phoneNumber', $this->phoneNumber);
          $stmt->bindParam(':level', $this->level);
          $stmt->bindParam(':points', $this->points);
          $stmt->bindParam(':prod_apple', $this->prod_apple);
          $stmt->bindParam(':prod_mango', $this->prod_mango);
          $stmt->bindParam(':prod_banana', $this->prod_banana);
          $stmt->bindParam(':prod_peach', $this->prod_peach);


          // Execute query
          if($stmt->execute()) {
            return true;
      }
      
      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
      
    }

    // Update Post
    public function update() {
          // Create query
          $query = 'UPDATE ' . $this->table . '
                                SET name = :name, phoneNumber = :phoneNumber, level = :level, points = :points, prod_apple= :prod_apple, prod_mango = :prod_mango, prod_banana = :prod_banana, prod_peach = :prod_peach
                                WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));
          $this->name = htmlspecialchars(strip_tags($this->name));
          $this->phoneNumber = htmlspecialchars(strip_tags($this->phoneNumber));
          $this->level = htmlspecialchars(strip_tags($this->level));
          $this->points = htmlspecialchars(strip_tags($this->points));
          $this->prod_apple = htmlspecialchars(strip_tags($this->prod_apple));
          $this->prod_mango = htmlspecialchars(strip_tags($this->prod_mango));
          $this->prod_banana = htmlspecialchars(strip_tags($this->prod_banana));
          $this->prod_peach = htmlspecialchars(strip_tags($this->prod_peach));

          // Bind data
          $stmt->bindParam(':id', $this->id);
          $stmt->bindParam(':name', $this->name);
          $stmt->bindParam(':phoneNumber', $this->phoneNumber);
          $stmt->bindParam(':level', $this->level);
          $stmt->bindParam(':points', $this->points);
          $stmt->bindParam(':prod_apple', $this->prod_apple);
          $stmt->bindParam(':prod_mango', $this->prod_mango);
          $stmt->bindParam(':prod_banana', $this->prod_banana);
          $stmt->bindParam(':prod_peach', $this->prod_peach);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

    // update token isUsed
    public function updateTokenisUsed() {
          // Create query
          $query = 'UPDATE productTokens
                                SET isUsed = :isUsed
                                
                                WHERE token = :token';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->no = htmlspecialchars(strip_tags($this->no));
          $this->token = htmlspecialchars(strip_tags($this->token));
          $this->isUsed = htmlspecialchars(strip_tags($this->isUsed));

          // Bind data
          $stmt->bindParam(':no', $this->no);
          $stmt->bindParam(':token', $this->token);
          $stmt->bindParam(':isUsed', $this->isUsed);


          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
    
    // Delete Post
    public function delete() {
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

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
    
    // Get Single Post
    public function read_single_token() {
      // Create query
      $query = 'SELECT 
        no,
        token,
        isUsed
      FROM
        productTokens
      ORDER BY
        no ASC';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    
  }