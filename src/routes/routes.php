<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App;

$app->group('/api', function () use ($app) {
  $app->group('/v1', function () use ($app) {
    $app->get('/users', 'selectUsers');
    $app->get('/user/{id}', 'selectUser');
    $app->post('/user', 'storeUser');
    $app->put('/user/{id}', 'updateUser');
    $app->delete('/user/{id}', 'deleteUser');
  });
});
$app->post('/login', 'login');
$app->post('/dashboard', 'login');


function selectUsers($response) {
  $query = "SELECT id,username, email FROM users ORDER BY id DESC";
  try {
      $db = new DBConnection();
      $db = $db->mConnect();
      $execute = $db->query($query);
      $users = $execute->fetchAll(PDO::FETCH_OBJ);
      $db = null;
      
      return json_encode($users);
  } catch(PDOException $e) {
      echo '{
              "error":'. $e->getMessage() .',
              "status": 409
            }';
  }
}
function selectUser($request) {
  $id = $request->getAttribute('id');
  $query = "SELECT id, username, email FROM users where id = $id";
  try {
      $db = new DBConnection();
      $db = $db->mConnect();
      $execute = $db->query($query);
      $user = $execute->fetchAll(PDO::FETCH_OBJ);
      $db = null;
      if(empty($user)) {
        echo '{ 
                "error": "User doesn´t exits",
                "status": 404
              }';
      } else {
        return json_encode($user[0]);
      }
  } catch(PDOException $e) {
      echo '{
              "error":'. $e->getMessage() .',
              "status": 409,
            }';
  }
}
function storeUser($request) {
  
  $username = $request->getParam('username');
  $passHash = $request->getParam('password');
  $password = password_hash($passHash, PASSWORD_DEFAULT);
  $email = $request->getParam('email');
  
  try {
      $conn = new DBConnection();
      $db = $conn->mConnect();
      $query = "SELECT * FROM users where email = '$email'";
      $execute = $db->query($query);
      $user = $execute->fetchAll(PDO::FETCH_OBJ);
      if (empty($user)) {
        $query = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        echo '{
                "message": "user created",
                "status": 200,
              }';
      } else {
        echo '{ 
                "message": "user already registrered",
                "status": 409
              }';        
      }

  } catch(PDOException $e) {
      echo '{"error":'. $e->getMessage() .'}';
  }
}
function updateUser($request) {
  $id = $request->getAttribute('id');
  $username = $request->getParam('username');
  $passHash = $request->getParam('password');
  $password = password_hash($passHash, PASSWORD_DEFAULT);
  $email = $request->getParam('email');

  $query = "UPDATE users SET 
                  username = :username,
                  password = :password,
                  email    = :email
            WHERE id = $id";
  try {
      $conn = new DBConnection();
      $db = $conn->mConnect();

      $stmt = $db->prepare($query);
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      echo '{ 
              "message": "user updated",
              "status": 200 
            }';
  } catch(PDOException $e) {
      echo '{
              "error":'. $e->getMessage() .',
              "status": 409 
            }';
  }
}
function deleteUser($request) {
  $id = $request->getAttribute('id');
  $query = "DELETE FROM users where id = $id";
  try {
      $db = new DBConnection();
      $db = $db->mConnect();
      $execute = $db->query($query);
      $db = null;
      
      echo '{ 
              "message": "user deleted",
              "status": 200
            }';
  } catch(PDOException $e) {
      echo '{
        "error":'. $e->getMessage() .',
        "status": 409 
      }';
  }
}
function login($request, $response) {
  $email = $request->getParam('email');
  $password = $request->getParam('password');
  $query = "SELECT * FROM users where email = '$email'";

  try {
      $db = new DBConnection();
      $db = $db->mConnect();
      $execute = $db->query($query);
      $user = $execute->fetchAll(PDO::FETCH_OBJ);
      $db = null;
      if(empty($user)) {
        echo '{ 
                "error": "User doesn´t exits",
                "status": 404
              }';
      } else {
        $hash = $user[0]->password;
        if (password_verify($password, $hash)) {
          echo '{
                  "message": "login success",
                  "status": 200
                }';
        } else {
          echo '{
                  "error": "email/password invalid",
                  "status": 409,
                }';
        }
      }
      
  } catch(PDOException $e) {
      echo '{
              "error":'. $e->getMessage() .',
              "status": 409 
            }';
  } 
}
