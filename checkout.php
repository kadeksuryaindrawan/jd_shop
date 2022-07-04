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
    <title>JDShop | Checkout</title>

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
                    <li><a href="./cart.php">Cart</a></li>
                    <li class="active"><a href="./checkout.php">Checkout</a></li>
                    <li><a href="./auth/logout.php">Logout</a></li>
                </ul>
            </nav>
            
            <!-- Cart Menu -->
        
        </header>
        <!-- Header Area End -->

        <div class="cart-table-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="cart-title mt-50">
                            <h2>Checkout</h2>
                        </div>
                        <form action="./process/delete-checkout.process.php" method="POST">
                            <button class="btn btn-danger btn-sm mb-3" type="submit" name="clear"> Clear all checkout </button>
                        </form>
                        <?php  
                            $id_user = $_SESSION['user_login']['id_user'];
                            $query_select_total = mysqli_query($connection, "SELECT SUM(product_price * quantity) AS total FROM tb_carts WHERE id_user = $id_user && status = 'process'");
                            $data_total = mysqli_fetch_assoc($query_select_total);
                            ?>
                            <p style="color: #000;"> Total in process : Rp.<?= number_format($data_total['total'],2, ",", ".") ?></p>
                            <?php
                        ?>
                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>#ID Order</th>
                                        <th>Name</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  
                                        $id_user = $_SESSION['user_login']['id_user'];
                                        $query_select = mysqli_query($connection, "SELECT tb_checkout.*,tb_carts.* FROM tb_checkout INNER JOIN tb_carts ON tb_checkout.id_cart = tb_carts.id_cart WHERE tb_carts.id_user = $id_user && tb_carts.status = 'process' || tb_carts.id_user = $id_user && tb_carts.status = 'success' ORDER BY tb_carts.id_cart DESC");
                                        while($data_checkout = mysqli_fetch_assoc($query_select)){
                                            ?>
                                            <tr>
                                                <td class="cart_product_img">
                                                    <p><?= $data_checkout['id_cart'] ?></p>
                                                </td>
                                                <td class="cart_product_desc">
                                                    <p style="color: #000; font-size: 15px; font-weight: 600;"><?= $data_checkout['product_name'] ?> (<?= $data_checkout['quantity'] ?>)</p>
                                                </td>
                                                <td class="price">
                                                    <span>Rp. <?= number_format($data_checkout['product_price'] * $data_checkout['quantity'], 2, "," , ".") ?></span>
                                                </td>
                                                <td class="status">
                                                    <p class="btn btn-<?= $data_checkout['status']?> btn-sm" style="cursor: default;"> <?= $data_checkout['status'] ?> </p>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
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