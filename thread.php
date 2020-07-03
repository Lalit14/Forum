<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>forum</title>
</head>

<body>


    <?php
  include '_nav.php';
  include '_dbconnect.php';
  ?>


    <?php
    
  $id=$_GET['threadid'];
  $sql="SELECT * FROM `threads` WHERE `th_id` = $id";
$result=mysqli_query($conn,$sql);
  while(  $row=mysqli_fetch_assoc($result)){
  $ques_title=$row['th_title']; 
  $description=$row['th_des']; 
//  echo $row['cat_des']; 
//  $des= $row['cat_des']; 
 
  
  }
  ?>


<div class="container">
    


    <div class="jumbotron">
            
            <h2><?php echo $ques_title ;?> ?</h2>
            <hr class="my-4">
            <p><?php echo $description;?></p>
            <!-- <p class="text-right"><b>Poted By : LALA</b></p> -->

        </div>
    </div>
    </div>
<div class="container">
<!-- post comment start here -->
<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo '  <form action="'.$_SERVER['REQUEST_URI'].'" method="post">


<div class="form-group">
    <label for="exampleFormControlTextarea1">
        <h3><b>Post a Comments</b></h3>
    </label>
    <textarea class="form-control" name="comment" id="exampleFormControlTextarea1" rows="3"></textarea>
<input type="hidden" name="sno" value="'.$_SESSION["sno"].'">

    </div>
<button type="submit" class="btn btn-success">Click here to Post</button>

</form>
';
}
else{
echo '<div class="lead">
<a href="login.php" class="alert alert-warning">Login to our website to comment below..... </a>
</div>';

}
?>
<!-- post comment end here -->
<!-- start insert comment to database  -->
<?php
    if($_SERVER['REQUEST_METHOD']=='POST'){

  $comment_content=$_POST['comment'];
$sno=$_POST['sno'];
// echo $sno;
  $sql="INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ( '$comment_content', '$id', '$sno', current_timestamp());
  ";
$result=mysqli_query($conn,$sql);

 
    }
  
  ?>
<!-- ends  comment to database  -->

    <!-- comments to display code start here  -->
    <div class="container">
<h2 class="my-4">DISCCUSS here..</h2>
    <?php

    $id =$_GET['threadid'];
$sql="SELECT * FROM `comment` WHERE `thread_id` =$id";

$result=mysqli_query($conn,$sql);

while(  $row=mysqli_fetch_assoc($result)){
    
    $comment_id=$row['comment_id']; 
    $comment_content=$row['comment_content']; 
    $time=$row['comment_time']; 
    $comment=$row['comment_by']; 
    $sql2="SELECT username FROM `userdatabase` WHERE sno = '$comment'";
    $result2=mysqli_query($conn,$sql2);
    $row2=mysqli_fetch_assoc($result2);
    
    
    
    
    // <span class="fi-browser"></span>
    echo '
    <div class="media">
    <img src="/forum/download.png"  width="37px" class="mr-3" alt="">
    <div class="media-body">
    <p class="font-weight-bold my-0 ">By : ' .$row2['username'].' at '.$time.'
    <p>'.$comment_content.'</p>
    </div>
    </div>'; 
}


?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>