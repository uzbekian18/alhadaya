<?php
include_once("header.php");
//produktlarni olib kelish
$zapros_products = "SELECT * FROM `products`";
$res_product = mysqli_query($connect, $zapros_products);

//category ni olib kelish
$zapros_category = "SELECT * FROM `category`";
$res_category = mysqli_query($connect, $zapros_category);
?>

    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>sixteen products</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
              <ul>
                  <li class="active" data-filter="*">All Products</li>

<?php  
while ($row = mysqli_fetch_assoc($res_category)) {
  echo '<li data_filter=".1">'.$row['name_uz'].'</li>';
}

?>

                 <li data-filter=".des">Featured</li>
                  <li data-filter=".dev">Flash Deals</li>

                  <li data-filter=".hour">Last hour</li>
              </ul>
            </div>
          </div>
          <div class="col-md-12">
            <div class="filters-content">
                <div class="row grid">

<?php 

while ($row = mysqli_fetch_assoc($res_product)) {

$category_id = $row['category_id'];
$image = $row['image'];
$price = $row['price'];
$title_uz = $row['title_uz'];
$description_uz = $row['description_uz'];
$mark = $row['mark'];
$reviews = $row['reviews'];
$status = $row['status'];


$created_date = $row['created_date']; // tovar qoshilgan vaqt 9:24
$time = time()-3600; //hozirgi vaqtdan 1 soat oldin9;00
$hour_product = "";

if ($created_date>=$time) {
  $hour_product = "hour";
}

  echo '<div class="col-lg-4 col-md-4 all '.$category_id.' '.$hour_product.'">
                      <div class="product-item">
                        <a href="#"><img src="'.$image.'" alt=""></a>
                        <div class="down-content">
                          <a href="#"><h4>'.$title_uz.'</h4></a>
                          <h6>$'.$price.'</h6>
                          <p>'.$description_uz.'</p>
                          <ul class="stars">';
                           
                           for ($i=0; $i < $mark; $i++) { 
                           echo '<li><i class="fa fa-star"></i></li>';
                            }

                          echo '</ul>
                          <span>Reviews ('.$reviews.')</span>
                        </div>
                      </div>
                    </div>';


}

?>


                </div>
            </div>
          </div>
          <div class="col-md-12">
            <ul class="pages">
              <li><a href="#">1</a></li>
              <li class="active"><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Copyright &copy; 2020 Sixteen Clothing Co., Ltd.
            
            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
