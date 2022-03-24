<?php
  session_start();
  require_once('functions.php');

  if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header('location: login.php');
  }
  $username = $_POST['username'];
  $password = $_POST['password'];

  $url = SERVER . "login";
  $data = array('username' => $username, 'password' => $password);
  
  $options = array(
      'http' => array(
          'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
          'method'  => 'POST',
          'content' => http_build_query($data)
      )
  );
  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  if ($result === FALSE) {
    header('location: login.php');
    return;
  }
  $resultDecoded = json_decode($result);
  $_SESSION['token'] = $resultDecoded->token;
  $_SESSION['username'] = $username;
  header('location: index.php');
  
?>
