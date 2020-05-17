<!doctype html>
<?php
error_reporting(E_ERROR | E_PARSE);
include "ViewModels/addPatientVModel.php";
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}


?>
<html lang="en">

<head>
    <title>Add New Patient</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .form-div {


            border-radius: 10px;
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .form-control:focus {
            box-shadow: none;
        }
    </style>
</head>

<body>
    <?php if (!$connection) { ?>
        <?php include("error.php"); ?>
    <?php } else { ?>
        <?php include("temp/header.php") ?>
        <div class="container mt-5">
            <div class="row text-center">
                <div class="col-12">
                    <div>
                        <h3 class="py-3 text-primary">Add New Patient</h3>
                    </div>
                </div>
                <div class="col-md-4 offset-md-4 form-div shadow">

                    <?php if (count($errors) == 1) { ?>
                        <div class="alert alert1 alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong><?php echo $errors['err'] ?></strong>
                        </div>
                    <?php } ?>
                    <?php if ($Inserted == true) { ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p><?php echo $succesMessage ?></p>
                        </div>
                    <?php } ?>
                    <form action="add_patient.php" method="POST">

                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $_fn ?>" placeholder="First Name" name="firstname">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" value="<?php echo $_ln ?>" placeholder="Last Name" name="lastname">
                        </div>
                        <div class="form-group">
                            <select name="diseases" class="form-control">
                                <option selected="selected" value="Select Disease">Select Disease</>
                                <option value="Malaria">Malaria</option>
                                <option value="Fever">Fever</option>
                                <option value="Headache">Headache</option>
                                <option value="Body Pains">Body Pains</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Submit" name="add_patient_btn">
                        </div>

                    </form>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-5">
                </div>
            </div>
        </div>
        <?php include("temp/footer.php") ?>
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $(".alert").alert();
        $(".alert1").alert();
    </script>
</body>

</html>