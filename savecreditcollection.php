<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "payglitz";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$date = $_POST['date'];
$customer_data = $_POST['customer'];  // This will contain 'cno-ano'
$amount = $_POST['amount'];
$account_type = $_POST['account_type'];  // Always 'Credit'/'Collection'

// Split the customer data to get 'cno' and 'ano'
list($cno, $ano) = explode('-', $customer_data);

if ($account_type = 'Credit'){
    // Prepare and bind the SQL statement to insert into the 'account' table
    $stmt = $conn->prepare("insert INTO account (cno, ano, date, acctype, amount) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iissi", $cno, $ano, $date, $account_type, $amount);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New account record added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}
else{
    $amount * (-);
    // Prepare and bind the SQL statement to insert into the 'account' table
    $stmt = $conn->prepare("insert INTO account (cno, ano, date, acctype, amount) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iissi", $cno, $ano, $date, $account_type, $amount);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New account record added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }
}

// Close the connections
$stmt->close();
$conn->close();
?>
