<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $fullName = htmlspecialchars($_POST['fullName']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $apartmentType = htmlspecialchars($_POST['apartmentType']);
    $moveInDate = htmlspecialchars($_POST['moveInDate']);
    $message = htmlspecialchars($_POST['message']);

    // Database connection details
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $password = "";     // Replace with your database password
    $dbname = "apartment_rental";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the table
    $sql = "INSERT INTO rental_applications (full_name, email, phone, apartment_type, move_in_date, message) 
            VALUES ('$fullName', '$email', '$phone', '$apartmentType', '$moveInDate', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Data insertion successful, retrieve and display the data
        echo "<h1>Submission Successful!</h1>";
        echo "<h2>Submitted Data:</h2>";
        echo "<p><strong>Full Name:</strong> $fullName</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone Number:</strong> $phone</p>";
        echo "<p><strong>Apartment Type:</strong> $apartmentType</p>";
        echo "<p><strong>Move-in Date:</strong> $moveInDate</p>";
        echo "<p><strong>Message:</strong><br>" . nl2br($message) . "</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
} else {
    header('Location: form.html');
    exit;
}
?>
