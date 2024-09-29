<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $date = $_POST['date'];
    $customer_data = $_POST['customer'];  // This will contain 'cno-ano'
    $amount = $_POST['amount'];
    $account_type = $_POST['account_type'];  // Always 'Credit'/'Collection'

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
    $stmt->close();
    $conn->close();
}
?>
