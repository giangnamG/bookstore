<?php
  session_start();
  include('../dbconnect.php');
  $carts = [];
  if(isset($_GET['user'])){
    $user = $_GET['user'];
    $sql = "select * from cart where Customer = '$user'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
      array_push($carts,$row);
    }
    // 
    $sql = "select * from users where username = '$user'";
    $result = mysqli_query($conn,$sql);
    $info = mysqli_fetch_assoc($result);
  }
  $productOrder = [];
  $total = 0;
  foreach($carts as $cart){
    $pid = $cart['Product'];
    $sql = "select * from products where PID = '$pid'";
    $result = mysqli_query($conn,$sql);
    $productOrder[$pid] = mysqli_fetch_assoc($result);
    $total += $cart['Quantity']*($productOrder[$cart['Product']]['Price']-$productOrder[$cart['Product']]['Discount']);
  }
  // print_r($productOrder);
  // var_dump($carts);
  // var_dump($info);


?>
<section style="background-color: #eee;">
  <div class="container py-1">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="/">Bookstore</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3"><?php echo $info['username']?></h5>
            <!-- <p class="text-muted mb-1">Full Stack Developer</p>
            <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
            <div class="d-flex justify-content-center mb-2">
              <!-- <button type="button" class="btn btn-primary">Follow</button> -->
              <button type="button" class="btn btn-outline-primary ms-1">Message</button>
            </hr>
              <button type="button" class="btn btn-outline-primary ms-1"><a href="/profile?user=<?php echo $_GET['user']?>&edit=1">Edit</a></button>
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0">tổng số đơn hàng: <?php echo count($carts)?>$</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-globe fa-lg text-warning"></i>
                <p class="mb-0">tổng số tiền phải thanh toán: <?php echo $total?>$</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $info['username']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $info['email']?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $info['phone']?></p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $info['address']?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <style>
          .checked {
              color: orange;
              }
          </style>
          <?php foreach($carts as $cart):?>
            <div class="card col-sm-6 mx-auto" style="width: 18rem;">
              <div class="card-body" >
                <p class="card-text"><?php echo $productOrder[$cart['Product']]['Title']?></p>
                <img class="card-img-top" style="padding: 0;" src="../img/books/<?php echo $cart['Product']?>.jpg" alt="Card image cap">
              <!-- rating  -->
                  <?php
                      for($i = 0;$i<$productOrder[$cart['Product']]['rating'];$i++)
                          echo '<span class="fa fa-star checked"></span>';
                      for($i = $productOrder[$cart['Product']]['rating'];$i<5;$i++)    
                          echo '<span class="fa fa-star"></span>';
                  ?>
                <p class="card-text">số lượng: <?php echo $cart['Quantity']?> quyển</p>
                <p class="card-text">Giá: <?php echo $productOrder[$cart['Product']]['Price']?>$</p>
                <p class="card-text">Giảm giá: <?php echo $productOrder[$cart['Product']]['Discount']?>$</p>
                <p class="card-text">Tổng tiền: <?php $price = $cart['Quantity']*($productOrder[$cart['Product']]['Price']-$productOrder[$cart['Product']]['Discount']); echo $price; $total+=$price ?>$</p>
              </div>    
            </div>
          <?php endforeach?>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- rating.js file -->
  <script>
    $(document).ready(function() {
      $('#rateMe3').mdbRate();
    });
  </script>
  <script src="js/addons/rating.js"></script>