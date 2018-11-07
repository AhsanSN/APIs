<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/appPost.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Post($db);

  // Get raw posted data
  $data = json_decode(file_get_contents("php://input"));
 

  $post->name = $data->name;
  $post->phoneNumber = $data->phoneNumber;
  $post->level = $data->level;
  $post->points = $data->points;
  $post->prod_apple = $data->prod_apple;
  $post->prod_mango = $data->prod_mango;
  $post->prod_banana = $data->prod_banana;
  $post->prod_peach = $data->prod_peach;

  // Create post
  if($post->create()) {
    echo json_encode(
      array('message' => 'User Created')
    );
  } else {
    echo json_encode(
      array('message' => 'User Not Created')
    );
  }

