<!doctype html>
<?php
error_reporting(E_ERROR | E_PARSE);
include("ViewModels/indexVModel.php");
if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    session_destroy();
}

?>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            padding-top: 5%;
        }

        .form-control:focus {
            box-shadow: none;
        }

        .form-div {
            padding-top: 21px;
        }
    </style>
</head>

<body>
    <?php if (!$connection) { ?>
        <?php include("error.php"); ?>
    <?php } else { ?>
        <div class="container">
            <div class="row text-center">
                <div class="col-12 mb-4">
                    <div>
                        <img src="Images/1.png" width="85" height="85">
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-lg-4 offset-lg-4 shadow form-div">

                    <div>
                        <h5 class="text-primary">Please enter your credentials</h5>
                        <?php if (count($errs) == 1) { ?>
                            <div class="text-danger hide">
                                <p><?php echo $errs['message'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <form action="index.php" method="POST">

                        <div class="form-group">
                            <input type="email" name="user_email" value="<?php echo $user_email ?>" placeholder="Email Address" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Login" name="login-btn" class="btn btn-primary btn-block">
                        </div>
                        <div class="form-group">
                            <p><a href="forgot_password.php">Forgot Password?</a></p>
                        </div>
                        <div class="form-group">
                            <p>Don't Have Account? <a href="signup.php">Register Here</a></p>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".form-control").on("focus", function() {
                $(".hide").empty();
            });
        });
    </script>
</body>

</html>