<?php
$host = "localhost";
$user = "root"; 
$pass = "";
$dbname = "registration_db";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if($conn->connect_error){
    die("Connection Failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    // Insert query
    $sql = "INSERT INTO registrations (fullname, email, phone, course)
            VALUES ('$fullname', '$email', '$phone', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo "
        <html>
        <head>
        <title>Registration Successful</title>
        <style>
          body {font-family: Arial; background-color: #e3fdfd; padding: 20px;}
          .box {background-color: white; padding: 20px; border-radius: 10px; width: 400px; margin: auto; text-align: center;}
          h2 {color: #09b8da;}
        </style>
        </head>
        <body>
          <div class='box'>
            <h2>Registration Successful!</h2>
            <p><strong>Name:</strong> $fullname</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Course:</strong> $course</p>
          </div>
        </body>
        </html>";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
