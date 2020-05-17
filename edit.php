<!doctype html>
<?php
error_reporting(E_ERROR | E_PARSE);
include("ViewModels/editVModel.php");
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}


?>
<html lang="en">

<head>
    <title>Edit Patient Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php if (!$connection) { ?>
        <?php include("error.php"); ?>
    <?php  } else { ?>
        <?php include("temp/header.php") ?>

        <div class="container mt-5">
            <div class="row text-center">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <?php if ($patient) { ?>
                        <div><?php echo $message ?></div>
                        <form action="" method="POST" class="shadow-sm">
                            <fieldset>
                                <legend class="text-left">Update Patient Information</legend>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo $patient['firstname'] ?>" placeholder="First Name" name="firstname">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo $patient['lastname'] ?>" placeholder="Last Name" name="lastname">
                                </div>
                                <div class="form-group">
                                    <select name="diseases" class="form-control">
                                        <option value=<?php echo $patient['disease'] ?>><?php echo $patient['disease'] ?></>
                                        <option value="Malaria">Malaria</option>
                                        <option value="Fever">Fever</option>
                                        <option value="Headache">Headache</option>
                                        <option value="Body Pains">Body Pains</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-block" value="Update" name="update">
                                </div>
                            </fieldset>
                        </form>
                    <?php } else { ?>
                        <h4 class="text-danger">No records found!</h4>

                    <?php } ?>

                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-5">

                </div>

            </div>
        </div>

        <?php include("temp/footer.php") ?>
    <?php  } ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>