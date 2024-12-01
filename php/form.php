<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["Email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    
    $to = "captureco12@gmail.com"; 
    $headers = "From: $email\r\n";
    
    if (mail($to, $subject, $message, $headers)) {
        $successMessage = "Message sent successfully!";
    } else {
        $errorMessage = "Message delivery failed. Please try again later.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submission</title>
</head>
<body>
    <?php if (isset($successMessage)) { ?>
        <p><?php echo $successMessage; ?></p>
    <?php } elseif (isset($errorMessage)) { ?>
        <p><?php echo $errorMessage; ?></p>
    <?php } ?>
</body>
</html>
