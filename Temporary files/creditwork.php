<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PayGlitz - Credit</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <?php
  include "head.php";
  include "db.php";
  include "dbase.php";
  ?>
  
</head>

<body>

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <img src="assets/img/logo.png" alt="">
            <h1 class="sitename">PayGlitz</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="customer.php">Customer</a></li>
            <li><a href="credit.php" class="active">Credit</a></li>
            <li><a href="collection.php">Collection</a></li>
            <li><a href="report.php">Report</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <a class="btn-getstarted" href="index.php">Log Out</a>
        </div>
    </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up"><span>Credit</span></h1>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <center>
              <div class="p-5">
                <div class="col-lg-10">
                <form action="" method="post" style="background-color: lightgreen;" data-aos="fade-up" data-aos-delay="400">
    <?php
    // Ensure that the connection variable $conn is established
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch customers from the database
    $sql = "SELECT cno, cname, ano FROM customer";
    $result = $conn->query($sql);
    ?>
    
    <div class="row gy-4 col-lg-6">
        <!-- Date input -->
        <input type="date" name="date" id="date" class="form-control w-100" placeholder="Date" required>
        
        <!-- Customer dropdown -->
        <select class="form-control w-100" id="customer" name="customer" required>
            <option value="">Select customer</option>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['cno']}-{$row['ano']}'>{$row['cname']}</option>";
                }
            } else {
                echo "<option value=''>No customers available</option>";
            }
            ?>
        </select>

        <!-- Amount input -->
        <input type="number" step="0.01" name="amount" id="amount" class="form-control w-100" placeholder="Amount" required>

        <!-- Account type is hidden (since it's always Credit) -->
        <input type="hidden" name="account_type" id="account_type" value="Credit">
    </div>

    <button class="btn btn-get-started" type="submit">Submit</button>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ensure the connection variable $conn exists
        $date = $_POST['date'];
        $customer_data = $_POST['customer'];  // This will contain 'cno-ano'
        $amount = $_POST['amount'];
        $account_type = $_POST['account_type'];  // Always 'Credit'/'Collection'

        // Split customer data into cno and ano
        list($cno, $ano) = explode('-', $customer_data);

        // Ensure amount is a valid number (float or integer)
        $amount = floatval($amount);  // or intval() if you expect integers

        // Prepare and bind the SQL statement to insert into the 'account' table
        $stmt = $conn->prepare("INSERT INTO account (cno, ano, date, acctype, amount) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iissd", $cno, $ano, $date, $account_type, $amount);

        // Execute the statement and check for errors
        if ($stmt->execute()) {
            echo "New account record added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
    ?>
</form>

                </div>
              </div>
            </center>
          </div>
        </div>
      </div>
    </section><!-- Hero Section -->

    <div class="container-fluid contact py-0">
                <div class="container py-0">
                    <div class="container p-5 bg-light rounded">
                        <div class="container py-5 row g-4 justify-content-center">
                            <?php
                                $str1 = "SELECT * FROM account WHERE amount >= 0";
                                $rs1 = $bdd -> query ($str1) or die ("error on $str1");
                            ?>
                            <table class="table table-striped table-bordered" id="table1">
                                <thead>
                                    <tr>
                                        <th>Customer No.</th>
                                        <th>Account No.</th>
                                        <th>Date</th>
                                        <th>Account type</th>
                                        <th>Amount</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row1=$rs1 -> fetch()){ ?>
                                    <tr>
                                        <td> <?php echo $row1[0] ?> </td>
                                        <td> <?php echo $row1[1] ?> </td>
                                        <td> <?php echo $row1[2] ?> </td>
                                        <td> <?php echo $row1[3] ?> </td>
                                        <td> <?php echo $row1[4] ?> </td>
                                        <td> <input
                                                type="button"
                                                value="Edit"
                                                class="form-control text-white bg-success"
                                                id=<?php echo $row1[0] ?>
                                                onclick="editcredit(this.id)">
                                        </td>
                                        <td> <input
                                                type="button"
                                                value="Del"
                                                class="form-control text-white bg-danger"
                                                id=<?php echo $row1[0] ?>
                                                onclick="deletecredit(this.id)">
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><br>

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">PayGlitz</span>
          </a>
          <div class="footer-contact pt-3">
            <p>123, Fort Street</p>
            <p>Galle, Sri Lanka</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+94 77 345 6789</span></p>
            <p><strong>Email:</strong> <span>payglitz@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">PayGlitz</strong><span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by Yasasvi Jayoda
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <?php
  include "foot.php";
  ?>

  <script type="text/javascript">
    // function savecredit(){
    //     var vals = $("input").map(function(){return $(this).val()}).get()
    //     alert("Success");
    //     $.ajax({
    //         type:'post',
    //         data:{pvals:vals},
    //         url:'savecredit.php',
    //         success:function (json){
    //             $("#creditdata").html(json);
    //             // location.reload();
    //         }
    //     });
    // }
    
    $(document).ready(function(){
                $('#table1').DataTable({
                    dom: 'Bfrtip',
                    order: [],
                    pageLength: 10,
                    buttons: [ 'copy', 'excel', 'pdf','print','colvis'],
                    responsive: true
                });
                $("#creditform").submit(function(e) {
                    e.preventDefault();
                    find();
                });
            });

    </script>

</body>

</html>