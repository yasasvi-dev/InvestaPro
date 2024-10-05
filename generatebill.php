<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credit Collection Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .bill-form {
            max-width: 500px;
            margin: 20px auto;
        }
        .bill-form label {
            display: block;
            margin: 10px 0 5px;
        }
        .bill-form input, .bill-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .bill-container {
            max-width: 700px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .bill-header {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .bill-content {
            margin-bottom: 15px;
        }
        .bill-content strong {
            font-weight: bold;
        }
        .generate-bill-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .generate-bill-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body style="background-image: url('img/glitter.jpg'); background-size: cover; background-position: center center;">

    <div class="bill-form">
        <center><h2><i>Enter Bill Details</i></h2></center>
        <label for="cno">Customer Number (Cno):</label>
        <input type="text" id="cno" placeholder="Enter Customer Number">

        <label for="cname">Customer Name:</label>
        <input type="text" id="cname" placeholder="Enter Customer Name">

        <label for="cadd">Customer Address:</label>
        <textarea id="cadd" rows="3" id="cadd"  placeholder="Enter Customer Address"></textarea>

        <label for="duedate">Due Date:</label>
        <input type="date" id="duedate">

        <label for="amount">Amount Due:</label>
        <input type="number" id="amount" placeholder="Enter Amount Due">

        <label for="invoice">Invoice Number:</label>
        <input type="text" id="invoice" placeholder="Enter Invoice Number">

        <button class="generate-bill-btn">Generate Bill</button>
    </div>

    <div class="bill-container" id="bill" style="display:none;">
        <div class="bill-header">Credit Collection Center</div>
        <div class="bill-content">
            <strong>Customer Number (Cno):</strong> <span id="display-cno"></span>
        </div>
        <div class="bill-content">
            <strong>Customer Name:</strong> <span id="display-cname"></span>
        </div>
        <div class="bill-content">
            <strong>Customer Address:</strong> <span id="display-cadd"></span>
        </div>
        <div class="bill-content">
            <strong>Invoice Number:</strong> <span id="display-invoice"></span>
        </div>
        <div class="bill-content">
            <strong>Due Date:</strong> <span id="display-duedate"></span>
        </div>
        <div class="bill-content">
            <strong>Amount Due:</strong> RS.<span id="display-amount"></span>
        </div>
        <div class="bill-footer" style="margin-top: 20px; font-style: italic;">
            Thank you for your payment. For any queries, contact us.
        </div>
    </div>
    <a href="index.php" class="nav-item nav-link"><b>Log out</b></a>

    <script src="assets/js/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle the Generate Bill button click
            $(".generate-bill-btn").on("click", function() {
                // Get input values
                var cno = $("#cno").val();
                var cname = $("#cname").val();
                var cadd = $("#cadd").val();
                var duedate = $("#duedate").val();
                var amount = $("#amount").val();
                var invoice = $("#invoice").val();

                // Validate inputs (basic validation)
                if (!cno || !cname || !cadd || !duedate || !amount || !invoice) {
                    alert("Please fill all fields before generating the bill.");
                    return;
                }

                // Display the bill with the entered values
                $("#display-cno").text(cno);
                $("#display-cname").text(cname);
                $("#display-cadd").text(cadd);
                $("#display-duedate").text(duedate);
                $("#display-amount").text(parseFloat(amount).toFixed(2));
                $("#display-invoice").text(invoice);

                // Show the bill container
                $("#bill").show();
            });
        });
    </script>

</body>
</html>
