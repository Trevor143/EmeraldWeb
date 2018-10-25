<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emeraldblog";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // use exec() because no results are returned
    // $conn->exec($sql);
    $sql_latest=$conn->prepare("SELECT * from posts order by id Desc");
    $sql_latest->execute();
    $row = $sql_latest->fetch();

    $sql_previous=$conn->prepare("SELECT * FROM `posts` WHERE id = (SELECT MAX(id)-1 FROM `posts`)");
    $sql_previous->execute();
    $row_previous= $sql_previous->fetch();

    $sql_last=$conn->prepare("SELECT * FROM `posts` WHERE id = (SELECT MAX(id)-2 FROM `posts`)");
    $sql_last->execute();
    $row_last= $sql_last->fetch();


    // $result = $sql->setFetchMode(PDO::FETCH_ASSOC);

    }
catch(PDOException $e)
    {
    // echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>
  
  <!-- trial mail -->
    <?php
   
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';
 if (isset($_POST['sendmail'])) {
      if(empty($_POST['name'])      ||
   empty($_POST['email'])     ||
   empty($_POST['message']) ||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
  echo "No arguments Provided!";
  return false;
   }
  
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];


$mail = new PHPMailer(true);                              // Passing `true` enables exceptions

try {
    //Server settings
    $mail->SMTPDebug = 1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'apikey';                 // SMTP username
    $mail->Password = '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';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('mukws18@gmail.com', 'Contact Form');
    $mail->addAddress($email_address ,'Emerald Blog');     // Add a recipient

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contact';
    $mail->Body    = $message;
    $mail->AltBody = strip_tags($body);

    $mail->send();
    echo 'Message has been sent';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>
  <!-- trial mail -->


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Emerald | Home</title>
<meta name="description" content="">
<meta name="author" content="">

<!-- Live chat plugin -->

<link rel="stylesheet" href="https://strathmore-university.odoo.com/im_livechat/external_lib.css"/>
<script type="text/javascript" src="https://strathmore-university.odoo.com/im_livechat/external_lib.js"></script>
<script type="text/javascript" src="https://strathmore-university.odoo.com/im_livechat/loader/1"></script>

<!-- Favicons
    ================================================== -->
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" href="img/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

<!-- Bootstrap -->
<link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

<!-- Stylesheet
    ================================================== -->
<link rel="stylesheet" type="text/css"  href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/nivo-lightbox.css">
<link rel="stylesheet" type="text/css" href="css/nivo-lightbox/default.css">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">

<link rel="stylesheet" href="https://strathmore-university.odoo.com/im_livechat/external_lib.css"/>
            <script type="text/javascript" src="https://strathmore-university.odoo.com/im_livechat/external_lib.js"></script>
            <script type="text/javascript" src="https://strathmore-university.odoo.com/im_livechat/loader/1"></script>

<!-- cards style -->
<style type="text/css">
   .card {
            position: relative;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
          }
   .card > hr {
            margin-right: 0;
            margin-left: 0;
          }

          .card > .list-group:first-child .list-group-item:first-child {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
          }

          .card > .list-group:last-child .list-group-item:last-child {
            border-bottom-right-radius: 0.25rem;
            border-bottom-left-radius: 0.25rem;
          }

          .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem;
          }

          .card-title {
            margin-bottom: 0.75rem;
          }

          .card-subtitle {
            margin-top: -0.375rem;
            margin-bottom: 0;
          }

          .card-text:last-child {
            margin-bottom: 0;
          }

          .card-link:hover {
            text-decoration: none;
          }

          .card-link + .card-link {
            margin-left: 1.25rem;
          }

          .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(0, 0, 0, 0.03);
            border-bottom: 1px solid rgba(0, 0, 0, 0.125);
          }

          .card-header:first-child {
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
          }

          .card-header + .list-group .list-group-item:first-child {
            border-top: 0;
          }

          .card-footer {
            padding: 0.75rem 1.25rem;
            background-color: rgba(0, 0, 0, 0.03);
            border-top: 1px solid rgba(0, 0, 0, 0.125);
          }

          .card-footer:last-child {
            border-radius: 0 0 calc(0.25rem - 1px) calc(0.25rem - 1px);
          }

          .card-header-tabs {
            margin-right: -0.625rem;
            margin-bottom: -0.75rem;
            margin-left: -0.625rem;
            border-bottom: 0;
          }

          .card-header-pills {
            margin-right: -0.625rem;
            margin-left: -0.625rem;
          }

          .card-img-overlay {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 1.25rem;
          }

          .card-img {
            width: 100%;
            border-radius: calc(0.25rem - 1px);
          }

          .card-img-top {
            width: 100%;
            border-top-left-radius: calc(0.25rem - 1px);
            border-top-right-radius: calc(0.25rem - 1px);
          }

          .card-img-bottom {
            width: 100%;
            border-bottom-right-radius: calc(0.25rem - 1px);
            border-bottom-left-radius: calc(0.25rem - 1px);
          }

          .card-deck {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
          }

          .card-deck .card {
            margin-bottom: 15px;
          }

          @media (min-width: 576px) {
            .card-deck {
              -ms-flex-flow: row wrap;
              flex-flow: row wrap;
              margin-right: -15px;
              margin-left: -15px;
            }
            .card-deck .card {
              display: -ms-flexbox;
              display: flex;
              -ms-flex: 1 0 0%;
              flex: 1 0 0%;
              -ms-flex-direction: column;
              flex-direction: column;
              margin-right: 15px;
              margin-bottom: 0;
              margin-left: 15px;
            }
          }

          .card-group {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-direction: column;
            flex-direction: column;
          }

          .card-group > .card {
            margin-bottom: 15px;
          }

          @media (min-width: 576px) {
            .card-group {
              -ms-flex-flow: row wrap;
              flex-flow: row wrap;
            }
            .card-group > .card {
              -ms-flex: 1 0 0%;
              flex: 1 0 0%;
              margin-bottom: 0;
            }
            .card-group > .card + .card {
              margin-left: 0;
              border-left: 0;
            }
            .card-group > .card:first-child {
              border-top-right-radius: 0;
              border-bottom-right-radius: 0;
            }
            .card-group > .card:first-child .card-img-top,
            .card-group > .card:first-child .card-header {
              border-top-right-radius: 0;
            }
            .card-group > .card:first-child .card-img-bottom,
            .card-group > .card:first-child .card-footer {
              border-bottom-right-radius: 0;
            }
            .card-group > .card:last-child {
              border-top-left-radius: 0;
              border-bottom-left-radius: 0;
            }
            .card-group > .card:last-child .card-img-top,
            .card-group > .card:last-child .card-header {
              border-top-left-radius: 0;
            }
            .card-group > .card:last-child .card-img-bottom,
            .card-group > .card:last-child .card-footer {
              border-bottom-left-radius: 0;
            }
            .card-group > .card:only-child {
              border-radius: 0.25rem;
            }
            .card-group > .card:only-child .card-img-top,
            .card-group > .card:only-child .card-header {
              border-top-left-radius: 0.25rem;
              border-top-right-radius: 0.25rem;
            }
            .card-group > .card:only-child .card-img-bottom,
            .card-group > .card:only-child .card-footer {
              border-bottom-right-radius: 0.25rem;
              border-bottom-left-radius: 0.25rem;
            }
            .card-group > .card:not(:first-child):not(:last-child):not(:only-child) {
              border-radius: 0;
            }
            .card-group > .card:not(:first-child):not(:last-child):not(:only-child) .card-img-top,
            .card-group > .card:not(:first-child):not(:last-child):not(:only-child) .card-img-bottom,
            .card-group > .card:not(:first-child):not(:last-child):not(:only-child) .card-header,
            .card-group > .card:not(:first-child):not(:last-child):not(:only-child) .card-footer {
              border-radius: 0;
            }
          }

          .card-columns .card {
            margin-bottom: 0.75rem;
          }

          @media (min-width: 576px) {
            .card-columns {
              -webkit-column-count: 3;
              -moz-column-count: 3;
              column-count: 3;
              -webkit-column-gap: 1.25rem;
              -moz-column-gap: 1.25rem;
              column-gap: 1.25rem;
              orphans: 1;
              widows: 1;
            }
            .card-columns .card {
              display: inline-block;
              width: 100%;
            }
          }

          .accordion .card:not(:first-of-type):not(:last-of-type) {
            border-bottom: 0;
            border-radius: 0;
          }

          .accordion .card:not(:first-of-type) .card-header:first-child {
            border-radius: 0;
          }

          .accordion .card:first-of-type {
            border-bottom: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
          }

          .accordion .card:last-of-type {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
          }
</style>
<!-- cards style -->

<!-- other -->
<style type="text/css">
  body{
  width: 100%;
  height: 100%;
  }
  .btn-group-sm .btn-fab{
  position: fixed !important;
  right: 29px;
  }
  .btn-group .btn-fab{
  position: fixed !important;
  right: 20px;
  }
  #main{
  bottom: 20px;
  }
  #mail{
  bottom: 80px
  }
  #sms{
  bottom: 125px
  }
  #autre{
  bottom: 170px
  }

</style>

<script type="text/javascript">
  $("#main").click(function() {
  $("#mini-fab").toggleClass('hidden');
  });

  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();  
  });
  $.material.init();
</script>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<!-- Navigation
    ==========================================-->
<nav id="menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand page-scroll" href="#page-top">Emerald Consultancy Firm</a> </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about" class="page-scroll">About</a></li>
        <li><a href="#portfolio" class="page-scroll">Gallery</a></li>
        <li><a href="#services" class="page-scroll">Our Services</a></li>
        <li><a href="#team" class="page-scroll">Our Team</a></li>
        <li><a href="#call-reservation" class="page-scroll">Contact</a></li>

        <li><a href="http://blog-emerald.test/" target ="_blank">Blog</a></li>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
</nav>
<!-- Header -->
<header id="header">
  <div class="intro">
    <div class="overlay">
      <div class="container">
        <div class="row">
          <div class="intro-text">
            <h1>Emerald</h1>
            <p>Care for the Environment at its best</p>
            <a href="#about" class="btn btn-custom btn-lg page-scroll">Get to know us</a> </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Live chat section code -->

<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <!-- <div class="btn-group-sm hidden" id="mini-fab">
        <a href="#" class="btn btn-info btn-fab" data-toggle="tooltip" data-placement="left" data-original-title="Other" title="" id="autre">
          <i class="material-icons">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
              <path fill="#000000" d="M16,12A2,2 0 0,1 18,10A2,2 0 0,1 20,12A2,2 0 0,1 18,14A2,2 0 0,1 16,12M10,12A2,2 0 0,1 12,10A2,2 0 0,1 14,12A2,2 0 0,1 12,14A2,2 0 0,1 10,12M4,12A2,2 0 0,1 6,10A2,2 0 0,1 8,12A2,2 0 0,1 6,14A2,2 0 0,1 4,12Z" />
            </svg>
          </i>
        </a>
        <a href="#" class="btn btn-warning btn-fab" data-toggle="tooltip" data-placement="left" data-original-title="SMS" title="" id="sms">
          <i class="material-icons">
            <svg style="width:24px;height:24px" viewBox="0 0 24 24">
              <path fill="#000000" d="M9,22A1,1 0 0,1 8,21V18H4A2,2 0 0,1 2,16V4C2,2.89 2.9,2 4,2H20A2,2 0 0,1 22,4V16A2,2 0 0,1 20,18H13.9L10.2,21.71C10,21.9 9.75,22 9.5,22V22H9Z" />
            </svg>
          </i>
        </a>
        <a href="#" class="btn btn-danger btn-fab" data-toggle="tooltip" data-placement="left" data-original-title="Mail" title="" id="mail">
          <i class="material-icons">
             <svg style="width:24px;height:24px" viewBox="0 0 24 24">
              <path fill="#000000" d="M4,8L12,13L20,8V8L12,3L4,8V8M22,8V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V8C2,7.27 2.39,6.64 2.97,6.29L12,0.64L21.03,6.29C21.61,6.64 22,7.27 22,8Z" />
            </svg>
          </i>
        </a>
      </div> -->
      <div class="btn-group">
        <a href="" class="btn btn-success btn-fab" id="main" onclick="window.open('https://strathmore-university.odoo.com/im_livechat/support/1', 
                         'newwindow', 
                         'width=300,height=250'); 
              return false;">
          <i class="material-icons">
          <svg xmlns="http://www.w3.org/2000/svg" width="38" height="38 " viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>
            <!-- <svg style="width:24px;height:24px" viewBox="0 0 24 24">
              <path fill="#000000" d="M20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18,2.9 17.35,2.9 16.96,3.29L15.12,5.12L18.87,8.87M3,17.25V21H6.75L17.81,9.93L14.06,6.18L3,17.25Z" />
            </svg> -->
          </i>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- About Section -->
<div id="about">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6 ">
        <div class="about-img"><img src="images/about.jpg" class="img-responsive" alt=""></div>
        <br>
        <br>
        <br>
        <div class="about-img"><img src="img/Naicounty.jpg" class="img-responsive" alt=""></div>
        <div class="about-img"><img src="img/Private.jpg" class="img-responsive" alt=""></div>
        <!-- <div class="about-img"><img src="img/School.jpg" class="img-responsive" alt=""></div> -->
      </div>
      <div class="col-xs-12 col-md-6">
        <div class="about-text">
          <h2>History</h2>
          <hr>
          <p>In 2008, a Team of Environmental professionals founded Emerald Environmental Consultancy Firm, now operating as a division of Venture Emerald ltd. The team set out to change the way Environmental Consultancy companies work. At that time, the profession was infiltrated by experts in other fields, most of whom didn’t have an in-depth understanding of environmental dynamics and the concept of sustainable development. The Firm was formed bearing in mind that Environmental issues are Holistic and require a multi-disciplinary approach. We set out to offer services based on our mastered understanding of environment- development nexus to produce objective, workable and science based solutions. This came at a time when environment and development issues were quickly gaining ground with majority industries/institutions across the region struggling to manage Earths most precious resource, and companies/institutions and governments trying to adopt the going green concept</p>
          <h3>More</h3>
          <p>VENTURE EMERALD LTD isn’t just our name, it is our philosophy. We are focused on venturing towards green solutions on development issues for a healthy ecology based on science-based decision making. We design projects that solve problems in the most practical manner possible. Our teams consist of the brightest minds in the Field of Environmental Sciences, Environmental Planning and Management, Ecology, Water and Wastewater Systems Design, Civil and Environmental Engineering. All our senior staff and associates have Ph.Ds and are respected lecturers and researchers in our Universities. Our members of staff are graduates at bachelors and masters levels in fields such as engineering, biology, hydrogeology, finance and other related fields. We all work together as a team in a unique approach to design solutions. A strong focus of our activities lies in working with local partners and building local capacity to engage in natural resource management, environmental assessments and decision-making processes. Working in partnership with our clients, we are able to bring knowledge, expertise, innovation and enthusiasm to any project.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Restaurant Menu Section -->
<div id="services">
  <div class="section-title text-center center">
    <div class="overlay">
      <h2>Our Services</h2>
      <hr>
      <p>Below are some of the services Emerald consultancy firm offers:</p>
    </div>
  </div>
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
           <!-- <h2 class="menu-section-title">Breakfast & Starters</h2> -->
          <div class="menu-item">
            <div class="menu-item-name"> Geographic Information System </div>
            <!-- <div class="menu-item-price"> $35 </div> -->
            <div class="menu-item-description"> We have a full spectrum of geographic information services that include: <br>
            <ul>
              <li> Data management and integration </li>
              <li>GIS database development</li>
              <li>GPS field data collection and post-processing</li>
              <li>Remote sensing and image processin</li>
              <li>Real-time, web-based map, 3D virtual globe, and database delivery, Our GIS team have been involved in geospatial data creation, integration, analysis, visual simulation, and application development.</li>
            </ul>
            </div>
          </div>
          <div class="menu-item">
            <div class="menu-item-name"> Waste and Waste Water management </div>
            <!-- <div class="menu-item-price"> $30 </div> -->
            <div class="menu-item-description"> Our multi-disciplined team of experienced water and wastewater engineers and educators allows us to draw upon a wide range of expertise. Our team offer services in Water and Wastewater Planning, Site Selection Studies, Process Design; Water and Wastewater Treatment Plant, Design and Documentation; and Operation Maintenance Manuals.We deliver tailor made solutions for the water and wastewater treatment. We believe that safe handling of waste water is an integral part in development and is essential to public health.</div>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <div class="menu-section">
          <!-- <h2 class="menu-section-title">Main Course</h2> -->
          <div class="menu-item">
            <div class="menu-item-name"> Integrated Solid Waste Management </div>
            <!-- <div class="menu-item-price"> $30 </div> -->
            <div class="menu-item-description"> At emerald, we offer a full array of solid waste management plans to estate developers, municipalities, counties and private entities involved in solid waste management. We design integrated solid waste management plans that incorporate concepts such as energy production (biogas), recycling and re-use, composting for manure, and final disposal of residual waste. We have the expertise required to design municipal landfills and dump-sites.</div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

<!-- Portfolio Section -->
<div id="portfolio">
  <div class="section-title text-center center">
    <div class="overlay">
      <h2>Gallery</h2>
      <hr>
      <p>Previous clients and projects that have been worked on.</p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="categories">
        <!-- <ul class="cat">
          <li>
            <ol class="type">
              <li><a href="#" data-filter="*" class="active">All</a></li>
              <li><a href="#" data-filter=".breakfast">Breakfast</a></li>
              <li><a href="#" data-filter=".lunch">Lunch</a></li>
              <li><a href="#" data-filter=".dinner">Dinner</a></li>
            </ol>
          </li>
        </ul> -->
        <div class="clearfix"></div>
      </div>
    </div>
    <div class="row">
      <div class="portfolio-items">
        <div class="col-sm-6 col-md-4 col-lg-4 ">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/school.jpg" title="Strathmore University" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Strathmore University</h4>
              </div>
              <img src="img/school.jpg" class="img-responsive" alt="Strathmore University"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 dinner">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/school2.jpg" title="Nairobi County" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Nairobi County</h4>
              </div>
              <img src="img/school2.jpg" class="img-responsive" alt="Nairobi County"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/Private.jpg" title="Private Homes" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Private Homes</h4>
              </div>
              <img src="img/Private.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/download.jpg" title="Laikipia Wildlife Forum" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Laikipia Wildlife Forum</h4>
              </div>
              <img src="img/download.jpg" class="img-responsive" alt="Laikipia Wildlife Forum"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/index.jpg" title="Rwanda Girls Initiative" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Rwanda Girls Initiative</h4>
              </div>
              <img src="img/index.jpg" class="img-responsive" alt="Project Title"> </a> </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
          <div class="portfolio-item">
            <div class="hover-bg"> <a href="img/Strathmore Law School.jpg" title="Strathmore Law School" data-lightbox-gallery="gallery1">
              <div class="hover-text">
                <h4>Strathmore Law School</h4>
              </div>
              <img src="img/Strathmore Law School.jpg" class="img-responsive" alt="Fafi Integrated development Association"> </a> </div>
          </div>
        </div>
        <!-- <div class="container">
            
            <div class="col-sm-6 col-md-4 col-lg-4 dinner">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="img/portfolio/05-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Dish Name</h4>
                  </div>
                  <img src="img/portfolio/05-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 lunch">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="img/portfolio/06-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Dish Name</h4>
                  </div>
                  <img src="img/portfolio/06-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 lunch">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="img/portfolio/07-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Dish Name</h4>
                  </div>
                  <img src="img/portfolio/07-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="img/portfolio/08-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Dish Name</h4>
                  </div>
                  <img src="img/portfolio/08-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 dinner">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="img/portfolio/09-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Dish Name</h4>
                  </div>
                  <img src="img/portfolio/09-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 lunch">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="img/portfolio/10-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Dish Name</h4>
                  </div>
                  <img src="img/portfolio/10-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 lunch">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="img/portfolio/11-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Dish Name</h4>
                  </div>
                  <img src="img/portfolio/11-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 breakfast">
              <div class="portfolio-item">
                <div class="hover-bg"> <a href="img/portfolio/12-large.jpg" title="Dish Name" data-lightbox-gallery="gallery1">
                  <div class="hover-text">
                    <h4>Dish Name</h4>
                  </div>
                  <img src="img/portfolio/12-small.jpg" class="img-responsive" alt="Project Title"> </a> </div>
            </div> 
        </div> -->
        </div>
      </div>
    </div>
  </div>
</div>

<!-- blog section -->
<div id="restaurant-menu">
  <div class="section-title text-center center">
    <div class="overlay">
      <h2>Emerald Blog</h2>
      <hr>
      <p>Join the conversation via Facebook on different articles provided by senior environmentalists.</p>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-6">
        <div class="container">
      <div class="card-deck">
       <div class="card bg-warning">
        <div class="card-body text-center">
          <h3 class="card-text"><?php echo $row['title']; ?></h3>
          <p class="card-text"><?php echo substr($row['description'], 0,80); ?></p>
          <?php $id=$row['id'];?>
          <a href="http://blog-emerald.test/post/<?php echo $id; ?>"><p>Read More</p></a>
        </div>
        </div>
       <div class="card bg-warning">
        <div class="card-body text-center">
          <h3 class="card-text"><?php echo $row_previous['title']; ?></h3>
          <p class="card-text"><?php echo substr($row_previous['description'], 0,80); ?></p>
          <?php $id2=$row_previous['id'];?>
          <a href="http://blog-emerald.test/post/<?php echo $id2; ?>"><p>Read More</p></a>
        </div>
        </div>
        <div class="card bg-warning">
        <div class="card-body text-center">
          <h3 class="card-text"><?php echo $row_last['title']; ?></h3>
          <p class="card-text"><?php echo substr($row_last['description'], 0,80); ?></p>
          <?php $id2=$row_last['id'];?>
          <a href="http://blog-emerald.test/post/<?php echo $id2; ?>"><p>Read More</p></a>
        </div>
        </div>
    </div>
      </div>
    </div>
    </div>
  </div>
</div>

<!-- Team Section -->
<div id="team" class="text-center">
  <div class="overlay">
    <div class="container">
      <div class="col-md-10 col-md-offset-1 section-title">
        <h2>Meet Our Team</h2>
        <hr>
        <p>A few members of the large team committed to the environment</p>
      </div>
      <div id="row">
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/teampic.jpg" alt="..."></div>
            <div class="caption">
              <h3>Nakuru Based Team</h3>
              <p>Dedicated Young people who are committed to giving a positive impact to those living near the dams</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/Naicounty.jpg" alt="..."></div>
            <div class="caption">
              <h3>Nairobi County Office</h3>
              <p>All the magic usually happens where this photo was taken</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 team">
          <div class="thumbnail">
            <div class="team-img"><img src="img/team2.jpg" alt="..."></div>
            <div class="caption">
              <h3>Mombasa Office</h3>
              <p>Always syked up to find a solution to a problem concerning the environment</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Call Reservation Section -->
<div id="call-reservation" class="text-center">
  <div class="container">
    <h2>Want to know more now? Call <strong>+254 790 543-878</strong></h2>
  </div>
</div>
<!-- Contact Section -->
<div id="contact" class="text-center">
  <div class="container">
    <div class="section-title text-center">
      <h2>Our Location</h2>
      <hr>
      <p>Visit us to get a complete walkthrough of all our services.</p>
    </div>
    <div class="col-md-10 col-md-offset-1">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15955.177818545893!2d36.7744642!3d-1.2980513!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3a377de200c4210d!2sEmerald+Africa+Consulting!5e0!3m2!1sen!2ske!4v1529418780369" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      <!-- <form name="sentMessage" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <input type="text" name="name" class="form-control" placeholder="Name" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <input type="email" name="email" class="form-control" placeholder="Email" required="required">
              <p class="help-block text-danger"></p>
            </div>
          </div>
        </div>
        <div class="form-group">
          <textarea name="message" name="message" class="form-control" rows="4" placeholder="Message" required></textarea>
          <p class="help-block text-danger"></p>
        </div>
        <div id="success"></div>
        <input class="btn btn-custom btn-lg" name="sendmail" type="submit" value="Send Message"></input>
        <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
      </form> -->
    </div>
  </div>
</div>
<div id="footer">
  <div class="container text-center">
    <div class="col-md-4">
      <h3>Address</h3>
      <div class="contact-item">
        <p>Emerald Environmental Consultants</p>
        <p>Ngong Hills Hotel Building, 2nd Floor, Ngong Road</p>
        <p>P.O. Box 24464-00100 Nairobi</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Opening Hours</h3>
      <div class="contact-item">
        <p>Mon-Fri: 8:30 AM - 5:00 PM</p>
        <p>Sat: 10:00 AM - 02:00 PM</p>
      </div>
    </div>
    <div class="col-md-4">
      <h3>Contact Info</h3>
      <div class="contact-item">
        <p>Tel: +254 020 250 95 44</p>
        <p>Mobile: +254 720 571 339</p>
        <p>Email: info@consultemerald.org</p>
        <p>kecha@consultemerald.org</p>
        <p>Web: www.consultemerald.org</p>

      </div>
    </div>
  </div>
  <div class="container-fluid text-center copyrights">
    <div class="col-md-8 col-md-offset-2">
      <div class="social">
        <ul>
          <li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
          <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
          <li><a href="https://google.com"><i class="fa fa-google-plus"></i></a></li>
        </ul>
      </div>
      <p>&copy; 2018 Emerald Consultancy Firm. All rights reserved. Designed by <a href="http://emerald.test" rel="nofollow">Emerald</a></p>
    </div>
  </div>
</div>
<script type="text/javascript" src="js/jquery.1.11.1.js"></script> 
<script type="text/javascript" src="js/bootstrap.js"></script> 
<script type="text/javascript" src="js/SmoothScroll.js"></script> 
<script type="text/javascript" src="js/nivo-lightbox.js"></script> 
<script type="text/javascript" src="js/jquery.isotope.js"></script> 
<script type="text/javascript" src="js/jqBootstrapValidation.js"></script> 
<script type="text/javascript" src="js/contact_me.js"></script> 
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
