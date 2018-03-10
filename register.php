<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href="css/registerr.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>
    <!-- font-->
    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" id="navbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
            aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


          <ul class="nav navbar-nav navbar-left text-center v">
              <li>
                <a href="./index.html" class="home-link"><button onclick="window.open('./index.html','_self')" class="register_button">HOME</button></a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
<div class="container-width">
    <div class="row" style="min-height:100vh;padding-top:10%;margin:0 10px 0 10px;">
        <div class="col-md-4 col-md-offset-4 abc" >
            <h2 style="color:#FFF;padding-left:10px;"> Select your team size </h2>
            <button type="button" class="btn btn-primary btn-lg reg-but" onclick="window.open('./register1.php','_self')">Lone Wolf</button>
            <button type="button" class="btn btn-primary btn-lg reg-but" onclick="window.open('./register2.php','_self')">Team of 2</button>
            <button type="button" class="btn btn-primary btn-lg reg-but" onclick="window.open('./register3.php','_self')">Team of 3</button>
        </div>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
