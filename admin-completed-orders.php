<?php

session_start();
if(!isset($_SESSION['email']) || $_SESSION['email'] != 'sahmaxoptimum@gmail.com' ){
die(header("location:./admin-logout"));
}

?>


<?php 

function escape($string){
   return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0, shrink-to-fit=no, user-scalable=yes">
    <meta name="handheldfriendly" content="yes">
    <meta name="description" content="Account profile, details, information...">
    <meta name="keywords" content="dashboard, user">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Completed Orders</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/style.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
    
        <!-- JQUERY LIBRARY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <style>
    .dark-mode {
      background: #000;
      filter: invert(1) hue-rotate(180deg)
    }
   
    @media (min-width: 569px) {
        img{
            height: 140px;
        }
    }
    
    @media (max-width: 568px) {
        img{
            height: 220px;
        }
    }
    
    table#admintable {
      table-layout: fixed ;
      width: 500% ;
      border-collapse: collapse ;
    }
    
    table#admintable td {
      width: 50% ;
      padding: 10px ;
    }
    
    table#admintable caption {
      font-style: italic ;
    }

    </style>

  </head>

  <body>
    
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="admindashboard" class="app-brand-link">              
              <span class="app-brand-text demo menu-text fw-bolder ms-2" style="color:#FD7E14">Sahmax Admin</span>
            </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="admindashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Analytics">Manage Clients</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="rates" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar"></i>
                <div data-i18n="Analytics">Rates update</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="admin-verification-request" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Analytics">Verification requests</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="admin-active-buy-orders" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Analytics">Active Buy Orders</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="admin-active-sell-orders" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Analytics">Active Sell Orders</div>
              </a>
            </li>
            <li class="menu-item active">
              <a href="admin-completed-orders" class="menu-link">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Analytics">Completed Orders</div>
              </a>
            </li>
           
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a href="account-settings.php"
                    data-icon="octicon-star" 
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/Sahmax Optimum-html-admin-template-free on GitHub">
                    <span class="" style="text-transform:capitalize">Welcome Admin</span></a>
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="images/hero_1.jpg" alt class="w-px-40 rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                             <img src="images/hero_1.jpg" alt class="w-px-40 rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block" style="text-transform:capitalize">Sahmax Admin</span>
                             <small class="text-muted">Admin Account</small><br>
                             <small class="text-muted" style="font-size:12px";>Connected</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="../logout.php">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

               <br>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Completed Buy Orders</h5>
                 
                 <div class="table-responsive text-nowrap">
                    
                      <?php 
                    
                       include_once("pdoconfig.php");
                        
                        //get user ID from db
                        $payment_status = "1";
                        
                        $order_status = "closed";
            			    
        			    $stmt = $con->prepare("SELECT * from buy_order WHERE order_status = :order_status AND payment_status = :payment_status");
                        $stmt->bindParam(':payment_status', $payment_status);
                        $stmt->bindParam(':order_status', $order_status);
                        $stmt->execute();
                        while($row = $stmt->fetch()){
                           $id = $row['id'];
                           $user_id = $row['user_id'];
                           $payment_status = $row['payment_status'];
                           $order_id = $row['order_id'];
                           $order_status = $row['order_status'];
                           $dollar_type = $row['dollar_type'];
                           $account_details = $row['account_details'];
                           $amount_in_naira = $row['amount_in_naira'];
                           $receipt = $row['receipt'];
                           $pmid = $row['pmid'];
                           $address = $row['address'];
                           $network = $row['network'];
                            
                           //Formatted amount in Naira to be used in email message
                           $formatted_amount_in_naira = number_format($amount_in_naira, 2);
                       
                            $unformatted_date =  $row['date'];
                            $datestamp = strtotime($unformatted_date);
                            $date = date('d F Y', $datestamp);
                            
                            $unformatted_time =  $row['time'];
                            $timestamp = strtotime($unformatted_time);
                            $time = date('h:i A', $timestamp);
                            
                            
                            echo "<!-- Basic Bootstrap Table -->
                            <footer style='border: 1px solid #969696;'>
                              <div
                                class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'
                              >
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>Order type - $dollar_type USD | Order ID - $order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time<img src='images/star.gif' style='width:15px;height:15px'></a><br>
                                  <span>$date</span> | <span>Amount  - &#8358;$formatted_amount_in_naira | <img src='$receipt' style='width:50px;height:50px'> | <span style='color:#03C3EC'> closed </span><br><b>Paid to $account_details account</b> | 
                                  <b>Deposit to $pmid $address <br> $network</b>
                                </div>
                                <div>
                                <div class='form-check form-control-sm footer-link me-3'>
                                    <a class='dropdown-item' href='admin-update?uid=$user_id'><button type='button' class='btn btn-sm btn-outline-primary'>
                                     <i class='bx bx-user'></i> View profile</button></a>
                                  </div>
                                  
                                <div class='form-check form-control-sm footer-link me-3'>
                    				<button type='submit' name='dispute' class='btn btn-sm btn-outline-danger' disabled>Dispute</button>
                    			</div>
                                
                                <div class='form-check form-control-sm footer-link me-3'>
                    				<button type='submit' name='markdone' class='btn btn-sm btn-primary' disabled>Order Completed</button>
                    			</div>
                                
                              </div>
                            </footer>";
                            
                            }
            
                    ?>

                    
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Completed Sell Orders</h5>
                 
                 <div class="table-responsive text-nowrap">
                    
                    <?php 
                    
                    include_once("pdoconfig.php");
                        
                    $order_status = "closed";
                    $payment_status = "1";
                         
                    $stmt = $con->prepare("SELECT id , user_id, dollar_type , order_id , amount_in_usd , receipt , payment_status , order_status , time , date from sell_order WHERE order_status = :order_status AND payment_status = :payment_status");
                    $stmt->bindParam(':order_status', $order_status);
                    $stmt->bindParam(':payment_status', $payment_status);
                    $stmt->execute();
                    if($stmt){
                    while($row = $stmt->fetch()){
                        $id = $row['id'];
                        $user_id = $row['user_id'];
                        $payment_status = $row['payment_status'];
                        $order_id = $row['order_id'];
                        $order_status = $row['order_status'];
                        $dollar_type = $row['dollar_type'];
                        $amount_in_usd = $row['amount_in_usd'];
                        $receipt = $row['receipt'];
                        //Formatted amount in Naira to be used in email message
                        $formatted_amount_in_usd = number_format($amount_in_usd, 2);
                        
                        $unformatted_date =  $row['date'];
                        $datestamp = strtotime($unformatted_date);
                        $date = date('d F Y', $datestamp);
                        
                        $unformatted_time =  $row['time'];
                        $timestamp = strtotime($unformatted_time);
                        $time = date('h:i A', $timestamp);
                            
                        echo "<footer style='border: 1px solid #969696;'>
                              <div
                                class='container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3'
                              >
                                <div>
                                  <a href='javascript:void(0)' class='footer-text fw-bolder'>Order type - $dollar_type USD | Order ID - $order_id | <span style='width:10px;color:#03B0D4'><i class='bx bx-time'></i></span> $time</a><br>
                                  <span>$date</span> | <span>Amount  - &dollar;$formatted_amount_in_usd | <img src='$receipt' style='width:50px;height:50px'> | <span style='color:#03C3EC'> closed </span><br><b>Paid to $account_details account</b>
                                </div>
                                <div>
                                  
                                <div class='form-check form-control-sm footer-link me-3'>
                                    <a class='dropdown-item' href='admin-update?uid=$user_id'><button type='button' class='btn btn-sm btn-outline-primary'>
                                     <i class='bx bx-user'></i> View profile</button></a>
                                  </div>
                                  
                                <div class='form-check form-control-sm footer-link me-3'>
                    				<button type='submit' name='dispute' class='btn btn-sm btn-outline-danger' disabled>Dispute</button>
                    			</div>
                                
                                <div class='form-check form-control-sm footer-link me-3'>
                    				<button type='submit' name='markdone' class='btn btn-sm btn-primary' disabled>Order Completed</button>
                    			</div>
                                
                              </div>
                            </footer>";
                              
                            }
                         }
                
                    ?>

                    
              
              <!-- Script to execute dispute button -->
              <?php
              
                include('pdoconfig.php');
                
                if(isset($_POST['dispute'])){
                    
                    $order_id = $_POST['orderid'];
                    $dispute_level = "1";
                    
                    $dispute_query = "UPDATE buy_order SET dispute_level = :dispute_level WHERE order_id = :order_id LIMIT 1";		
                  
                    $stmt = $con->prepare($dispute_query);
                    $stmt->bindParam(":dispute_level",$dispute_level);				
                    $stmt->bindParam(":order_id",$order_id);			
                    $stmt->execute();
                
                    if($dispute_query){
                   	echo '<script type="text/javascript">
                    	$(document).ready(function(){
                    		$("#DisputeModal").modal("show");
                    	});
                    </script>';
                    }else{
                       echo"<div class='alert alert-danger'>Failed to execute command</div>";
                    }
                  }
                
                ?>
                <!-- End of script to execute dispute button -->
                
              <!-- Script to execute mark order as completed button -->
              <?php
              
                include('pdoconfig.php');
                
                if(isset($_POST['markdone'])){
                    
                    $order_id = $_POST['orderid'];
                    $order_status = "closed";
                    
                    $markorder_query = "UPDATE buy_order SET order_status = :order_status WHERE order_id = :order_id LIMIT 1";		
                  
                    $stmt = $con->prepare($markorder_query);
                    $stmt->bindParam(":order_status",$order_status);				
                    $stmt->bindParam(":order_id",$order_id);			
                    $stmt->execute();
                
                    if($markorder_query){
                   	echo '<script type="text/javascript">
                    	$(document).ready(function(){
                    		$("#MarkOrderDoneModal").modal("show");
                    	});
                    </script>';
                    }else{
                       echo"<div class='alert alert-danger'>Failed to complete</div>";
                    }
                  }
                
                ?>
                <!-- End of script to execute mark order as completed button -->
                
                  <!-- Start of disputed order modal -->
                    <div class="modal fade" id="DisputeModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                         <!-- Modal content-->
                        <div class="modal-content" style="border:none;border-radius: 5px;">
                        <div class="modal-header" style="background: #d75a4a; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                        </div>
                            <div class="modal-body">
                              <p style="text-align:center;color:#d75a4a;font-size:24px;font-weight:500;">Order Disputed</p>
                              <p style="text-align:center;color:#555555;">Expect a message from the customer</p>
                            </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                     </div>
                    </div>
                   <!-- End of disputed order modal -->
                    
                    <!-- Order Marked Done Modal -->
                      <div class="modal fade" id="MarkOrderDoneModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-confirm modal-dialog-centered" role="document">
                          <!-- Modal content-->
                          <div class="modal-content" style="border:none;border-radius: 5px;">
                            <div class="modal-header" style=" background: #1ab394; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                              <h4 class="modal-title text-center"></h4>
                                </div>
                                <div class="modal-body">
                                  <p style="text-align:center;color:#1ab394;font-size:24px;font-weight:500;">Order completed!</p>
                                  <p style="text-align:center;color:#555555;"><a href="admin-active-buy-orders">Refresh page</a></p>
                                </div>
                              <div class="modal-footer">
                             <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                         </div>
                      </div>  
                    <!-- End Order Marked Done Modal --> 
                    
                        <!-- Start of view order modal -->
                        <div class="modal fade" id="paidModal" data-backdrop="static" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border:none;border-radius: 5px;">
                        <div class="modal-header" style="background: #1ab394; border-top-left-radius: 5px; border-top-right-radius: 5px;">
                              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" style="opacity:1;color:#fff;font-size:20px"><b>&times;</b></button>
                              <h4 class="modal-title text-center"><img src="images/waiting.png" style="width:50px;pointer-events: none;" alt=""></h4>
                            </div>
                            <div class="modal-body">
                                    <?php
                                    		
                                    include_once("pdoconfig.php");
                                    
                                    // $email = $_SESSION['email'];
                                    
                                    $adminemail = "support@sahmax.com";
                                    
                                    $stmt = $con->prepare("SELECT derivbuy FROM rates WHERE email = :adminemail LIMIT 1");
                                    $stmt->execute(array('adminemail' => $adminemail));
                                    while($row = $stmt->fetch(PDO::FETCH_ASSOC))
                                    {
                                    
                                    $Validate_deriv_buy = $row['derivbuy'];	
                                    $deriv_buy = escape($Validate_deriv_buy);
                                    //Get order USD amount
                                    $unformatted_amount_in_dollar = $amount_in_naira / $deriv_buy;
                                    $amount_in_dollar = number_format($unformatted_amount_in_dollar, 2);
                                    
                                    }
                                ?>
                              <p style="text-align:center;color:#1ab394;font-size:24px;font-weight:500;">You have marked order as paid! <br> Please hold, we're on it.</p>
                              <p style="color:#555555;">Transaction ID:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;"><?php echo $order_id ?></strong><br>Payment amount:&nbsp;<strong style="font-weight:500;font-size:16px;color: #222222;">&#8358;<?php echo $formatted_amount_in_naira ?></strong><br>The sum of <b><?php echo $amount_in_dollar; ?> USD</b> shall be credited to your Deriv wallet<strong style="font-weight:500;font-size:15px;color: #222222;"> after confirmation.</strong></p>
                            </div>
                            <hr>
                            <div class="modal-footer">
                             <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                          
                        </div>
                        </div>
                      <!-- End of view order modal -->
              

              <hr class="my-5" />

                </div>
              </div>
        <!--/ Bootstrap Dark Table -->
        
            <div class="container-xxl flex-grow-1 container-p-y">
            
              <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">

                          <?php
        
                            echo "<h5 class='card-title text-primary'>
                            <a href='javascript:void;' class='menu-link'>
                            <i class='menu-icon tf-icons bx bx-credit-card'></i>
                            <div data-i18n='Basic'>Admin dashboard</div>
                            </a></h5>
                            <p class='mb-4'>You are operating as an admin <br> confirm details of every order before funding...</p>";
                        
                        ?>  
                        
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                      </div>
                    </div>
                  </div>
                </div>

          </div>
        </div>
        </div>
        <!-- end of rates section -->
            <!-- / Content -->


        
            <!-- JS script to turn on dark mode -->
            <script>

            // On page load set the theme.
          (function() {
            let onpageLoad = localStorage.getItem("theme") || "";
            let element = document.body;
            element.classList.add(onpageLoad);
            document.getElementById("theme").textContent =
              localStorage.getItem("theme") || "light";
          })();

          function themeToggle() {
            let element = document.body;
            element.classList.toggle("dark-mode");

            let theme = localStorage.getItem("theme");
            if (theme && theme === "dark-mode") {
              localStorage.setItem("theme", "");
            } else {
              localStorage.setItem("theme", "dark-mode");
            }

            document.getElementById("theme").textContent = localStorage.getItem("theme");
          }

          </script>

        <!-- JS script to turn on dark mode -->
        <script>
                        
        const htmlEl = document.getElementsByTagName('html')[0];

        const toggleTheme = (theme) => {
            htmlEl.dataset.theme = theme;
        }

        </script>


            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!--<div class="buy-now">
      <a
        href="" class="btn btn-danger btn-buy-now">fixed button</a>
    </div>-->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfemct-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>
    

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    
        
    <!-- Bootstrap JS files -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
  </body>
</html>
