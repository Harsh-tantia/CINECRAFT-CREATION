<?php
// Start session (optional if you're using session to store user data)
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input values
    $name = htmlspecialchars($_POST["full_name"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST["description"]);
    
    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $subject = "New Contact Form Submission from $name";
        $to = "captureco12@gmail.com"; 
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        
        // Send email
        if (mail($to, $subject, $message, $headers)) {
            $successMessage = "Message sent successfully!";
        } else {
            $errorMessage = "Message delivery failed. Please try again later.";
        }
        
        // Optionally, set a cookie for tracking or session purposes
        setcookie("lastSubmitted", time(), time() + (86400 * 30), "/");  // Cookie expires in 30 days
    } else {
        $errorMessage = "Invalid email address.";
    }
}

// Optional: Check if the user has visited previously by reading the cookie
if (isset($_COOKIE["lastSubmitted"])) {
    echo "Last form submission: " . date("Y-m-d H:i:s", $_COOKIE["lastSubmitted"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Submission</title>
</head>
<body>
    <h1>Contact Form</h1>
    
    <!-- Display success or error message -->
    <?php if (isset($successMessage)) { ?>
        <p style="color: green;"><?php echo $successMessage; ?></p>
    <?php } elseif (isset($errorMessage)) { ?>
        <p style="color: red;"><?php echo $errorMessage; ?></p>
    <?php } ?>

    <!-- Form for user submission -->
    <form action="your-form-handler.php" method="POST">
        <div class="input-field">
            <input type="text" name="full_name" placeholder="Full Name" required>
        </div>
        <div class="input-field">
            <input type="email" name="email" placeholder="Email Address" required>
        </div>
        <div class="input-field">
            <textarea name="description" placeholder="Description" required></textarea>
        </div>
        <div class="submit-button">
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>

