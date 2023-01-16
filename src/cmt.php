<?php
    if(!isset($_SESSION['user'])){
       header("location: index.php?Message=Login To Continue");
    }else{
        if(isset($_POST['cmt'])){
            include('./dbconnect.php');
            $name = $_SESSION['user']['username'];
            $post = $_GET['ID'];
            $category = $_GET['category'];
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('l jS \of F Y h:i:s A');
            $description = $_POST['msg'];
            $sql = "insert into comments values ('$post','$name','$date','$description')";
            mysqli_query($conn,$sql);
        }
    }
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

<!-- Main Body -->

<section>
    <div id="books" class="container-fluid">
        <div class="row">
            <div class="col-sm-5 col-md-6 col-12 pb-4">
                <h1>Comments</h1>
                <?php
                    $post = $_GET['ID'];
                    $sql = "select * from comments where posts = '$post' order by createAt DESC";
                    $results = mysqli_query($conn,$sql);
                    if($results === FALSE) { 
                        die(mysqli_error($conn)); // better error handling
                    }
                    while($row = mysqli_fetch_assoc($results)){
                        echo '<div class="text-justify darker mt-4 float-right">
                            <a href="profile/?user='.$row['user'].'"><img src="https://i.imgur.com/CFpa3nK.jpg" alt="" class="rounded-circle" width="40" height="40"></a>
                            <h4><b>'.$row['user'].'</b></h4>
                            <span>- '.$row['createAt'].'</span>
                            <br>
                            <p><b>'.$row['description'].'</b></p>
                        </div>';
                    }
                ?>
            </div>
            <div class="submit-cmt col-lg-4 col-md-5 col-sm-4 offset-md-3 offset-sm-1 col-10 mt-7">
                <form id="algin-form" method="POST">
                    <div class="form-group">
                        <h4>Leave a comment</h4>
                        <label for="message">Message</label>
                        <textarea name="msg" id=""msg cols="30" rows="5" class="form-control" style="background-color: white;"></textarea>
                    </div>
                    <!-- <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="fullname" class="form-control">
                    </div> -->
                    <!-- <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div> -->
                    <!-- <div class="form-group">
                        <p class="text-secondary">If you have a <a href="#" class="alert-link">gravatar account</a> your address will be used to display your profile picture.</p>
                    </div> -->
                    <!-- <div class="form-inline">
                        <input type="checkbox" name="check" id="checkbx" class="mr-1">
                        <label for="subscribe">Subscribe me to the newlettter</label>
                    </div> -->
                    <div class="form-group">
                        <button type="submit" id="post" name="cmt" class="btn">Post Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>