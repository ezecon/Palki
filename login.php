<?php

// Connect to your MySQL database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "palki";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Process login form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  $username = $_POST["username"];
  $password = $_POST["password"];
  if($username=='')
  {
      echo "<script>alert('Enter Username');</script>";
  }
  else if($password=='')
  {
      echo "<script>alert('Enter password');</script>";
  }
  else if($password==''&& $username=='')
  {
      echo "<script>alert('Enter username and password');</script>";
  }
  else
  {
      $sql = "SELECT username, password FROM user_info WHERE username='$username'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          if (password_verify($password, $row["password"])) {
              header("Location: google.com");
              $_SESSION['username'] = $row['username'];
              exit;
          } else {
              echo "<script>alert('Incorrect password');</script>";
          }
      } else {
        echo "<script>alert('Incorrect username');</script>";
      }
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Login Page</title>
</head>
<body>
    <section>

    <div class="container">
        <h1>Log In Form</h1>
    <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter Username</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password"class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button><br>
  <a href="signup.php">not have an account?</a>
</form>
    </div>
    </section>
</body>
</html>