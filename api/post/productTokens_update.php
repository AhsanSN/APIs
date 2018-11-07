<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: PUT');
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

  // Set ID to update
  $post->no = $data->no;
  $post->token = $data->token;
  $post->isUsed = $data->isUsed;


  // Update post
  if($post->updateTokenisUsed()) {
    echo json_encode(
      array('message' => 'token isUsed Updated')
    );
  } else {
    echo json_encode(
      array('message' => 'token isUsed Not Updated')
    );
  }

