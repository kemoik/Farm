<?php
if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (empty($_POST["firstname"])) {
    die("Name is required");
}
if (empty($_POST["lastname"])) {
    die("Name is required");
}
if (empty($_POST["number"])) {
    die("Phone Number is required");
}
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/connect.php";
print_r($_POST);

$sql = "INSERT INTO customers (email,firstname,lastname,number, password_hash)
        VALUES (?, ?, ?,?,?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sssis",
                  $_POST["email"],
                  $_POST["firstname"],
                  $_POST["lastname"],
                  $_POST["number"],
                  $password_hash);
                  
if ($stmt->execute()) {

    header("Location: index.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

 