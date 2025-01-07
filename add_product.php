<?php require_once('inc/header.php'); ?>
<?php require_once('inc/nav.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>


<div class="ms-auto" style="width: 97%; ">
    <!-- <h1 class="my-4">Add New Product</h1> -->


    <div class="container d-flex justify-content-center align-items-center" style="min-height: 20vh;">
        <form class="w-100 p-5 bg-white rounded shadow" style="max-width: 800px;" action="handeller/handelAddProduct.php" method="POST">
            <?php
            if (isset($_SESSION["errors"])):
                foreach ($_SESSION["errors"] as $error):
            ?>

                    <div class="alert alert-danger ">
                        <?php echo $error; ?>
                    </div>

            <?php endforeach;
            endif;
            unset($_SESSION["errors"]);
            ?>
            <h3 class="text-center mb-4">Add Product</h3>
            <div class="mb-4">
                <label for="product id" class="form-label">Product ID</label>
                <input type="text" class="form-control form-control-lg" id="ID" name="id">
            </div>
            <div class="mb-4">
                <label for="image_link" class="form-label">Image Link</label>
                <input type="text" placeholder="Enter Image link" class="form-control form-control-lg" id="ID" name="image_link">
            </div>
            <div class="mb-4">
                <label for="category" class="form-label">Product Category</label>
                <input type="text" placeholder="Enter Product Category" class="form-control form-control-lg" id="name" name="category">
            </div>
            <div class="mb-4">
                <label for="stars" class="form-label">Number of Stars</label>
                <input type="number" placeholder="Enter number of stars" class="form-control form-control-lg" name="stars">
            </div>
            <div class="mb-4">
                <label for="salary" class="form-label">Price</label>
                <input type="number" placeholder="Enter Price" class="form-control form-control-lg" name="price">
            </div>
            <button type="submit" class="btn btn-success btn-lg w-100">Add Product</button>
        </form>
    </div>
    <?php require_once('inc/footer.php'); ?>