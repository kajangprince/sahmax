<?php
session_start();
// on login screen, redirect to dashboard if already logged in
if(isset($_SESSION['email'])){
    header("location:./userdashboard");
}
?>

<?php 

function escape($string){
   return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

?>

<!Doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, shrink-to-fit=no, user-scalable=no">
    <meta name="handheldfriendly" content="yes">
    <meta name="description" content="Welcome to Sahmax Optimum Nigeria Limited the leading exchange platform in Nigeria…">
    <meta name="keywords" content="Sahmax, exchange, exchanger, optimum, limited, nigeria, crypto, sell, deriv, depsoit, withdrawal, payment, agent">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
    <!-- TrustBox script -->
    <script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
    <!-- End TrustBox script -->
    
    <title>Sahmax Optimum Nigeria Limited</title>
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  

  <!-- <div id="overlayer"></div>
  <div class="loader">
    <div class="spinner-border text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>  -->


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index" class="h2 mb-0">Sahmax<span class="text-info">Optimum</span> </a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#pricing-section" class="nav-link">Rates</a></li> 
                <li><a href="#blog-section" class="nav-link">Create Account</a></li>
                <li><a href="login" class="nav-link" onClick="javascript:clickinner(this);">Login</a></li>
                <li><a href="#contact-section" class="nav-link">Contact</a></li>
                
                <script>
                function clickinner(target) { // Redirect to login page on login click  
                    location.href='login';
                };
                </script>

                <li class="has-children">
                  <a href="#about-section" class="nav-link">About Us</a>
                  <ul class="dropdown">
                    <li><a href="#faq-section" class="nav-link">FAQ</a></li>
                    <li><a href="#services-section" class="nav-link">Services</a></li>
                    <!--<li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>-->
                  </ul>
                </li>
                <!--<li><a href="#contact-section" class="nav-link">Contact</a></li>-->
                <!--<li class="social"><a href="#contact-section" class="nav-link"><span class="icon-facebook"></span></a></li>
                <li class="social"><a href="#contact-section" class="nav-link"><span class="icon-twitter"></span></a></li>
                <li class="social"><a href="#contact-section" class="nav-link"><span class="icon-linkedin"></span></a></li>-->
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

  
     
    <div class="site-blocks-cover overlay" style="background-image: url(images/hero_2.jpg);" data-aos="fade" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">

          
          <div class="col-md-10 mt-lg-5 text-center">
            <div class="single-text owl-carousel">
              <div class="slide">
                <h1 class="text-uppercase" data-aos="fade-up">Fast Pay, No delay</h1>
                <p class="mb-5 desc"  data-aos="fade-up" data-aos-delay="100">We're a leading exchange platform with fast payouts in all transactions.</p>
                <div data-aos="fade-up" data-aos-delay="100">
                </div>
              </div>

              <div class="slide">
                <h1 class="text-uppercase" data-aos="fade-up">Trusted and Reliable</h1>
                <p class="mb-5 desc"  data-aos="fade-up" data-aos-delay="100">Whether it's for you, your company or your family and friends, our priority is your asset. We must deliver.</p>
              </div>

              <div class="slide">
                <h1 class="text-uppercase" data-aos="fade-up">Mouth Watering Rates</h1>
                <p class="mb-5 desc"  data-aos="fade-up" data-aos-delay="100">Our rates are fair compaired to our competitors. We are known for providing sweet rates.</p>
              </div>

            </div>
          </div>
            
        </div>
      </div>

      <a href="#next" class="mouse smoothscroll">
        <span class="mouse-icon">
          <span class="mouse-wheel"></span>
        </span>
      </a>
    </div>  
    
    <!-- Start of rates section -->
    <section class="site-section bg-light" id="pricing-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center" data-aos="fade-up">
            <h2 class="section-title mb-3">Rates Section</h2>
          </div>
        </div>
        <div class="row mb-5">
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="">
            <div class="pricing">
              <h3 class="text-center text-black">Bitcoin</h3>
              <div class="price text-center mb-4 ">
                <span>
                Live price -</span>
                <span style="color:#17A2B8">
									<?php 
									//BTC Price
									$url='https://bitpay.com/api/rates';
									$json=json_decode( file_get_contents( $url ) );
									$dollar=$btc=0;
									
									foreach( $json as $obj ){
										if( $obj->code=='USD' )$btc=$obj->rate;
									}									
									echo "$$btc";
									?>
                </span>
              </div>

        <?php
				
        include_once("pdoconfig.php");

        // $email = $_SESSION['email'];

        $email = "support@sahmax.com";

        $stmt = $con->prepare("SELECT * FROM rates WHERE email = :email LIMIT 1");
        $stmt->execute(array('email' => $email));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
        $Validate_id = $row['id'];
        $id = escape($Validate_id);

        $Validate_btc_buy = $row['btcbuy'];	
        $btc_buy = escape($Validate_btc_buy);

        $Validate_btc_sell = $row['btcsell'];	
        $btc_sell = escape($Validate_btc_sell);

        $Validate_deriv_buy = $row['derivbuy'];	
        $deriv_buy = escape($Validate_deriv_buy);

        $Validate_deriv_sell = $row['derivsell'];	
        $deriv_sell = escape($Validate_deriv_sell);

        $Validate_pm_buy = $row['pmbuy'];	
        $pm_buy = escape($Validate_pm_buy);
        
        $Validate_pm_sell = $row['pmsell'];	
        $pm_sell = escape($Validate_pm_sell);
        
        $Validate_usdt_buy = $row['usdtbuy'];	
        $usdt_buy = escape($Validate_usdt_buy);
        
        $Validate_usdt_sell = $row['usdtsell'];	
        $usdt_sell = escape($Validate_usdt_sell);
        
        $Validate_neteller_buy = $row['netellerbuy'];	
        $neteller_buy = escape($Validate_neteller_buy);
        
        $Validate_neteller_sell = $row['netellersell'];	
        $neteller_sell = escape($Validate_neteller_sell);

        $time =  $row['updated_at'];
        $timestamp = strtotime($time);
        $formatted_time = date('d F Y', $timestamp);
        
        }        

        ?>

              <ul class="list-unstyled ul-check success mb-5">                 
                <li><img src="images/bitcoin-btc-logo.svg" alt="Bitcoin Logo" style="width:20px"> Buy - NA<?php //echo $btc_buy; ?> <img src="images/star.gif"></li>
                <li><img src="images/bitcoin-btc-logo.svg" alt="Bitcoin Logo" style="width:20px"><span style="color:green"> Sell - &#x20A6;<?php echo $btc_sell; ?>/&#36;</span> <img src="images/star.gif"></li>
              </ul>
              <p class="text-center">
                <a href="userdashboard" class="btn btn-secondary">Proceed</a>
              </p>
            </div>
          </div>

          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pricing-popular" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing">
              <h3 class="text-center text-black">Deriv USD</h3>
              <div class="price text-center mb-4 ">
                <span>Live price - 1:1</span>
              </div>
              <ul class="list-unstyled ul-check success mb-5">
                <li><img src="images/deriv-logo.png" alt="Deriv Logo" style="width:20px"> Buy - &#x20A6;<?php echo $deriv_buy; ?>/&#36; <img src="images/star.gif"></li>
                <li><img src="images/deriv-logo.png" alt="Deriv Logo" style="width:20px"><span style="color:green"> Sell - &#x20A6;<?php echo $deriv_sell; ?>/&#36;</span> <img src="images/star.gif"></li>              
              </ul>
              <p class="text-center">
                <a href="userdashboard" class="btn btn-primary">Proceed</a>
              </p>
            </div>
          </div>

          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing">
              <h3 class="text-center text-black">Perfect money</h3>
              <div class="price text-center mb-4 ">
                <span>Live price - 1:1</span>
              </div>
              <ul class="list-unstyled ul-check success mb-5">
                <li><img src="images/perfectmoney-logo.png" alt="Perfect money Logo" style="width:20px"> Buy - &#x20A6;<?php echo $pm_buy; ?>/&#36; <img src="images/star.gif"></li>
                <li><img src="images/perfectmoney-logo.png" alt="Perfect money Logo" style="width:20px"><span style="color:green"> Sell - &#x20A6;<?php echo $pm_sell; ?>/&#36;</span> <img src="images/star.gif"></li>              
              </ul>
              <p class="text-center">
                <a href="userdashboard" class="btn btn-secondary">Proceed</a>
              </p>
            </div>
          </div>
          </div>
          
          <div class="row mb-5">
          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4 pricing-popular" data-aos="fade-up" data-aos-delay="">
            <div class="pricing">
              <h3 class="text-center text-black">USDT</h3>
              <div class="price text-center mb-4">
                <span>Live price - 1:1</span>
              </div>
              <ul class="list-unstyled ul-check success mb-5">                 
                <li><img src="images/tether-usdt-logo.svg" alt="USDT Logo" style="width:20px"> Buy - &#x20A6;<?php echo $usdt_buy; ?>/&#36; <img src="images/star.gif"></li>
                <li><img src="images/tether-usdt-logo.svg" alt="USDT Logo" style="width:20px"><span style="color:green"> Sell - &#x20A6;<?php echo $usdt_sell; ?>/&#36;</span> <img src="images/star.gif"></li>
              </ul>
              <p class="text-center">
                <a href="userdashboard" class="btn btn-secondary">Proceed</a>
              </p>
            </div>
          </div>

          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="pricing">
              <h3 class="text-center text-black">Neteller</h3>
              <div class="price text-center mb-4 ">
                <span>Live price - 1:1</span>
              </div>
              <ul class="list-unstyled ul-check success mb-5">
                <li><img src="images/neteller-logo.png" alt="Neteller Logo" style="width:20px"> Buy - NA<?php //echo $neteller_buy; ?> <img src="images/star.gif"></li>
                <li><img src="images/neteller-logo.png" alt="Neteller Logo" style="width:20px"><span style="color:green"> Sell - &#x20A6;<?php echo $neteller_sell; ?>/&#36;</span> <img src="images/star.gif"></li>              
              </ul>
              <p class="text-center">
                <a href="userdashboard" class="btn btn-primary">Proceed</a>
              </p>
            </div>
          </div>

          <div class="col-md-6 mb-4 mb-lg-0 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <div class="pricing">
              <h3 class="text-center text-black">Other cryptocurrencies</h3>
              <div class="price text-center mb-4 ">
                <span>Live price - Null</span>
              </div>
              <ul class="list-unstyled ul-check success mb-5">
                <li>
                <img src="images/litecoin-logo.png" alt="LTC Logo" style="width:20px"> 
                <img src="images/bnb-logo.png" alt="BNB Logo" style="width:20px"> 
                <img src="images/eth-logo.png" alt="ETH Logo" style="width:20px"> 
                <img src="images/ripple-logo.png" alt="XRP Logo" style="width:20px"> 
                <img src="images/tron-logo.png" alt="Tron Logo" style="width:20px">
                <img src="images/dogecoin-logo.png" alt="Dogecoin Logo" style="width:20px">
                <img src="images/cardano-logo.png" alt="Cardano Logo" style="width:20px">
                <img src="images/usdc-logo.png" alt="USDC Logo" style="width:20px">
                <img src="images/solana-logo.png" alt="Solana Logo" style="width:20px">
                <img src="images/eth-classic.png" alt="ETH Classic Logo" style="width:20px">
                <li>
                <li><span style="color:green"> Rates are subject to change based on asset type <img src="images/star.gif"></li>              
              </ul>
              <p class="text-center">
                <a href="userdashboard" class="btn btn-secondary">Proceed</a>
              </p>
            </div>
          </div>
        </div>
        </div>
        <!-- end of rates section -->


    <div class="site-section cta-big-image" id="about-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-8 text-center">
            <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">About Us</h2>
            <p class="lead" data-aos="fade-up" data-aos-delay="100">While we're a leading exchange platform, our mission is simple: We responsibly provide financial services that enable growth and economic progress.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">
            <figure class="circle-bg">
            <img src="images/hero_1.jpg" alt="Sahmax" class="img-fluid">
            </figure>
          </div>
          <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
            
            <h3 class="text-black mb-4">A leading exchange platform</h3>
            
            <p>We are a committed company, dedicated to meet and understand the needs of our customers with the aim of offering the best market rates with a high degree of professionalism and excellence in quality of service.</p>

            <p>Working impartially and independently, we seek to know and understand your financial needs in depth, offering personalized, creative and innovative solutions that protect and increase your profits per transaction.</p>
            
          </div>
        </div>    
        
      </div>  
    </div>

    <section class="site-section" id="blog-section" style="margin-top:-50px">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-3" data-aos="fade-up" data-aos-delay="">Get Started</h2>
            <p class="lead" data-aos="fade-up" data-aos-delay="100">We offer products and services 
              as one integrated institution while treating our clients as one global relationship.</p>
          </div>
        </div>
        
        <div class="row align-items-lg-center" >
          <div class="col-lg-6 mb-5" data-aos="fade-up" data-aos-delay="">

            <div class="owl-carousel slide-one-item-alt">
              <img src="images/slide_3.jpg" alt="Image" class="img-fluid">
              <img src="images/slide_1.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="custom-direction">
              <a href="#" class="custom-prev"><span><span class="icon-keyboard_backspace"></span></span></a><a href="#" class="custom-next"><span><span class="icon-keyboard_backspace"></span></span></a>
            </div>

          </div>
          <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="100">
            
            <div class="owl-carousel slide-one-item-alt-text">
              <div>
                <h2 class="section-title mb-3">Create account</h2>
                <p>Signup to get started with Sahmax Optimum Nigeria Limted. 
                  Enjoy our services wherever you are, whenever you want, stay connected.</p>

                <p><a href="register" class="btn btn-primary mr-2 mb-2">Create Account</a></p>
              </div>
             
            </div>
            
          </div>
        </div>
      </div>
    </section>

 
    <section class="site-section testimonial-wrap" id="testimonials-section" data-aos="fade">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Happy Customers</h2>
          </div>
        </div>
      </div>
      <div class="slide-one-item home-slider owl-carousel">
          <div>
            <div class="testimonial">
              
              <blockquote class="mb-5">
                <p>&ldquo;When it comes to speed and honesty, I will always recommend you boss, keep doing well.&rdquo;</p>
              </blockquote>

              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <!--<div><img src="images/person_3.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>-->
                <p>John Abuchi</p>
              </figure>
            </div>
          </div>
          <div>
            <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Boss, your services are too fast. I will refer people to you.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <!--<div><img src="images/person_2.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>-->
                <p>Adamu Sufiana</p>
              </figure>
              
            </div>
          </div>

          <div>
            <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;Cool services with sweet rates, thank you Sahmax.&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <!--<div><img src="images/person_4.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>-->
                <p>Forex King</p>
              </figure>

              
            </div>
          </div>

          <div>
            <div class="testimonial">

              <blockquote class="mb-5">
                <p>&ldquo;You guys are simply wonderful!&rdquo;</p>
              </blockquote>
              <figure class="mb-4 d-flex align-items-center justify-content-center">
                <!--<div><img src="images/person_4.jpg" alt="Image" class="w-50 img-fluid mb-3"></div>-->
                <p>Olamide Toyosi</p>
              </figure>

            </div>
          </div>

        </div>
    </section>

<!-- TrustBox widget - Review Collector -->
<div class="trustpilot-widget" data-locale="en-US" data-template-id="56278e9abfbbba0bdcd568bc" data-businessunit-id="64672cc5bd1804497978e2c1" data-style-height="52px" data-style-width="100%">
  <a href="https://www.trustpilot.com/review/sahmax.com" target="_blank" rel="noopener">Trustpilot</a>
</div>
<!-- End TrustBox widget -->
  
    <div class="container">
        <div class="row site-section" id="faq-section">
          <div class="col-12 text-center" data-aos="fade">
            <h2 class="section-title">Frequently Ask Questions</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            
            <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-black h4 mb-4">I'm having trouble accessing my account online. What should I do?</h3>
            <p>To regain online access, select "reset password" Follow the prompts and provide the requested information. 
             If your online access continues to be locked, please contact us.</p>
            </div> 
                        
            <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
              <h3 class="text-black h4 mb-4">What is your opening and closing time?</h3>
              <p>We open @5am - 11pm all days.</p>
            </div>

            <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-black h4 mb-4">If I send coins and come back after some days due to one or two reasons, will I still get paid?</h3>
            <p>The answer is yes. There is no transaction expiry, you can come back to us with proof for such transactions and payment will 
              be made after confirmation regardless of when the coins were sent.</p>
            </div>
            
          </div>
          <div class="col-lg-6">

            <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
              <h3 class="text-black h4 mb-4">Do you trade on social media?</h3>
              <p>Yes we do but you ought to be very careful. Do not respond to any chat or call claiming to be from us if it comes from a number or 
                profile not listed on our website. Do not give anyone your payment details on social media. If you trade with or give anyone your payment/account 
                details on social media or whatsapp, you are doing so at your own risk.</p>
            </div>

            <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
            <h3 class="text-black h4 mb-4">Will I get a refund if I trade with the wrong person (scammer) on social media?</h3>
            <p>As stated in our <a href="terms" style="color:#17A2B8">terms of service</a> Sahmax Optimum Nigeria Limited will not in any way be held responsible for any unverified payment or claim. 
            Always verify from our website (sahmax.com) before making payment or providing payment proof to anyone.</p>
            </div>
            
            <div class="mb-5" data-aos="fade-up" data-aos-delay="100">
              <h3 class="text-black h4 mb-4">How do I verify my account?</h3>
              <p>Verify your account by visiting your dashboard and following the promt screen. You can reach out to us for help via live 
                chat.</p>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
    
    
    <section class="site-section bg-light" id="contact-section" data-aos="fade" style="margin-top:-50px">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12 text-center">
            <h2 class="section-title mb-3">Contact Us</h2>
          </div>
        </div>
        <div class="row mb-5">          

          <div class="col-md-4 text-center">
            <p class="mb-4">
             <span class="icon-room d-block h2" style="color:#17A2B8"></span>
              <span>Zone 9, Beside CAC church, Dada Estate, Osogbo</span>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <p class="mb-4">
              <span class="icon-phone d-block h2" style="color:#17A2B8"></span>
              <a href="tel:07030061196" style="color:#888080">
              07030061196
              </a>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <p class="mb-0">
              <span class="icon-mail_outline d-block h2" style="color:#17A2B8"></span>
              <a href="mailto:support@sahmax.com" style="color:#888080">Support@sahmax.com</a>
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-5">

            

            <form action="contact-validation.php" method="POST" class="p-5 bg-white">
            <?php $reason = array("received_credential=true" => "<div class='alert alert-success'>Message sent. We will give you a call if necessary</div>"); 
            if(isset($_GET['formSuccess'])) echo $reason[$_GET['reason']]; ?>
            <?php $reason = array("failed_credential=true" => "<div class='alert alert-danger'>Failed to submit form! All field are required.</div>"); 
            if(isset($_GET['formFailed'])) echo $reason[$_GET['reason']]; ?>
            <?php $reason = array("incorrect_number=true" => "<div class='alert alert-danger'>Enter a valid Nigeria phone number</div>"); 
            if(isset($_GET['formFailed'])) echo $reason[$_GET['reason']]; ?>
              
              <h2 class="h4 text-black mb-5">Contact Form</h2> 

              <div class="row form-group">
                <div class="col-md-6 mb-3 mb-md-0">
                  <label class="text-black">Full Name</label>
                  <input type="text" id="fname" name="name" class="form-control" placeholder="Your name*">
                </div>
                <div class="col-md-6">
                  <label class="text-black">Number</label>
                  <input type="number" name="number" class="form-control" placeholder="Phone number*">
                </div>
              </div>

              <div class="row form-group">
                
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label> 
                  <input type="email" id="email" name="email" class="form-control" placeholder="Your Email*">
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="message">Message</label> 
                  <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Write your notes or questions here..."></textarea>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-md-12">
                  <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                </div>
              </div>

  
            </form>
          </div>
          
        </div>
      </div>
    </section>

    
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-9">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>While we're a leading exchange platform, our mission is simple: We responsibly provide financial services that enable growth and economic progress.</p>
              </div>
              <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">Sahmax</h2>
                <ul class="list-unstyled">
                  <li><a href="terms" class="smoothscroll">Terms</a></li>
                  <li><a href="#about-section" class="smoothscroll">About Us</a></li>
                  <li><a href="#contact-section" class="smoothscroll">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-md-3 footer-social">
                <h2 class="footer-heading mb-4">Why Sahmax</h2>
                <ul class="list-unstyled">
                  <li><a href="#pricing-section" class="smoothscroll">Our Rates</a></li>
                  <li><a href="#pricing-section" class="smoothscroll">Services</a></li>
                  <li><a href="#testimonials-section" class="smoothscroll">Testimonials</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
            <form action="#" method="post" class="footer-subscribe">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-black" type="button" id="button-addon2">Send</button>
                </div>
                <br><br>
                <!-- TrustBox widget - Review Collector -->
                <div class="trustpilot-widget" data-locale="en-US" data-template-id="56278e9abfbbba0bdcd568bc" data-businessunit-id="64672cc5bd1804497978e2c1" data-style-height="52px" data-style-width="100%">
                  <a href="https://www.trustpilot.com/review/sahmax.com" target="_blank" rel="noopener">Trustpilot</a>
                </div>
                <!-- End TrustBox widget -->
                
              </div>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p class="copyright"><small>
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
              </small></p>        
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  </div> <!-- .site-wrap -->

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  <script src="js/main.js"></script>

  <script src="//code.tidio.co/72mzp4sawhkdtitqd05epcmutn0ocs3z.js" async></script>

  </body>
</html>
