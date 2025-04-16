<?php
// connection_start
include("connection.php");
// connection_end

// Default message variable
$message = '';

if (isset($_POST["sub"])) {
    // Get and sanitize the form data
   
    $name =  mysqli_real_escape_string($con, $_POST["name"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $subject = mysqli_real_escape_string($con, $_POST["subject"]);
    $feedback = mysqli_real_escape_string($con, $_POST["feedback"]);
    

    // SQL query to insert data into the database
    $insert = "insert into contact_data(name, email, subject, message) values( '$name', '$email', '$subject', '$feedback')";
  

    // Execute the query
    if (mysqli_query($con, $insert)) {
        echo "<script>
                window.location.href = 'FormSuccess.php?message=' + encodeURIComponent('Form submitted successfully!');
              </script>";
    } else {
        echo "<script>
                window.location.href = 'FormFailure.php?message=' + encodeURIComponent('Form submission failed. Please try again.');
              </script>";
    }
    exit();
    
    
    
}
?>

