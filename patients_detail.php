<!doctype html>

<?php
error_reporting(E_ERROR | E_PARSE);
include("ViewModels/PatientDetailsVmodel.php");
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}
?>

<html lang="en">

<head>
    <title>Patient Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php if (!$connection) { ?>
        <?php include("error.php"); ?>

    <?php } else { ?>
        <?php include("temp/header.php") ?>
        <div class="container mt-5">
            <div class="row text-center">
                <div class="col-12">
                    <?php if ($selectedPay) { ?>

                        <?php if ($selectedPay['firstname'] == "Janet") { ?>

                            <h3 class="text-primary"><?php echo strtoupper($selectedPay['firstname']) . ' ' . strtoupper($selectedPay['lastname']); ?></h3>
                        <?php } else { ?>

                            <h3 class="text-danger"><?php echo strtoupper($selectedPay['firstname']) . ' ' . strtoupper($selectedPay['lastname']); ?></h3>
                        <?php } ?>
                        <h6><?php echo 'This patient is suffering from ' . $selectedPay['disease']; ?></h6>
                        <form action="" method="POST">
                            <input type="submit" value="Delete Patient" class="btn btn-primary border-0 bg-danger" name="del">
                        </form>

                    <?php } else { ?>
                        <h5 class="py-5 text-dark">No records found</h5>
                    <?php } ?>


                </div>
            </div>

        </div>
        <?php include("temp/footer.php") ?>
    <?php } ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>

</html>