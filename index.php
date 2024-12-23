<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Areobook - Your Flight Booking Partner</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="images/logo.jpg" alt="Areobook Logo">
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
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

    <main>
        <section id="home" class="hero">
            <h1>Discover the World with Areobook</h1>
            <p>Find and book your perfect flight today!</p>
            <a href="#search" class="cta-btn">Start Your Journey</a>
        </section>

        <section id="search" class="search-section">
            <h2>Search for Flights</h2>
            <form class="search-form">
                <div class="form-group">
                    <label for="from">From</label>
                    <input type="text" id="from" name="from" required>
                </div>
                <div class="form-group">
                    <label for="to">To</label>
                    <input type="text" id="to" name="to" required>
                </div>
                <div class="form-group">
                    <label for="departure">Departure Date</label>
                    <input type="date" id="departure" name="departure" required>
                </div>
                <div class="form-group">
                    <label for="return">Return Date</label>
                    <input type="date" id="return" name="return">
                </div>
                <button type="submit" class="search-btn">Search Flights</button>
            </form>
        </section>

        <section id="services" class="services-section">
            <h2>Our Services</h2>
            <div class="services-grid">
                <div class="service-card">
                    <img src="images/hotel.jpg" alt="Flight Booking">
                    <h3>Flight Booking</h3>
                    <p>Book your flights easily with our user-friendly platform.</p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
                <div class="service-card">
                    <img src="images/2.jpg" alt="Hotel Reservation">
                    <h3>Hotel Reservation</h3>
                    <p>Find and book the perfect accommodation for your stay.</p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
                <div class="service-card">
                    <img src="images/1.jpg" alt="Car Rental">
                    <h3>Comfatable</h3>
                    <p>Get a comfortable service with our staff services.</p>

                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
                <div class="service-card">
                    <img src="images/3.jpg" alt="Travel Insurance">
                    <h3>Travel Insurance</h3>
                    <p>Protect your trip with our travel insurance options.</p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
            </div>
        </section>

        <section id="destinations" class="destinations-section">
            <h2>Popular Destinations</h2>
            <div class="destination-grid">
                <div class="destination-card">
                    <img src="paris.jpg" alt="Paris">
                    <h3>Paris, France</h3>
                    <p>Experience the city of love and lights</p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
                <div class="destination-card">
                    <img src="tokyo.jpg" alt="Tokyo">
                    <h3>Tokyo, Japan</h3>
                    <p>Explore the vibrant metropolis of the East</p>
                    <a href="#" class="learn-more-btn">Learn More</a>
                </div>
                <div class="destination-card">
                    <img src="new-york.jpg" alt="New York">
                    <h3>New York, USA</h3>
                    <p>Discover the city that never sleeps</p>
                    <a href="#" class="learn-more-btn">Learn More</a>s
                </div>
            </div>
        </section>
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


    <script src="index-script.js"></script>
</body>
</html>
