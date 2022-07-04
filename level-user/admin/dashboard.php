<?php  
  session_start();
  require_once "../../config/connection.php";
  if(!isset($_SESSION['user_login']['id_admin'])){
    header('location: ../../auth/login.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    JDShop - Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
  <link rel="stylesheet" type="text/css" href="../../css/fontawesome-all.min.css">
  <!-- CSS Files -->
  <link href="./assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  
</head>

<body>
  <div class="wrapper ">

    <!-- SIDEBAR -->
    <div class="sidebar" data-color="green" data-background-color="white" data-image="./assets/img/sidebar.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="./dashboard.php" class="simple-text logo-normal">
          JD SHOP
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active ">
            <a class="nav-link" href="./dashboard.php">
              <p style="font-size: 14px; letter-spacing: 1px;"><i class="fas fa-tachometer-alt" style="font-size: 14px;"></i>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tampil-kategori.php">
              <p style="font-size: 14px; letter-spacing: 1px;"><i class="fas fa-bars" style="font-size: 14px;"></i>Category</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tampil-product.php">
              <p style="font-size: 14px; letter-spacing: 1px;"><i class="fas fa-list" style="font-size: 14px;"></i>Product</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./daftar-order.php">
              <p style="font-size: 14px; letter-spacing: 1px;"><i class="fas fa-list" style="font-size: 14px;"></i>List Order</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./history-order.php">
              <p style="font-size: 14px; letter-spacing: 1px;"><i class="fas fa-list" style="font-size: 14px;"></i>History Order</p>
            </a>
          </li>
          <!-- <li class="nav-item active-pro ">
                <a class="nav-link" href="./upgrade.php">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li> -->
        </ul>
      </div>
    </div>
    <!-- /END SIDEBAR -->

    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-outline-success btn-sm btn-round">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link">
                  Selamat datang, <?= $_SESSION['user_login']['nama_lengkap'] ?> !
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../../auth/logout.php">
                  <i class="fas fa-sign-out-alt"></i> Logout
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      <div class="content">
        
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Category List</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">

                      <thead class="text-primary">
                        <th>
                          No
                        </th>
                        <th>
                          Category Name
                        </th>
                        <th>
                          Category Description
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>

                      <tbody>
                        <?php  
                          $query_category = mysqli_query($connection, "SELECT * FROM tb_categories ORDER BY id_category DESC");
                          $nomor = 1;
                          while($data_category = mysqli_fetch_assoc($query_category)) {
                            //var_dump($data_category);
                            ?>
                              <tr>
                                <td>
                                  <?= $nomor++ ?>
                                </td>
                                <td>
                                  <?= strtolower($data_category['category_name']) ?>
                                </td>
                                <td>
                                  <?php echo strtolower(substr(strip_tags($data_category['category_description']),0 , 50));
                                        echo "...."; 
                                  ?>
                                </td>
                                <td>
                                  <a class="text-primary" href="./edit-category.php?id=<?php echo $data_category['id_category'] ?>">Edit</a>
                                  |
                                  <a class="text-primary" href="./delete-category.php?id=<?php echo $data_category['id_category'] ?>">Delete</a>
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

        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title ">Product List</h4>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">

                      <thead class="text-warning">
                        <th>
                          No
                        </th>
                        <th>
                          Category Name
                        </th>
                        <th>
                          Product Name
                        </th>
                        <th>
                          Product Price
                        </th>
                        <th>
                          Product Image
                        </th>
                        <th>
                          Stock
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>

                      <tbody>
                        <?php  
                          $query_select_product = mysqli_query($connection, "SELECT tb_products.*,tb_categories.category_name FROM tb_products INNER JOIN tb_categories ON tb_products.id_category = tb_categories.id_category ORDER BY tb_products.id_product DESC");
                          $nomor = 1;
                          while($data_product = mysqli_fetch_assoc($query_select_product)) {
                            ?>
                              <tr>
                                <td>
                                  <?= $nomor++ ?>
                                </td>
                                <td>
                                  <?= strtolower($data_product['category_name']) ?>
                                </td>
                                <td>
                                  <?= strtolower($data_product['product_name']) ?>
                                </td>
                                <td>
                                  <p>Rp.<?php echo number_format($data_product['product_price'], 2, "," , ".")  ?></p>
                                </td>
                                <td>
                                  <img src="../../images/product/<?= $data_product['product_image'] ?>"style="width: 50px; height: 50px;">
                                 </td>
                                <td>
                                  <?= $data_product['product_stock'] ?>
                                </td>
                                </td>
                                <td>
                                  <a class="text-warning" href="./edit-product.php?id=<?php echo $data_product['id_product'] ?>">Edit</a>
                                  |
                                  <a class="text-warning" href="./delete-product.php?id=<?php echo $data_product['id_product'] ?>">Delete</a>
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

      </div>

      <footer class="footer">
        <?php require_once "./partials/footer.php" ?>
      </footer>
    </div>

  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chartist JS -->
  <script src="./assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
</body>

</html>