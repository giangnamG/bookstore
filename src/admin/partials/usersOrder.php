<?php
    include('../auth.php');
?>
<link rel="stylesheet" href="../../css/admin/usersOrder.css">
<div>
    <div class="card-body">
        <h5 class="card-title text-uppercase mb-0">Users order</h5>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="people-nearby">
                
                <div class="nearby-user">
                    <div class="row">
                        <?php
                            include('conndb.php');
                            $sql = "select * from cart order by Quantity";
                            $sql="SELECT products.PID,products.Title,cart.Quantity,cart.Customer,products.Price,products.rating FROM cart INNER JOIN products ON cart.Product=products.PID WHERE 1";

                            $results = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_assoc($results)){
                                echo '<div class="col-md-2 col-sm-2">
                                <img src="/img/books/'.$row['PID'].'.jpg" alt="product" class="profile-photo-lg">
                                </div>
                                <div class="col-md-7 col-sm-7">
                                <h5><a href="/profile?user='.$row['Customer'].'" class="profile-link">Người đặt: '.$row['Customer'].'</a></h5>
                                <p>'.$row['title'].'</p>
                                <p class="text-muted">Số lượng '.$row['Quantity'].'</p>
                                <p class="text-muted">Giá trị đơn '.$row['Quantity']*$row['Price'].'$</p>
                                </div>
                                <div class="col-md-3 col-sm-3">
                                <button class="btn btn-primary pull-right">Chi tiết</button>
                                </div>';
                            }
                        ?>

                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>