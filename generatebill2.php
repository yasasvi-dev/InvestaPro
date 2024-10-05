<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Collection Center - Bill Generation</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/9.jpg'); /* Add your background image URL here */
            background-size: cover; /* Cover the entire screen */
            background-repeat: no-repeat; /* Prevents repeating the image */
            color: white; /* Default text color */
        }
        .container {
            margin-top: 50px;
        }
        .bill-preview {
            border: 1px solid #ced4da; 
            padding: 20px;
            margin-top: 20px;
            background-color: #fff;
        }
        .btn-generate {
            margin-top: 20px;
        }
        .card {
            width: 100%;
            max-width: 1000px;          
            padding: 30px; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent */
        }
        .card-header {
            background-color: #007bff; /* Bootstrap primary color */
            color: white; /* Title text color */
            font-family: 'Arial', sans-serif; /* Font for the header */
        }
        .card-body {
            font-family: 'Verdana', sans-serif; /* Font for card body */
            color: #333; /* Changed to a darker color for better contrast on white background */
        }
        h2 {
            font-family: 'Arial', sans-serif; /* Title font */
            text-align: center; /* Center align the heading */
            margin: 0; /* Remove default margin */
        }
        label {
            font-weight: bold; /* Make labels bold */
        }
        .bill-preview h3 {
            font-family: 'Arial', sans-serif; /* Font for Bill Preview heading */
        }
    </style>
</head>
<body>
    <?php
session_start();
if (!isset($_SESSION['UserID'])) {
    header("Location: login.php");
    exit();
}

include('db.php');

// Initialize bill variables
$billID = null;
$customerID = null;
$amount = null;
$transactionDate = null;

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['customerID'], $_POST['amount'], $_POST['transactionDate'])) {
    $customerID = $_POST['customerID'];
    $amount = $_POST['amount'];
    $transactionDate = $_POST['transactionDate'];

    // Validate the inputs
    if (empty($customerID) || empty($amount) || empty($transactionDate)) {
        die("All fields are required.");
    }

    try {
        // Insert the new bill into the Bills table
        $query = $bdd->prepare("INSERT INTO Bills (CustomerID, Amount, TransactionDate) VALUES (?, ?, ?)");
        $query->execute([$customerID, $amount, $transactionDate]);

        // Fetch the last inserted ID for confirmation
        $billID = $bdd->lastInsertId();

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Fetch customers for the dropdown
$customerQuery = $bdd->prepare("SELECT CustomerID, CustomerName FROM Customers");
$customerQuery->execute();
$customers = $customerQuery->fetchAll(PDO::FETCH_ASSOC);

// Fetch amounts for the dropdown
$amountQuery = $bdd->prepare("SELECT Amount FROM Account WHERE AccountType = 'Credit'");
$amountQuery->execute();
$amounts = $amountQuery->fetchAll(PDO::FETCH_ASSOC);

// Fetch transaction dates from the Account table
$dateQuery = $bdd->prepare("SELECT DISTINCT TransactionDate FROM Account WHERE AccountType = 'Credit'");
$dateQuery->execute();
$dates = $dateQuery->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h1 class="text-center">Generate Bill</h1>

    <!-- Start of the card for the form -->
    <div class="card">
        <div class="card-header">Bill Generation Form</div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="customerID" class="form-label">Customer</label>
                    <select name="customerID" id="customerID" class="form-control" required>
                        <option value="" disabled selected>Select Customer</option>
                        <?php foreach ($customers as $customer): ?>
                            <option value="<?php echo $customer['CustomerID']; ?>" <?php if ($customerID == $customer['CustomerID']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($customer['CustomerName']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <select name="amount" id="amount" class="form-control" required>
                        <option value="" disabled selected>Select Amount</option>
                        <?php foreach ($amounts as $amt): ?>
                            <option value="<?php echo $amt['Amount']; ?>" <?php if ($amount == $amt['Amount']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($amt['Amount']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="transactionDate" class="form-label">Transaction Date</label>
                    <select name="transactionDate" id="transactionDate" class="form-control" required>
                        <option value="" disabled selected>Select Transaction Date</option>
                        <?php foreach ($dates as $date): ?>
                            <option value="<?php echo $date['TransactionDate']; ?>" <?php if ($transactionDate == $date['TransactionDate']) echo 'selected'; ?>>
                                <?php echo htmlspecialchars($date['TransactionDate']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Generate Bill</button>
            </form>
        </div>
    </div>
    <!-- End of the card for the form -->

    <?php if ($billID): // Show the bill if generated ?>
        <div class="card mt-4">
            <div class="card-header">Bill Details</div>
            <div class="card-body">
                <h5>Bill ID: <?php echo $billID; ?></h5>
                <p><strong>Customer ID:</strong> <?php echo htmlspecialchars($customerID); ?></p>
                <p><strong>Amount:</strong> <?php echo htmlspecialchars($amount); ?></p>
                <p><strong>Transaction Date:</strong> <?php echo htmlspecialchars($transactionDate); ?></p>
                <p><strong>Status:</strong> Bill generated successfully!</p>
            </div>
        </div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>