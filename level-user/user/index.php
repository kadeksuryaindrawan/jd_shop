<?php  
  session_start();
  require_once "../../config/connection.php";

  if(isset($_SESSION['user_login']['id_user'])){
    ?>
    <!doctype html>
	<html lang="en">
	  <head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	    <link rel="stylesheet" type="text/css" href="../../css/style.css">
	    <link rel="stylesheet" type="text/css" href="../../css/fontawesome.min.css">
	    <link rel="stylesheet" type="text/css" href="../../css/fontawesome-all.min.css">

	    <title>JDShop - The biggest fashion sale</title>
	  </head>
	  <body>

	    <div class="wrapper" id="home">

	    <div class="bg-topnav  main-nav">
          <div class="center-topnav">
            <ul class="topnav">
              <li class="kiri"><a href="#"> <i class="fas fa-phone"></i> (+62) 8970945425 </a></li>
              <li class="kanan cd-signin"><a href="../../auth/logout.php"><i class="fas fa-user"></i> Welcome, <?= ucfirst($_SESSION['user_login']['nama_lengkap']) ?> <i class="fas fa-sign-out-alt"></i></a></li>

              <li class="kanan" style="border-right: 1px solid grey;"><a href="../../cart.php"><i class="fas fa-shopping-cart"></i> Cart </a></li>
            </ul>
          </div><!--/CENTER-->
        </div><!--/TOP NAV-->

	    <!-- MENU -->
	    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-color" style="margin-top: -20px;">
	      <div class="container-fluid">
	      <a class="navbar-brand"><img src="../../images/logo-1.png" alt=""></a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	      </button>

	      <div class="collapse navbar-collapse" id="navbarSupportedContent">
	        <ul class="navbar-nav ml-auto" style="letter-spacing: 1px;">
	          <li class="nav-item">
	            <a class="nav-link" href="#home">Home</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">Products</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#about">About us</a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="../../checkout.php"> Checkout </a>
	          </li>
	        </ul>
	        <form class="form-inline my-2 my-lg-0">
	          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
	          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	        </form>
	      </div>
	      </div>
	    </nav>
	    <!-- /MENU -->

	    <!-- SLIDER -->
	    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	      <ol class="carousel-indicators">
	        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
	      </ol>
	      <div class="carousel-inner">
	        <div class="carousel-item active">
	          <img class="d-block w-100" src="../../images/slider-1.jpg" alt="First slide">
	        </div>
	        <div class="carousel-item">
	          <img class="d-block w-100" src="../../images/slider-2.jpg" alt="Second slide">
	        </div>
	        <div class="carousel-item">
	          <img class="d-block w-100" src="../../images/slider-3.jpg" alt="Third slide">
	        </div>
	        <div class="carousel-item">
	          <img class="d-block w-100" src="../../images/slider-4.jpg" alt="Fourth slide">
	        </div>
	      </div>
	      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	        <span class="sr-only">Previous</span>
	      </a>
	      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	        <span class="carousel-control-next-icon" aria-hidden="true"></span>
	        <span class="sr-only">Next</span>
	      </a>
	    </div>
	    <!-- /SLIDER -->

	    <div class="container">
	      <div class="row text-center">

	        <div class="col-lg-4 col-md-4 col-sm-6">
	          <div class="konten-1">
	            <i class="fas fa-truck"></i> FAST AND FREE SHIPPING
	          </div><!-- /KONTEN-1 -->
	        </div>

	        <div class="col-lg-4 col-md-4 col-sm-6">
	          <div class="konten-1">
	            <i class="fas fa-gift"></i> MONEY BACK GUARANTEE
	          </div><!-- /KONTEN-1 -->
	        </div>

	        <div class="col-lg-4 col-md-4 col-sm-12">
	          <div class="konten-1">
	            <i class="fas fa-question-circle"></i> ONLINE HELP SUPPORT
	          </div><!-- /KONTEN-1 -->
	        </div>

	      </div>
	    </div>

	    <div class="bg-konten-2 row">
	      <div class="center">
	        
	        <div class="col-lg-3">
	          <div class="konten-2-pinggir">
	            <h2>LATEST PRODUCTS</h2>
	            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</h3>
	          </div><!-- /KONTEN-2 -->  
	        </div><!-- /COL-LG-3 -->
	        
	        <?php
	        $query_select_product = mysqli_query($connection, "SELECT * FROM tb_products WHERE product_stock > 0 ORDER BY id_product DESC LIMIT 3");
	          while($data_product = mysqli_fetch_assoc($query_select_product)){
	            ?>
	                  <div class="hover1">
	                    <div class="col-lg-3">
	                      <div class="konten-2">
	                        <img src="../../images/product/<?= $data_product['product_image'] ?>" class="konten-masih">

	                        <div class="img-hover-best">
	                        <img src="../../images/product/<?= $data_product['product_image_2']  ?>">
	                        </div><!--/IMG-HOVER-BEST-->
	                        <div class="bintang">
	                          <i class="far fa-star" style="padding-left: 20px"></i>
	                          <i class="far fa-star"></i>
	                          <i class="far fa-star"></i>
	                          <i class="far fa-star"></i>
	                          <i class="far fa-star"></i>
	                        </div><!-- /BINTANG -->
	                        
	                       	<p> <?= ucwords(strtolower($data_product['product_name'])) ?> - (<?= $data_product['product_stock'] ?>) </p>
                       		<p class="harga"><sup>Rp</sup>.<?= number_format($data_product['product_price'], 2, "," , ".")  ?></p>

                          	<form method="POST" action="../../process/cart.process.php?id=<?=$data_product['id_product'] ?>">
                            	<input type="hidden" name="input_jumlah_beli" value="1">
                            	<input type="hidden" name="hidden_image" value="<?= $data_product['product_image'] ?>">
                            	<input type="hidden" name="hidden_name" value="<?= $data_product['product_name'] ?>">
                            	<input type="hidden" name="hidden_price" value="<?= $data_product['product_price'] ?>">
                            	<button class="btn-buy" type="submit" name="add_to_cart" value="1"><i class="fas fa-shopping-cart"></i> ADD TO CART </button>
                          	</form>
                          	
                      </div><!-- /KONTEN-2 -->  
                    </div><!-- /COL-LG-3 -->
                    </div><!-- /HOVER-1 -->

	            <?php
	          } 
	          
	      ?>
	      </div>
	    </div>

	    <div class="bg-konten-2 row">
	      <div class="center">
	        
	        <div class="col-lg-3">
	          <div class="konten-2-pinggir">
	            <h2>LONGEST PRODUCTS</h2>
	            <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</h3>
	          </div><!-- /KONTEN-2 -->  
	        </div><!-- /COL-LG-3 -->
	        
	        <?php
	        $query_select_product = mysqli_query($connection, "SELECT * FROM tb_products WHERE product_stock > 0 ORDER BY id_product ASC LIMIT 3");
	          while($data_product = mysqli_fetch_assoc($query_select_product)){
	            ?>
	                  <div class="hover1">
	                    <div class="col-lg-3">
	                      <div class="konten-2">
	                        <img src="../../images/product/<?= $data_product['product_image'] ?>" class="konten-masih">

	                        <div class="img-hover-best">
	                        <img src="../../images/product/<?= $data_product['product_image_2']  ?>">
	                        </div><!--/IMG-HOVER-BEST-->
	                        <div class="bintang">
	                          <i class="far fa-star" style="padding-left: 20px"></i>
	                          <i class="far fa-star"></i>
	                          <i class="far fa-star"></i>
	                          <i class="far fa-star"></i>
	                          <i class="far fa-star"></i>
	                        </div><!-- /BINTANG -->
	                        
	                       	<p> <?= ucwords(strtolower($data_product['product_name'])) ?> - (<?= $data_product['product_stock'] ?>) </p>
                       		<p class="harga"><sup>Rp</sup>.<?= number_format($data_product['product_price'], 2, "," , ".")  ?></p>

                          	<form method="POST" action="../../process/cart.process.php?id=<?=$data_product['id_product'] ?>">
                            	<input type="hidden" name="input_jumlah_beli" value="1" class="jumlah">
                            	<input type="hidden" name="hidden_image" value="<?= $data_product['product_image'] ?>">
                            	<input type="hidden" name="hidden_name" value="<?= $data_product['product_name'] ?>">
                            	<input type="hidden" name="hidden_price" value="<?= $data_product['product_price'] ?>">
                            	<button class="btn-buy" type="submit" name="add_to_cart" value="1"><i class="fas fa-shopping-cart"></i> ADD TO CART </button>
                          	</form>
                          	
                      </div><!-- /KONTEN-2 -->  
                    </div><!-- /COL-LG-3 -->
                    </div><!-- /HOVER-1 -->

	            <?php
	          } 
	          
	      ?>
	      </div>
	    </div>
	        

	    <div class="bg-konten-3 row" id="about">

	      <div class="col-lg-12">
	        <div class="judul-konten">
	          <h2>ABOUT US</h2>
	          <hr class="garis"></hr>
	        </div><!-- /JUDUL KONTEN -->
	      </div><!-- /COL-LG-12 -->

	      <div class="center">

	        <div class="col-lg-3">
	          <div class="konten-3">
	            <div class="top-konten-3"><i class="fas fa-thumbs-up"></i></div>
	            <h2>TRUSTED</h2>
	            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	            tempor incididunt ut labore et dolore magna aliqua. Ut enigm ad</p>
	          </div><!-- KONTEN-3 -->
	        </div><!-- /COL-LG-3 -->

	        <div class="col-lg-3">
	          <div class="konten-3">
	            <div class="top-konten-3"><i class="fas fa-star"></i></div>
	            <h2>FAVORITE</h2>
	            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
	          </div><!-- KONTEN-3 -->
	        </div><!-- /COL-LG-3 -->

	        <div class="col-lg-3">
	          <div class="konten-3">
	            <div class="top-konten-3"><i class="fas fa-chess-queen"></i></div>
	            <h2>AUTHENTIC</h2>
	            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
	          </div><!-- KONTEN-3 -->
	        </div><!-- /COL-LG-3 -->

	        <div class="col-lg-3">
	          <div class="konten-3">
	            <div class="top-konten-3"><i class="fas fa-check"></i></div>
	            <h2>FAST AND EASY</h2>
	            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad</p>
	          </div><!-- KONTEN-3 -->
	        </div><!-- /COL-LG-3 -->

	      </div><!-- /CENTER -->
	    </div><!-- /BG-KONTEN-3 -->
	    
	    </div><!-- /WRAPPER --> 



	    <!-- Optional JavaScript -->
	    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="../../js/jquery-3.3.1.slim.min.js"></script>
	    <script src="../../js/popper.min.js"></script>
	    <script src="../../js/bootstrap.min.js"></script>

	    <script src="../../js/jquery.min.js"></script>
	    <script>
	    $(document).ready(function(){
	      // Add smooth scrolling to all links
	      $("a").on('click', function(event) {

	        // Make sure this.hash has a value before overriding default behavior
	        if (this.hash !== "") {
	          // Prevent default anchor click behavior
	          event.preventDefault();

	          // Store hash
	          var hash = this.hash;

	          // Using jQuery's animate() method to add smooth page scroll
	          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	          $('html, body').animate({
	            scrollTop: $(hash).offset().top
	          }, 1500, function(){
	       
	            // Add hash (#) to URL when done scrolling (default click behavior)
	            window.location.hash = hash;
	          });
	        } // End if
	      });
	    });
	    </script>
	    
	  </body>
	</html>
    <?php
  }
  else{
  	header('location: ../../auth/login.php');
  }
?>
