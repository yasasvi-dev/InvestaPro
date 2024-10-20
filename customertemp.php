<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PayGlitz - Customer</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <?php
  include "head.php";
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
            <li><a href="customer.php" class="active">Customer</a></li>
            <li><a href="credit.php">Credit</a></li>
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
          <h1 data-aos="fade-up"><span>Customer</span></h1>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <center>
              <div class="p-5">
                <div class="col-lg-10">
                  <form action="savecustomer.php" id="customerform" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
                    <div class="row gy-4 col-lg-8">

                        <input type="text" name="cname" id="cname" class="form-control w-100" placeholder="Name" required="">
                        <input type="text" name="cadd" id="cadd" class="form-control w-100" placeholder="Address" required="">
                        <input type="text" name="ctel" id="ctel" class="form-control w-100" placeholder="Tel. No" required="">

                      <div></div>
                    </div>
                    <button class="btn btn-get-started" type="submit" >Submit</button>
                    <div id="customerdata" class="d-none"></div>
                  
</form>
                </div>
              </div>
              
              <form>
                          
                                <div class="row">
                                    <div class="col-4">
                                        <label for="item">Item:</label>
                                        <select class="form-select" id="itm" name="itm">
                                        <option value="">Select an item</option>
                                            <option value="Apple">Apple</option>
                                            <option value="Banana">Banana</option>
                                            <option value="Mango">Mango</option>
                                            <option value="Grapes">Grapes</option>
                                            <option value="Cherry">Cherry</option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <label for="weight">Weight:</label>
                                        <input type="text" class="form-control" id="wei" name="wei" placeholder="kg">
                                    </div>
                                    <div class="col-4">
                                        <label for="price">Price:</label>
                                        <input type="text" class="form-control" id="pri" name="pri" placeholder="Rs">
                                    </div>
                                    <!-- <div class="col-3">
                                        <br>
                                        <button type="submit" class="btn btn-primary justify-content">SET</button>
                                    </div> -->
                                </div>
                            </form>
                            <div class="d-flex justify-content-center">
                                <button class="w-25 btn form-control border-secondary py-1 px-1 bg-white text-primary" type="button" onclick="add()" id="additm">Add</button>
                            </div><br>
                            <div class="d-flex justify-content-center">
                                <input type="text" id="itemdata1" class="form-control" value="">
                            </div>
            </center>
          </div>
        </div>
      </div>
    </section><!-- Hero Section -->
    <div id="collectiondata"></div>
    <div class="container-fluid contact py-0">
                <div class="container py-0">
                    <div class="container p-5 bg-light rounded">
                        <div class="container py-5 row g-4 justify-content-center">
                            <?php
                                $str1 = "SELECT * FROM customer order by cno";
                                $rs1 = $bdd -> query ($str1) or die ("error on $str1");
                            ?>
                            <table class="table table-striped table-bordered" id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Tel.No</th>
                                        <th>Account No</th>
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
                                                onclick="editcustomer(this.id)">
                                        </td>
                                        <td> <input
                                                type="button"
                                                value="Del"
                                                class="form-control text-white bg-danger"
                                                id=<?php echo $row1[0] ?>
                                                onclick="deletecustomer(this.id)">
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
        function savecustomer(){
                var vals = $("input").map(function(){return $(this).val()}).get()
                // alert("Success");
                $.ajax({
                    type:'post',
                    data:{pvals:vals},
                    url:'savecustomer.php',
                    success:function (json){
                        $("#customerdata").html(json);
                        location.reload();
                    }
                });
        }

        $(document).ready(function(){
                $('#table1').DataTable({                 
                    dom: 'Bfrtip',
                    order: [],
                    pageLength: 10,
                    buttons: [ 'copy', 'excel', 'pdf','print','colvis'],
                    responsive: true
                });
                /*
                $("#customerform").submit(function(e) {
                    e.preventDefault();
                    find();
                });
                */
                 $("#customerform").submit(function(e) {
                  var vals = $(":input").map(function(){return $(this).val();}).get();

                   e.preventDefault();
                   alert(vals)
                   
                   $.ajax({
                        type:'post',
                        data:{pvals:vals},
                        url:'itemsave.php',
                        success:function (json){
                          alert(json);
                            $("#collectiondata").html(json);
                        }
                    });
                });
            });
                 
            // function add(){
            //     var vals = $("#itemdata1").val();
            //     alert(vals)
            //     $.ajax({
            //         type:'post',
            //         data:{pvals:vals},
            //         url:'additem.php',
            //         success:function(json){$("#collectiondata").html(json);}
            //     })
            // }
            function add() {
                
                var item = $("#itm").val().trim();
                var weight = $("#wei").val().trim();
                var price = $("#pri").val().trim();

                
                if (item && weight && price) {
                    var vals = $("#itemdata1").val() + item + ":" + weight + ":" + price + "#";
                    $("#itemdata1").val(vals);
                    
                    $.ajax({
                        type: 'post',
                        data: { pvals: $("#itemdata1").val()},
                        url: 'additem.php',
                        success: function (json) {
                            $("#collectiondata").html(json); 
                            $("#item, #weight, #price").val("");
                        }
                    });
                } else {
                    alert("Please fill in all fields.");
                }
            }
    </script>
    

</body>

</html>