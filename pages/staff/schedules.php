<?php require_once("../../config/initialize.php"); ?>
<?php
//Import custom Mailer classe into the global namespace
use app\config\Connection;
use app\config\Functions;
use app\config\Session;
use app\includes\Users;

$session = new Session;
$functions = new Functions;
$pdo = new Connection;

if(empty($_SESSION["user_token"])) {
  $functions->redirect_to("../staff.php");
} else {

  if(isset($_REQUEST['token'])){
    $queryStrToken = isset($_GET['token']) ? $_GET['token'] : '';
    $token = isset($_SESSION['user_token']) ? $_SESSION['user_token'] : '';
    $loggedout = $session->logout($token, $queryStrToken);

    if ($loggedout) {
      $functions->redirect_to("../staff.php");
    }
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Meeting Management System</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="description" content="CodedThemes">
<meta name="keywords" content=" Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
<meta name="author" content="CodedThemes">
<!-- Google font-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
<!-- Required Fremwork -->
<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/css/bootstrap.min.css">
<!-- themify-icons line icon -->
<link rel="stylesheet" type="text/css" href="../assets/icon/themify-icons/themify-icons.css">
<!-- ico font -->
<link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">
<!-- Style.css -->
<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
<link rel="stylesheet" type="text/css" href="../assets/css/jquery.mCustomScrollbar.css">
<!-- Required Jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js" integrity="sha512-YYiD5ZhmJ0GCdJvx6Xe6HzHqHvMpJEPomXwPbsgcpMFPW+mQEeVBU6l9n+2Y+naq+CLbujk91vHyN18q6/RSYw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.0/js/bootstrap-timepicker.min.js"></script>

<link rel="stylesheet" href="../assets/css/calendar.css">
</head>

<body>
<div id="pcoded" class="pcoded">
<div class="pcoded-overlay-box"></div>
<div class="pcoded-container navbar-wrapper">

<nav class="navbar header-navbar pcoded-header">
         <div class="navbar-wrapper">
            <div class="navbar-logo">
               <a class="mobile-menu" id="mobile-collapse" href="#!">
               <i class="ti-menu"></i>
               </a>
               <a class="mobile-search morphsearch-search" href="#">
               <i class="ti-search"></i>
               </a>
               <a href="#">
                  <h4>Welcome <?php echo $_SESSION['userType']; ?></h4>
               </a>
               <a class="mobile-options">
               <i class="ti-more"></i>
               </a>
            </div>
            <div class="navbar-container container-fluid">
               <ul class="nav-left">
                  <li>
                     <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                  </li>
               </ul>
               <ul class="nav-right">
                  <li class="header-notification">
                     <a href="#!">
                     <i class="ti-bell"></i>
                     <span class="badge bg-c-pink"></span>
                     </a>
                     <ul class="show-notification">
                        <li>
                           <h6>Notifications</h6>
                           <label class="label label-danger">New</label>
                        </li>
                        <li>
                           <div class="media">
                              <img class="d-flex align-self-center img-radius" src="../../images/avatar.jpg" alt="Generic placeholder image">
                              <div class="media-body">
                                 <h5 class="notification-user"></h5>
                                 <p class="notification-msg"></p>
                                 <span class="notification-time"></span>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="media">
                              <img class="d-flex align-self-center img-radius" src="../../images/avatar.jpg" alt="Generic placeholder image">
                              <div class="media-body">
                                 <h5 class="notification-user">Joseph William</h5>
                                 <p class="notification-msg"></p>
                                 <span class="notification-time"></span>
                              </div>
                           </div>
                        </li>
                        <li>
                           <div class="media">
                              <img class="d-flex align-self-center img-radius" src="../assets/images/avatar-4.jpg" alt="Generic placeholder image">
                              <div class="media-body">
                                 <h5 class="notification-user">Sara Soudein</h5>
                                 <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                 <span class="notification-time">30 minutes ago</span>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </li>
                  <li class="user-profile header-notification">
                     <a href="#!">
                     <img src="../../images/avatar.jpg" class="img-radius" alt="User-Profile-Image">
                     <span></span>
                     <i class="ti-angle-down"></i>
                     </a>
                     <ul class="show-notification profile-notification">
                        <li>
                           <a href="setting.php">
                           <i class="ti-settings"></i> Settings
                           </a>
                        </li>
                        <li>
                           <a href="profile.php">
                           <i class="ti-user"></i> Profile
                           </a>
                        </li>
                        <li>
                           <a href="?token=<?php echo $_SESSION['user_token']; ?>">
                           <i class="ti-layout-sidebar-left"></i> Logout
                           </a>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="pcoded-main-container">
         <div class="pcoded-wrapper">
            <?php include "nav.php"; ?>
<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper">

<div class="page-body">
<div class="row">
<!-- card1 start -->
<!-- Statestics Start -->
<div class="col-md-12 ">
  <div id="calendar"></div>

<div class="card">
<div class="card-header">
<h4>Schedule</h4>
<div class="card-body">
<div class="container"> 
  <div class="page-header">
    <div class="pull-right form-inline">
      <div class="btn-group">
        <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
        <button class="btn btn-default" data-calendar-nav="today">Today</button>
        <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
      </div>
      <div class="btn-group">
        <button class="btn btn-warning" data-calendar-view="year">Year</button>
        <button class="btn btn-warning active" data-calendar-view="month">Month</button>
        <button class="btn btn-warning" data-calendar-view="week">Week</button>
        <button class="btn btn-warning" data-calendar-view="day">Day</button>
      </div>
    </div>
    <h3></h3>
    <!-- <small>To see example with events navigate to Februray 2018</small> -->
  </div>
  <div class="row">
    <div class="col-md-12">
      <div id="showEventCalendar"></div>
    </div>
    <div class="col-md-3">
      <!-- <h4>All Events List</h4> -->
      <ul id="eventlist" class="nav nav-list" style="display: none;"></ul>
    </div>
  </div>  
</div>
</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Scheduling calendar -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<!-- <script type="text/javascript" src="../assets/js/calendar.js"></script>
<script type="text/javascript" src="../assets/js/events.js"></script> -->
<!-- jquery slimscroll js -->
<script type="text/javascript" src="../assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="../assets/js/modernizr/modernizr.js"></script>
<!-- am chart -->
<script src="../assets/pages/widget/amchart/amcharts.min.js"></script>
<script src="../assets/pages/widget/amchart/serial.min.js"></script>
<!-- Todo js -->
<script type="text/javascript " src="../assets/pages/todo/todo.js "></script>
<!-- Custom js -->
<script type="text/javascript" src="../assets/pages/dashboard/custom-dashboard.js"></script>
<script type="text/javascript" src="../assets/js/script.js"></script>
<script type="text/javascript " src="../assets/js/SmoothScroll.js"></script>
<script src="../assets/js/pcoded.min.js"></script>
<script src="../assets/js/demo-12.js"></script>
<script src="../assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
var $window = $(window);
var nav = $('.fixed-button');
$window.scroll(function(){
if ($window.scrollTop() >= 200) {
nav.addClass('active');
}
else {
nav.removeClass('active');
}
});

moment.locale('en');
var now = moment();

var events = [{
    start: now.startOf('week').add(9, 'h').format('X'),
    end: now.startOf('week').add(10, 'h').format('X'),
    title: '1',
    content: 'Hello World! <br> <p>Foo Bar</p>',
    category:'Professionnal'
  },{
    start: now.startOf('week').add(10, 'h').format('X'),
    end: now.startOf('week').add(11, 'h').format('X'),
    title: '2',
    content: 'Hello World! <br> <p>Foo Bar</p>',
    category:'Professionnal'
}];

var daynotes = [{
    time: now.startOf('week').add(15, 'h').add(30, 'm').format('X'),
    title: 'Leo\'s holiday',
    content: 'yo',
    category: 'holiday'
}];

var myCalendar = $('#calendar').Calendar({
    events: events,
    daynotes: daynotes
}).init();


$('#calendar').Calendar({

  // language
  locale: 'fr',

  // 'day', 'week', 'month'
  view: 'week',

  // enable keyboard navigation
  enableKeyboard: true,

  // default view
  defaultView: {
    largeScreen: 'week',
    smallScreen: 'day',
    smallScreenThreshold: 1000
  },


  weekday: {
    timeline: {
      fromHour: 7, // start hour
      toHour: 20, // end hour
      intervalMinutes: 60,
      format: 'HH:mm',
      heightPx: 50,
      autoResize: true
    },
    dayline: {
      weekdays: [0, 1, 2, 3, 4, 5, 6],
      format: 'dddd DD/MM',
      heightPx: 31,
      month: {
        format: 'MMMM YYYY',
        heightPx: 30,
        weekFormat: 'w'
      }
    }
  },
  month: {
    format: 'MMMM YYYY',
    heightPx: 31,
    weekline: {
      format: 'w',
      heightPx: 80
    },
    dayheader: {
      weekdays: [0, 1, 2, 3, 4, 5, 6],
      format: 'dddd',
      heightPx: 30
    },
    day: {
      format: 'DD/MM'
    }
  },

  // timestamp in the week to display
  unixTimestamp: moment().format('X'),

  // event options
  event: {
    hover: {
      delay: 500
    }
  },

  // custom colors
  colors: {
    events: eventColors,
    daynotes: daynoteColors,
    random: true
  },

  // category options
  categories: {
    enable: true,
    hover: {
      delay: 500
    }
  },

  // display the current time
  now: {
    enable: false,
    refresh: false,
    heightPx: 1,
    style: 'solid',
    color: '#03A9F4'
  }
  
})
</script>
</body>

</html>
<?php } ?>
