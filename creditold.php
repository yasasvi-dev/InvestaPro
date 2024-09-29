<form action="" method="post" style="background-color: lightgreen;" data-aos="fade-up" data-aos-delay="400">
                    <?php
                    $sql = "SELECT cno, cname, ano FROM customer";
                    $result = $conn->query($sql);
                    ?>
                    <div class="row gy-4 col-lg-6">
                        <input type="date" name="date" id="date" class="form-control w-100" placeholder="Date">
                        <select class="form-control w-100" id="customer" name="customer">
                            <option value="">Select customer</option>
                            <?php
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value = '{$row['cno']}-{$row['ano']}'>{$row['cname']}</option>";
                                }
                            }
                            ?>
                        </select>
                        <input type="text" name="amount" id="amount" class="form-control w-100" placeholder="Amount">
                        <input type="text" name="account_type" id="account_type" class="form-control w-100" value="Credit" disabled>

                      <div></div>
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
                          if ($account_type == 'Credit') {
                              $stmt = $conn->prepare("INSERT INTO account (cno, ano, date, acctype, amount) VALUES (?, ?, ?, ?, ?)");
                              $stmt->bind_param("iissd", $cno, $ano, $date, $account_type, $amount);
                          } else {  // If account_type is 'Collection', negate the amount
                              $amount = -$amount;
                              $stmt = $conn->prepare("INSERT INTO account (cno, ano, date, acctype, amount) VALUES (?, ?, ?, ?, ?)");
                              $stmt->bind_param("iissd", $cno, $ano, $date, $account_type, $amount);
                          }

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

this form not sending data