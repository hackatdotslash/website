<?php
if (!empty($_POST["register-user"])) {
    /* Form Required Field Validation */
    // foreach ($_POST as $key => $value) {
    //     if (empty($_POST[$key])) {
    //         $error_message = "All Fields are required";
    //         break;
    //     }
    // }

    /* Email Validation */
    if (!isset($error_message)) {
        if (!filter_var($_POST["p1Email"], FILTER_VALIDATE_EMAIL)) {
            $error_message = "Invalid Email Address";
        }
    }

    if (!isset($error_message)) {
        if (!filter_var($_POST["p2Email"], FILTER_VALIDATE_EMAIL)) {
            $error_message = "Invalid Email Address";
        }
    }

    if (!isset($error_message)) {
        if (!filter_var($_POST["p3Email"], FILTER_VALIDATE_EMAIL)) {
            $error_message = "Invalid Email Address";
        }
    }

    /* Validation to check if email taken */
    if (!isset($error_message)) {
        require_once("include/config.php");
        $db_handle = new DBController();
        $query = "SELECT teamName FROM registrationNew WHERE p1Email = '".$_POST["p1Email"]."' OR p2Email = '".$_POST["p2Email"]."' OR p3Email = '".$_POST["p3Email"]."'";
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
            $query = "INSERT INTO registrationNew (teamName, p1Name, p1Email, p1College, p1Gender, p1Dob, p1Contact, p1Github, p1Linkedin, p1Twitter, p1Facebook, p2Name, p2Email, p2College, p2Gender, p2Dob, p2Contact, p2Github, p2Linkedin, p2Twitter, p2Facebook, p3Name, p3Email, p3College, p3Gender, p3Dob, p3Contact, p3Github, p3Linkedin, p3Twitter, p3Facebook, newToHackathon, heardAboutHackathon, intrestedInWorkshop, specialNeeds) VALUES
            ('" . $_POST["teamName"] . "', '" . $_POST["p1Name"] . "', '" . $_POST["p1Email"] . "', '" . $_POST["p1College"] . "', '" . $_POST["p1Gender"] . "', '" . $_POST["p1Dob"] . "', '" . $_POST["p1Contact"]. "', '" . $_POST["p1Github"]. "', '" . $_POST["p1Linkedin"]. "', '" . $_POST["p1Twitter"]. "', '" . $_POST["p1Facebook"]. "', '" . $_POST["p2Name"] . "', '" . $_POST["p2Email"] . "', '" . $_POST["p2College"] . "', '" . $_POST["p2Gender"] . "', '" . $_POST["p2Dob"] . "', '" . $_POST["p2Contact"]. "', '" . $_POST["p2Github"]. "', '" . $_POST["p2Linkedin"]. "', '" . $_POST["p2Twitter"]. "', '" . $_POST["p2Facebook"]. "', '" . $_POST["p3Name"] . "', '" . $_POST["p3Email"] . "', '" . $_POST["p1College"] . "', '" . $_POST["p3Gender"] . "', '" . $_POST["p3Dob"] . "', '" . $_POST["p3Contact"]. "', '" . $_POST["p3Github"]. "', '" . $_POST["p3Linkedin"]. "', '" . $_POST["p3Twitter"]. "', '" . $_POST["p3Facebook"]. "', '" . $_POST["newToHackathon"]. "', '" . $_POST["heardAboutHackathon"]. "', '" . $_POST["intrestedInWorkshop"] . "', '" . $_POST["specialNeeds"] ."')";
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
    <!-- font-->
    <link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
        <div class="col-md-2"></div>
        <div class="col-md-8 card">
            <div class="row register-header">
                <h1 class="col-md-12">REGISTRATION FORM</h1>
                <p class="col-md-12" style="text-align: left; font-size: 15px;"><span style="color: red">*</span> Mandatory Fields</p>
            </div>
            <div class="error-text">
                <?php if(isset($error_message)) echo $error_message; ?>
            </div>

            <!-- form-->
            <form name="frmRegistration" class="row" action="" method="POST" data-toggle="validator">
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Team Name<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="teamName" name="teamName" value="<?php if (isset($_POST['teamName'])) echo $_POST['teamName']; ?>"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="members">
                    <div class="row">
                        <div class="col-md-12">
                            <h3> Member I</h3>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            Name<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Name" name="p1Name" value="<?php if (isset($_POST['p1Name'])) echo $_POST['p1Name']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            Email<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="email" class="register" id="p1Email" name="p1Email" value="<?php if (isset($_POST['p1Email'])) echo $_POST['p1Email']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            College Name<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1College" name="p1College" value="<?php if (isset($_POST['p1College'])) echo $_POST['p1College']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            Gender<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8 text-left register-radio-button">
                            <input required type="radio" id="p1Gender" name="p1Gender" value="Male" <?php if (isset($_POST[ 'p1Gender']) && $_POST[ 'p1Gender']=="Male"
                                ) { ?>checked
                            <?php } ?>> Male
                            <input type="radio" id="p1Gender" name="p1Gender" value="Female" <?php if (isset($_POST[ 'p1Gender']) && $_POST[
                                'p1Gender']=="Female" ) { ?>checked
                            <?php } ?>> Female
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            Date of Birth(YYYY-MM-DD)<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Dob" name="p1Dob" value="<?php if (isset($_POST['p1Dob'])) echo $_POST['p1Dob']; ?>"
                                    pattern="[12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])" data-error="Please enter valid date in (YYYY-MM-DD) format." required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            Mobile No. (+91)<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Contact" name="p1Contact" maxlength="10" value="<?php if (isset($_POST['p1Contact'])) echo $_POST['p1Contact']; ?>"
                                    pattern="[0-9]{10}" data-error="Please enter valid 10 digit mobile no." required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            Github Username<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Github" name="p1Github" value="<?php if (isset($_POST['p1Github'])) echo $_POST['p1Github']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            LinkedIn Username
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Linkedin" name="p1Linkedin" value="<?php if (isset($_POST['p1Linkedin'])) echo $_POST['p1Linkedin']; ?>"
                                    >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            Twitter Username
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Twitter" name="p1Twitter" value="<?php if (isset($_POST['p1Twitter'])) echo $_POST['p1Twitter']; ?>"
                                    >
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            Resume Link<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p1Facebook" name="p1Facebook" value="<?php if (isset($_POST['p1Facebook'])) echo $_POST['p1Facebook']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3> Member II</h3>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            Name<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p2Name" name="p2Name" value="<?php if (isset($_POST['p2Name'])) echo $_POST['p2Name']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Email<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="email" class="register" id="p2Email" name="p2Email" value="<?php if (isset($_POST['p2Email'])) echo $_POST['p2Email']; ?>"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            College Name<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p2College" name="p2College" value="<?php if (isset($_POST['p2College'])) echo $_POST['p2College']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Gender<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8 text-left register-radio-button">
                        <input required type="radio" id="p2Gender" name="p2Gender" value="Male" <?php if (isset($_POST[ 'p2Gender']) && $_POST[ 'p2Gender']=="Male"
                            ) { ?>checked
                        <?php } ?>> Male
                        <input type="radio" id="p2Gender" name="p2Gender" value="Female" <?php if (isset($_POST[ 'p2Gender']) && $_POST[
                            'p2Gender']=="Female" ) { ?>checked
                        <?php } ?>> Female
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Date of Birth(YYYY-MM-DD)<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p2Dob" name="p2Dob" value="<?php if (isset($_POST['p2Dob'])) echo $_POST['p2Dob']; ?>"
                                pattern="[12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])" data-error="Please enter valid date in (YYYY-MM-DD) format." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Mobile No. (+91)<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p2Contact" name="p2Contact" maxlength="10" value="<?php if (isset($_POST['p2Contact'])) echo $_POST['p2Contact']; ?>"
                                pattern="[0-9]{10}" data-error="Please enter valid 10 digit mobile no." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Github Username<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p2Github" name="p2Github" value="<?php if (isset($_POST['p2Github'])) echo $_POST['p2Github']; ?>"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        LinkedIn Username
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p2Linkedin" name="p2Linkedin" value="<?php if (isset($_POST['p2Linkedin'])) echo $_POST['p2Linkedin']; ?>"
                                >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Twitter Username
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p2Twitter" name="p2Twitter" value="<?php if (isset($_POST['p2Twitter'])) echo $_POST['p2Twitter']; ?>"
                                >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Resume Link<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p2Facebook" name="p2Facebook" value="<?php if (isset($_POST['p2Facebook'])) echo $_POST['p2Facebook']; ?>"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3> Member III</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Name<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p3Name" name="p3Name" value="<?php if (isset($_POST['p3Name'])) echo $_POST['p3Name']; ?>"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Email<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="email" class="register" id="p3Email" name="p3Email" value="<?php if (isset($_POST['p3Email'])) echo $_POST['p3Email']; ?>"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-3 register-field-label">
                            College Name<span style="color: red">*</span>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" class="register" id="p3College" name="p3College" value="<?php if (isset($_POST['p3College'])) echo $_POST['p3College']; ?>"
                                    required>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Gender<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8 text-left register-radio-button">
                        <input required type="radio" id="p3Gender" name="p3Gender" value="Male" <?php if (isset($_POST[ 'p3Gender']) && $_POST[ 'p3Gender']=="Male"
                            ) { ?>checked
                        <?php } ?>> Male
                        <input type="radio" id="p3Gender" name="p3Gender" value="Female" <?php if (isset($_POST[ 'p3Gender']) && $_POST[
                            'p3Gender']=="Female" ) { ?>checked
                        <?php } ?>> Female
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Date of Birth(YYYY-MM-DD)<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p3Dob" name="p3Dob" value="<?php if (isset($_POST['p3Dob'])) echo $_POST['p3Dob']; ?>"
                                pattern="[12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01])" data-error="Please enter valid date in (YYYY-MM-DD) format." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Mobile No. (+91)<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p3Contact" name="p3Contact" maxlength="10" value="<?php if (isset($_POST['p3Contact'])) echo $_POST['p3Contact']; ?>"
                                pattern="[0-9]{10}" data-error="Please enter valid 10 digit mobile no." required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Github Username<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p3Github" name="p3Github" value="<?php if (isset($_POST['p3Github'])) echo $_POST['p3Github']; ?>"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        LinkedIn Username
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p3Linkedin" name="p3Linkedin" value="<?php if (isset($_POST['p3Linkedin'])) echo $_POST['p3Linkedin']; ?>"
                                >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Twitter Username
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p3Twitter" name="p3Twitter" value="<?php if (isset($_POST['p3Twitter'])) echo $_POST['p3Twitter']; ?>"
                                >
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Resume Link<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="p3Facebook" name="p3Facebook" value="<?php if (isset($_POST['p3Facebook'])) echo $_POST['p3Facebook']; ?>"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Participating for First time in any Hackathon<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8 text-left register-radio-button">
                        <input required type="radio" id="newToHackathon" name="newToHackathon" value="Yes" <?php if (isset($_POST[ 'newToHackathon']) && $_POST[
                            'newToHackathon']=="Yes" ) { ?>checked
                        <?php } ?>> Yes
                        <input type="radio" id="newToHackathon" name="newToHackathon" value="No" <?php if (isset($_POST[ 'newToHackathon']) && $_POST[
                            'newToHackathon']=="No" ) { ?>checked
                        <?php } ?>> No
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        How did you hear about our hackathon?<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <input type="text" class="register" id="heardAboutHackathon" name="heardAboutHackathon" value="<?php if (isset($_POST['heardAboutHackathon'])) echo $_POST['heardAboutHackathon']; ?>"
                                required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Intrested in workshops in Hackathon<span style="color: red">*</span>
                    </div>
                    <div class="col-md-8 text-left register-radio-button">
                        <input required type="radio" id="intrestedInWorkshop" name="intrestedInWorkshop" value="Yes" <?php if (isset($_POST[
                            'intrestedInWorkshop']) && $_POST[ 'intrestedInWorkshop']=="Yes" ) { ?>checked
                        <?php } ?>> Yes
                        <input type="radio" id="intrestedInWorkshop" name="intrestedInWorkshop" value="No" <?php if (isset($_POST[
                            'intrestedInWorkshop']) && $_POST[ 'intrestedInWorkshop']=="No" ) { ?>checked
                        <?php } ?>> No
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 register-field-label">
                        Any Special Needs..
                    </div>
                    <div class="col-md-8">
                        <input type="textarea" rows="4" cols="50" class="register" id="specialNeeds" name="specialNeeds" value="<?php if (isset($_POST['specialNeeds'])) echo $_POST['specialNeeds']; ?>">
                    </div>
                </div>
                <div class="row">
                    <BR>
                    <BR>
                    <div class="col-md-6 col-md-offset-4 ">
                        <div class="g-recaptcha" data-sitekey="6LfKaUwUAAAAAGJ-CNKamW5YVBdhAlQjrVEOh4MK"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 register-button-container">
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