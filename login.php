<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('inc/header.php');
require_once('inc/nav.php'); ?>

<div class="wrapper">
    <div class="container">
        <h1 class="my-4">Login</h1>
        <?php if (isset($_SESSION["errors"])) :
            foreach ($_SESSION["errors"] as $error):
        ?>
                <div class="alert alert-danger ">
                    <?= $error ?>
                </div>
        <?php endforeach;
        endif;
        unset($_SESSION["errors"]);
        ?>
        <form method="POST" action="handeller/handellogin.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

        <p class="mt-3">Don't have an account? <a href="register.php">Register here</a></p>
    </div>



     <!-- Footer-->
     <footer style="background-color: #343a40; color: white; text-align: center; padding: 20px 0; position: absolute; bottom: 0; width: 100%;">
        <div class="container"><p class="m-0">Copyright &copy; Your Website 2023</p></div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>
</html>

</div>