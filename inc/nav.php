<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">PMS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <?php if (isset($_SESSION['authentication'])): ?>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <?php endif; ?>
                    <?php if(isset($_SESSION['authentication'] ) && $_SESSION['authentication'][2]==="admin"): ?>
                    <li class="nav-item"><a class="nav-link" href="add_product.php">Add Product</a></li>
                    <?php endif; ?>
               
            </ul>

            <div class="d-flex gap-3 align-items-center">
                <ul class="navbar-nav w-100 d-flex justify-content-between mb-0">
                    <?php if (!isset($_SESSION['authentication'])): ?>
                        <li class="nav-item">
                            <a class="nav-link " href="http://localhost/pms-front/register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/pms-front/login.php">Login</a>
                        </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['authentication'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/pms-front/logout.php">Logout</a>
                        </li>

                    <?php endif; ?>
            </div>
            </ul>
            <?php
            // Check if the session cartData is set, if not initialize it as an empty array
            if (!isset($_SESSION['cartData']) || !is_array($_SESSION['cartData'])) {
                $_SESSION['cartData'] = []; // Initialize as an empty array if not set
            }
            $countProduct = 0;
            foreach ($_SESSION['cartData'] as $item) {
                $countProduct += $item['quantity'];
            }
            ?>
            <form class="d-flex" action="cart.php">
               
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-10"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?= $countProduct ?></span>
                </button>
             
            </form>
        </div>
    </div>
</nav>