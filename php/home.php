<?php
    error_reporting(E_ALL);
    ini_set('display_errors', true);
    ini_set('html_errors', true);

    session_start();
    //var_dump($_SESSION);
    //$session_id = session_id();
    //var_dump(session_id());

    if(!isset($_SESSION['username'])) {
    	header('Location: http://172.16.15.26/signin.html');
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Lighting Dailies Facilitator System, for Bilal">
    <meta name="author" content="Abhishek Pareek">

    <!-- Le styles -->
    <link href="./bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
        background-color: #f5f5f5;
      }
    </style>
    <link href="./bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="./bootstrap/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="./bootstrap/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="./bootstrap/ico/favicon.png">
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Barajoun Studio</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="./home.html">Home</a></li>
              <li><a href="./about.html">About</a></li>
              <li><a href="./contact.html">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <h1>Lighting Dailies Review System</h1>
      <p>This is to help facilitate lighting dailies for Bilal.<br>The list of dailies to be reviewed today will appear beolw.</p>

      <div>
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Product</th>
                  <th>Payment Taken</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr class="success">
                  <td>1</td>
                  <td>TB - Monthly</td>
                  <td>01/04/2012</td>
                  <td>Approved</td>
                </tr>
                <tr class="error">
                  <td>2</td>
                  <td>TB - Monthly</td>
                  <td>02/04/2012</td>
                  <td>Declined</td>
                </tr>
                <tr class="warning">
                  <td>3</td>
                  <td>TB - Monthly</td>
                  <td>03/04/2012</td>
                  <td>Pending</td>
                </tr>
                <tr class="info">
                  <td>4</td>
                  <td>TB - Monthly</td>
                  <td>04/04/2012</td>
                  <td>Call in to confirm</td>
                </tr>
                <tr class="info">
                  <td>4</td>
                  <td>TB - Monthly</td>
                  <td>04/04/2012</td>
                  <td>Call in to confirm</td>
                </tr>
                <tr class="success">
                  <td>1</td>
                  <td>TB - Monthly</td>
                  <td>01/04/2012</td>
                  <td>Approved</td>
                </tr>
                <tr class="error">
                  <td>2</td>
                  <td>TB - Monthly</td>
                  <td>02/04/2012</td>
                  <td>Declined</td>
                </tr>
                <tr class="warning">
                  <td>3</td>
                  <td>TB - Monthly</td>
                  <td>03/04/2012</td>
                  <td>Pending</td>
                </tr>
                <tr class="info">
                  <td>4</td>
                  <td>TB - Monthly</td>
                  <td>04/04/2012</td>
                  <td>Call in to confirm</td>
                </tr>
                <tr class="info">
                  <td>4</td>
                  <td>TB - Monthly</td>
                  <td>04/04/2012</td>
                  <td>Call in to confirm</td>
                </tr>
                <tr class="success">
                  <td>1</td>
                  <td>TB - Monthly</td>
                  <td>01/04/2012</td>
                  <td>Approved</td>
                </tr>
                <tr class="error">
                  <td>2</td>
                  <td>TB - Monthly</td>
                  <td>02/04/2012</td>
                  <td>Declined</td>
                </tr>
                <tr class="warning">
                  <td>3</td>
                  <td>TB - Monthly</td>
                  <td>03/04/2012</td>
                  <td>Pending</td>
                </tr>
                <tr class="info">
                  <td>4</td>
                  <td>TB - Monthly</td>
                  <td>04/04/2012</td>
                  <td>Call in to confirm</td>
                </tr>
                <tr class="info">
                  <td>4</td>
                  <td>TB - Monthly</td>
                  <td>04/04/2012</td>
                  <td>Call in to confirm</td>
                </tr>
                <tr class="success">
                  <td>1</td>
                  <td>TB - Monthly</td>
                  <td>01/04/2012</td>
                  <td>Approved</td>
                </tr>
                <tr class="error">
                  <td>2</td>
                  <td>TB - Monthly</td>
                  <td>02/04/2012</td>
                  <td>Declined</td>
                </tr>
                <tr class="warning">
                  <td>3</td>
                  <td>TB - Monthly</td>
                  <td>03/04/2012</td>
                  <td>Pending</td>
                </tr>
                <tr class="info">
                  <td>4</td>
                  <td>TB - Monthly</td>
                  <td>04/04/2012</td>
                  <td>Call in to confirm</td>
                </tr>
                <tr class="info">
                  <td>4</td>
                  <td>TB - Monthly</td>
                  <td>04/04/2012</td>
                  <td>Call in to confirm</td>
                </tr>
                <tr class="success">
                  <td>1</td>
                  <td>TB - Monthly</td>
                  <td>01/04/2012</td>
                  <td>Approved</td>
                </tr>
                <tr class="error">
                  <td>2</td>
                  <td>TB - Monthly</td>
                  <td>02/04/2012</td>
                  <td>Declined</td>
                </tr>
                <tr class="warning">
                  <td>3</td>
                  <td>TB - Monthly</td>
                  <td>03/04/2012</td>
                  <td>Pending</td>
                </tr>
                <tr class="info">
                  <td>4</td>
                  <td>TB - Monthly</td>
                  <td>04/04/2012</td>
                  <td>Call in to confirm</td>
                </tr>
                <tr class="info">
                  <td>4</td>
                  <td>TB - Monthly</td>
                  <td>04/04/2012</td>
                  <td>Call in to confirm</td>
                </tr>
              </tbody>
            </table>
      </div>
    </div> <!-- /container -->
  </body>
</html>

