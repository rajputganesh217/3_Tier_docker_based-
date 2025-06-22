<?php
$name    = $_POST["name"];
$email   = $_POST["email"];
$website = $_POST["website"];
$comment = $_POST["comment"];
$gender  = $_POST["gender"];

$servername = "your server name";
$username   = "root";
$password   = "your password";
$dbname     = "your database name";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Start HTML Output
echo '<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submission Confirmation</title>
  <style>
    body {
      background-color: #eaf6f6;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
    }
    .container {
      max-width: 600px;
      margin: 60px auto;
      background-color: #ffffff;
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      color: #2c3e50;
    }
    h2 {
      text-align: center;
      color: #27ae60;
    }
    .info {
      margin-top: 20px;
      padding: 15px;
      background-color: #f0f9f0;
      border: 1px solid #d4edda;
      border-radius: 6px;
    }
    .info p {
      margin: 10px 0;
      font-size: 16px;
    }
    .error {
      color: #e74c3c;
      text-align: center;
    }
  </style>
</head>
<body>
<div class="container">';
?>

<?php
if (!$conn) {
    echo '<p class="error">Connection failed: ' . mysqli_connect_error() . '</p>';
} else {
    $sql = "INSERT INTO users (name,email,website,comment,gender)
            VALUES('$name','$email','$website','$comment','$gender')";

    if (mysqli_query($conn, $sql)) {
        echo '<h2>🎉 Submission Successful!</h2>';
        echo '<div class="info">';
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Website:</strong> $website</p>";
        echo "<p><strong>Comment:</strong> $comment</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo '</div>';
    } else {
        echo '<p class="error">❌ Error: ' . $sql . "<br>" . mysqli_error($conn) . '</p>';
    }
    mysqli_close($conn);
}
?>

<?php
// Close HTML tags
echo '</div></body></html>';
?>