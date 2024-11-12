<?php
class ContactForm {
    private $name;
    private $email;
    private $message;

    // Constructor to initialize the contact form data
    public function __construct($name, $email, $message) {
        $this->name = htmlspecialchars(strip_tags($name)); // Sanitize name input
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitize email
        $this->message = htmlspecialchars(strip_tags($message)); // Sanitize message
    }

    // Method to validate the email
    public function isEmailValid() {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL) !== false;
    }

    // Method to save the message to a file (or database in a real scenario)
    public function save() {
        $data = "Name: $this->name\nEmail: $this->email\nMessage: $this->message\n\n";
        file_put_contents('messages.txt', $data, FILE_APPEND);
    }
}
?>
