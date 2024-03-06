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
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $fullname= $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $mobile= $_POST['mobile'];
    $password=password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql="INSERT INTO user_info (fullname, username, email, number, password) VALUES ('$fullname','$username','$email','$mobile','$password')";
    if ($conn->query($sql)) {
        echo "<script>alert('Account created successfully');</script>";
    } else {
        echo "<script>alert('Error creating account. Please try again later.'); </script>";
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
        <h1>Signup Form</h1>
    <form action="signup.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fullname</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="fullname"aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1"name="username"aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email"id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Phone</label>
    <input type="tel" class="form-control" id="exampleInputEmail1" name="mobile" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button><br>
</form>
    </div>
    </section>
</body>
</html>