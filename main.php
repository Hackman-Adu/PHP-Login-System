<!doctype html>
<?php
error_reporting(E_ERROR | E_PARSE);
include("ViewModels/mainVModel.php");
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}


?>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php if (!$connection) { ?>
        <?php include("error.php"); ?>
    <?php } else { ?>
        <?php include("temp/header.php"); ?>
        <div class="container">
            <div class="row text-center">
                <div class="col-12 table-responsive">
                    <table class="table table-striped table-hover shadow-sm">
                        <thead class="thead-dark">
                            <th>Date</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Disease</th>
                            <th>
                                <form action="" method="POST"><input type="submit" value="Delete All" name="delAll" class="btn btn-primary bt-block border-0 bg-danger"></form>
                            </th>
                            <th>

                            </th>
                        </thead>
                        <tbody>
                            <?php while ($patient = mysqli_fetch_array($result)) { ?>
                                <tr style="cursor: pointer;">
                                    <td><?php echo $patient['pay_date'] ?></td>
                                    <td><?php echo $patient['firstname'] ?></td>
                                    <td><?php echo $patient['lastname'] ?></td>
                                    <td><?php echo $patient['disease'] ?></td>
                                    <td><a class="btn btn-primary border-0" href="patients_detail.php?id=<?php echo $patient['patient_id'] ?>">View Detail</a></td>
                                    <td><a class="btn btn-primary border-0" href="edit.php?id=<?php echo $patient['patient_id'] ?>">Edit Info</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <hr>
                    <?php if ($number_rows > 1) { ?>
                        <h4 class="lead"><b>Number of patients:&nbsp;<?php echo $number_rows; ?></b></h4>
                    <?php } elseif ($number_rows == 0) { ?>
                        <h4 class="lead text-danger"><b>No records found</b></h4>
                    <?php } else { ?>
                        <h4 class="lead"><b>Number of patient:&nbsp;<?php echo $number_rows; ?></b></h4>
                    <?php } ?>
                </div>

            </div>

        </div>
        <?php include("temp/footer.php"); ?>
    <?php  } ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>