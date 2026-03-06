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

<?php $email = $_SESSION['email']; ?>

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
    <title>Admin Verification</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

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
            <li class="menu-item active">
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
            <li class="menu-item">
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

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account /</span> Verification request</h4>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">Verification request</h5>
                <?php $reason = array("reactivated=true" => "<p style='color:green;'>Account Reactivated</p>"); 
                 if(isset($_GET['accountreactivated'])) echo $reason[$_GET['reason']]; ?>
                 
                <?php $reason = array("Failed_to_reactivate=true" => "<p style='color:red;'>Failed to Reactivate Account</p>"); 
                 if(isset($_GET['reactivationfailed'])) echo $reason[$_GET['reason']]; ?>
                 
                <?php $reason = array("deactivated=true" => "<p style='color:green;'>Account Deactivated</p>"); 
                 if(isset($_GET['accountdeactivated'])) echo $reason[$_GET['reason']]; ?>
                 
                 <?php $reason = array("Failed_to_deactivate=true" => "<p style='color:red;'>Failed to Deactivate Account</p>"); 
                 if(isset($_GET['deactivationfailed'])) echo $reason[$_GET['reason']]; ?>
                 
                 <div class="table-responsive text-nowrap">
                    <form action="" method="POST">
                    <table>
                        <tr>
                            <td>
                                <center class="card-header">
                                    <button type="submit" name="display" class="btn btn-outline-primary">Display</button>
                                </center>
                                
                            </td>
                        </tr>
                    </table>
                    </form>
                    
                <?php 
                
                include_once("pdoconfig.php");
                 
                if(isset($_POST['display'])){
                $verification_status = "0";
                $stmt = "SELECT * from verification_request where verification_status = :verification_status";
                $stmt = $con->prepare($stmt);
                $stmt->execute(array('verification_status' => $verification_status));
                
                if($stmt){
                    echo"                               
                    <table id='admintable' class='table table-hover'>
                    <tr>
                        <td>User ID</td>
                        <td>Document image</td>
                        <td>Document type</td>
                        <td>Requested at</td>
                        <td>Edit</td>
                    </tr>
                    </table>";
                    while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                    echo"<table id='admintable'>
                    <tr>
                    <td>$row->user_id</td>
                    <td>$row->id_card</td>
                    <td>$row->document_type</td>
                    <td>$row->requested_at</td>
                    <td>
                        <a href='admin-update?uid=$row->user_id'><i class='menu-icon tf-icons bx bx-bx bx bx-edit-alt me-1'></i>
                        </a>
                    </td>
                    
                    </tr>
                    </table>";
                     }
                }else{
                    echo"Empty table";
                }
                         
                     }
                 
                ?>

                    
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <hr class="my-5" />

                </div>
              </div>
        <!--/ Bootstrap Dark Table -->

        
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

             <!-- Footer -->
                <footer class="footer bg-light">
                  <div
                    class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3"
                  >
                    <div>
                      <a
                        href="javascript:void(0)"
                        class="footer-text fw-bolder"
                        >Sahmax Optimum</a
                      >
                      &copy;<script>document.write(new Date().getFullYear());</script> All Rights Reserved. 
                    </div>
                    <div>
                      <div class="form-check form-control-sm footer-link me-3">
                        <div class="buy-now" onclick="themeToggle()">
                        <label class="form-check-label" for="customCheck2"><i class="bx bx-moon me-2"></i>Dark Mode</label>
                        </div>
                      </div>   
                      
                      <div class="dropdown dropup footer-link me-3">
                        <button
                          type="button"
                          class="btn btn-sm btn-outline-secondary dropdown-toggle"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false"
                        >
                          Naira (&#8358;)
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                          <a class="dropdown-item" href="javascript:void(0);">Default Currency</a>
                        </div>
                      </div>
                      <a href="logout" class="btn btn-sm btn-outline-danger"
                        ><i class="bx bx-log-out-circle"></i> Logout</a
                      >
                    </div>
                  </div>
                </footer>
              <!--/ Footer -->

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
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

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
  </body>
</html>
