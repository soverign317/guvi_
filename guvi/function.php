<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "guvi");


if(isset($_POST["action"])){
  if($_POST["action"] == "register"){
    register();
  }
  else if($_POST["action"] == "login"){
    login();
  }
}

function register(){
  global $conn;

  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $age = $_POST["age"];
  $dob = $_POST["dob"];
  $contact = $_POST["contact"];


  if(empty($name) || empty($email) || empty($password) || empty($age) || empty($dob) || empty($contact)){
    echo "complete the form!";
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM guvi_3 WHERE email = '$email'");
  if(mysqli_num_rows($user) > 0){
    echo "email Has Already Taken";
    exit;
  }
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
   
 }
 else{
    echo("$email is not a valid email address");
    exit;
 }
  $query = "INSERT INTO guvi_3 VALUES('', '$name', '$email', '$password', '$age', '$dob', '$contact')";
  mysqli_query($conn, $query);
  echo "Registration Successful";
}


function login(){
  global $conn;

  $email = $_POST["email"];
  $password = $_POST["password"];

  $user = mysqli_query($conn, "SELECT * FROM guvi_3 WHERE email = '$email'");

  if(mysqli_num_rows($user) > 0){

    $row = mysqli_fetch_assoc($user);

    if($password == $row['password']){
      echo "Login Successful";
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "User Not Registered";
    exit;
  }
}
?>
