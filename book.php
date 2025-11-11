<?php
// DEBUG: show errors during development (remove in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Only allow POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die("❌ Error: Only POST requests are allowed");
}

// Required fields
$required = ['name','email','room_type','check_in','check_out'];
foreach ($required as $f) {
    if (empty($_POST[$f])) {
        http_response_code(400);
        die("❌ Error: Missing required form data: $f");
    }
}

// DB connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    http_response_code(500);
    die("❌ Connection failed: " . $conn->connect_error);
}

// Get and sanitize (basic)
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$room_type = trim($_POST['room_type']);
$check_in = trim($_POST['check_in']);
$check_out = trim($_POST['check_out']);

// Optional: validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    die("❌ Error: Invalid email format");
}

// If your form returns dates in DD-MM-YYYY, convert them to YYYY-MM-DD
function convertToIsoDate($d) {
    // if already YYYY-MM-DD, return as is
    if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $d)) return $d;
    if (preg_match('/^\d{2}-\d{2}-\d{4}$/', $d)) {
        list($dd,$mm,$yy) = explode('-', $d);
        return "$yy-$mm-$dd";
    }
    return $d; // leave as-is
}
$check_in = convertToIsoDate($check_in);
$check_out = convertToIsoDate($check_out);

// Prepared statement
$stmt = $conn->prepare("INSERT INTO bookings (name, email, room_type, check_in, check_out) VALUES (?, ?, ?, ?, ?)");
if (!$stmt) {
    http_response_code(500);
    die("❌ Prepare failed: " . $conn->error);
}
$stmt->bind_param("sssss", $name, $email, $room_type, $check_in, $check_out);

if ($stmt->execute()) {
    http_response_code(200);
    echo "<html><body><h2>✅ Booking Confirmed!</h2><p>Thanks, ".htmlspecialchars($name)."</p></body></html>";
} else {
    http_response_code(500);
    echo "❌ Error inserting booking: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
