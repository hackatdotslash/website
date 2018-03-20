<?php
//phpinfo();
if (!empty($_POST["register-user"])) {
    
    /* Email Validation */
    if (!isset($error_message)) {
        if (!filter_var($_POST["p1Email"], FILTER_VALIDATE_EMAIL)) {
            $error_message = "Invalid Email Address";
        }
    }

    
    /* Validation to check if email taken */
    if (!isset($error_message)) {
        require_once("include/config.php");
        $db_handle = new DBController();
        $query = "SELECT teamName FROM registrationNew WHERE p1Email = '".$_POST["p1Email"]."' OR p2Email = '".$_POST["p1Email"]."' OR p3Email = '".$_POST["p1Email"]."'";
        $ifEmailTaken = $db_handle->numRows($query);
        if ($ifEmailTaken>0) {
            $error_message = "The Email is already used!!!";
        }
    }

    if (!isset($error_message)) {
        require_once "include/recaptchalib.php";
        
        $response = null;
         
        // check secret key
        $reCaptcha = new ReCaptcha();
        if ($_POST["g-recaptcha-response"]) {
            $response = $reCaptcha->verifyResponse(
                $_SERVER["REMOTE_ADDR"],
                $_POST["g-recaptcha-response"]
            );
        }

        if ($response != null && $response->success) {
        //echo "Hi successfully";
        require_once("include/config.php");
        $db_handle = new DBController();
        $query = "INSERT INTO registrationNew (p1Name, p1Email, p1College, p1Gender, p1Dob, p1Contact, p1Github, p1Linkedin, p1Twitter, p1Facebook, newToHackathon, heardAboutHackathon, intrestedInWorkshop, specialNeeds) VALUES
        ('" . $_POST["p1Name"] . "', '" . $_POST["p1Email"] . "', '" . $_POST["p1College"] . "', '" . $_POST["p1Gender"] . "', '" . $_POST["p1Dob"] . "', '" . $_POST["p1Contact"]. "', '" . $_POST["p1Github"]. "', '" . $_POST["p1Linkedin"]. "', '" . $_POST["p1Twitter"]. "', '" . $_POST["p1Facebook"]. "', '" . $_POST["newToHackathon"]. "', '" . $_POST["heardAboutHackathon"]. "', '" . $_POST["intrestedInWorkshop"] . "', '" . $_POST["specialNeeds"] ."')";
        $result = $db_handle->insertQuery($query);
        if (!empty($result)) {
            $error_message = "";
            $success_message = "You have registered successfully!";
            unset($_POST);
            header("location: register.html");
        } else {
            $error_message = "Problem in registration. Try Again!";
        }
      } else {
        $error_message = "Captcha could not be verified!!!";
      }

    }
}
?>
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
    <div class="row">
        <div class="col-md-2 col-lg-2 col-sm-0 col-xs-0"></div>
        <div class="col-md-8 col-lg-8 col-sm-11 col-xs-11 card">
            <div class="row register-header">
                <h1 class="col-md-12">REGISTRATION FORM</h1>
                <p class="col-md-12" style="text-align: left; font-size: 15px;"><span style="color: red">*</span> Mandatory Fields</p>
            </div>
            <div class="error-text">
                <?php if(isset($error_message)) echo $error_message; ?>
            </div>

            <!-- form-->
            <form name="frmRegistration" class="row" action="" method="POST" data-toggle="validator">

                <div class="members">

                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                            Name<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Name" name="p1Name" value="<?php if (isset($_POST['p1Name'])) echo $_POST['p1Name']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                            Email<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 ">
                            <div class="form-group">
                                <input type="email" class="register" id="p1Email" name="p1Email" value="<?php if (isset($_POST['p1Email'])) echo $_POST['p1Email']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                            College Name<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1College" name="p1College" value="<?php if (isset($_POST['p1College'])) echo $_POST['p1College']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                            Gender<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 text-left register-radio-button">
                            <input required type="radio" id="p1Gender" name="p1Gender" value="Male" <?php if (isset($_POST[ 'p1Gender']) && $_POST[ 'p1Gender']=="Male"
                                ) { ?>checked
                            <?php } ?>> Male
                            <input type="radio" id="p1Gender" name="p1Gender" value="Female" <?php if (isset($_POST[ 'p1Gender']) && $_POST[
                                'p1Gender']=="Female" ) { ?>checked
                            <?php } ?>> Female
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                            Date of Birth(YYYY-MM-DD)<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Dob" name="p1Dob" value="<?php if (isset($_POST['p1Dob'])) echo $_POST['p1Dob']; ?>"
                                    pattern="[12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])" data-error="Please enter valid date in (YYYY-MM-DD) format." required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                            Mobile No. (+91)<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Contact" name="p1Contact" maxlength="10" value="<?php if (isset($_POST['p1Contact'])) echo $_POST['p1Contact']; ?>"
                                    pattern="[0-9]{10}" data-error="Please enter valid 10 digit mobile no." required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                            GitHub Username<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Github" name="p1Github" value="<?php if (isset($_POST['p1Github'])) echo $_POST['p1Github']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                            LinkedIn Username
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Linkedin" name="p1Linkedin" value="<?php if (isset($_POST['p1Linkedin'])) echo $_POST['p1Linkedin']; ?>"
                                    >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                            Twitter Username
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Twitter" name="p1Twitter" value="<?php if (isset($_POST['p1Twitter'])) echo $_POST['p1Twitter']; ?>"
                                    >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                            Resume Link<span style="color: red">*</span>
                            <BR>
                            <span style="color: red; font-size: 0.7em">(Google drive link or drop box link)</span>
                        </div>
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Facebook" name="p1Facebook" value="<?php if (isset($_POST['p1Facebook'])) echo $_POST['p1Facebook']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                        Participating for First time in any Hackathon<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 text-left register-radio-button">
                        <input type="radio" required id="newToHackathon" name="newToHackathon" value="Yes" <?php if (isset($_POST[ 'newToHackathon']) && $_POST[
                            'newToHackathon']=="Yes" ) { ?>checked
                        <?php } ?>> Yes
                        <input type="radio" id="newToHackathon" name="newToHackathon" value="No" <?php if (isset($_POST[ 'newToHackathon']) && $_POST[
                            'newToHackathon']=="No" ) { ?>checked
                        <?php } ?>> No
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                        How did you hear about our hackathon?<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                        <div class="form-group">
                            <input type="text" class="register" id="heardAboutHackathon" name="heardAboutHackathon" value="<?php if (isset($_POST['heardAboutHackathon'])) echo $_POST['heardAboutHackathon']; ?>"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                        Intrested for workshops in Hackathon<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8 text-left register-radio-button">
                        <input required type="radio" id="intrestedInWorkshop" name="intrestedInWorkshop" value="Yes" <?php if (isset($_POST[
                            'intrestedInWorkshop']) && $_POST[ 'intrestedInWorkshop']=="Yes" ) { ?>checked
                        <?php } ?>> Yes
                        <input type="radio" id="intrestedInWorkshop" name="intrestedInWorkshop" value="No" <?php if (isset($_POST[
                            'intrestedInWorkshop']) && $_POST[ 'intrestedInWorkshop']=="No" ) { ?>checked
                        <?php } ?>> No
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xs-3 col-sm-3 register-field-label">
                        Any Special Needs..
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xs-8">
                        <input type="textarea" rows="4" cols="50" class="register" id="specialNeeds" name="specialNeeds" value="<?php if (isset($_POST['specialNeeds'])) echo $_POST['specialNeeds']; ?>">
                    </div>
                </div>
                <div class="row">
                    <BR>
                    <BR>
                    <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6 col-md-offset-4 ">
                        <div class="g-recaptcha" data-sitekey="6LfKaUwUAAAAAGJ-CNKamW5YVBdhAlQjrVEOh4MK"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12  register-button-container">
                        <input type="submit" name="register-user" value="Register" class="register_button">
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>