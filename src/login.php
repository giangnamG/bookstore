<?php
include "dbconnect.php";

if(isset($_POST['submit']))
{
  if($_POST['submit']=="login")
  { 
        $username=$_POST['login_username'];
        $password=$_POST['login_password'];
        $query = "SELECT * from users where username ='$username' AND Password='$password'";
        $result = mysqli_query($con,$query)or die();
        if(mysqli_num_rows($result) > 0)
        {
             $row = mysqli_fetch_assoc($result);
             $_SESSION['user']['username']=$row['username'];
             header("Location: index.php?login=" . "Successfully Logged In");
        }
        else
          echo "Incorrect username or password";
   }
}

?>	
