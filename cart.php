<?php  
    session_start();
    require_once "./config/connection.php";
    if(!isset($_SESSION['user_login']['id_user'])){
        header('location: ./auth/login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>JDShop | Cart</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="css/core-style.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
</head>

<body style="font-family: arial;">

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a class="navbar-brand"><img src="./images/logo-2.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
            
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">

            <div class="nav-close">
                <i class="fas fa-times" aria-hidden="true"></i>
            </div>

            <div class="logo">
                <a href="./level-user/user/index.php"><img src="./images/logo.png" alt=""></a>
            </div>
            
            <!-- Amado Nav -->
            <nav class="amado-nav">
                <ul>
                    <li><a>Welcome, <?= $_SESSION['user_login']['nama_lengkap']?></a></li>
                    <li><a href="./level-user/user/index.php">Home</a></li>
                    <li><a href="./product.php">Product</a></li>
                    <li class="active"><a href="./cart.php">Cart</a></li>
                    <li><a href="./checkout.php">Checkout</a></li>
                    <li><a href="./auth/logout.php">Logout</a></li>
                </ul>
            </nav>
            
            <!-- Cart Menu -->
        
        </header>
        <!-- Header Area End -->

        <div class="cart-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2><i class="fas fa-shopping-cart" style="color: #333"></i> Shopping Cart</h2>
                        </div>
                        <form action="./process/delete-cart.process.php" method="POST">
                            <a href="./level-user/user/index.php"><button type="button" class="btn btn-warning text-white btn-sm mb-3"> Continue shopping </button></a>
                            <button class="btn btn-danger btn-sm mb-3" type="submit" name="clear"> Clear all </button>
                        </form>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price * Qty</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $id_user = $_SESSION['user_login']['id_user'];
                                        $query_select = mysqli_query($connection, "SELECT * FROM tb_carts WHERE id_user = $id_user && status = '0' ORDER BY id_cart DESC");
                                        while($data_cart = mysqli_fetch_assoc($query_select)){
                                            ?>
                                            <tr>
                                                <td class="cart_product_img">
                                                    <a href="./process/undo-cart.process.php?id=<?= $data_cart['id_product'] ?>"><i class="fas fa-times" style="color: red;"></i></a>
                                                    <img src="./images/product/<?= $data_cart['product_image'] ?>" style="width: 100px; height: 100px;">
                                                </td>
                                                <td class="cart_product_desc">
                                                    <p style="color: #000; font-size: 15px; font-weight: 600;"><?= $data_cart['product_name'] ?></p>
                                                </td>
                                                <td class="price">
                                                    <span>Rp. <?= number_format($data_cart['product_price'] * $data_cart['quantity'], 2, "," , ".") ?></span>
                                                </td>
                                                <td class="qty">
                                                    <div class="qty-btn d-flex">
                                                        <div class="quantity">
                                                            <form action="./process/edit-cart.process.php" method="POST">
                                                            <input type="number" name="quantity_new" value="<?= $data_cart['quantity'] ?>">
                                                            <input type="hidden" name="hidden_id_cart" value="<?= $data_cart['id_cart'] ?>">
                                                            <input type="hidden" name="hidden_id_product" value="<?= $data_cart['id_product'] ?>">
                                                        </div>
                                                        <button class="btn btn-info btn-sm" name="update" type="submit">Update</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>   

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <?php 
                                $id_user = $_SESSION['user_login']['id_user'];
                                $query_select = mysqli_query($connection, "SELECT SUM(product_price * quantity) AS total  FROM tb_carts WHERE id_user = $id_user && status = '0'");
                                $data_cart = mysqli_fetch_assoc($query_select);
                                    ?>
                                    <li><span>subtotal:</span> <span>Rp. <?= number_format($data_cart['total'], 2, "," , ".") ?></span></li>
                                    <li><span>delivery:</span> <span>Free</span></li>
                                    <li><span class="text-danger" style="font-weight: 600">total:</span> <span class="text-danger" style="font-weight: 600">Rp. <?= number_format($data_cart['total'], 2, "," , ".") ?></span></li>
                                    <?php
                                 ?>
                            </ul>
                            <div class="cart-btn mt-100">
                                <form action="./process/checkout.process.php" method="POST">
                                    <button class="btn amado-btn w-100" type="submit" name="checkout">Checkout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- ##### Main Content Wrapper End ##### -->

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="./js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="./js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="./js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="./js/plugins.js"></script>
    <!-- Active js -->
    <script src="./js/active.js"></script>


</body>

</html>