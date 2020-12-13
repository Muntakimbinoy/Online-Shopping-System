
<?php
  require_once 'core/init.php';
  $sql="SELECT * FROM products WHERE featured = 1 ";
  $featured = $db->query($sql);
   ?>
<!DOCTYPE html>
  <html>
    <head>
      <title>Spice Of Life</title>
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/main.css" />
      <meta name="viewport" content="width=device-width, initial-scale=1,user-scaleable=no">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
      </script>
      <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php
    $sql = "SELECT * FROM categories WHERE parent = 0";
    $pquery = $db->query ($sql); ?>
    <nav class="navbar navbar-default navbar-fixed-top" id="navbar">
      <div class="container">
        <a href="/Project470/index.php" class="navbar-brand" id="text">Spice Of Life</a>
        <ul class="nav navbar-nav">
          <?php while($parent = mysqli_fetch_assoc($pquery)): ?>
          <?php
          $parent_id = $parent['id'];
          $sql2="SELECT * FROM categories WHERE parent= '$parent_id' ";
          $cquery= $db->query($sql2);
          ?>
    <!--drop down menu-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="text"><?php echo $parent['category']; ?><span class="caret"></span></a>
          <ul class ="dropdown-menu" role="menu">
            <?php while($child = mysqli_fetch_assoc($cquery)) : ?>
              <li><a href="#"><?php echo $child['category'] ?></a></li>
            <?php endwhile; ?>
    <!--        <li><a href="#">Shirts</a></li>
            <li><a href="#">Pants</a></li>
            <li><a href="#">Shoes</a></li>
            <li><a href="#">Accessories</a></li>    -->
          </ul>
        </li>
      <?php endwhile ?>
        </ul>
      </div>
    </nav>
    <!-- Inserting  Images -->
    <div id="background-image">
      <div id="image-1"></div>
      <div id="image-2"></div>
    </div>
<!-- remove the spaces and center the products-->
    <div class="col-md-2"></div>

  <!-- main content of featured products-->
    <div class="col-md-8">
      <div class="row">
        <h2 class="text-center">Featured Products</h2
          <?php while($product = mysqli_fetch_assoc($featured)) : ?>
        <div class="col-mid-3">
          <h4><?=$product['title']; ?></h4>
          <img src="<?=$product['image']; ?>" alt="<?=$product['title']; ?>" id="images"/ />
          <p class="list-price text-danger">List Price: <s>$<?=$product['list_price']; ?></s></p>
          <p class="price">Our Price: $<?=$product['price']; ?></p>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-1">Details</button>
        </div>
<?php endwhile; ?>



  <!--    <div class="col-mid-3">
          <h4>Watch</h4>
          <img src="images/Watch.jpg" alt="Watch" id="images"/ />
          <p class="list-price text-danger">List Price: <s>$20.99</s></p>
          <p class="price">Our Price: $17.99</p>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-2">Details</button>
        </div>

        <div class="col-mid-3">
          <h4>Addidas Football</h4>
          <img src="images/football.jpg" alt="Addidas Football" id="images"/ />
          <p class="list-price text-danger">List Price: <s>$39.99</s></p>
          <p class="price">Our Price: $29.99</p>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-3">Details</button>
        </div>

        <div class="col-mid-3">
          <h4>Polo </h4>
          <img src="images/Polo.jpg" alt="Polo " id="images"/ />
          <p class="list-price text-danger">List Price: <s>$54.99</s></p>
          <p class="price">Our Price: $19.99</p>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-4">Details</button>
        </div>

        <div class="col-mid-3">
          <h4>Formal Pant</h4>
          <img src="images/pant.jpg" alt="pant" id="images"/ />
          <p class="list-price text-danger">List Price: <s>$35.99</s></p>
          <p class="price">Our Price: $25.99</p>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-5">Details</button>
        </div>

        <div class="col-mid-3">
          <h4>Shirt</h4>
          <img src="images/shirt.jpg" alt="shirt" id="images"/ />
          <p class="list-price text-danger">List Price: <s>$19.99</s></p>
          <p class="price">Our Price: $15.99</p>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-6">Details</button>
        </div>

        <div class="col-mid-3">
          <h4>Bracelet</h4>
          <img src="images/blet.jpg" alt="Bracelet" id="images"/ />
          <p class="list-price text-danger">List Price: <s>$19.99</s></p>
          <p class="price">Our Price: $9.99</p>
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#details-7">Details</button>
        </div>
      </div>
    -->
<footer class="text-center" id="footer">&copy; Copyright 2020-2021 Spice of Life</footer>
    </div>
  <?php include 'details-modal-levis.php';
  include 'details-modal-Watch.php';
  include 'details-modal-football.php';
  include 'details-modal-Polo.php';
  include 'details-modal-pant.php';
  include 'details-modal-shirt.php';
  include 'details-modal-blet.php';
  ?>

</html>
