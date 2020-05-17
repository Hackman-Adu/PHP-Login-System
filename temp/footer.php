<footer class="mt-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <?php if (!empty($_SESSION['user_email'])) { ?>
                    <h6>All Rights Reserved &copy;<?php echo (date('Y')) ?></h6>
                    <hr>
                    <p>Logged in as <?php echo $_SESSION['user_email'] ?> <a href="index.php?logout=index.php?logout=logged-out">(Logout)</a>
                    <?php  } else { ?>
                        <hr>
                        <h6>All Rights Reserved &copy;<?php echo (date('Y')) ?></h6>
                    <?php } ?>
            </div>
        </div>
    </div>

</footer>