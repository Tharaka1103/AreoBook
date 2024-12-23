<?php
// Database connection details
require_once 'config.php';

$message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate input data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
    $message_text = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO contact_submissions (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $subject, $message_text);

    if ($stmt->execute()) {
        $message = "<div class='success-message'>Thank you for your message. We'll get back to you soon!</div>";
    } else {
        $message = "<div class='error-message'>Oops! Something went wrong. Please try again later.</div>";
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Areobook</title>
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/index.css">

</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="images/logo.jpg" alt="Areobook Logo">
            </div>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="flight.php">Flights</a></li>
                <li><a href="#destinations">Popular Destinations</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
            <div class="user-actions">
                <?php
                if (isset($_SESSION['username'])) {
                    echo '<span class="username">Welcome, ' . htmlspecialchars($_SESSION['username']) . '</span>';
                    echo '<a href="logout.php" class="btn">Logout</a>';
                } else {
                    echo '<a href="login.php" class="btn">Login</a>';
                }
                ?>
            </div>
        </nav>
    </header>

    <main class="contact-container">
        <div class="contact-left">
            <img src="images/3.jpg" alt="Customer Support" class="contact-image">
            <div class="contact-info">
                <h2>Get in Touch</h2>
                <p><strong>Address:</strong> 123 Aviation Street, Sky City, SC 12345</p>
                <p><strong>Phone:</strong> +1 (555) 123-4567</p>
                <p><strong>Email:</strong> support@areobook.com</p>
                <p><strong>Hours:</strong> Monday - Friday, 9am - 6pm</p>
            </div>
        </div>
        <div class="contact-right">
            <h2>Contact Us</h2>
            <div id="message-container"></div>
            <form id="contact-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit">Send Message</button>
            </form>
        </div>
    </main>

    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3>About Areobook</h3>
                <p>Areobook is your trusted partner for hassle-free flight bookings and travel planning. We're committed to making your journey extraordinary.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#search">Search Flights</a></li>
                    <li><a href="#destinations">Destinations</a></li>
                    <li><a href="#services">Our Services</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>Email: info@areobook.com</p>
                <p>Phone: +1 (555) 123-4567</p>
                <p>Address: 123 Aviation St, Sky City, SC 12345</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Areobook. All rights reserved.</p>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var messageContainer = document.getElementById('message-container');
            var message = <?php echo json_encode($message); ?>;
            if (message) {
                messageContainer.innerHTML = message;
                messageContainer.scrollIntoView({behavior: 'smooth'});
            }
        });
    </script>
</body>
</html>
