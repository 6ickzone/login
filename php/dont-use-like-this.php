<?php
// 💀 VULNERABLE CODE - EDUCATIONAL PURPOSE ONLY
// DO NOT USE IN PRODUCTION!

// Database Connection
$conn = mysqli_connect("localhost", "root", "", "test_db");

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ❌ CRITICAL FLAW: Input is directly concatenated
    // Vulnerable to SQL Injection attacks
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    
    $result = mysqli_query($conn, $query);

    // Check for matching user
    if(mysqli_num_rows($result) > 0) {
        echo "<h1>Login Successful! (Vulnerable Script)</h1>";
        echo "<p>Executed Query: " . $query . "</p>"; // Display query for analysis
    } else {
        echo "Login Failed.";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit" name="login">Login (Unsafe)</button>
</form>
