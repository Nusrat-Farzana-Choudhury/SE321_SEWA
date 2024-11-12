<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
    <h2>Contact Us</h2>
    <?php
    // Include the ContactForm class
    require 'ContactForm.php';

    // Initialize an empty message for feedback
    $feedback = '';

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Create a ContactForm instance
        $contactForm = new ContactForm($name, $email, $message);

        // Validate email and save data if valid
        if ($contactForm->isEmailValid()) {
            $contactForm->save();
            $feedback = "Thank you! Your message has been saved.";
        } else {
            $feedback = "Please enter a valid email address.";
        }
    }
    ?>

    <!-- Display feedback message -->
    <p><?php echo $feedback; ?></p>

    <!-- Contact Form -->
    <form method="POST" action="contact.php">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" required></textarea><br><br>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
